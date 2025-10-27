require('dotenv').config();

const { sequelize } = require('./src/config/database');
const Event = require('./src/models/Event');
const User = require('./src/models/User');

async function debugEvento() {
    try {
        console.log('🔄 Debug: Criando evento simples...');
        
        // Conectar ao banco
        await sequelize.authenticate();
        console.log('✅ Conectado ao banco de dados');
        
        // Buscar usuário
        const user = await User.findOne({
            where: { email: 'admin@exemplo.com' }
        });
        
        if (!user) {
            console.log('❌ Usuário não encontrado');
            return;
        }
        
        console.log('✅ Usuário encontrado:', user.name);
        
        // Evento super simples
        const eventoSimples = {
            title: 'Teste Simples',
            description: 'Teste',
            type: 'online',
            status: 'published',
            startDate: new Date(Date.now() + 24 * 60 * 60 * 1000), // Amanhã
            endDate: new Date(Date.now() + 24 * 60 * 60 * 1000 + 60 * 60 * 1000), // 1h depois
            currentParticipants: 5, // Explicitamente > 0
            price: 50.00, // Explicitamente > 0
            organizerId: user.id,
            companyId: user.companyId
        };
        
        console.log('📊 Dados do evento:', eventoSimples);
        
        // Tentar criar
        const evento = await Event.create(eventoSimples);
        console.log('✅ Evento criado:', evento.id);
        
    } catch (error) {
        console.error('❌ Erro:', error.message);
        if (error.errors) {
            error.errors.forEach(err => {
                console.error(`   - ${err.path}: ${err.message} (valor: ${err.value})`);
            });
        }
    } finally {
        await sequelize.close();
        console.log('👋 Conexão fechada');
    }
}

debugEvento();