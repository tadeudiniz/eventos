<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Teste Login Rápido - Sistema Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include('partials/head-css.php'); ?>
    
    <style>
        body {
            background: #f8f9fa;
            padding: 50px;
        }
        .login-container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-test {
            margin: 10px 0;
            width: 100%;
        }
        .info-box {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
        }
        .status-online {
            background: #28a745;
        }
        .status-offline {
            background: #dc3545;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="text-center mb-4">🔑 Login Rápido</h2>
        
        <div class="info-box">
            <h5>📊 Status do Sistema:</h5>
            <p><strong>API:</strong> <span id="api-status">🔄 Verificando...</span></p>
            <p><strong>Usuário:</strong> <span id="user-status">🔄 Verificando...</span></p>
        </div>
        
        <!-- Formulário de Login -->
        <form id="loginForm">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="admin@exemplo.com" required>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" value="123456" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-test" id="loginBtn">
                <span class="spinner-border spinner-border-sm d-none me-2"></span>
                Fazer Login
            </button>
        </form>
        
        <!-- Botões de Teste -->
        <div class="mt-4">
            <h5>🧪 Testes Rápidos:</h5>
            
            <button type="button" class="btn btn-info btn-test" onclick="testApiConnection()">
                🌐 Testar API
            </button>
            
            <button type="button" class="btn btn-warning btn-test" onclick="createTestUser()">
                👤 Criar Usuário Teste
            </button>
            
            <button type="button" class="btn btn-success btn-test" onclick="goToEventCreation()">
                📅 Ir para Criação de Evento
            </button>
            
            <button type="button" class="btn btn-secondary btn-test" onclick="logout()">
                🚪 Logout
            </button>
        </div>
        
        <div class="mt-4">
            <h5>📝 Log:</h5>
            <div id="log" style="background: #f8f9fa; padding: 15px; border-radius: 5px; max-height: 200px; overflow-y: auto; font-family: monospace; font-size: 12px;"></div>
        </div>
    </div>

    <?php include('partials/footer-scripts.php'); ?>
    
    <!-- API Client -->
    <script src="assets/js/api-client.js"></script>
    
    <script>
        // Log helper
        function addLog(message, type = 'info') {
            const logElement = document.getElementById('log');
            const timestamp = new Date().toLocaleTimeString();
            const colors = {
                info: '#17a2b8',
                success: '#28a745',
                error: '#dc3545',
                warning: '#ffc107'
            };
            
            const logEntry = `<div style="color: ${colors[type]}; margin-bottom: 5px;">[${timestamp}] ${message}</div>`;
            logElement.innerHTML += logEntry;
            logElement.scrollTop = logElement.scrollHeight;
        }
        
        // Verificar status inicial
        function checkStatus() {
            // API Status
            fetch('http://localhost:3001/health')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('api-status').innerHTML = '<span class="status-indicator status-online"></span>Online';
                    addLog('✅ API Online', 'success');
                })
                .catch(error => {
                    document.getElementById('api-status').innerHTML = '<span class="status-indicator status-offline"></span>Offline';
                    addLog('❌ API Offline', 'error');
                });
            
            // User Status
            setTimeout(() => {
                if (window.eventosAPI) {
                    if (window.eventosAPI.isLoggedIn()) {
                        const user = window.eventosAPI.getCurrentUser();
                        document.getElementById('user-status').innerHTML = `<span class="status-indicator status-online"></span>${user.name}`;
                        addLog(`✅ Logado como: ${user.name}`, 'success');
                    } else {
                        document.getElementById('user-status').innerHTML = '<span class="status-indicator status-offline"></span>Não logado';
                        addLog('⚠️ Usuário não logado', 'warning');
                    }
                } else {
                    document.getElementById('user-status').innerHTML = '<span class="status-indicator status-offline"></span>API Client não carregado';
                    addLog('❌ API Client não disponível', 'error');
                }
            }, 1000);
        }
        
        // Login
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const loginBtn = document.getElementById('loginBtn');
            const spinner = loginBtn.querySelector('.spinner-border');
            
            addLog(`🔄 Tentando login: ${email}`, 'info');
            
            spinner.classList.remove('d-none');
            loginBtn.disabled = true;
            
            try {
                if (!window.eventosAPI) {
                    throw new Error('API Client não carregado');
                }
                
                const result = await window.eventosAPI.login(email, password);
                addLog('✅ Login realizado com sucesso', 'success');
                
                await Swal.fire({
                    title: 'Sucesso!',
                    text: 'Login realizado com sucesso',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
                
                checkStatus();
                
            } catch (error) {
                addLog(`❌ Erro no login: ${error.message}`, 'error');
                
                Swal.fire({
                    title: 'Erro',
                    text: error.message,
                    icon: 'error'
                });
            } finally {
                spinner.classList.add('d-none');
                loginBtn.disabled = false;
            }
        });
        
        // Testar API
        async function testApiConnection() {
            addLog('🔄 Testando conexão com API...', 'info');
            try {
                const response = await fetch('http://localhost:3001/health');
                const data = await response.json();
                addLog(`✅ API respondeu: ${data.status}`, 'success');
                Swal.fire('Sucesso!', 'API está funcionando', 'success');
            } catch (error) {
                addLog(`❌ Erro na API: ${error.message}`, 'error');
                Swal.fire('Erro!', 'API não está funcionando', 'error');
            }
        }
        
        // Criar usuário teste
        async function createTestUser() {
            addLog('🔄 Criando usuário teste...', 'info');
            
            const userData = {
                name: 'Admin Teste',
                email: 'admin@exemplo.com',
                password: '123456',
                role: 'client_admin'
            };
            
            try {
                if (!window.eventosAPI) {
                    throw new Error('API Client não carregado');
                }
                
                // Note: você precisará implementar um método register no API client
                // Por enquanto, vamos simular
                addLog('ℹ️ Função de registro precisa ser implementada na API', 'warning');
                
                Swal.fire({
                    title: 'Informação',
                    text: 'Função de registro precisa ser implementada. Use o login com admin@exemplo.com / 123456',
                    icon: 'info'
                });
                
            } catch (error) {
                addLog(`❌ Erro ao criar usuário: ${error.message}`, 'error');
                Swal.fire('Erro!', error.message, 'error');
            }
        }
        
        // Ir para criação de evento
        function goToEventCreation() {
            if (window.eventosAPI && window.eventosAPI.isLoggedIn()) {
                window.location.href = 'events-create-step1.php';
            } else {
                Swal.fire({
                    title: 'Login Necessário',
                    text: 'Você precisa estar logado para criar eventos',
                    icon: 'warning'
                });
            }
        }
        
        // Logout
        async function logout() {
            if (window.eventosAPI) {
                await window.eventosAPI.logout();
                addLog('👋 Logout realizado', 'info');
                checkStatus();
                
                Swal.fire({
                    title: 'Logout',
                    text: 'Você foi desconectado',
                    icon: 'info',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        }
        
        // Inicializar
        document.addEventListener('DOMContentLoaded', function() {
            addLog('🚀 Página carregada', 'info');
            setTimeout(checkStatus, 1000);
        });
    </script>
</body>
</html>