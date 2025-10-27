const { Company, User } = require('../models');
const { Op } = require('sequelize');

class CompaniesController {
  // Listar empresas (apenas para master)
  static async index(req, res) {
    try {
      const {
        page = 1,
        limit = 10,
        search,
        status,
        plan
      } = req.query;

      const offset = (page - 1) * limit;
      const where = {};

      // Filtros
      if (search) {
        where[Op.or] = [
          { name: { [Op.like]: `%${search}%` } },
          { email: { [Op.like]: `%${search}%` } },
          { document: { [Op.like]: `%${search}%` } }
        ];
      }

      if (status) {
        where.status = status;
      }

      if (plan) {
        where.plan = plan;
      }

      const { count, rows: companies } = await Company.findAndCountAll({
        where,
        include: [
          {
            model: User,
            as: 'users',
            attributes: ['id', 'name', 'email', 'role'],
            limit: 5 // Mostrar apenas alguns usuários
          }
        ],
        limit: parseInt(limit),
        offset: parseInt(offset),
        order: [['createdAt', 'DESC']]
      });

      res.json({
        success: true,
        data: {
          companies,
          pagination: {
            page: parseInt(page),
            limit: parseInt(limit),
            total: count,
            pages: Math.ceil(count / limit)
          }
        }
      });
    } catch (error) {
      console.error('Erro ao listar empresas:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Buscar empresa por ID
  static async show(req, res) {
    try {
      const { id } = req.params;

      // Controle de acesso
      let companyId = id;
      if (req.user.role !== 'master') {
        companyId = req.user.companyId;
      }

      const company = await Company.findByPk(companyId, {
        include: [
          {
            model: User,
            as: 'users',
            attributes: ['id', 'name', 'email', 'role', 'status', 'createdAt']
          }
        ]
      });

      if (!company) {
        return res.status(404).json({
          success: false,
          message: 'Empresa não encontrada'
        });
      }

      res.json({
        success: true,
        data: {
          company
        }
      });
    } catch (error) {
      console.error('Erro ao buscar empresa:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Criar empresa (apenas master)
  static async store(req, res) {
    try {
      const {
        name,
        document,
        email,
        phone,
        address,
        city,
        state,
        zipCode,
        website,
        plan,
        maxEvents,
        maxUsers
      } = req.body;

      // Validações
      if (!name) {
        return res.status(400).json({
          success: false,
          message: 'Nome da empresa é obrigatório'
        });
      }

      // Verificar se documento já existe (se fornecido)
      if (document) {
        const existingCompany = await Company.findOne({ where: { document } });
        if (existingCompany) {
          return res.status(409).json({
            success: false,
            message: 'CNPJ já cadastrado'
          });
        }
      }

      const company = await Company.create({
        name,
        document,
        email,
        phone,
        address,
        city,
        state,
        zipCode,
        website,
        plan: plan || 'basic',
        maxEvents: maxEvents || 10,
        maxUsers: maxUsers || 5
      });

      res.status(201).json({
        success: true,
        message: 'Empresa criada com sucesso',
        data: {
          company
        }
      });
    } catch (error) {
      console.error('Erro ao criar empresa:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Atualizar empresa
  static async update(req, res) {
    try {
      const { id } = req.params;
      const updateData = req.body;

      // Controle de acesso
      let companyId = id;
      if (req.user.role !== 'master') {
        companyId = req.user.companyId;
      }

      const company = await Company.findByPk(companyId);
      if (!company) {
        return res.status(404).json({
          success: false,
          message: 'Empresa não encontrada'
        });
      }

      // Verificar se novo documento já existe (se foi alterado)
      if (updateData.document && updateData.document !== company.document) {
        const existingCompany = await Company.findOne({ 
          where: { 
            document: updateData.document,
            id: { [Op.ne]: companyId }
          }
        });
        if (existingCompany) {
          return res.status(409).json({
            success: false,
            message: 'CNPJ já cadastrado'
          });
        }
      }

      // Remover campos que apenas master pode alterar
      if (req.user.role !== 'master') {
        delete updateData.plan;
        delete updateData.maxEvents;
        delete updateData.maxUsers;
        delete updateData.status;
      }

      await company.update(updateData);

      const updatedCompany = await Company.findByPk(companyId);

      res.json({
        success: true,
        message: 'Empresa atualizada com sucesso',
        data: {
          company: updatedCompany
        }
      });
    } catch (error) {
      console.error('Erro ao atualizar empresa:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Deletar empresa (apenas master)
  static async destroy(req, res) {
    try {
      const { id } = req.params;

      const company = await Company.findByPk(id);
      if (!company) {
        return res.status(404).json({
          success: false,
          message: 'Empresa não encontrada'
        });
      }

      // Verificar se empresa tem usuários
      const userCount = await User.count({ where: { companyId: id } });
      if (userCount > 0) {
        return res.status(400).json({
          success: false,
          message: 'Não é possível deletar empresa com usuários cadastrados'
        });
      }

      await company.destroy();

      res.json({
        success: true,
        message: 'Empresa deletada com sucesso'
      });
    } catch (error) {
      console.error('Erro ao deletar empresa:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Estatísticas de empresas (apenas master)
  static async stats(req, res) {
    try {
      const [total, active, inactive, byPlan] = await Promise.all([
        Company.count(),
        Company.count({ where: { status: 'active' } }),
        Company.count({ where: { status: { [Op.ne]: 'active' } } }),
        Company.findAll({
          attributes: [
            'plan',
            [Company.sequelize.fn('COUNT', Company.sequelize.col('id')), 'count']
          ],
          group: ['plan']
        })
      ]);

      const planStats = byPlan.reduce((acc, item) => {
        acc[item.plan] = parseInt(item.dataValues.count);
        return acc;
      }, {});

      res.json({
        success: true,
        data: {
          total,
          active,
          inactive,
          byPlan: planStats
        }
      });
    } catch (error) {
      console.error('Erro ao buscar estatísticas:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }
}

module.exports = CompaniesController;