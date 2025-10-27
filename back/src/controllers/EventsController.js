const { Event, User, Company } = require('../models');
const { Op } = require('sequelize');

class EventsController {
  // Listar eventos
  static async index(req, res) {
    try {
      const {
        page = 1,
        limit = 10,
        search,
        type,
        status,
        category,
        organizerId,
        companyId,
        startDate,
        endDate
      } = req.query;

      const offset = (page - 1) * limit;
      const where = {};

      // Filtros
      if (search) {
        where[Op.or] = [
          { title: { [Op.like]: `%${search}%` } },
          { description: { [Op.like]: `%${search}%` } }
        ];
      }

      if (type) {
        where.type = type;
      }

      if (status) {
        where.status = status;
      }

      if (category) {
        where.category = category;
      }

      if (organizerId) {
        where.organizerId = organizerId;
      }

      // Controle de acesso por empresa
      if (req.user.role !== 'master') {
        where.companyId = req.user.companyId;
      } else if (companyId) {
        where.companyId = companyId;
      }

      // Filtro por data
      if (startDate || endDate) {
        where.startDate = {};
        if (startDate) {
          where.startDate[Op.gte] = new Date(startDate);
        }
        if (endDate) {
          where.startDate[Op.lte] = new Date(endDate);
        }
      }

      const { count, rows: events } = await Event.findAndCountAll({
        where,
        include: [
          {
            model: User,
            as: 'organizer',
            attributes: ['id', 'name', 'email']
          },
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name']
          }
        ],
        limit: parseInt(limit),
        offset: parseInt(offset),
        order: [['startDate', 'ASC']]
      });

      res.json({
        success: true,
        data: {
          events,
          pagination: {
            page: parseInt(page),
            limit: parseInt(limit),
            total: count,
            pages: Math.ceil(count / limit)
          }
        }
      });
    } catch (error) {
      console.error('Erro ao listar eventos:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Buscar evento por ID
  static async show(req, res) {
    try {
      const { id } = req.params;

      const event = await Event.findByPk(id, {
        include: [
          {
            model: User,
            as: 'organizer',
            attributes: ['id', 'name', 'email', 'phone']
          },
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name', 'logo']
          }
        ]
      });

      if (!event) {
        return res.status(404).json({
          success: false,
          message: 'Evento não encontrado'
        });
      }

      // Controle de acesso
      if (req.user.role !== 'master' && req.user.companyId !== event.companyId) {
        return res.status(403).json({
          success: false,
          message: 'Acesso negado'
        });
      }

      res.json({
        success: true,
        data: {
          event
        }
      });
    } catch (error) {
      console.error('Erro ao buscar evento:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Criar evento
  static async store(req, res) {
    try {
      const {
        title,
        description,
        type,
        category,
        startDate,
        endDate,
        timezone,
        maxParticipants,
        price,
        currency,
        registrationStartDate,
        registrationEndDate,
        venue,
        address,
        city,
        state,
        zipCode,
        meetingUrl,
        meetingId,
        meetingPassword,
        platform,
        requiresApproval,
        isPublic,
        allowGuestRegistration,
        sendReminders,
        tags,
        customFields
      } = req.body;

      // Validações básicas
      if (!title || !type || !startDate || !endDate) {
        return res.status(400).json({
          success: false,
          message: 'Título, tipo, data de início e data de fim são obrigatórios'
        });
      }

      // Validar datas
      const start = new Date(startDate);
      const end = new Date(endDate);
      
      if (start >= end) {
        return res.status(400).json({
          success: false,
          message: 'Data de fim deve ser posterior à data de início'
        });
      }

      if (start < new Date()) {
        return res.status(400).json({
          success: false,
          message: 'Data de início deve ser no futuro'
        });
      }

      // Validações específicas por tipo
      if (type === 'presencial' && !venue) {
        return res.status(400).json({
          success: false,
          message: 'Local é obrigatório para eventos presenciais'
        });
      }

      if (type === 'online' && !meetingUrl) {
        return res.status(400).json({
          success: false,
          message: 'URL da reunião é obrigatória para eventos online'
        });
      }

      const event = await Event.create({
        title,
        description,
        type,
        category,
        startDate,
        endDate,
        timezone: timezone || 'America/Sao_Paulo',
        maxParticipants,
        price: price || 0,
        currency: currency || 'BRL',
        registrationStartDate,
        registrationEndDate,
        venue,
        address,
        city,
        state,
        zipCode,
        meetingUrl,
        meetingId,
        meetingPassword,
        platform,
        requiresApproval: requiresApproval || false,
        isPublic: isPublic !== undefined ? isPublic : true,
        allowGuestRegistration: allowGuestRegistration !== undefined ? allowGuestRegistration : true,
        sendReminders: sendReminders !== undefined ? sendReminders : true,
        tags: tags || [],
        customFields: customFields || {},
        organizerId: req.user.id,
        companyId: req.user.companyId
      });

      const createdEvent = await Event.findByPk(event.id, {
        include: [
          {
            model: User,
            as: 'organizer',
            attributes: ['id', 'name', 'email']
          },
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name']
          }
        ]
      });

      res.status(201).json({
        success: true,
        message: 'Evento criado com sucesso',
        data: {
          event: createdEvent
        }
      });
    } catch (error) {
      console.error('Erro ao criar evento:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Atualizar evento
  static async update(req, res) {
    try {
      const { id } = req.params;
      const updateData = req.body;

      const event = await Event.findByPk(id);
      if (!event) {
        return res.status(404).json({
          success: false,
          message: 'Evento não encontrado'
        });
      }

      // Controle de acesso
      if (req.user.role !== 'master' && 
          req.user.companyId !== event.companyId && 
          req.user.id !== event.organizerId) {
        return res.status(403).json({
          success: false,
          message: 'Acesso negado'
        });
      }

      // Validar datas se fornecidas
      if (updateData.startDate || updateData.endDate) {
        const start = new Date(updateData.startDate || event.startDate);
        const end = new Date(updateData.endDate || event.endDate);
        
        if (start >= end) {
          return res.status(400).json({
            success: false,
            message: 'Data de fim deve ser posterior à data de início'
          });
        }
      }

      await event.update(updateData);

      const updatedEvent = await Event.findByPk(id, {
        include: [
          {
            model: User,
            as: 'organizer',
            attributes: ['id', 'name', 'email']
          },
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name']
          }
        ]
      });

      res.json({
        success: true,
        message: 'Evento atualizado com sucesso',
        data: {
          event: updatedEvent
        }
      });
    } catch (error) {
      console.error('Erro ao atualizar evento:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Deletar evento
  static async destroy(req, res) {
    try {
      const { id } = req.params;

      const event = await Event.findByPk(id);
      if (!event) {
        return res.status(404).json({
          success: false,
          message: 'Evento não encontrado'
        });
      }

      // Controle de acesso
      if (req.user.role !== 'master' && 
          req.user.companyId !== event.companyId && 
          req.user.id !== event.organizerId) {
        return res.status(403).json({
          success: false,
          message: 'Acesso negado'
        });
      }

      await event.destroy();

      res.json({
        success: true,
        message: 'Evento deletado com sucesso'
      });
    } catch (error) {
      console.error('Erro ao deletar evento:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Estatísticas de eventos
  static async stats(req, res) {
    try {
      const where = {};
      
      // Controle de acesso por empresa
      if (req.user.role !== 'master') {
        where.companyId = req.user.companyId;
      }

      const now = new Date();
      const sevenDaysFromNow = new Date();
      sevenDaysFromNow.setDate(now.getDate() + 7);

      const [total, active, upcoming, byType, byStatus] = await Promise.all([
        Event.count({ where }),
        Event.count({ where: { ...where, status: 'active' } }),
        Event.count({ 
          where: { 
            ...where, 
            startDate: { 
              [Op.between]: [now, sevenDaysFromNow] 
            } 
          } 
        }),
        Event.findAll({
          where,
          attributes: [
            'type',
            [Event.sequelize.fn('COUNT', Event.sequelize.col('id')), 'count']
          ],
          group: ['type']
        }),
        Event.findAll({
          where,
          attributes: [
            'status',
            [Event.sequelize.fn('COUNT', Event.sequelize.col('id')), 'count']
          ],
          group: ['status']
        })
      ]);

      const typeStats = byType.reduce((acc, item) => {
        acc[item.type] = parseInt(item.dataValues.count);
        return acc;
      }, {});

      const statusStats = byStatus.reduce((acc, item) => {
        acc[item.status] = parseInt(item.dataValues.count);
        return acc;
      }, {});

      res.json({
        success: true,
        data: {
          total,
          active,
          upcoming,
          byType: typeStats,
          byStatus: statusStats
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

module.exports = EventsController;