<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Integração API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Teste de Integração Frontend-Backend</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Teste de Conectividade</h5>
                                <button class="btn btn-primary mb-2" onclick="testHealth()">Testar Health Check</button>
                                <button class="btn btn-info mb-2" onclick="testLogin()">Testar Login</button>
                                <button class="btn btn-success mb-2" onclick="testUsers()">Listar Usuários</button>
                                <button class="btn btn-warning mb-2" onclick="testAuth()">Verificar Auth</button>
                            </div>
                            <div class="col-md-6">
                                <h5>Status da API</h5>
                                <p><strong>URL Backend:</strong> <span id="apiUrl">...</span></p>
                                <p><strong>Status:</strong> <span id="apiStatus" class="badge bg-secondary">Verificando...</span></p>
                                <p><strong>Token:</strong> <span id="tokenStatus" class="badge bg-secondary">Verificando...</span></p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h5>Logs de Teste</h5>
                        <div id="testLogs" class="border rounded p-3 bg-light" style="height: 300px; overflow-y: auto;">
                            <p class="text-muted">Clique nos botões acima para testar a integração...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/api-client.js"></script>
    <script>
        let api;
        
        // Inicializar quando carregar
        document.addEventListener('DOMContentLoaded', function() {
            api = new EventosAPI();
            updateStatus();
            log('🚀 Página de teste carregada');
            log('📡 API Client inicializado: ' + api.baseURL);
        });

        function updateStatus() {
            document.getElementById('apiUrl').textContent = api.baseURL;
            
            if (api.isLoggedIn()) {
                document.getElementById('tokenStatus').textContent = 'Logado';
                document.getElementById('tokenStatus').className = 'badge bg-success';
            } else {
                document.getElementById('tokenStatus').textContent = 'Não logado';
                document.getElementById('tokenStatus').className = 'badge bg-warning';
            }
        }

        function log(message) {
            const logsDiv = document.getElementById('testLogs');
            const time = new Date().toLocaleTimeString();
            logsDiv.innerHTML += `<p class="mb-1"><small class="text-muted">[${time}]</small> ${message}</p>`;
            logsDiv.scrollTop = logsDiv.scrollHeight;
        }

        async function testHealth() {
            log('🔍 Testando Health Check...');
            try {
                const response = await fetch(api.baseURL.replace('/api/v1', '') + '/health');
                if (response.ok) {
                    const data = await response.json();
                    log('✅ Health Check OK: ' + JSON.stringify(data));
                    document.getElementById('apiStatus').textContent = 'Online';
                    document.getElementById('apiStatus').className = 'badge bg-success';
                } else {
                    log('❌ Health Check falhou: ' + response.status);
                    document.getElementById('apiStatus').textContent = 'Erro';
                    document.getElementById('apiStatus').className = 'badge bg-danger';
                }
            } catch (error) {
                log('❌ Erro de conexão: ' + error.message);
                document.getElementById('apiStatus').textContent = 'Offline';
                document.getElementById('apiStatus').className = 'badge bg-danger';
            }
        }

        async function testLogin() {
            log('🔐 Testando login com admin@mathetes.com...');
            try {
                const result = await api.login('admin@mathetes.com', 'admin123');
                log('📋 Resposta recebida: ' + JSON.stringify(result, null, 2));
                
                if (result.success) {
                    log('✅ Login bem-sucedido!');
                    log('👤 Usuário: ' + result.user.name + ' (' + result.user.role + ')');
                    updateStatus();
                } else {
                    log('❌ Login falhou: ' + result.message);
                }
            } catch (error) {
                log('❌ Erro no login:');
                log('   • Message: ' + error.message);
                log('   • Stack: ' + error.stack);
                
                // Tentar fazer requisição direta para debug
                try {
                    log('🔍 Tentando requisição direta...');
                    const response = await fetch(api.baseURL + '/auth/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            email: 'admin@mathetes.com',
                            password: 'admin123'
                        })
                    });
                    
                    log('📊 Status da resposta: ' + response.status);
                    log('📊 Headers: ' + JSON.stringify([...response.headers.entries()]));
                    
                    const responseText = await response.text();
                    log('📊 Resposta: ' + responseText);
                } catch (debugError) {
                    log('❌ Erro na requisição direta: ' + debugError.message);
                }
            }
        }

        async function testUsers() {
            log('👥 Testando listagem de usuários...');
            try {
                const result = await api.get('/users');
                if (result.success) {
                    log('✅ Usuários carregados: ' + result.data.length + ' encontrados');
                    result.data.forEach(user => {
                        log(`   • ${user.name} (${user.email}) - ${user.role}`);
                    });
                } else {
                    log('❌ Falha ao carregar usuários: ' + result.message);
                }
            } catch (error) {
                log('❌ Erro ao carregar usuários: ' + error.message);
            }
        }

        async function testAuth() {
            log('🔒 Verificando status de autenticação...');
            try {
                const isAuth = api.isLoggedIn();
                const currentUser = api.getCurrentUser();
                
                log('📋 Status da autenticação:');
                log('   • Logado: ' + (isAuth ? 'Sim' : 'Não'));
                log('   • Token válido: ' + (api.token ? 'Sim' : 'Não'));
                
                if (currentUser) {
                    log('   • Usuário atual: ' + currentUser.name);
                    log('   • Email: ' + currentUser.email);
                    log('   • Role: ' + currentUser.role);
                    log('   • Empresa: ' + (currentUser.company?.name || 'N/A'));
                } else {
                    log('   • Nenhum usuário logado');
                }
                
            } catch (error) {
                log('❌ Erro ao verificar auth: ' + error.message);
            }
        }
    </script>
</body>
</html>