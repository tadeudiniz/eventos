const mysql = require('mysql2/promise');
require('dotenv').config();

async function createDatabase() {
  const connection = await mysql.createConnection({
    host: process.env.DB_HOST || 'localhost',
    port: process.env.DB_PORT || 3306,
    user: process.env.DB_USER || 'root',
    password: process.env.DB_PASSWORD || ''
  });

  try {
    const dbName = process.env.DB_NAME || 'eventos_db';
    
    console.log(`🔄 Apagando banco de dados existente: ${dbName}`);
    await connection.execute(`DROP DATABASE IF EXISTS \`${dbName}\``);
    
    console.log(`🔄 Criando banco de dados: ${dbName}`);
    
    await connection.execute(`CREATE DATABASE IF NOT EXISTS \`${dbName}\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci`);
    
    console.log(`✅ Banco de dados ${dbName} criado com sucesso!`);
    
  } catch (error) {
    console.error('❌ Erro ao criar banco de dados:', error);
    throw error;
  } finally {
    await connection.end();
  }
}

async function createInitialData() {
  // Importar modelos após criação do banco
  const { User, Company } = require('../models');
  const bcrypt = require('bcryptjs');

  try {
    console.log('🔄 Criando dados iniciais...');

    // Criar empresa padrão
    const [defaultCompany] = await Company.findOrCreate({
      where: { name: 'Mathetes Admin' },
      defaults: {
        name: 'Mathetes Admin',
        document: '00.000.000/0001-00',
        email: 'admin@mathetes.com',
        plan: 'enterprise',
        maxEvents: 999,
        maxUsers: 999,
        status: 'active'
      }
    });

    console.log('✅ Empresa padrão criada');

    // Criar usuário master
    const [masterUser] = await User.findOrCreate({
      where: { email: 'admin@mathetes.com' },
      defaults: {
        name: 'Administrador Master',
        email: 'admin@mathetes.com',
        password: 'admin123',
        role: 'master',
        status: 'active',
        companyId: defaultCompany.id,
        emailVerifiedAt: new Date()
      }
    });

    console.log('✅ Usuário master criado');
    console.log('📧 Email: admin@mathetes.com');
    console.log('🔑 Senha: admin123');

    // Criar empresa de teste
    const [testCompany] = await Company.findOrCreate({
      where: { name: 'Empresa Teste' },
      defaults: {
        name: 'Empresa Teste',
        document: '11.111.111/0001-11',
        email: 'teste@empresa.com',
        plan: 'professional',
        maxEvents: 50,
        maxUsers: 20,
        status: 'active'
      }
    });

    // Criar usuário admin da empresa teste
    const [adminUser] = await User.findOrCreate({
      where: { email: 'admin@empresa.com' },
      defaults: {
        name: 'Admin Empresa',
        email: 'admin@empresa.com',
        password: 'admin123',
        role: 'client_admin',
        status: 'active',
        companyId: testCompany.id,
        emailVerifiedAt: new Date()
      }
    });

    console.log('✅ Empresa e usuário de teste criados');
    console.log('📧 Email: admin@empresa.com');
    console.log('🔑 Senha: admin123');

  } catch (error) {
    console.error('❌ Erro ao criar dados iniciais:', error);
    throw error;
  }
}

async function initializeDatabase() {
  try {
    await createDatabase();
    
    // Importar configuração do banco após criação
    const { sequelize } = require('../config/database');
    
    // Testar conexão
    await sequelize.authenticate();
    console.log('✅ Conexão com banco estabelecida');
    
    // Importar modelos ANTES da sincronização
    require('../models');
    
    // Sincronizar modelos (force: true para recriar tabelas)
    console.log('🔄 Sincronizando modelos...');
    await sequelize.sync({ force: true });
    console.log('✅ Modelos sincronizados');
    
    // Criar dados iniciais
    await createInitialData();
    
    console.log('🎉 Banco de dados inicializado com sucesso!');
    console.log('');
    console.log('👤 Usuários criados:');
    console.log('   Master: admin@mathetes.com / admin123');
    console.log('   Admin:  admin@empresa.com / admin123');
    console.log('');
    
  } catch (error) {
    console.error('❌ Erro na inicialização:', error);
    process.exit(1);
  }
}

// Executar se chamado diretamente
if (require.main === module) {
  initializeDatabase();
}

module.exports = {
  createDatabase,
  createInitialData,
  initializeDatabase
};