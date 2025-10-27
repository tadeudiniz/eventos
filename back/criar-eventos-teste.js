require('dotenv').config();
const { Event, User, Company } = require('./src/models');
const { sequelize } = require('./src/config/database');

async function criarEventosDeTeste() {
    try {
        console.log('🔄 Criando eventos de teste...');
        
        // Conectar ao banco
        await sequelize.authenticate();
        console.log('✅ Conectado ao banco de dados');
        
        // Buscar usuário existente
        const user = await User.findOne({ 
            where: { email: 'admin@exemplo.com' },
            include: [{ model: Company, as: 'company' }]
        });
        if (!user) {
            console.log('❌ Usuário admin@exemplo.com não encontrado');
            return;
        }
        
        console.log('✅ Usuário encontrado:', user.name);
        console.log('✅ Empresa do usuário:', user.companyId);
        
        // Se não tiver empresa, criar uma
        let companyId = user.companyId;
        if (!companyId) {
            const company = await Company.create({
                name: 'Empresa Teste',
                status: 'active',
                plan: 'basic'
            });
            companyId = company.id;
            await user.update({ companyId: company.id });
            console.log('✅ Empresa criada:', company.name);
        }
        
        // Criar eventos de teste
        const amanha = new Date();
        amanha.setDate(amanha.getDate() + 1);
        
        const proximaSemana = new Date();
        proximaSemana.setDate(proximaSemana.getDate() + 7);
        
        const proximoMes = new Date();
        proximoMes.setMonth(proximoMes.getMonth() + 1);
        
        const eventos = [
            {
                title: 'Conferência Tech 2025',
                description: '<p>Uma conferência incrível sobre tecnologia e inovação.</p>',
                type: 'presencial',
                status: 'active',
                category: 'Tecnologia',
                startDate: new Date(proximoMes.getTime() + 9 * 60 * 60 * 1000), // 9h da manhã
                endDate: new Date(proximoMes.getTime() + 18 * 60 * 60 * 1000), // 18h
                timezone: 'America/Sao_Paulo',
                maxParticipants: 200,
                currentParticipants: 150,
                price: 250.00,
                venue: 'Centro de Convenções',
                address: 'Rua das Flores, 123',
                city: 'São Paulo',
                state: 'SP',
                organizerId: user.id,
                companyId: companyId
            },
            {
                title: 'Workshop Online de Marketing',
                description: '<p>Aprenda as melhores estratégias de marketing digital.</p>',
                type: 'online',
                status: 'active',
                category: 'Marketing',
                startDate: new Date(proximaSemana.getTime() + 14 * 60 * 60 * 1000), // 14h
                endDate: new Date(proximaSemana.getTime() + 17 * 60 * 60 * 1000), // 17h
                timezone: 'America/Sao_Paulo',
                maxParticipants: 100,
                currentParticipants: 75,
                price: 49.90,
                meetingUrl: 'https://meet.google.com/abc-def-ghi',
                organizerId: user.id,
                companyId: companyId
            },
            {
                title: 'Meetup de Desenvolvedores',
                description: '<p>Encontro para desenvolvedores compartilharem experiências.</p>',
                type: 'hibrido',
                status: 'active',
                category: 'Desenvolvimento',
                startDate: new Date(amanha.getTime() + 19 * 60 * 60 * 1000), // 19h
                endDate: new Date(amanha.getTime() + 22 * 60 * 60 * 1000), // 22h
                timezone: 'America/Sao_Paulo',
                maxParticipants: 50,
                currentParticipants: 32,
                price: 15.00,
                venue: 'Hub de Inovação',
                address: 'Av. Tecnologia, 456',
                city: 'São Paulo',
                state: 'SP',
                meetingUrl: 'https://zoom.us/j/123456789',
                organizerId: user.id,
                companyId: companyId
            },
            {
                title: 'Evento Próximo - Amanhã',
                description: '<p>Um evento que acontece amanhã para testar contadores.</p>',
                type: 'online',
                status: 'active',
                category: 'Teste',
                startDate: new Date(amanha.getTime() + 10 * 60 * 60 * 1000), // 10h
                endDate: new Date(amanha.getTime() + 12 * 60 * 60 * 1000), // 12h
                timezone: 'America/Sao_Paulo',
                maxParticipants: 30,
                currentParticipants: 18,
                price: 10.00,
                meetingUrl: 'https://meet.google.com/teste-123',
                organizerId: user.id,
                companyId: companyId
            }
        ];
        
        // Limpar eventos existentes primeiro (opcional)
        await Event.destroy({ where: { organizerId: user.id } });
        console.log('🧹 Eventos anteriores removidos');
        
        // Criar novos eventos
        for (const eventoData of eventos) {
            const evento = await Event.create(eventoData);
            console.log(`✅ Evento criado: ${evento.title} (ID: ${evento.id})`);
        }
        
        console.log('\n🎉 Todos os eventos de teste foram criados com sucesso!');
        
        // Mostrar estatísticas
        const stats = {
            total: await Event.count({ where: { organizerId: user.id } }),
            ativos: await Event.count({ where: { organizerId: user.id, status: 'active' } }),
            cancelados: await Event.count({ where: { organizerId: user.id, status: 'cancelled' } }),
            finalizados: await Event.count({ where: { organizerId: user.id, status: 'completed' } })
        };
        
        console.log('\n📊 Estatísticas dos eventos criados:');
        console.log(`   • Total: ${stats.total}`);
        console.log(`   • Ativos: ${stats.ativos}`);
        console.log(`   • Cancelados: ${stats.cancelados}`);
        console.log(`   • Finalizados: ${stats.finalizados}`);
        
    } catch (error) {
        console.error('❌ Erro ao criar eventos de teste:', error);
    } finally {
        await sequelize.close();
        console.log('👋 Conexão com banco fechada');
    }
}

// Executar
criarEventosDeTeste();