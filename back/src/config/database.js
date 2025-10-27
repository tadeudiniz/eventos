const { Sequelize } = require('sequelize');

// Configuração do banco de dados
const sequelize = new Sequelize(
  process.env.DB_NAME || 'eventos_db',
  process.env.DB_USER || 'root',
  process.env.DB_PASSWORD || '',
  {
    host: process.env.DB_HOST || 'localhost',
    port: process.env.DB_PORT || 3306,
    dialect: 'mysql',
    logging: process.env.NODE_ENV === 'development' ? console.log : false,
    pool: {
      max: 10,
      min: 0,
      acquire: 30000,
      idle: 10000
    },
    timezone: '-03:00', // Timezone do Brasil
    define: {
      timestamps: true,
      underscored: false,
      freezeTableName: false
    }
  }
);

module.exports = { sequelize };