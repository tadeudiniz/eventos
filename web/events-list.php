<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Lista de Eventos"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
    
    <style>
        .event-status-badge {
            padding: 0.375rem 0.75rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status-published {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .status-draft {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .event-type-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .type-presencial {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .type-online {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }
        
        .type-hibrido {
            background-color: #fff8e1;
            color: #f57c00;
        }
        
        .event-date {
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .stats-card {
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <?php $subtitle = "Eventos"; $title = "Lista de Eventos"; include('partials/page-title.php'); ?>

                    <!-- Statistics Cards -->
                    <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-2 mb-4">

                        <!-- Total Events Widget -->
                        <div class="col">
                            <div class="card mb-2 stats-card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h5 class="fs-xl mb-0" id="total-events">0</h5>
                                        <i class="ti ti-calendar-event text-primary fs-3"></i>
                                    </div>
                                    <p class="text-muted mb-2">Total de Eventos</p>
                                    <div class="progress progress-sm mb-0">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Published Events Widget -->
                        <div class="col">
                            <div class="card mb-2 stats-card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h5 class="fs-xl mb-0" id="published-events">0</h5>
                                        <i class="ti ti-eye text-success fs-3"></i>
                                    </div>
                                    <p class="text-muted mb-2">Eventos Publicados</p>
                                    <div class="progress bg-success bg-opacity-25 progress-sm mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="published-progress"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Draft Events Widget -->
                        <div class="col">
                            <div class="card mb-2 stats-card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h5 class="fs-xl mb-0" id="draft-events">0</h5>
                                        <i class="ti ti-file-text text-warning fs-3"></i>
                                    </div>
                                    <p class="text-muted mb-2">Eventos em Rascunho</p>
                                    <div class="progress bg-warning bg-opacity-25 progress-sm mb-0">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="draft-progress"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Upcoming Events Widget -->
                        <div class="col">
                            <div class="card mb-2 stats-card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h5 class="fs-xl mb-0" id="upcoming-events">0</h5>
                                        <i class="ti ti-clock text-info fs-3"></i>
                                    </div>
                                    <p class="text-muted mb-2">Eventos Futuros</p>
                                    <div class="progress bg-info bg-opacity-25 progress-sm mb-0">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="upcoming-progress"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Participants Widget -->
                        <div class="col-lg col-md-auto">
                            <div class="card mb-2 stats-card">
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <h5 class="fs-xl mb-0" id="total-participants">0</h5>
                                        <i class="ti ti-users text-secondary fs-3"></i>
                                    </div>
                                    <p class="text-muted mb-2">Total de Participantes</p>
                                    <div class="progress progress-sm mb-0">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Events Table -->
                    <div class="row">
                        <div class="col-12">
                            <div data-table data-table-rows-per-page="10" class="card">
                                <div class="card-header border-light justify-content-between">
                                    <div class="d-flex gap-2">
                                        <div class="app-search">
                                            <input data-table-search type="search" class="form-control" placeholder="Buscar eventos...">
                                            <i data-lucide="search" class="app-search-icon text-muted"></i>
                                        </div>
                                        <a href="events-create-step1.php" class="btn btn-primary">
                                            <i class="ti ti-plus me-1"></i> Criar Evento
                                        </a>
                                        <button data-table-delete-selected class="btn btn-danger d-none">Excluir</button>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <span class="me-2 fw-semibold">Filtrar Por:</span>

                                        <!-- Status Filter -->
                                        <div class="app-search">
                                            <select data-table-filter="status" class="form-select form-control my-1 my-md-0">
                                                <option value="">Status</option>
                                                <option value="published">Publicado</option>
                                                <option value="draft">Rascunho</option>
                                                <option value="cancelled">Cancelado</option>
                                            </select>
                                            <i data-lucide="filter" class="app-search-icon text-muted"></i>
                                        </div>

                                        <!-- Type Filter -->
                                        <div class="app-search">
                                            <select data-table-filter="type" class="form-select form-control my-1 my-md-0">
                                                <option value="">Tipo</option>
                                                <option value="presencial">Presencial</option>
                                                <option value="online">Online</option>
                                                <option value="hibrido">Híbrido</option>
                                            </select>
                                            <i data-lucide="calendar" class="app-search-icon text-muted"></i>
                                        </div>

                                        <!-- Records Per Page -->
                                        <div>
                                            <select data-table-set-rows-per-page class="form-select form-control my-1 my-md-0">
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                                            <thead class="bg-light align-middle bg-opacity-25 thead-sm text-nowrap">
                                                <tr class="text-uppercase fs-xxs">
                                                    <th class="ps-3" style="width: 1%;">
                                                        <input data-table-select-all class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-events" value="option">
                                                    </th>
                                                    <th data-table-sort>Nome do Evento</th>
                                                    <th>Tipo</th>
                                                    <th data-table-sort data-column="startDate">Data de Início</th>
                                                    <th data-table-sort data-column="status">Status</th>
                                                    <th>Participantes</th>
                                                    <th>Local</th>
                                                    <th class="text-center" style="width: 1%;">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-nowrap" id="events-table-body">
                                                <!-- Events will be loaded here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Loading State -->
                                <div id="loading-state" class="text-center p-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Carregando...</span>
                                    </div>
                                    <p class="mt-2 text-muted">Carregando eventos...</p>
                                </div>

                                <!-- Empty State -->
                                <div id="empty-state" class="text-center p-5" style="display: none;">
                                    <i class="ti ti-calendar-off text-muted" style="font-size: 4rem;"></i>
                                    <h5 class="mt-3">Nenhum evento encontrado</h5>
                                    <p class="text-muted">Você ainda não criou nenhum evento. Comece criando seu primeiro evento!</p>
                                    <a href="events-create-step1.php" class="btn btn-primary">
                                        <i class="ti ti-plus me-1"></i> Criar Primeiro Evento
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
            <?php include('partials/footer.php'); ?>
        </div>
    </div>

    <?php include('partials/customizer.php'); ?>
    <?php include('partials/footer-scripts.php'); ?>

    <!-- API Client -->
    <script src="assets/js/api-client.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let events = [];
        let stats = {};

        // Inicializar página
        document.addEventListener('DOMContentLoaded', function() {
            console.log('📋 Events List carregada');
            
            // Aguardar API client
            waitForAPIClient(function() {
                loadEvents();
                loadStatistics();
            });
        });

        function waitForAPIClient(callback, attempts = 0) {
            if (window.eventosAPI) {
                console.log('✅ API Client carregado');
                callback();
            } else if (attempts < 20) {
                setTimeout(() => waitForAPIClient(callback, attempts + 1), 200);
            } else {
                console.error('❌ API Client não carregou');
                showError('Sistema não carregou completamente');
            }
        }

        async function loadEvents() {
            try {
                console.log('📥 Carregando eventos...');
                
                const response = await window.eventosAPI.getEvents();
                
                if (response && response.data && response.data.events) {
                    events = response.data.events;
                    console.log('✅ Eventos carregados:', events.length);
                    renderEvents();
                } else {
                    console.log('ℹ️ Nenhum evento encontrado');
                    showEmptyState();
                }
                
            } catch (error) {
                console.error('❌ Erro ao carregar eventos:', error);
                showError('Erro ao carregar eventos');
            } finally {
                hideLoadingState();
            }
        }

        async function loadStatistics() {
            try {
                console.log('📊 Carregando estatísticas...');
                
                const response = await window.eventosAPI.getStatistics();
                
                if (response && response.data) {
                    stats = response.data;
                    console.log('✅ Estatísticas carregadas:', stats);
                    updateStatistics();
                } else {
                    console.log('ℹ️ Estatísticas não disponíveis');
                    updateStatistics({});
                }
                
            } catch (error) {
                console.error('❌ Erro ao carregar estatísticas:', error);
                updateStatistics({});
            }
        }

        function renderEvents() {
            const tbody = document.getElementById('events-table-body');
            
            if (events.length === 0) {
                showEmptyState();
                return;
            }
            
            let html = '';
            
            events.forEach(event => {
                html += `
                    <tr>
                        <td class="ps-3">
                            <input class="form-check-input form-check-input-light fs-14 event-item-check mt-0" type="checkbox" value="${event.id}">
                        </td>
                        <td>
                            <div>
                                <a href="event-details.php?id=${event.id}" class="link-reset fw-semibold">${event.title}</a>
                                ${event.subtitle ? `<br><small class="text-muted">${event.subtitle}</small>` : ''}
                            </div>
                        </td>
                        <td>
                            <span class="event-type-badge type-${event.type}">
                                ${formatEventType(event.type)}
                            </span>
                        </td>
                        <td>
                            <div class="event-date">
                                ${formatEventDate(event.startDate, event.startTime)}
                                ${event.endDate !== event.startDate ? '<br>' + formatEventDate(event.endDate, event.endTime) : ''}
                            </div>
                        </td>
                        <td>
                            <span class="event-status-badge status-${event.status}">
                                ${formatEventStatus(event.status)}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="ti ti-users text-muted"></i>
                                <span>${event.participants || 0}</span>
                            </div>
                        </td>
                        <td>
                            <div class="text-truncate" style="max-width: 150px;" title="${formatEventLocation(event)}">
                                ${formatEventLocation(event)}
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="event-details.php?id=${event.id}">
                                        <i class="ti ti-eye me-2"></i>Ver Detalhes
                                    </a></li>
                                    <li><a class="dropdown-item" href="event-edit.php?id=${event.id}">
                                        <i class="ti ti-edit me-2"></i>Editar
                                    </a></li>
                                    <li><a class="dropdown-item" href="event-participants.php?id=${event.id}">
                                        <i class="ti ti-users me-2"></i>Participantes
                                    </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    ${event.status === 'published' ? 
                                        `<li><a class="dropdown-item text-warning" href="#" onclick="toggleEventStatus('${event.id}', 'draft')">
                                            <i class="ti ti-eye-off me-2"></i>Despublicar
                                        </a></li>` : 
                                        `<li><a class="dropdown-item text-success" href="#" onclick="toggleEventStatus('${event.id}', 'published')">
                                            <i class="ti ti-eye me-2"></i>Publicar
                                        </a></li>`
                                    }
                                    <li><a class="dropdown-item text-danger" href="#" onclick="deleteEvent('${event.id}')">
                                        <i class="ti ti-trash me-2"></i>Excluir
                                    </a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `;
            });
            
            tbody.innerHTML = html;
        }

        function updateStatistics() {
            // Atualizar cards de estatísticas
            document.getElementById('total-events').textContent = stats.totalEvents || events.length || 0;
            document.getElementById('published-events').textContent = stats.publishedEvents || 0;
            document.getElementById('draft-events').textContent = stats.draftEvents || 0;
            document.getElementById('upcoming-events').textContent = stats.upcomingEvents || 0;
            document.getElementById('total-participants').textContent = stats.totalParticipants || 0;
            
            // Atualizar barras de progresso
            const total = stats.totalEvents || events.length || 1;
            
            const publishedPercent = ((stats.publishedEvents || 0) / total) * 100;
            const draftPercent = ((stats.draftEvents || 0) / total) * 100;
            const upcomingPercent = ((stats.upcomingEvents || 0) / total) * 100;
            
            document.getElementById('published-progress').style.width = `${publishedPercent}%`;
            document.getElementById('draft-progress').style.width = `${draftPercent}%`;
            document.getElementById('upcoming-progress').style.width = `${upcomingPercent}%`;
        }

        function formatEventType(type) {
            const types = {
                'presencial': 'Presencial',
                'online': 'Online',
                'hibrido': 'Híbrido'
            };
            return types[type] || type;
        }

        function formatEventStatus(status) {
            const statuses = {
                'published': 'Publicado',
                'draft': 'Rascunho',
                'cancelled': 'Cancelado'
            };
            return statuses[status] || status;
        }

        function formatEventDate(date, time) {
            try {
                const dateObj = new Date(date + 'T' + (time || '00:00'));
                return dateObj.toLocaleDateString('pt-BR', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                }) + (time ? ' às ' + time : '');
            } catch (e) {
                return date;
            }
        }

        function formatEventLocation(event) {
            if (event.type === 'online') {
                return 'Online';
            } else if (event.venue) {
                return event.venue;
            } else if (event.city) {
                return event.city + (event.state ? ', ' + event.state : '');
            } else {
                return 'Local não informado';
            }
        }

        function hideLoadingState() {
            document.getElementById('loading-state').style.display = 'none';
        }

        function showEmptyState() {
            document.getElementById('empty-state').style.display = 'block';
            hideLoadingState();
        }

        function showError(message) {
            Swal.fire({
                title: 'Erro',
                text: message,
                icon: 'error'
            });
        }

        async function deleteEvent(eventId) {
            const result = await Swal.fire({
                title: 'Excluir Evento?',
                text: 'Esta ação não pode ser desfeita.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            });

            if (result.isConfirmed) {
                try {
                    await window.eventosAPI.deleteEvent(eventId);
                    
                    Swal.fire({
                        title: 'Excluído!',
                        text: 'Evento excluído com sucesso.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    
                    // Recarregar lista
                    loadEvents();
                    loadStatistics();
                    
                } catch (error) {
                    console.error('Erro ao excluir evento:', error);
                    Swal.fire({
                        title: 'Erro',
                        text: 'Erro ao excluir evento.',
                        icon: 'error'
                    });
                }
            }
        }

        async function toggleEventStatus(eventId, newStatus) {
            try {
                await window.eventosAPI.updateEvent(eventId, { status: newStatus });
                
                const statusText = newStatus === 'published' ? 'publicado' : 'despublicado';
                
                Swal.fire({
                    title: 'Sucesso!',
                    text: `Evento ${statusText} com sucesso.`,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
                
                // Recarregar lista
                loadEvents();
                loadStatistics();
                
            } catch (error) {
                console.error('Erro ao alterar status:', error);
                Swal.fire({
                    title: 'Erro',
                    text: 'Erro ao alterar status do evento.',
                    icon: 'error'
                });
            }
        }
    </script>
</body>

</html>