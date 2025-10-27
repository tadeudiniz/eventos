const { User, Company } = require('../models');
const { Op } = require('sequelize');

class UsersController {
  // Listar usuários
  static async index(req, res) {
    try {
      const {
        page = 1,
        limit = 10,
        search,
        role,
        status,
        companyId
      } = req.query;

      const offset = (page - 1) * limit;
      const where = {};

      // Filtros
      if (search) {
        where[Op.or] = [
          { name: { [Op.like]: `%${search}%` } },
          { email: { [Op.like]: `%${search}%` } }
        ];
      }

      if (role) {
        where.role = role;
      }

      if (status) {
        where.status = status;
      }

      // Controle de acesso por empresa
      if (req.user.role !== 'master') {
        where.companyId = req.user.companyId;
      } else if (companyId) {
        where.companyId = companyId;
      }

      const { count, rows: users } = await User.findAndCountAll({
        where,
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name']
          }
        ],
        limit: parseInt(limit),
        offset: parseInt(offset),
        order: [['createdAt', 'DESC']]
      });

      res.json({
        success: true,
        data: {
          users,
          pagination: {
            page: parseInt(page),
            limit: parseInt(limit),
            total: count,
            pages: Math.ceil(count / limit)
          }
        }
      });
    } catch (error) {
      console.error('Erro ao listar usuários:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Buscar usuário por ID
  static async show(req, res) {
    try {
      const { id } = req.params;

      const user = await User.findByPk(id, {
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name', 'status', 'plan']
          }
        ]
      });

      if (!user) {
        return res.status(404).json({
          success: false,
          message: 'Usuário não encontrado'
        });
      }

      // Controle de acesso
      if (req.user.role !== 'master' && req.user.companyId !== user.companyId) {
        return res.status(403).json({
          success: false,
          message: 'Acesso negado'
        });
      }

      res.json({
        success: true,
        data: {
          user
        }
      });
    } catch (error) {
      console.error('Erro ao buscar usuário:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Criar usuário
  static async store(req, res) {
    try {
      const { name, email, password, role, phone, companyId } = req.body;

      // Validações
      if (!name || !email || !password) {
        return res.status(400).json({
          success: false,
          message: 'Nome, email e senha são obrigatórios'
        });
      }

      // Verificar se email já existe
      const existingUser = await User.findOne({ where: { email } });
      if (existingUser) {
        return res.status(409).json({
          success: false,
          message: 'Email já cadastrado'
        });
      }

      // Controle de acesso para criação
      let finalCompanyId = companyId;
      if (req.user.role !== 'master') {
        finalCompanyId = req.user.companyId; // Forçar empresa do usuário logado
      }

      // Verificar se empresa existe
      if (finalCompanyId) {
        const company = await Company.findByPk(finalCompanyId);
        if (!company) {
          return res.status(400).json({
            success: false,
            message: 'Empresa não encontrada'
          });
        }
      }

      const user = await User.create({
        name,
        email,
        password,
        role: role || 'participant',
        phone,
        companyId: finalCompanyId
      });

      const createdUser = await User.findByPk(user.id, {
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name']
          }
        ]
      });

      res.status(201).json({
        success: true,
        message: 'Usuário criado com sucesso',
        data: {
          user: createdUser
        }
      });
    } catch (error) {
      console.error('Erro ao criar usuário:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Atualizar usuário
  static async update(req, res) {
    try {
      const { id } = req.params;
      const { name, email, role, phone, status } = req.body;

      const user = await User.findByPk(id);
      if (!user) {
        return res.status(404).json({
          success: false,
          message: 'Usuário não encontrado'
        });
      }

      // Controle de acesso
      if (req.user.role !== 'master' && req.user.companyId !== user.companyId) {
        return res.status(403).json({
          success: false,
          message: 'Acesso negado'
        });
      }

      // Verificar se novo email já existe (se foi alterado)
      if (email && email !== user.email) {
        const existingUser = await User.findOne({ 
          where: { 
            email,
            id: { [Op.ne]: id }
          }
        });
        if (existingUser) {
          return res.status(409).json({
            success: false,
            message: 'Email já cadastrado'
          });
        }
      }

      const updateData = {};
      if (name) updateData.name = name;
      if (email) updateData.email = email;
      if (phone !== undefined) updateData.phone = phone;
      
      // Controle de alteração de role e status
      if (req.user.role === 'master' || req.user.role === 'client_admin') {
        if (role) updateData.role = role;
        if (status) updateData.status = status;
      }

      await user.update(updateData);

      const updatedUser = await User.findByPk(id, {
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name']
          }
        ]
      });

      res.json({
        success: true,
        message: 'Usuário atualizado com sucesso',
        data: {
          user: updatedUser
        }
      });
    } catch (error) {
      console.error('Erro ao atualizar usuário:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Deletar usuário
  static async destroy(req, res) {
    try {
      const { id } = req.params;

      const user = await User.findByPk(id);
      if (!user) {
        return res.status(404).json({
          success: false,
          message: 'Usuário não encontrado'
        });
      }

      // Controle de acesso
      if (req.user.role !== 'master' && req.user.companyId !== user.companyId) {
        return res.status(403).json({
          success: false,
          message: 'Acesso negado'
        });
      }

      // Não permitir deletar a si mesmo
      if (user.id === req.user.id) {
        return res.status(400).json({
          success: false,
          message: 'Não é possível deletar sua própria conta'
        });
      }

      await user.destroy();

      res.json({
        success: true,
        message: 'Usuário deletado com sucesso'
      });
    } catch (error) {
      console.error('Erro ao deletar usuário:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Estatísticas de usuários
  static async stats(req, res) {
    try {
      const where = {};
      
      // Controle de acesso por empresa
      if (req.user.role !== 'master') {
        where.companyId = req.user.companyId;
      }

      const [total, active, inactive, byRole] = await Promise.all([
        User.count({ where }),
        User.count({ where: { ...where, status: 'active' } }),
        User.count({ where: { ...where, status: { [Op.ne]: 'active' } } }),
        User.findAll({
          where,
          attributes: [
            'role',
            [User.sequelize.fn('COUNT', User.sequelize.col('id')), 'count']
          ],
          group: ['role']
        })
      ]);

      const roleStats = byRole.reduce((acc, item) => {
        acc[item.role] = parseInt(item.dataValues.count);
        return acc;
      }, {});

      res.json({
        success: true,
        data: {
          total,
          active,
          inactive,
          byRole: roleStats
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

module.exports = UsersController;