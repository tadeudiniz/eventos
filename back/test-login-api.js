// Teste rápido de login via fetch
async function testLoginAPI() {
    try {
        console.log('🔄 Testando login via API...');
        
        const response = await fetch('http://localhost:3001/auth/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: 'admin@exemplo.com',
                password: '123456'
            })
        });
        
        const data = await response.json();
        
        console.log('Status:', response.status);
        console.log('Response:', data);
        
        if (data.success) {
            console.log('✅ Login funcionando!');
            console.log('Token:', data.data.token);
            console.log('User:', data.data.user);
        } else {
            console.log('❌ Login falhou:', data.message);
        }
        
    } catch (error) {
        console.error('❌ Erro na requisição:', error);
    }
}

// Executar teste
testLoginAPI();