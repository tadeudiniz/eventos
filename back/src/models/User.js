const { DataTypes } = require('sequelize');
const { sequelize } = require('../config/database');
const bcrypt = require('bcryptjs');

const User = sequelize.define('User', {
  id: {
    type: DataTypes.INTEGER,
    primaryKey: true,
    autoIncrement: true
  },
  name: {
    type: DataTypes.STRING(100),
    allowNull: false,
    validate: {
      notEmpty: {
        msg: 'Nome é obrigatório'
      },
      len: {
        args: [2, 100],
        msg: 'Nome deve ter entre 2 e 100 caracteres'
      }
    }
  },
  email: {
    type: DataTypes.STRING(255),
    allowNull: false,
    unique: {
      msg: 'Este email já está cadastrado'
    },
    validate: {
      isEmail: {
        msg: 'Email deve ter um formato válido'
      },
      notEmpty: {
        msg: 'Email é obrigatório'
      }
    }
  },
  password: {
    type: DataTypes.STRING(255),
    allowNull: false,
    validate: {
      notEmpty: {
        msg: 'Senha é obrigatória'
      },
      len: {
        args: [6, 255],
        msg: 'Senha deve ter pelo menos 6 caracteres'
      }
    }
  },
  role: {
    type: DataTypes.ENUM('master', 'client_admin', 'client_organizer', 'participant'),
    allowNull: false,
    defaultValue: 'participant',
    validate: {
      isIn: {
        args: [['master', 'client_admin', 'client_organizer', 'participant']],
        msg: 'Role deve ser um dos valores válidos'
      }
    }
  },
  status: {
    type: DataTypes.ENUM('active', 'inactive', 'pending'),
    allowNull: false,
    defaultValue: 'active'
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
  avatar: {
    type: DataTypes.TEXT,
    allowNull: true
  },
  companyId: {
    type: DataTypes.INTEGER,
    allowNull: true,
    references: {
      model: 'companies',
      key: 'id'
    }
  },
  lastLoginAt: {
    type: DataTypes.DATE,
    allowNull: true
  },
  emailVerifiedAt: {
    type: DataTypes.DATE,
    allowNull: true
  },
  resetPasswordToken: {
    type: DataTypes.STRING,
    allowNull: true
  },
  resetPasswordExpires: {
    type: DataTypes.DATE,
    allowNull: true
  }
}, {
  tableName: 'users',
  freezeTableName: true,
  indexes: [
    {
      unique: true,
      fields: ['email']
    },
    {
      fields: ['companyId']
    },
    {
      fields: ['role']
    },
    {
      fields: ['status']
    }
  ],
  hooks: {
    beforeCreate: async (user) => {
      if (user.password) {
        const salt = await bcrypt.genSalt(12);
        user.password = await bcrypt.hash(user.password, salt);
      }
    },
    beforeUpdate: async (user) => {
      if (user.changed('password')) {
        const salt = await bcrypt.genSalt(12);
        user.password = await bcrypt.hash(user.password, salt);
      }
    }
  }
});

// Métodos de instância
User.prototype.checkPassword = async function(password) {
  return await bcrypt.compare(password, this.password);
};

User.prototype.toJSON = function() {
  const values = Object.assign({}, this.get());
  delete values.password;
  delete values.resetPasswordToken;
  delete values.resetPasswordExpires;
  return values;
};

// Métodos de classe
User.findByEmail = function(email) {
  return this.findOne({ where: { email } });
};

User.createUser = async function(userData) {
  return await this.create(userData);
};

module.exports = User;