<!-- Topbar Start -->
<header class="app-topbar">
    <div class="container-fluid topbar-menu">
        <div class="d-flex align-items-center gap-2">
            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="index.php" class="logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="index.php" class="logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-black.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button btn btn-default btn-icon">
                <i class="ti ti-menu-4 fs-22"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ti ti-menu-4 fs-22"></i>
            </button>

        </div> <!-- .d-flex-->

        <div class="d-flex align-items-center gap-2">
            <!-- Language Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link fw-bold" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/flags/us.svg" alt="user-image" class="rounded" height="20" id="selected-language-image">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="en" title="English">
                            <img src="assets/images/flags/us.svg" alt="English" class="me-1 rounded" height="18" data-translator-image>
                            <span class="align-middle">English</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="de" title="German">
                            <img src="assets/images/flags/de.svg" alt="German" class="me-1 rounded" height="18" data-translator-image>
                            <span class="align-middle">Deutsch</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="it" title="Italian">
                            <img src="assets/images/flags/it.svg" alt="Italian" class="me-1 rounded" height="18" data-translator-image>
                            <span class="align-middle">Italiano</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="es" title="Spanish">
                            <img src="assets/images/flags/es.svg" alt="Spanish" class="me-1 rounded" height="18" data-translator-image>
                            <span class="align-middle">Español</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="ru" title="Russian">
                            <img src="assets/images/flags/ru.svg" alt="Russian" class="me-1 rounded" height="18" data-translator-image>
                            <span class="align-middle">Русский</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="hi" title="Hindi">
                            <img src="assets/images/flags/in.svg" alt="Hindi" class="me-1 rounded" height="18" data-translator-image>
                            <span class="align-middle">हिन्दी</span>
                        </a>
                    </div> <!-- end dropdown-menu-->
                </div> <!-- end dropdown-->
            </div> <!-- end topbar item-->

            <!-- Theme Mode Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                        <i data-lucide="sun" class="fs-xxl"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end thememode-dropdown">

                        <li>
                            <label class="dropdown-item">
                                <i data-lucide="sun" class="align-middle me-1 fs-16"></i>
                                <span class="align-middle">Light</span>
                                <input class="form-check-input" type="radio" name="data-bs-theme" value="light">
                            </label>
                        </li>

                        <li>
                            <label class="dropdown-item">
                                <i data-lucide="moon" class="align-middle me-1 fs-16"></i>
                                <span class="align-middle">Dark</span>
                                <input class="form-check-input" type="radio" name="data-bs-theme" value="dark">
                            </label>
                        </li>

                        <li>
                            <label class="dropdown-item">
                                <i data-lucide="monitor-cog" class="align-middle me-1 fs-16"></i>
                                <span class="align-middle">System</span>
                                <input class="form-check-input" type="radio" name="data-bs-theme" value="system">
                            </label>
                        </li>

                    </ul> <!-- end dropdown-menu-->
                </div> <!-- end dropdown-->
            </div> <!-- end topbar item-->

            <!-- FullScreen -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" type="button" data-toggle="fullscreen">
                    <i data-lucide="maximize" class="fs-xxl fullscreen-off"></i>
                    <i data-lucide="minimize" class="fs-xxl fullscreen-on"></i>
                </button>
            </div>

            <!-- Light/Dark Mode Button -->
            <div class="topbar-item d-none">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i data-lucide="moon" class="fs-xxl mode-light-moon"></i>
                </button>
            </div>

            <!-- Monocrome Mode Button -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" type="button" id="monochrome-mode">
                    <i data-lucide="palette" class="fs-xxl"></i>
                </button>
            </div>

            <!-- Notification Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                        <i data-lucide="bell" class="fs-xxl"></i>
                        <span class="badge text-bg-danger badge-circle topbar-badge">5</span>
                    </button>

                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                        <div class="px-3 py-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-md fw-semibold">Notifications</h6>
                                </div>
                                <div class="col text-end">
                                    <a href="#!" class="badge badge-soft-success badge-label py-1">07 Notifications</a>
                                </div>
                            </div>
                        </div>

                        <div style="max-height: 300px;" data-simplebar>
                            <!-- Notification 1 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-1">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-4.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-success notification-badge">
                                            <i class="ti ti-bell align-middle"></i>
                                            <span class="visually-hidden">unread notification</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Emily Johnson</span> commented on a task in <span class="fw-medium text-body">Design Sprint</span><br>
                                        <span class="fs-xs">12 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-1">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 2 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-2">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-info notification-badge">
                                            <i class="ti ti-cloud-upload align-middle"></i>
                                            <span class="visually-hidden">upload notification</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Michael Lee</span> uploaded files to <span class="fw-medium text-body">Marketing </span><br>
                                        <span class="fs-xs">25 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-2">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 3 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-3">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-6.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-warning notification-badge">
                                            <i class="ti ti-alert-triangle align-middle"></i>
                                            <span class="visually-hidden">alert</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Sophia Ray</span> flagged an issue in <span class="fw-medium text-body">Bug Tracker</span><br>
                                        <span class="fs-xs">40 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-3">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 4 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-4">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-7.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-primary notification-badge">
                                            <i class="ti ti-calendar-event align-middle"></i>
                                            <span class="visually-hidden">event notification</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">David Kim</span> scheduled a meeting for <span class="fw-medium text-body">UX Review</span><br>
                                        <span class="fs-xs">1 hour ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-4">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 5 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-5">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-8.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-secondary notification-badge">
                                            <i class="ti ti-edit-circle align-middle"></i>
                                            <span class="visually-hidden">edit</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Isabella White</span> updated the document in <span class="fw-medium text-body">Product Specs</span><br>
                                        <span class="fs-xs">2 hours ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-5">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 6 - Server CPU Alert -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-6">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <span class="avatar-md rounded-circle bg-light d-flex align-items-center justify-content-center">
                                            <i class="ti ti-server-bolt fs-4 text-danger"></i>
                                        </span>
                                        <span class="position-absolute rounded-pill bg-danger notification-badge">
                                            <i class="ti ti-alert-circle align-middle"></i>
                                            <span class="visually-hidden">server alert</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Server #3</span> CPU usage exceeded 90%<br>
                                        <span class="fs-xs">Just now</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-6">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 7 - Deployment Success -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-7">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <span class="avatar-md rounded-circle bg-light d-flex align-items-center justify-content-center">
                                            <i class="ti ti-rocket fs-4 text-success"></i>
                                        </span>
                                        <span class="position-absolute rounded-pill bg-success notification-badge">
                                            <i class="ti ti-check align-middle"></i>
                                            <span class="visually-hidden">deployment</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Production Server</span> deployment completed successfully<br>
                                        <span class="fs-xs">30 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-7">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>
                        </div>


                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
                            Read All Messages
                        </a>

                    </div> <!-- End dropdown-menu -->
                </div> <!-- end dropdown-->
            </div> <!-- end topbar item-->

            <!-- User Dropdown -->
            <div class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" href="#!" aria-haspopup="false" aria-expanded="false">
                        <img id="topbar-user-avatar" src="assets/images/users/user-3.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        <div class="d-lg-flex align-items-center gap-1 d-none">
                            <h5 class="my-0" id="topbar-user-name">Carregando...</h5>
                            <i class="ti ti-chevron-down align-middle"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- Header -->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bem-vindo de volta! 👋</h6>
                            <small class="text-muted" id="topbar-user-role">Carregando...</small>
                        </div>

                        <!-- My Profile -->
                        <a href="users-profile.php" class="dropdown-item">
                            <i class="ti ti-user-circle me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Meu Perfil</span>
                        </a>

                        <!-- Notifications -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-bell-ringing me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Notificações</span>
                        </a>

                        <!-- Settings -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-settings-2 me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Configurações</span>
                        </a>

                        <!-- Support -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-headset me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Suporte</span>
                        </a>

                        <!-- Divider -->
                        <div class="dropdown-divider"></div>

                        <!-- Lock -->
                        <a href="auth-lock-screen.php" class="dropdown-item">
                            <i class="ti ti-lock me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Bloquear Tela</span>
                        </a>

                        <!-- Logout -->
                        <a href="javascript:void(0);" class="dropdown-item fw-semibold" onclick="handleLogout()">
                            <i class="ti ti-logout-2 me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Sair</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->

<script>
/**
 * Carrega informações do usuário logado no topbar
 */
async function loadUserInfoTopbar() {
    try {
        // Aguardar um momento para garantir que o API client foi carregado
        if (!window.eventosAPI) {
            console.log('🔄 API Client ainda não carregado, aguardando...');
            setTimeout(loadUserInfoTopbar, 200);
            return;
        }

        const currentUser = window.eventosAPI.getCurrentUser();
        
        if (currentUser) {
            // Atualizar nome do usuário
            const userNameElement = document.getElementById('topbar-user-name');
            if (userNameElement) {
                userNameElement.textContent = currentUser.name || 'Usuário';
            }
            
            // Atualizar role do usuário
            const userRoleElement = document.getElementById('topbar-user-role');
            if (userRoleElement) {
                const roleLabels = {
                    'master': 'Administrador Master',
                    'client_admin': 'Administrador',
                    'client_organizer': 'Organizador',
                    'participant': 'Participante'
                };
                userRoleElement.textContent = roleLabels[currentUser.role] || currentUser.role;
            }
            
            // Atualizar avatar se disponível
            const userAvatarElement = document.getElementById('topbar-user-avatar');
            if (userAvatarElement && currentUser.avatar) {
                userAvatarElement.src = currentUser.avatar;
            }
            
            console.log('✅ Informações do usuário carregadas no topbar:', currentUser.name);
        } else {
            // Se não há usuário logado, apenas mostrar informações padrão
            // NÃO redirecionar automaticamente para permitir que o usuário navegue
            console.warn('⚠️ Usuário não encontrado no topbar');
            
            const userNameElement = document.getElementById('topbar-user-name');
            const userRoleElement = document.getElementById('topbar-user-role');
            
            if (userNameElement) userNameElement.textContent = 'Visitante';
            if (userRoleElement) userRoleElement.textContent = 'Não logado';
        }
    } catch (error) {
        console.error('❌ Erro ao carregar informações do usuário no topbar:', error);
        // Em caso de erro, mostrar informações padrão
        const userNameElement = document.getElementById('topbar-user-name');
        const userRoleElement = document.getElementById('topbar-user-role');
        
        if (userNameElement) userNameElement.textContent = 'Usuário';
        if (userRoleElement) userRoleElement.textContent = 'Carregando...';
    }
}

/**
 * Função de logout
 */
async function handleLogout() {
    try {
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
            // Limpar dados do localStorage
            if (window.eventosAPI) {
                window.eventosAPI.logout();
            }
            
            // Mostrar mensagem de sucesso
            await Swal.fire({
                title: 'Logout realizado!',
                text: 'Você foi desconectado com sucesso.',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
            
            // Redirecionar para login
            window.location.href = 'auth-sign-in.php';
        }
    } catch (error) {
        console.error('❌ Erro no logout:', error);
        await Swal.fire({
            title: 'Erro',
            text: 'Erro ao fazer logout. Redirecionando...',
            icon: 'error',
            timer: 1500,
            showConfirmButton: false
        });
        window.location.href = 'auth-sign-in.php';
    }
}

// Carregar informações quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔄 Topbar carregado, aguardando API Client...');
    
    // Função para aguardar API client com retry mais robusto
    function waitForAPIClientTopbar(attempts = 0) {
        if (window.eventosAPI) {
            console.log('✅ API Client carregado no topbar');
            loadUserInfoTopbar();
        } else if (attempts < 25) { // Tentar por até 5 segundos
            setTimeout(() => waitForAPIClientTopbar(attempts + 1), 200);
        } else {
            console.error('❌ API Client não carregou no topbar após 5 segundos');
            // Mostrar informações padrão
            const userNameElement = document.getElementById('topbar-user-name');
            const userRoleElement = document.getElementById('topbar-user-role');
            
            if (userNameElement) userNameElement.textContent = 'Erro de carregamento';
            if (userRoleElement) userRoleElement.textContent = 'Sistema indisponível';
        }
    }
    
    waitForAPIClientTopbar();
});
</script>