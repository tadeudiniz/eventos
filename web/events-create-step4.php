<?php
// Verificar autenticação
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth-sign-in.php');
    exit;
}

// Recuperar dados dos steps anteriores da sessão (opcional)
$step1_data = $_SESSION['event_step1'] ?? [];
$step2_data = $_SESSION['event_step2'] ?? [];
$step3_data = $_SESSION['event_step3'] ?? [];

// Dados temporários do usuário (em produção, vir da sessão ou API)
$user_name = $_SESSION['user_name'] ?? 'Admin Teste';
$user_email = $_SESSION['user_email'] ?? 'admin@exemplo.com';
?>
<?php include 'partials/html.php'; ?>

<head>
    <?php
    $title = "Criar Evento - Revisão e Finalização";
    include 'partials/title-meta.php';
    ?>
    
    <?php include 'partials/head-css.php'; ?>
    
    <style>
        /* Estilos do formulário */
        .form-section {
            background: #fff;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #e3e6f0;
        }
        
        .form-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4e73df;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e3e6f0;
        }
        
        /* Indicador de steps */
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
        
        .step-item.completed {
            color: #28a745;
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
        
        .step-item.completed .step-number {
            background: #28a745;
            color: white;
        }
        
        /* Seções de revisão */
        .review-section {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #4e73df;
        }
        
        .review-section h5 {
            color: #4e73df;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .review-item {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            border: 1px solid #e9ecef;
        }
        
        .review-item:last-child {
            margin-bottom: 0;
        }
        
        .review-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }
        
        .review-value {
            color: #2d3436;
            font-size: 1rem;
        }
        
        .review-value.html-content {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 0.75rem;
            border: 1px solid #e9ecef;
            max-height: 200px;
            overflow-y: auto;
        }
        
        /* Lotes na revisão */
        .lote-review {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        
        .lote-review:last-child {
            margin-bottom: 0;
        }
        
        .lote-title {
            font-weight: 600;
            color: #4e73df;
            margin-bottom: 0.5rem;
        }
        
        /* Botões de ação */
        .action-buttons {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            border: 2px solid #e9ecef;
        }
        
        .btn-create {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-edit:hover {
            transform: translateY(-1px);
        }
        
        /* Loading e estados */
        .btn-loading {
            position: relative;
            pointer-events: none;
        }
        
        .btn-loading .loading-spinner {
            display: inline-block !important;
        }
        
        .btn-loading .btn-text {
            opacity: 0.6;
        }
        
        .loading-spinner {
            display: none;
        }
        
        /* Alertas e status */
        .status-preview {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .status-preview.published {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .status-preview.draft {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .step-indicator {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .step-item {
                margin: 0;
                font-size: 0.8rem;
            }
            
            .review-section {
                padding: 1rem;
            }
            
            .action-buttons {
                padding: 1.5rem;
            }
            
            .btn-create, .btn-edit {
                width: 100%;
                margin-bottom: 0.5rem;
            }
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
                                <h4 class="page-title">Criar Novo Evento - Revisão e Finalização</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Step Indicator -->
                    <div class="row">
                        <div class="col-12">
                            <div class="step-indicator">
                                <div class="d-flex justify-content-between">
                                    <div class="step-item completed">
                                        <div class="step-number">1</div>
                                        <span>Modalidade</span>
                                    </div>
                                    <div class="step-item completed">
                                        <div class="step-number">2</div>
                                        <span>Informações Básicas</span>
                                    </div>
                                    <div class="step-item completed">
                                        <div class="step-number">3</div>
                                        <span>Configurações</span>
                                    </div>
                                    <div class="step-item active">
                                        <div class="step-number">4</div>
                                        <span>Revisão</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-10">

                            <!-- Resumo do Evento -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Resumo do Evento</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <!-- Step 1: Modalidade -->
                                    <div class="review-section">
                                        <h5><i class="bi bi-1-circle me-2"></i>Modalidade do Evento</h5>
                                        <div class="review-item">
                                            <div class="review-label">Tipo de Evento</div>
                                            <div class="review-value" id="review-modalidade">Carregando...</div>
                                        </div>
                                    </div>

                                    <!-- Step 2: Informações Básicas -->
                                    <div class="review-section">
                                        <h5><i class="bi bi-2-circle me-2"></i>Informações Básicas</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="review-item">
                                                    <div class="review-label">Título do Evento</div>
                                                    <div class="review-value" id="review-titulo">Carregando...</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-item">
                                                    <div class="review-label">Categoria</div>
                                                    <div class="review-value" id="review-categoria">Carregando...</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-item">
                                            <div class="review-label">Descrição</div>
                                            <div class="review-value html-content" id="review-descricao">Carregando...</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="review-item">
                                                    <div class="review-label">Data de Início</div>
                                                    <div class="review-value" id="review-data-inicio">Carregando...</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="review-item">
                                                    <div class="review-label">Data de Término</div>
                                                    <div class="review-value" id="review-data-fim">Carregando...</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-item" id="review-local-section">
                                            <div class="review-label">Local</div>
                                            <div class="review-value" id="review-local">Carregando...</div>
                                        </div>
                                        <div class="review-item">
                                            <div class="review-label">E-mail para Contato</div>
                                            <div class="review-value" id="review-email">Carregando...</div>
                                        </div>
                                    </div>

                                    <!-- Step 3: Configurações -->
                                    <div class="review-section">
                                        <h5><i class="bi bi-3-circle me-2"></i>Configurações</h5>
                                        
                                        <!-- Lotes -->
                                        <div class="review-item">
                                            <div class="review-label">Lotes e Vagas</div>
                                            <div id="review-lotes">Carregando...</div>
                                        </div>
                                        
                                        <!-- Credenciamento -->
                                        <div class="review-item">
                                            <div class="review-label">Informações de Credenciamento</div>
                                            <div class="review-value html-content" id="review-credenciamento">Carregando...</div>
                                        </div>
                                        
                                        <!-- URL -->
                                        <div class="review-item">
                                            <div class="review-label">URL do Evento</div>
                                            <div class="review-value" id="review-url">Carregando...</div>
                                        </div>
                                        
                                        <!-- Organizador -->
                                        <div class="review-item">
                                            <div class="review-label">Organizador</div>
                                            <div class="review-value" id="review-organizador"><?php echo htmlspecialchars($user_name); ?> (<?php echo htmlspecialchars($user_email); ?>)</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Ações Finais -->
                            <div class="action-buttons mb-5">
                                <h4 class="mb-3">Finalizar Criação do Evento</h4>
                                <p class="text-muted mb-4">Revise todas as informações acima e escolha como deseja proceder:</p>
                                
                                <div class="d-flex justify-content-center gap-3 flex-wrap">
                                    <button type="button" class="btn btn-edit" onclick="editarEvento()">
                                        <i class="bi bi-pencil me-2"></i>Editar Informações
                                    </button>
                                    <button type="button" class="btn btn-create" onclick="finalizarEvento()">
                                        <span class="btn-text">
                                            <i class="bi bi-check-circle me-2"></i>Criar Evento
                                        </span>
                                        <span class="loading-spinner spinner-border spinner-border-sm ms-2" role="status"></span>
                                    </button>
                                </div>
                                
                                <div class="mt-3">
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle me-1"></i>
                                        Ao clicar em "Criar Evento", você poderá escolher entre publicar imediatamente ou salvar como rascunho.
                                    </small>
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
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let eventData = {};

        // Carregar dados ao inicializar a página
        document.addEventListener('DOMContentLoaded', function() {
            carregarDadosEvento();
            
            // Adicionar função de debug para teste
            window.criarDadosTeste = function() {
                // Dados de teste para debug
                const dadosTeste = {
                    step1: { type: 'presencial' },
                    step2: { 
                        title: 'Evento de Teste',
                        description: '<p>Descrição do evento de teste</p>',
                        category: 'congresso',
                        startDate: '2025-10-28',
                        startTime: '09:00',
                        endDate: '2025-10-28',
                        endTime: '18:00',
                        location: {
                            venue: 'Centro de Convenções Local',
                            address: 'Rua das Flores, 123',
                            neighborhood: 'Centro',
                            city: 'São Paulo',
                            state: 'SP',
                            zipCode: '01234-567'
                        },
                        contactEmail: 'contato@evento.com'
                    },
                    step3: {
                        lotes: [
                            { nome: 'Lote 1', quantidade: 50, preco: 100 }
                        ],
                        evento_slug: 'evento-teste',
                        credenciamento: '<p>Informações de credenciamento</p>'
                    }
                };
                
                localStorage.setItem('event_step1_data', JSON.stringify(dadosTeste.step1));
                localStorage.setItem('event_step2_data', JSON.stringify(dadosTeste.step2));
                localStorage.setItem('event_step3_data', JSON.stringify(dadosTeste.step3));
                
                console.log('Dados de teste criados! Recarregue a página.');
                location.reload();
            };
        });

        function carregarDadosEvento() {
            console.log('Carregando dados do evento...');
            
            // Recuperar dados dos localStorage
            const step1Data = localStorage.getItem('event_step1_data');
            const step2Data = localStorage.getItem('event_step2_data');
            const step3Data = localStorage.getItem('event_step3_data');
            
            eventData = {
                step1: step1Data ? JSON.parse(step1Data) : {},
                step2: step2Data ? JSON.parse(step2Data) : {},
                step3: step3Data ? JSON.parse(step3Data) : {}
            };
            
            console.log('Dados recuperados:', eventData);
            
            // Debug específico para venue
            console.log('Location object:', eventData.step2.location);
            console.log('Venue encontrado:', eventData.step2.location?.venue);
            console.log('Todos os campos do step2:', Object.keys(eventData.step2));
            
            // Preencher a revisão
            preencherRevisao();
        }

        function preencherRevisao() {
            // Step 1: Modalidade
            const modalidade = eventData.step1.type || 'Não definido';
            document.getElementById('review-modalidade').textContent = formatarModalidade(modalidade);

            // Step 2: Informações Básicas
            document.getElementById('review-titulo').textContent = eventData.step2.title || 'Não definido';
            document.getElementById('review-categoria').textContent = formatarCategoria(eventData.step2.category) || 'Não definida';
            document.getElementById('review-descricao').innerHTML = eventData.step2.description || '<em class="text-muted">Nenhuma descrição fornecida</em>';
            
            // Datas
            const dataInicio = eventData.step2.startDate ? formatarData(eventData.step2.startDate, eventData.step2.startTime) : 'Não definida';
            const dataFim = eventData.step2.endDate ? formatarData(eventData.step2.endDate, eventData.step2.endTime) : 'Não definida';
            document.getElementById('review-data-inicio').textContent = dataInicio;
            document.getElementById('review-data-fim').textContent = dataFim;
            
            // Local (depende da modalidade)
            const localSection = document.getElementById('review-local-section');
            const localElement = document.getElementById('review-local');
            
            if (modalidade === 'online') {
                localElement.innerHTML = '<i class="bi bi-camera-video me-2"></i>Evento Online';
            } else if (modalidade === 'hibrido' || modalidade === 'hybrid') {
                const endereco = formatarEndereco(eventData.step2);
                localElement.innerHTML = `<i class="bi bi-geo-alt me-2"></i>${endereco}`;
            } else if (modalidade === 'presencial' || modalidade === 'presential') {
                const endereco = formatarEndereco(eventData.step2);
                localElement.innerHTML = `<i class="bi bi-geo-alt me-2"></i>${endereco}`;
            } else {
                localSection.style.display = 'none';
            }
            
            document.getElementById('review-email').textContent = eventData.step2.contactEmail || 'Não definido';

            // Step 3: Configurações
            preencherLotes();
            document.getElementById('review-credenciamento').innerHTML = eventData.step3.credenciamento || '<em class="text-muted">Nenhuma informação de credenciamento fornecida</em>';
            
            const urlSlug = eventData.step3.evento_slug || 'evento-sem-nome';
            document.getElementById('review-url').innerHTML = `<a href="https://eventos.mathetes.com/${urlSlug}" target="_blank">https://eventos.mathetes.com/${urlSlug}</a>`;
        }

        function formatarModalidade(tipo) {
            const tipos = {
                'presencial': 'Presencial',
                'online': 'Online',
                'hibrido': 'Híbrido',
                // Fallbacks para possíveis inconsistências
                'presential': 'Presencial',
                'hybrid': 'Híbrido'
            };
            return tipos[tipo] || tipo;
        }

        function formatarCategoria(categoria) {
            const categorias = {
                'congresso': 'Congresso, seminário, jornada',
                'curso': 'Curso, workshop, oficina',
                'esportivo': 'Esportivos',
                'religioso': 'Religião & Espiritualidade',
                'entretenimento': 'Entretenimento',
                'feira': 'Feira, exposição',
                'networking': 'Encontro, networking',
                'outros': 'Outros'
            };
            return categorias[categoria] || categoria;
        }

        function formatarData(data, hora) {
            try {
                const dataObj = new Date(data + 'T' + (hora || '00:00'));
                return dataObj.toLocaleString('pt-BR', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
            } catch (e) {
                return `${data} ${hora || ''}`;
            }
        }

        function formatarEndereco(data) {
            const endereco = [];
            
            // Acessar dados de localização corretamente
            const location = data.location || {};
            
            // Primeiro, adicionar o nome do local (venue) se existir
            if (location.venue) {
                endereco.push(`<strong>${location.venue}</strong>`);
            }
            
            // Depois adicionar o endereço físico
            const enderecoFisico = [];
            if (location.address) enderecoFisico.push(location.address);
            if (location.neighborhood) enderecoFisico.push(location.neighborhood);
            if (location.city) enderecoFisico.push(location.city);
            if (location.state) enderecoFisico.push(location.state);
            if (location.zipCode) enderecoFisico.push(`CEP: ${location.zipCode}`);
            
            if (enderecoFisico.length > 0) {
                endereco.push(enderecoFisico.join(', '));
            }
            
            return endereco.length > 0 ? endereco.join('<br>') : 'Local não informado';
        }

        function preencherLotes() {
            const lotesContainer = document.getElementById('review-lotes');
            const lotes = eventData.step3.lotes || [];
            
            if (lotes.length === 0) {
                lotesContainer.innerHTML = '<em class="text-muted">Nenhum lote configurado</em>';
                return;
            }
            
            let html = '';
            lotes.forEach((lote, index) => {
                html += `
                    <div class="lote-review">
                        <div class="lote-title">${lote.nome}</div>
                        <div class="row">
                            <div class="col-md-4">
                                <small class="text-muted">Vagas:</small>
                                <div class="fw-bold">${lote.quantidade}</div>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted">Preço:</small>
                                <div class="fw-bold">R$ ${parseFloat(lote.preco).toFixed(2)}</div>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted">Status:</small>
                                <div><span class="badge bg-success">Ativo</span></div>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            lotesContainer.innerHTML = html;
        }

        function editarEvento() {
            Swal.fire({
                title: 'Editar Evento',
                text: 'Para qual etapa você gostaria de voltar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Etapa 3 (Configurações)',
                cancelButtonText: 'Etapa 2 (Informações)',
                showDenyButton: true,
                denyButtonText: 'Etapa 1 (Modalidade)'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'events-create-step3.php';
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = 'events-create-step2.php';
                } else if (result.isDenied) {
                    window.location.href = 'events-create-step1.php';
                }
            });
        }

        async function finalizarEvento() {
            // Validar se todos os dados necessários estão presentes
            if (!eventData.step1.type || !eventData.step2.title || !eventData.step3.lotes) {
                Swal.fire({
                    title: 'Dados Incompletos',
                    text: 'Algumas informações essenciais estão faltando. Por favor, revise os dados.',
                    icon: 'warning'
                });
                return;
            }

            // Escolher entre publicar ou salvar como rascunho
            const result = await Swal.fire({
                title: 'Como deseja criar o evento?',
                text: 'Escolha se deseja publicar imediatamente ou salvar como rascunho.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Publicar Agora',
                cancelButtonText: 'Salvar como Rascunho',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#ffc107'
            });

            if (result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.esc) {
                return; // Usuário cancelou
            }

            const publicar = result.isConfirmed;
            const status = publicar ? 'published' : 'draft';

            // Mostrar loading
            const createBtn = document.querySelector('.btn-create');
            createBtn.classList.add('btn-loading');

            try {
                // Preparar dados para envio
                const eventoCompleto = {
                    // Dados básicos
                    title: eventData.step2.title,
                    description: eventData.step2.description,
                    type: eventData.step1.type,
                    category: eventData.step2.category,
                    
                    // Datas
                    startDate: eventData.step2.startDate,
                    startTime: eventData.step2.startTime,
                    endDate: eventData.step2.endDate,
                    endTime: eventData.step2.endTime,
                    
                    // Local (se aplicável) - corrigido para acessar location.venue
                    venue: eventData.step2.location?.venue,
                    address: eventData.step2.location?.address,
                    neighborhood: eventData.step2.location?.neighborhood,
                    city: eventData.step2.location?.city,
                    state: eventData.step2.location?.state,
                    zipCode: eventData.step2.location?.zipCode,
                    
                    // Para eventos online/híbrido
                    meetingUrl: eventData.step2.meetingUrl,
                    
                    // Contato
                    contactEmail: eventData.step2.contactEmail,
                    
                    // Configurações
                    slug: eventData.step3.evento_slug,
                    credenciamento: eventData.step3.credenciamento,
                    lotes: eventData.step3.lotes,
                    
                    // Status
                    status: status,
                    publishedAt: publicar ? new Date().toISOString() : null
                };

                console.log('Enviando evento:', eventoCompleto);
                
                // Debug específico para venue
                console.log('Venue sendo enviado:', eventoCompleto.venue);
                console.log('Tipo de evento:', eventoCompleto.type);

                // Enviar para a API
                const response = await window.eventosAPI.createEvent(eventoCompleto);
                
                console.log('Resposta da API recebida:', response);
                console.log('Tipo da resposta:', typeof response);
                console.log('Tem propriedade id?', response && 'id' in response);
                console.log('Estrutura da resposta:', response ? Object.keys(response) : 'response é null/undefined');
                
                // Verificar diferentes formatos de resposta possíveis
                let eventoId = null;
                
                if (response && response.id) {
                    eventoId = response.id;
                } else if (response && response.data && response.data.event && response.data.event.id) {
                    eventoId = response.data.event.id;
                } else if (response && response.event && response.event.id) {
                    eventoId = response.event.id;
                }
                
                if (eventoId) {
                    console.log('Evento criado com ID:', eventoId);
                    
                    // Limpar dados do localStorage
                    localStorage.removeItem('event_step1_data');
                    localStorage.removeItem('event_step2_data');
                    localStorage.removeItem('event_step3_data');
                    
                    // Mostrar sucesso
                    await Swal.fire({
                        title: 'Evento Criado com Sucesso!',
                        text: publicar ? 'Seu evento foi publicado e já está disponível.' : 'Seu evento foi salvo como rascunho.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    
                    // Redirecionar para a lista de eventos
                    window.location.href = 'events-list.php';
                } else {
                    console.error('Resposta da API não contém ID do evento:', response);
                    throw new Error(`Resposta inválida da API. Resposta recebida: ${JSON.stringify(response)}`);
                }

            } catch (error) {
                console.error('Erro ao criar evento:', error);
                
                Swal.fire({
                    title: 'Erro ao Criar Evento',
                    text: 'Ocorreu um erro ao salvar o evento. Tente novamente.',
                    icon: 'error'
                });
            } finally {
                // Remover loading
                createBtn.classList.remove('btn-loading');
            }
        }
    </script>
</body>
</html>