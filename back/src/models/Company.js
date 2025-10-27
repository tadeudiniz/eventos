const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/database');

const Company = sequelize.define('Company', {
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true
  },
  name: {
    type: DataTypes.STRING(255),
    allowNull: false,
    validate: {
      notEmpty: {
        msg: 'Nome da empresa é obrigatório'
      },
      len: {
        args: [2, 255],
        msg: 'Nome da empresa deve ter entre 2 e 255 caracteres'
      }
    }
  },
  document: {
    type: DataTypes.STRING(20),
    allowNull: true,
    unique: {
      msg: 'Este CNPJ já está cadastrado'
    },
    validate: {
      is: {
        args: /^[\d\.\/\-]+$/,
        msg: 'Documento deve conter apenas números e caracteres de formatação'
      }
    }
  },
  email: {
    type: DataTypes.STRING(255),
    allowNull: true,
    validate: {
      isEmail: {
        msg: 'Email deve ter um formato válido'
      }
    }
  },
  phone: {
    type: DataTypes.STRING(20),
    allowNull: true,
    validate: {
      is: {
        args: /^[\d\s\+\-\(\)]+$/,
        msg: 'Telefone deve conter apenas números e caracteres de formatação'
      }
    }
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
    allowNull: true,
    validate: {
      len: {
        args: [2, 2],
        msg: 'Estado deve ter 2 caracteres'
      }
    }
  },
  zipCode: {
    type: DataTypes.STRING(10),
    allowNull: true,
    validate: {
      is: {
        args: /^[\d\-]+$/,
        msg: 'CEP deve conter apenas números e hífen'
      }
    }
  },
  website: {
    type: DataTypes.STRING(255),
    allowNull: true,
    validate: {
      isUrl: {
        msg: 'Website deve ser uma URL válida'
      }
    }
  },
  logo: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  status: {
    type: DataTypes.ENUM('active', 'inactive', 'suspended'),
    allowNull: false,
    defaultValue: 'active'
  },
  plan: {
    type: DataTypes.ENUM('basic', 'professional', 'enterprise'),
    allowNull: false,
    defaultValue: 'basic'
  },
  maxEvents: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 10,
    validate: {
      min: {
        args: 1,
        msg: 'Número máximo de eventos deve ser pelo menos 1'
      }
    }
  },
  maxUsers: {
    type: DataTypes.INTEGER,
    allowNull: false,
    defaultValue: 5,
    validate: {
      min: {
        args: 1,
        msg: 'Número máximo de usuários deve ser pelo menos 1'
      }
    }
  }
}, {
  tableName: 'companies',
  indexes: [
    {
      unique: true,
      fields: ['document']
    },
    {
      fields: ['status']
    },
    {
      fields: ['plan']
    }
  ],
  // Força o nome da tabela em minúsculas
  freezeTableName: true
});

module.exports = Company;