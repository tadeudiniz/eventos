const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/database');

const Event = sequelize.define('Event', {
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true
  },
  title: {
    type: DataTypes.STRING(255),
    allowNull: false,
    validate: {
      notEmpty: {
        msg: 'Título do evento é obrigatório'
      },
      len: {
        args: [3, 255],
        msg: 'Título deve ter entre 3 e 255 caracteres'
      }
    }
  },
  description: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  type: {
    type: DataTypes.ENUM('presencial', 'online', 'hibrido'),
    allowNull: false,
    validate: {
      isIn: {
        args: [['presencial', 'online', 'hibrido']],
        msg: 'Tipo deve ser presencial, online ou híbrido'
      }
    }
  },
  status: {
    type: DataTypes.ENUM('draft', 'published', 'active', 'completed', 'cancelled'),
    allowNull: false,
    defaultValue: 'draft'
  },
  category: {
    type: DataTypes.STRING(100),
    allowNull: true
  },
  startDate: {
    type: DataTypes.DATE,
    allowNull: false,
    validate: {
      isDate: {
        msg: 'Data de início deve ser uma data válida'
      },
      isAfter: {
        args: new Date().toISOString().split('T')[0],
        msg: 'Data de início deve ser no futuro'
      }
    }
  },
  endDate: {
    type: DataTypes.DATE,
    allowNull: false,
    validate: {
      isDate: {
        msg: 'Data de fim deve ser uma data válida'
      },
      isAfterStartDate(value) {
        if (value <= this.startDate) {
          throw new Error('Data de fim deve ser posterior à data de início');
        }
      }
    }
  },
  timezone: {
    type: DataTypes.STRING(50),
    allowNull: false,
    defaultValue: 'America/Sao_Paulo'
  },
  maxParticipants: {
    type: DataTypes.INTEGER,
    allowNull: true,
    validate: {
      min: {
        args: 1,
        msg: 'Número máximo de participantes deve ser pelo menos 1'
      }
    }
  },
  currentParticipants: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 0,
    validate: {
      min: {
        args: [0],
        msg: 'Número atual de participantes não pode ser negativo'
      },
      isInt: {
        msg: 'Número atual de participantes deve ser um número inteiro'
      }
    }
  },
  price: {
    type: DataTypes.DECIMAL(10, 2),
    allowNull: true,
    defaultValue: 0.00,
    validate: {
      min: {
        args: [0],
        msg: 'Preço não pode ser negativo'
      },
      isDecimal: {
        msg: 'Preço deve ser um número decimal válido'
      }
    }
  },
  currency: {
    type: DataTypes.STRING(3),
    allowNull: false,
    defaultValue: 'BRL'
  },
  registrationStartDate: {
    type: DataTypes.DATE,
    allowNull: true
  },
  registrationEndDate: {
    type: DataTypes.DATE,
    allowNull: true
  },
  // Campos para eventos presenciais
  venue: {
    type: DataTypes.STRING(255),
    allowNull: true
  },
  address: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  city: {
    type: DataTypes.STRING(100),
    allowNull: true
  },
  state: {
    type: DataTypes.STRING(2),
    allowNull: true
  },
  zipCode: {
    type: DataTypes.STRING(10),
    allowNull: true
  },
  latitude: {
    type: DataTypes.DECIMAL(10, 8),
    allowNull: true
  },
  longitude: {
    type: DataTypes.DECIMAL(11, 8),
    allowNull: true
  },
  // Campos para eventos online
  meetingUrl: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  meetingId: {
    type: DataTypes.STRING(100),
    allowNull: true
  },
  meetingPassword: {
    type: DataTypes.STRING(100),
    allowNull: true
  },
  platform: {
    type: DataTypes.STRING(50),
    allowNull: true // Zoom, Teams, Meet, etc.
  },
  // Campos de mídia
  banner: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  images: {
    type: DataTypes.JSON,
    allowNull: true
  },
  // Configurações
  requiresApproval: {
    type: DataTypes.BOOLEAN,
    allowNull: false,
    defaultValue: false
  },
  isPublic: {
    type: DataTypes.BOOLEAN,
    allowNull: false,
    defaultValue: true
  },
  allowGuestRegistration: {
    type: DataTypes.BOOLEAN,
    allowNull: false,
    defaultValue: true
  },
  sendReminders: {
    type: DataTypes.BOOLEAN,
    allowNull: false,
    defaultValue: true
  },
  // Relacionamentos
  organizerId: {
    type: DataTypes.INTEGER,
    allowNull: false,
    references: {
      model: 'users',
      key: 'id'
    }
  },
  companyId: {
    type: DataTypes.INTEGER,
    allowNull: false,
    references: {
      model: 'companies',
      key: 'id'
    }
  },
  // Metadados
  slug: {
    type: DataTypes.STRING(255),
    allowNull: true,
    unique: true
  },
  tags: {
    type: DataTypes.JSON,
    allowNull: true
  },
  customFields: {
    type: DataTypes.JSON,
    allowNull: true
  }
}, {
  tableName: 'events',
  freezeTableName: true,
  indexes: [
    {
      fields: ['organizerId']
    },
    {
      fields: ['companyId']
    },
    {
      fields: ['status']
    },
    {
      fields: ['type']
    },
    {
      fields: ['startDate']
    },
    {
      fields: ['endDate']
    },
    {
      unique: true,
      fields: ['slug']
    }
  ],
  hooks: {
    beforeCreate: (event) => {
      if (!event.slug && event.title) {
        event.slug = event.title
          .toLowerCase()
          .replace(/[^a-z0-9]+/g, '-')
          .replace(/(^-|-$)/g, '') + '-' + Date.now();
      }
    },
    beforeUpdate: (event) => {
      if (event.changed('title') && !event.changed('slug')) {
        event.slug = event.title
          .toLowerCase()
          .replace(/[^a-z0-9]+/g, '-')
          .replace(/(^-|-$)/g, '') + '-' + Date.now();
      }
    }
  }
});

module.exports = Event;