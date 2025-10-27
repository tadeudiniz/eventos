require('dotenv').config();
const bcrypt = require('bcryptjs');
const { User, Company } = require('./src/models');
const { sequelize } = require('./src/config/database');

async function testAuth() {
    try {
        console.log('🔍 Testando autenticação...\n');
        
        // 1. Verificar conexão com banco
        await sequelize.authenticate();
        console.log('✅ Conectado ao banco de dados');
        
        // 2. Verificar se usuário existe
        const email = 'admin@exemplo.com';
        let user = await User.findOne({ where: { email } });
        
        if (!user) {
            console.log('⚠️ Usuário não encontrado, criando...');
            
            // Criar usuário teste
            user = await User.create({
                name: 'Admin Teste',
                email: email,
                password: '123456',
                role: 'client_admin',
                status: 'active'
            });
            
            console.log('✅ Usuário criado:', {
                id: user.id,
                name: user.name,
                email: user.email,
                role: user.role
            });
        } else {
            console.log('✅ Usuário encontrado:', {
                id: user.id,
                name: user.name,
                email: user.email,
                role: user.role
            });
        }
        
        // 3. Testar hash da senha
        const plainPassword = '123456';
        console.log('\n🔐 Testando senha...');
        console.log('Senha em texto:', plainPassword);
        console.log('Hash no banco:', user.password);
        
        // 4. Testar verificação de senha
        const isValid = await user.checkPassword(plainPassword);
        console.log('Senha válida:', isValid ? '✅ SIM' : '❌ NÃO');
        
        // 5. Testar hash manual
        const manualHash = await bcrypt.hash(plainPassword, 12);
        const manualCheck = await bcrypt.compare(plainPassword, user.password);
        console.log('Verificação manual:', manualCheck ? '✅ SIM' : '❌ NÃO');
        
        // 6. Atualizar senha se necessário
        if (!isValid) {
            console.log('\n🔧 Senha inválida, atualizando...');
            await user.update({ password: plainPassword });
            
            // Verificar novamente
            const updatedUser = await User.findByPk(user.id);
            const newCheck = await updatedUser.checkPassword(plainPassword);
            console.log('Nova verificação:', newCheck ? '✅ SIM' : '❌ NÃO');
        }
        
        console.log('\n🎉 Teste concluído!');
        
    } catch (error) {
        console.error('❌ Erro no teste:', error);
    } finally {
        await sequelize.close();
    }
}

// Executar teste
testAuth();