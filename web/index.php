<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Dashboard"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="container-fluid">

                <?php $title = "Dashboard"; include('partials/page-title.php'); ?>

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
                    <!-- Total de Eventos -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-24">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span id="total-eventos" data-target="0">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Total de Eventos</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <!-- Eventos Ativos -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded-circle fs-24">
                                            <i class="ti ti-calendar-check"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span id="eventos-ativos" data-target="0">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Eventos Ativos</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <!-- Total de Participantes -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded-circle fs-24">
                                            <i class="ti ti-users"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span id="total-participantes" data-target="0">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Total Participantes</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <!-- Próximos Eventos -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-24">
                                            <i class="ti ti-clock"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span id="proximos-eventos" data-target="0">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Próximos 7 dias</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div data-table="" data-table-rows-per-page="8" class="card">
                            <div class="card-header border-light justify-content-between">
                                <div class="d-flex gap-2">
                                    <div class="app-search">
                                        <input data-table-search="" type="search" class="form-control" placeholder="Buscar eventos...">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="search" class="lucide lucide-search app-search-icon text-muted"><path d="m21 21-4.34-4.34"></path><circle cx="11" cy="11" r="8"></circle></svg>
                                    </div>
                                    <a href="events-create-step1.php" class="btn btn-primary">
                                        <i class="ti ti-plus me-1"></i> Criar Evento
                                    </a>
                                    <button data-table-delete-selected="" class="btn btn-danger d-none">Excluir Selecionados</button>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span class="me-2 fw-semibold">Filtrar Por:</span>

                                    <!-- Status Filter -->
                                    <div class="app-search">
                                        <select data-table-filter="status" class="form-select form-control my-1 my-md-0">
                                            <option value="">Status</option>
                                            <option value="Ativo">Ativo</option>
                                            <option value="Inativo">Inativo</option>
                                            <option value="Cancelado">Cancelado</option>
                                            <option value="Finalizado">Finalizado</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="shuffle" class="lucide lucide-shuffle app-search-icon text-muted"><path d="m18 14 4 4-4 4"></path><path d="m18 2 4 4-4 4"></path><path d="M2 18h1.973a4 4 0 0 0 3.3-1.7l5.454-8.6a4 4 0 0 1 3.3-1.7H22"></path><path d="M2 6h1.972a4 4 0 0 1 3.6 2.2"></path><path d="M22 18h-6.041a4 4 0 0 1-3.3-1.8l-.359-.45"></path></svg>
                                    </div>

                                    <!-- Tipo de Evento Filter -->
                                    <div class="app-search">
                                        <select data-table-filter="tipo" class="form-select form-control my-1 my-md-0">
                                            <option value="">Tipo de Evento</option>
                                            <option value="Presencial">Presencial</option>
                                            <option value="Online">Online</option>
                                            <option value="Híbrido">Híbrido</option>
                                        </select>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar app-search-icon text-muted"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                    </div>

                                    <!-- Records Per Page -->
                                    <div>
                                        <select data-table-set-rows-per-page="" class="form-select form-control my-1 my-md-0"><option value="5">5</option><option value="8">8</option><option value="10">10</option><option value="15">15</option><option value="20">20</option></select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                                        <thead class="bg-light align-middle bg-opacity-25 thead-sm text-nowrap">
                                            <tr class="text-uppercase fs-xxs">
                                                <th class="ps-3" style="width: 1%;">
                                                    <input data-table-select-all="" class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-eventos" value="option">
                                                </th>
                                                <th data-table-sort="" style="cursor: pointer;">Nome do Evento<i class="ti ti-arrows-sort fs-xs ms-1"></i></th>
                                                <th>Organizador</th>
                                                <th data-table-sort="" style="cursor: pointer;">Data de Início<i class="ti ti-arrows-sort fs-xs ms-1"></i></th>
                                                <th data-table-sort="" style="cursor: pointer;">Participantes<i class="ti ti-arrows-sort fs-xs ms-1"></i></th>
                                                <th data-table-sort="" data-column="status" style="cursor: pointer;">Status<i class="ti ti-arrows-sort fs-xs ms-1"></i></th>
                                                <th style="width: 15%;">Tipo</th>
                                                <th data-table-sort="" style="cursor: pointer;">Criado em<i class="ti ti-arrows-sort fs-xs ms-1"></i></th>
                                                <th class="text-center" style="width: 1%;">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-nowrap" id="eventos-table-body">
                                            <!-- Eventos serão carregados via JavaScript -->
                                            <tr id="loading-row">
                                                <td colspan="9" class="text-center py-4">
                                                    <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                                                    Carregando eventos...
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-respo.-->

                            </div> <!-- end card-body-->

                            <div class="card-footer border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div data-table-pagination-info="Eventos" class="text-muted" style="display: block;">Carregando...</div>
                                    <div data-table-pagination="" style="display: block;">
                                        <ul class="pagination pagination-sm pagination-boxed mb-0 justify-content-center">
                                            <li class="page-item disabled"><a href="#" class="page-link"><i class="ti ti-chevron-left"></i></a></li>
                                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item disabled"><a href="#" class="page-link"><i class="ti ti-chevron-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

            </div>
            <!-- container -->

            <?php include('partials/footer.php'); ?>

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include('partials/customizer.php'); ?>

    <?php include('partials/footer-scripts.php'); ?>

    <!-- API Client - Carregar antes dos outros scripts -->
    <script src="assets/js/api-client.js"></script>

    <!-- E Charts js -->
    <script src="assets/plugins/chartjs/chart.umd.js"></script>

    <!-- Custom table -->
    <script src="assets/js/pages/custom-table.js"></script>

    <!-- Dashboard Page js -->
    <script src="assets/js/pages/dashboard.js"></script>

    <!-- Verificação de autenticação suave -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🔄 Index.php carregado, verificando autenticação...');
        
        // Função para verificar se API client está carregado
        function waitForAPIClient(callback, attempts = 0) {
            if (window.eventosAPI) {
                console.log('✅ API Client carregado no index.php');
                callback();
            } else if (attempts < 20) { // Tentar por até 4 segundos (20 x 200ms)
                console.log(`⏳ Aguardando API Client... tentativa ${attempts + 1}`);
                setTimeout(() => waitForAPIClient(callback, attempts + 1), 200);
            } else {
                console.error('❌ API Client não carregou após 4 segundos');
                // Mostrar aviso de erro
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger alert-dismissible fade show position-fixed';
                alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
                alertDiv.innerHTML = `
                    <i class="ti ti-alert-circle me-2"></i>
                    <strong>Erro:</strong> Sistema de autenticação não carregou. 
                    <a href="javascript:location.reload()" class="alert-link">Recarregue a página</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(alertDiv);
            }
        }
        
        // Verificar autenticação após carregar API client
        waitForAPIClient(function() {
            if (!window.eventosAPI.isLoggedIn()) {
                console.warn('⚠️ Usuário não está logado no index.php');
                // Não mostrar alert, apenas logar
            } else {
                const user = window.eventosAPI.getCurrentUser();
                console.log('✅ Usuário está logado no index.php:', user?.name);
                // Carregar dados do dashboard
                carregarDashboardEventos();
            }
        });
    });

    /**
     * Carregar dados do dashboard de eventos
     */
    async function carregarDashboardEventos() {
        try {
            console.log('📊 Carregando dados do dashboard de eventos...');
            
            // Carregar estatísticas
            await carregarEstatisticasEventos();
            
            // Carregar lista de eventos
            await carregarListaEventos();
            
        } catch (error) {
            console.error('❌ Erro ao carregar dashboard de eventos:', error);
            mostrarErro('Erro ao carregar dados do dashboard');
        }
    }

    /**
     * Carregar estatísticas dos cards
     */
    async function carregarEstatisticasEventos() {
        try {
            // Por enquanto, usar dados mock até termos os endpoints reais
            const estatisticas = {
                totalEventos: 15,
                eventosAtivos: 8,
                totalParticipantes: 342,
                proximosEventos: 3
            };

            // Atualizar cards com animação
            animarContador('total-eventos', estatisticas.totalEventos);
            animarContador('eventos-ativos', estatisticas.eventosAtivos);
            animarContador('total-participantes', estatisticas.totalParticipantes);
            animarContador('proximos-eventos', estatisticas.proximosEventos);

            console.log('✅ Estatísticas carregadas');
        } catch (error) {
            console.error('❌ Erro ao carregar estatísticas:', error);
        }
    }

    /**
     * Carregar lista de eventos na tabela
     */
    async function carregarListaEventos() {
        try {
            // Por enquanto, usar dados mock até termos os endpoints reais
            const eventos = [
                {
                    id: 1,
                    nome: 'Conferência Tech 2025',
                    organizador: { nome: 'João Silva', avatar: 'assets/images/users/user-3.jpg' },
                    dataInicio: '2025-11-15',
                    participantes: 150,
                    status: 'Ativo',
                    tipo: 'Presencial',
                    criadoEm: '2025-10-01'
                },
                {
                    id: 2,
                    nome: 'Workshop Online de Marketing',
                    organizador: { nome: 'Maria Santos', avatar: 'assets/images/users/user-4.jpg' },
                    dataInicio: '2025-10-30',
                    participantes: 85,
                    status: 'Ativo',
                    tipo: 'Online',
                    criadoEm: '2025-09-15'
                },
                {
                    id: 3,
                    nome: 'Meetup de Desenvolvedores',
                    organizador: { nome: 'Carlos Lima', avatar: 'assets/images/users/user-5.jpg' },
                    dataInicio: '2025-12-05',
                    participantes: 45,
                    status: 'Ativo',
                    tipo: 'Híbrido',
                    criadoEm: '2025-09-20'
                },
                {
                    id: 4,
                    nome: 'Evento Cancelado',
                    organizador: { nome: 'Ana Costa', avatar: 'assets/images/users/user-6.jpg' },
                    dataInicio: '2025-10-20',
                    participantes: 0,
                    status: 'Cancelado',
                    tipo: 'Presencial',
                    criadoEm: '2025-09-01'
                },
                {
                    id: 5,
                    nome: 'Seminário Finalizado',
                    organizador: { nome: 'Pedro Oliveira', avatar: 'assets/images/users/user-7.jpg' },
                    dataInicio: '2025-09-25',
                    participantes: 120,
                    status: 'Finalizado',
                    tipo: 'Online',
                    criadoEm: '2025-08-10'
                }
            ];

            // Renderizar eventos na tabela
            renderizarEventosTabela(eventos);
            
            // Atualizar informações de paginação
            atualizarPaginacao(eventos.length, eventos.length, 1);

            console.log('✅ Lista de eventos carregada');
        } catch (error) {
            console.error('❌ Erro ao carregar lista de eventos:', error);
        }
    }

    /**
     * Renderizar eventos na tabela
     */
    function renderizarEventosTabela(eventos) {
        const tbody = document.getElementById('eventos-table-body');
        
        if (eventos.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="9" class="text-center py-4">
                        <div class="text-muted">
                            <i class="ti ti-calendar-x fs-48 mb-3 d-block"></i>
                            <p class="mb-2">Nenhum evento encontrado</p>
                            <a href="events-create-step1.php" class="btn btn-primary btn-sm">
                                <i class="ti ti-plus me-1"></i> Criar Primeiro Evento
                            </a>
                        </div>
                    </td>
                </tr>
            `;
            return;
        }

        const linhas = eventos.map(evento => {
            const statusClass = {
                'Ativo': 'bg-success-subtle text-success',
                'Inativo': 'bg-secondary-subtle text-secondary',
                'Cancelado': 'bg-danger-subtle text-danger',
                'Finalizado': 'bg-primary-subtle text-primary'
            };

            const tipoIcon = {
                'Presencial': 'ti-map-pin',
                'Online': 'ti-world',
                'Híbrido': 'ti-device-laptop'
            };

            return `
                <tr>
                    <td class="ps-3">
                        <input class="form-check-input form-check-input-light fs-14 evento-item-check mt-0" type="checkbox" value="${evento.id}">
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="ti ti-calendar me-2 text-muted"></i>
                            <span class="fw-medium">${evento.nome}</span>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <img src="${evento.organizador.avatar}" alt="${evento.organizador.nome}" class="avatar-xs rounded-circle">
                            <a href="#!" class="link-reset">${evento.organizador.nome}</a>
                        </div>
                    </td>
                    <td>
                        <div>
                            ${formatarData(evento.dataInicio)}
                            <small class="text-muted d-block">${calcularDiasRestantes(evento.dataInicio)}</small>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-info-subtle text-info">
                            <i class="ti ti-users me-1"></i>${evento.participantes}
                        </span>
                    </td>
                    <td>
                        <span class="badge ${statusClass[evento.status] || 'bg-secondary-subtle text-secondary'}">${evento.status}</span>
                    </td>
                    <td>
                        <span class="badge badge-label text-bg-light">
                            <i class="${tipoIcon[evento.tipo] || 'ti-help'} me-1"></i>${evento.tipo}
                        </span>
                    </td>
                    <td>
                        ${formatarData(evento.criadoEm)}
                        <small class="text-muted d-block">${formatarTempoRelativo(evento.criadoEm)}</small>
                    </td>
                    <td>
                        <div class="d-flex align-items-center justify-content-center gap-1">
                            <button class="btn btn-default btn-icon btn-sm rounded" onclick="visualizarEvento(${evento.id})" title="Visualizar">
                                <i class="ti ti-eye fs-lg"></i>
                            </button>
                            <button class="btn btn-default btn-icon btn-sm rounded" onclick="editarEvento(${evento.id})" title="Editar">
                                <i class="ti ti-edit fs-lg"></i>
                            </button>
                            <button class="btn btn-default btn-icon btn-sm rounded" onclick="excluirEvento(${evento.id})" title="Excluir">
                                <i class="ti ti-trash fs-lg"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
        }).join('');

        tbody.innerHTML = linhas;
    }

    /**
     * Funções auxiliares
     */
    function animarContador(elementId, valorFinal) {
        const elemento = document.getElementById(elementId);
        if (!elemento) return;

        let valorAtual = 0;
        const incremento = valorFinal / 30; // 30 frames de animação
        
        const timer = setInterval(() => {
            valorAtual += incremento;
            if (valorAtual >= valorFinal) {
                elemento.textContent = valorFinal;
                clearInterval(timer);
            } else {
                elemento.textContent = Math.floor(valorAtual);
            }
        }, 50);
    }

    function formatarData(dataString) {
        const data = new Date(dataString);
        return data.toLocaleDateString('pt-BR', { 
            day: '2-digit', 
            month: 'short', 
            year: 'numeric' 
        });
    }

    function calcularDiasRestantes(dataString) {
        const hoje = new Date();
        const dataEvento = new Date(dataString);
        const diffTime = dataEvento - hoje;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays < 0) return 'Evento passado';
        if (diffDays === 0) return 'Hoje';
        if (diffDays === 1) return 'Amanhã';
        return `em ${diffDays} dias`;
    }

    function formatarTempoRelativo(dataString) {
        const agora = new Date();
        const data = new Date(dataString);
        const diffTime = agora - data;
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays === 0) return 'hoje';
        if (diffDays === 1) return 'ontem';
        if (diffDays < 30) return `há ${diffDays} dias`;
        const diffMonths = Math.floor(diffDays / 30);
        if (diffMonths === 1) return 'há 1 mês';
        return `há ${diffMonths} meses`;
    }

    function atualizarPaginacao(totalItens, itensMostrados, paginaAtual) {
        const infoElement = document.querySelector('[data-table-pagination-info="Eventos"]');
        if (infoElement) {
            infoElement.innerHTML = `Mostrando <span class="fw-semibold">1</span> a <span class="fw-semibold">${itensMostrados}</span> de <span class="fw-semibold">${totalItens}</span> Eventos`;
        }
    }

    function mostrarErro(mensagem) {
        console.error(mensagem);
        // Aqui você pode implementar uma notificação de erro mais elaborada
    }

    /**
     * Funções de ação dos eventos
     */
    function criarNovoEvento() {
        console.log('🆕 Criar novo evento');
        window.location.href = 'events-create-step1.php';
    }

    function visualizarEvento(id) {
        console.log('👁️ Visualizar evento:', id);
        // TODO: Implementar visualização de evento
        alert(`Visualizar evento ID: ${id}`);
    }

    function editarEvento(id) {
        console.log('✏️ Editar evento:', id);
        // TODO: Implementar edição de evento
        alert(`Editar evento ID: ${id}`);
    }

    function excluirEvento(id) {
        console.log('🗑️ Excluir evento:', id);
        // TODO: Implementar exclusão de evento
        if (confirm('Tem certeza que deseja excluir este evento?')) {
            alert(`Evento ID ${id} excluído (mock)`);
        }
    }
    </script>

</body>

</html>