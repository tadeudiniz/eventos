<?php include 'partials/html.php'; ?>

<head>
    <?php
    $title = "Criar Evento - Modalidade";
    include 'partials/title-meta.php';
    ?>
    
    <?php include 'partials/head-css.php'; ?>
    
    <style>
        .event-type-card {
            border: 2px solid #e3e6f0;
            border-radius: 15px;
            padding: 1rem 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
            background: #fff;
            position: relative;
            overflow: hidden;
        }
        
        .event-type-card:hover {
            border-color: #4e73df;
            box-shadow: 0 10px 30px rgba(78, 115, 223, 0.15);
            transform: translateY(-5px);
        }
        
        .event-type-card.selected {
            border-color: #4e73df;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .event-type-card.selected .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        
        .event-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: #f8f9fc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: #4e73df;
            transition: all 0.3s ease;
        }
        
        .event-type-card.selected .event-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0 0;
        }
        
        .feature-list li {
            padding: 0.3rem 0;
            font-size: 0.9rem;
            color: #6c757d;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .feature-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
        }
        
        .event-type-card.selected .feature-list li {
            color: rgba(255, 255, 255, 0.9);
        }
        
        .event-type-card.selected .feature-list li:before {
            color: #fff;
        }
        
        .step-indicator {
            background: #f8f9fc;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        
        .step-item {
            display: flex;
            align-items: center;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .step-item.active {
            color: #4e73df;
            font-weight: 600;
        }
        
        .step-number {
            width: 30px;
            height: 30px;
            background: #e3e6f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.5rem;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .step-item.active .step-number {
            background: #4e73df;
            color: white;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include 'partials/menu.php'; ?>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    
                    <!-- Breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="events-list.php">Eventos</a></li>
                                        <li class="breadcrumb-item active">Criar Evento</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Criar Novo Evento</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Step Indicator -->
                    <div class="row">
                        <div class="col-12">
                            <div class="step-indicator">
                                <div class="d-flex justify-content-between">
                                    <div class="step-item active">
                                        <div class="step-number">1</div>
                                        <span>Modalidade</span>
                                    </div>
                                    <div class="step-item">
                                        <div class="step-number">2</div>
                                        <span>Informações Básicas</span>
                                    </div>
                                    <div class="step-item">
                                        <div class="step-number">3</div>
                                        <span>Configurações</span>
                                    </div>
                                    <div class="step-item">
                                        <div class="step-number">4</div>
                                        <span>Revisão</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Type Selection -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="mb-2">Selecione o tipo de evento que melhor se adequa às suas necessidades</h4>
                                    </div>

                                    <div class="row g-4">
                                        <!-- Presencial -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="event-type-card" data-type="presencial">
                                                <div class="event-icon">
                                                    <i class="ti ti-building"></i>
                                                </div>
                                                <h5>Presencial</h5>
                                                <p class="text-muted">Evento realizado em local físico</p>
                                                <ul class="list-unstyled text-start fs-sm mb-0">
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Networking</li>
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Experiência presencial</li>
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Valorização de espaços</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Online -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="event-type-card" data-type="online">
                                                <div class="event-icon">
                                                    <i class="ti ti-device-desktop"></i>
                                                </div>
                                                <h5>Online</h5>
                                                <p class="text-muted">Evento totalmente virtual</p>
                                                <ul class="list-unstyled text-start fs-sm mb-0">
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Custo mais baixo</li>
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Disponibilidade de salas</li>
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Multiplataforma</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Híbrido -->
                                        <div class="col-lg-4 col-md-6">
                                            <div class="event-type-card" data-type="hibrido">
                                                <div class="event-icon">
                                                    <i class="ti ti-device-laptop"></i>
                                                </div>
                                                <h5>Híbrido</h5>
                                                <p class="text-muted">Combinação de presencial e online</p>
                                                <ul class="list-unstyled text-start fs-sm mb-0">
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Flexibilidade</li>
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Número ilimitado de alunos</li>
                                                    <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Automatização</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between">
                                                <a href="index.php" class="btn btn-secondary">
                                                    <i class="ti ti-arrow-left me-1"></i>
                                                    Cancelar
                                                </a>
                                                <button type="button" class="btn btn-primary" id="btnNext" disabled>
                                                    Continuar
                                                    <i class="ti ti-arrow-right ms-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>
    
    <?php include 'partials/customizer.php'; ?>
    <?php include 'partials/footer-scripts.php'; ?>

    <!-- API Client -->
    <script src="assets/js/api-client.js"></script>

    <script>
        // Verificação de autenticação suave
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🔄 Events-create-step1.php carregado, verificando autenticação...');
            
            // Função para verificar se API client está carregado
            function waitForAPIClient(callback, attempts = 0) {
                if (window.eventosAPI) {
                    console.log('✅ API Client carregado');
                    callback();
                } else if (attempts < 20) {
                    console.log(`⏳ Aguardando API Client... tentativa ${attempts + 1}`);
                    setTimeout(() => waitForAPIClient(callback, attempts + 1), 200);
                } else {
                    console.error('❌ API Client não carregou após 4 segundos');
                    // Mostrar aviso de erro sem redirecionar
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-danger alert-dismissible fade show position-fixed';
                    alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
                    alertDiv.innerHTML = `
                        <i class="ti ti-alert-circle me-2"></i>
                        <strong>Erro:</strong> Sistema não carregou completamente. 
                        <a href="javascript:location.reload()" class="alert-link">Recarregue a página</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    document.body.appendChild(alertDiv);
                }
            }
            
            // Verificar autenticação após carregar API client
            waitForAPIClient(function() {
                if (!window.eventosAPI.isLoggedIn()) {
                    console.warn('⚠️ Usuário não está logado na página de criação de evento');
                    // Não redirecionar automaticamente, apenas logar
                    // O sistema de autenticação do menu/topbar irá lidar com isso
                } else {
                    const user = window.eventosAPI.getCurrentUser();
                    console.log('✅ Usuário está logado na página de criação:', user?.name);
                }
                
                // Inicializar seleção de evento independente do status de login
                // O controle de acesso será feito a nível de API
                initEventTypeSelection();
            });
        });

        // Event type selection
        function initEventTypeSelection() {
            const eventCards = document.querySelectorAll('.event-type-card');
            const btnNext = document.getElementById('btnNext');
            let selectedType = null;

            eventCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selected class from all cards
                    eventCards.forEach(c => c.classList.remove('selected'));
                    
                    // Add selected class to clicked card
                    this.classList.add('selected');
                    
                    // Get selected type
                    selectedType = this.getAttribute('data-type');
                    
                    // Enable next button
                    btnNext.disabled = false;
                    
                    console.log('Tipo selecionado:', selectedType);
                });
            });

            btnNext.addEventListener('click', function() {
                if (selectedType) {
                    // Verificar se usuário está logado antes de prosseguir
                    if (!window.eventosAPI || !window.eventosAPI.isLoggedIn()) {
                        // Mostrar alerta e redirecionar para login
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-warning alert-dismissible fade show position-fixed';
                        alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
                        alertDiv.innerHTML = `
                            <i class="ti ti-info-circle me-2"></i>
                            <strong>Login Necessário:</strong> Você precisa estar logado para continuar criando o evento.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        `;
                        document.body.appendChild(alertDiv);
                        
                        setTimeout(() => {
                            window.location.href = 'auth-sign-in.php';
                        }, 2000);
                        return;
                    }
                    
                    // Usuário está logado, pode prosseguir
                    console.log('Prosseguir para próxima etapa com tipo:', selectedType);
                    // window.location.href = 'events-create-step2.php?type=' + selectedType;
                    
                    // For now, show alert
                    alert('Próxima etapa em desenvolvimento. Tipo selecionado: ' + selectedType);
                }
            });
        }
    </script>
</body>
</html>