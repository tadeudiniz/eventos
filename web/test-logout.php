<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Teste Logout - Sistema Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include('partials/head-css.php'); ?>
    
    <style>
        body {
            background: #f8f9fa;
            padding: 50px;
        }
        .test-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-test {
            margin: 10px;
            min-width: 150px;
        }
        .info-box {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
    </style>
</head>

<body>
    <div class="test-container">
        <h2 class="text-center mb-4">🧪 Teste do Sistema de Logout</h2>
        
        <div class="info-box">
            <h5>📋 Status do Sistema:</h5>
            <p><strong>API Client:</strong> <span id="api-status">🔄 Carregando...</span></p>
            <p><strong>SweetAlert2:</strong> <span id="swal-status">🔄 Verificando...</span></p>
            <p><strong>Usuário Logado:</strong> <span id="user-status">🔄 Verificando...</span></p>
        </div>
        
        <div class="text-center">
            <h5>🔧 Testes Disponíveis:</h5>
            
            <button type="button" class="btn btn-primary btn-test" onclick="testApiConnection()">
                🌐 Testar Conexão API
            </button>
            
            <button type="button" class="btn btn-warning btn-test" onclick="testSweetAlert()">
                🍭 Testar SweetAlert2
            </button>
            
            <button type="button" class="btn btn-info btn-test" onclick="testUserInfo()">
                👤 Verificar Usuário
            </button>
            
            <button type="button" class="btn btn-success btn-test" onclick="testLogin()">
                🔑 Fazer Login Teste
            </button>
            
            <button type="button" class="btn btn-danger btn-test" onclick="handleLogout()">
                🚪 Testar Logout
            </button>
        </div>
        
        <div class="mt-4">
            <h5>📝 Log de Testes:</h5>
            <div id="test-log" style="background: #f8f9fa; padding: 15px; border-radius: 5px; max-height: 300px; overflow-y: auto; font-family: monospace; font-size: 12px;"></div>
        </div>
        
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">← Voltar ao Dashboard</a>
        </div>
    </div>

    <?php include('partials/footer-scripts.php'); ?>
    
    <!-- API Client -->
    <script src="assets/js/api-client.js"></script>
    
    <script>
        // Log helper
        function addLog(message, type = 'info') {
            const logElement = document.getElementById('test-log');
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
        function checkInitialStatus() {
            // Verificar API Client
            if (window.eventosAPI) {
                document.getElementById('api-status').innerHTML = '✅ Carregado';
                addLog('✅ API Client carregado com sucesso', 'success');
            } else {
                document.getElementById('api-status').innerHTML = '❌ Não carregado';
                addLog('❌ API Client não encontrado', 'error');
            }
            
            // Verificar SweetAlert2
            if (typeof Swal !== 'undefined') {
                document.getElementById('swal-status').innerHTML = '✅ Disponível';
                addLog('✅ SweetAlert2 disponível', 'success');
            } else {
                document.getElementById('swal-status').innerHTML = '❌ Não disponível';
                addLog('❌ SweetAlert2 não encontrado', 'error');
            }
            
            // Verificar usuário logado
            if (window.eventosAPI) {
                const user = window.eventosAPI.getCurrentUser();
                if (user) {
                    document.getElementById('user-status').innerHTML = `✅ ${user.name}`;
                    addLog(`✅ Usuário logado: ${user.name}`, 'success');
                } else {
                    document.getElementById('user-status').innerHTML = '❌ Não logado';
                    addLog('⚠️ Nenhum usuário logado', 'warning');
                }
            }
        }
        
        // Teste de conexão API
        async function testApiConnection() {
            addLog('🔄 Testando conexão com API...', 'info');
            try {
                const response = await fetch('http://localhost:3001/health');
                const data = await response.json();
                addLog(`✅ API respondeu: ${data.status}`, 'success');
                Swal.fire('Sucesso!', 'API está funcionando corretamente', 'success');
            } catch (error) {
                addLog(`❌ Erro na API: ${error.message}`, 'error');
                Swal.fire('Erro!', 'Falha na conexão com a API', 'error');
            }
        }
        
        // Teste SweetAlert2
        function testSweetAlert() {
            addLog('🔄 Testando SweetAlert2...', 'info');
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Teste SweetAlert2',
                    text: 'SweetAlert2 está funcionando perfeitamente!',
                    icon: 'success',
                    confirmButtonText: 'Ótimo!'
                });
                addLog('✅ SweetAlert2 testado com sucesso', 'success');
            } else {
                alert('SweetAlert2 não está disponível!');
                addLog('❌ SweetAlert2 não disponível', 'error');
            }
        }
        
        // Teste informações do usuário
        function testUserInfo() {
            addLog('🔄 Verificando informações do usuário...', 'info');
            if (window.eventosAPI) {
                const user = window.eventosAPI.getCurrentUser();
                const token = window.eventosAPI.getToken();
                
                if (user && token) {
                    addLog(`✅ Usuário: ${user.name} (${user.email})`, 'success');
                    addLog(`✅ Token presente: ${token.substring(0, 20)}...`, 'success');
                    Swal.fire({
                        title: 'Usuário Logado',
                        html: `<strong>Nome:</strong> ${user.name}<br><strong>Email:</strong> ${user.email}<br><strong>Role:</strong> ${user.role}`,
                        icon: 'info'
                    });
                } else {
                    addLog('⚠️ Usuário não está logado', 'warning');
                    Swal.fire('Atenção', 'Nenhum usuário logado no sistema', 'warning');
                }
            } else {
                addLog('❌ API Client não disponível', 'error');
                Swal.fire('Erro', 'API Client não encontrado', 'error');
            }
        }
        
        // Teste de login
        async function testLogin() {
            const { value: credentials } = await Swal.fire({
                title: 'Login de Teste',
                html: 
                    '<input id="swal-input1" class="swal2-input" placeholder="Email" value="teste@exemplo.com">' +
                    '<input id="swal-input2" class="swal2-input" type="password" placeholder="Senha" value="123456">',
                focusConfirm: false,
                preConfirm: () => {
                    return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value
                    ]
                }
            });
            
            if (credentials) {
                const [email, password] = credentials;
                addLog(`🔄 Tentando login com: ${email}`, 'info');
                
                try {
                    if (window.eventosAPI) {
                        const result = await window.eventosAPI.login(email, password);
                        addLog('✅ Login realizado com sucesso', 'success');
                        checkInitialStatus(); // Atualizar status
                        Swal.fire('Sucesso!', 'Login realizado com sucesso', 'success');
                    } else {
                        throw new Error('API Client não disponível');
                    }
                } catch (error) {
                    addLog(`❌ Erro no login: ${error.message}`, 'error');
                    Swal.fire('Erro!', `Falha no login: ${error.message}`, 'error');
                }
            }
        }
        
        // Função de logout (mesma do topbar)
        async function handleLogout() {
            addLog('🔄 Iniciando processo de logout...', 'info');
            
            try {
                // Verificar se SweetAlert2 está disponível
                if (typeof Swal === 'undefined') {
                    addLog('❌ SweetAlert2 não está carregado', 'error');
                    // Fallback para confirmação nativa
                    if (confirm('Tem certeza que deseja sair do sistema?')) {
                        // Limpar dados e redirecionar
                        if (window.eventosAPI) {
                            await window.eventosAPI.logout();
                        }
                        localStorage.clear();
                        addLog('✅ Logout local realizado', 'success');
                        window.location.href = 'auth-sign-in.php';
                    }
                    return;
                }

                const result = await Swal.fire({
                    title: 'Confirmar Logout',
                    text: 'Tem certeza que deseja sair do sistema?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sim, sair',
                    cancelButtonText: 'Cancelar'
                });

                if (result.isConfirmed) {
                    addLog('✅ Logout confirmado pelo usuário', 'success');
                    
                    // Mostrar loading
                    Swal.fire({
                        title: 'Fazendo logout...',
                        text: 'Aguarde um momento',
                        icon: 'info',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Fazer logout via API se disponível
                    let logoutSuccess = false;
                    if (window.eventosAPI) {
                        try {
                            await window.eventosAPI.logout();
                            logoutSuccess = true;
                            addLog('✅ Logout via API realizado com sucesso', 'success');
                        } catch (apiError) {
                            addLog(`⚠️ Erro no logout via API, continuando com logout local: ${apiError.message}`, 'warning');
                            logoutSuccess = true; // Continuar mesmo se API falhar
                        }
                    } else {
                        logoutSuccess = true; // Não há API, fazer logout local
                        addLog('⚠️ API não disponível, fazendo logout local', 'warning');
                    }
                    
                    if (logoutSuccess) {
                        // Limpar dados locais
                        localStorage.clear();
                        sessionStorage.clear();
                        addLog('✅ Dados locais limpos', 'success');
                        
                        // Mostrar mensagem de sucesso
                        await Swal.fire({
                            title: 'Logout realizado!',
                            text: 'Você foi desconectado com sucesso.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        
                        addLog('✅ Redirecionando para login...', 'success');
                        // Redirecionar para login
                        window.location.href = 'auth-sign-in.php';
                    } else {
                        throw new Error('Falha no logout');
                    }
                } else {
                    addLog('ℹ️ Logout cancelado pelo usuário', 'info');
                }
            } catch (error) {
                addLog(`❌ Erro no logout: ${error.message}`, 'error');
                
                // Fallback em caso de erro
                if (typeof Swal !== 'undefined') {
                    await Swal.fire({
                        title: 'Erro',
                        text: 'Erro ao fazer logout. Redirecionando...',
                        icon: 'error',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
                
                // Limpar dados e redirecionar mesmo com erro
                localStorage.clear();
                sessionStorage.clear();
                addLog('✅ Limpeza forçada realizada, redirecionando...', 'warning');
                window.location.href = 'auth-sign-in.php';
            }
        }
        
        // Inicializar quando DOM estiver pronto
        document.addEventListener('DOMContentLoaded', function() {
            addLog('🚀 Página de teste carregada', 'info');
            
            // Aguardar um pouco para scripts carregarem
            setTimeout(() => {
                checkInitialStatus();
            }, 500);
        });
    </script>
</body>
</html>