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

// Nota: Dados podem estar no localStorage do navegador se não estiverem na sessão PHP

// Dados temporários do usuário (em produção, vir da sessão ou API)
$user_name = $_SESSION['user_name'] ?? 'Admin Teste';
$user_email = $_SESSION['user_email'] ?? 'admin@exemplo.com';
?>
<?php include 'partials/html.php'; ?>

<head>
    <?php
    $title = "Criar Evento - Lotes e Configurações";
    include 'partials/title-meta.php';
    ?>
    
    <?php include 'partials/head-css.php'; ?>
    
    <!-- Quill editor css -->
    <link href="assets/plugins/quill/quill.core.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/quill/quill.bubble.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/quill/quill.snow.css" rel="stylesheet" type="text/css">
    
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
        
        /* Estilos dos lotes */
        .lote-card {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .lote-card:hover {
            border-color: #007bff;
            box-shadow: 0 4px 12px rgba(0,123,255,0.15);
        }
        
        .lote-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 1.5rem;
            border-radius: 10px 10px 0 0;
        }
        
        .btn-add-lote {
            border: 2px dashed #007bff;
            background: transparent;
            color: #007bff;
            padding: 2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .btn-add-lote:hover {
            background-color: #007bff;
            color: white;
        }
        
        /* Seções de configuração */
        .config-section {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .ql-editor {
            min-height: 120px;
        }
        
        .organizer-info {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 8px;
            padding: 1rem;
        }
        
        .url-preview {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            border-radius: 6px;
            padding: 0.75rem;
            font-family: monospace;
            color: #1976d2;
        }
        
        /* Estados de botões */
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
        
        /* Validação de campos */
        .is-invalid {
            border-color: #dc3545;
        }
        
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #dc3545;
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
            
            .config-section {
                padding: 1rem;
            }
            
            .btn-add-lote {
                padding: 1.5rem;
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
                                <h4 class="page-title">Criar Novo Evento - Lotes e Configurações</h4>
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
                                    <div class="step-item active">
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

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                    <form id="eventStep3Form" method="POST">
                        <!-- Lotes Section -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="mb-0"><i class="bi bi-ticket-perforated me-2"></i>Lotes e Vagas</h4>
                            </div>
                            <div class="card-body">
                                <div id="lotes-container">
                                    <!-- Lotes serão adicionados aqui dinamicamente -->
                                </div>
                                
                                <button type="button" class="btn-add-lote w-100" onclick="adicionarLote()">
                                    <i class="bi bi-plus-circle fs-3 mb-2"></i>
                                    <div class="fw-bold">Adicionar Novo Lote</div>
                                    <small class="text-muted">Clique para criar um novo lote de ingressos</small>
                                </button>
                            </div>
                        </div>

                        <!-- Configurações do Evento -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4 class="mb-0"><i class="bi bi-gear me-2"></i>Configurações do Evento</h4>
                            </div>
                            <div class="card-body">
                                <!-- Tema -->
                                <div class="config-section">
                                    <h5><i class="bi bi-palette me-2"></i>Tema e Aparência</h5>
                                    <div class="alert alert-info mb-0">
                                        <i class="bi bi-info-circle me-2"></i>
                                        O tema e as cores poderão ser alterados no painel de gerenciamento do evento após a criação.
                                    </div>
                                </div>

                                <!-- Informações de Credenciamento -->
                                <div class="config-section">
                                    <h5><i class="bi bi-card-text me-2"></i>Informações de Credenciamento</h5>
                                    <p class="text-muted mb-3">Instruções que aparecerão para os participantes sobre credenciamento, check-in e outras informações importantes.</p>
                                    <div id="snow-editor" style="height: 200px;">
                                        <p>Digite as informações de credenciamento e check-in...</p>
                                        <ul>
                                            <li>Horário de credenciamento</li>
                                            <li>Local de check-in</li>
                                            <li>Documentos necessários</li>
                                            <li>Instruções especiais</li>
                                        </ul>
                                    </div>
                                    <input type="hidden" id="credenciamento-content" name="credenciamento">
                                </div>

                                <!-- Organizador -->
                                <div class="config-section">
                                    <h5><i class="bi bi-person-badge me-2"></i>Organizador</h5>
                                    <div class="organizer-info">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h6 class="mb-1"><?php echo htmlspecialchars($user_name); ?></h6>
                                                <p class="text-muted mb-0"><?php echo htmlspecialchars($user_email); ?></p>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <a href="profile.php" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-gear me-1"></i>Revisar Configurações
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Informações retiradas dos dados do usuário. Revise nas configurações do usuário se necessário.</small>
                                </div>

                                <!-- URL da Página -->
                                <div class="config-section">
                                    <h5><i class="bi bi-link-45deg me-2"></i>Link da Página do Evento</h5>
                                    <p class="text-muted mb-3">Defina como ficará a URL de acesso público ao seu evento.</p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-text">eventos.mathetes.com/</span>
                                                <input type="text" class="form-control" id="evento-slug" name="evento_slug" 
                                                       placeholder="meu-evento-incrivel" onkeyup="atualizarPreviewUrl()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label text-muted">Preview da URL:</label>
                                        <div class="url-preview" id="url-preview">
                                            https://eventos.mathetes.com/seu-evento-aqui
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between mb-5">
                            <a href="events-create-step2.php" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-left me-2"></i>Voltar
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-arrow-right me-2"></i>Continuar
                            </button>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <!-- Modal para Editar Lote -->
    <div class="modal fade" id="editLoteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Lote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editLoteForm">
                        <input type="hidden" id="edit-lote-index">
                        <div class="mb-3">
                            <label for="edit-lote-nome" class="form-label">Nome do Lote</label>
                            <input type="text" class="form-control" id="edit-lote-nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-lote-quantidade" class="form-label">Quantidade de Vagas</label>
                            <input type="number" class="form-control" id="edit-lote-quantidade" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-lote-preco" class="form-label">Preço (R$)</label>
                            <input type="number" class="form-control" id="edit-lote-preco" min="0" step="0.01">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarEdicaoLote()">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/customizer.php'; ?>
    <?php include 'partials/footer-scripts.php'; ?>

    <!-- Quill editor js -->
    <script src="assets/plugins/quill/quill.min.js"></script>
    
    <!-- Input Mask -->
    <script src="assets/plugins/inputmask/inputmask.min.js"></script>

    <!-- API Client -->
    <script src="assets/js/api-client.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let lotes = [];
        let loteCounter = 0;
        let credenciamentoEditor;

        // Inicializar editor do Quill para credenciamento
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM carregado, inicializando Quill...');
            
            // Aguardar um pouco para garantir que todos os scripts foram carregados
            setTimeout(function() {
                initializeQuillEditor();
            }, 100);
            
            // Recuperar dados do Step 2 do localStorage se não estiver disponível via PHP
            let eventoTitulo = '<?php echo addslashes($step2_data['titulo'] ?? ''); ?>';
            
            if (!eventoTitulo) {
                // Tentar recuperar do localStorage
                const step2Data = localStorage.getItem('event_step2_data');
                if (step2Data) {
                    try {
                        const data = JSON.parse(step2Data);
                        eventoTitulo = data.title || '';
                        console.log('Dados recuperados do localStorage:', data);
                    } catch (e) {
                        console.error('Erro ao recuperar dados do localStorage:', e);
                    }
                }
            }
            
            // Gerar slug inicial baseado no título do step 2
            if (eventoTitulo) {
                const slug = gerarSlug(eventoTitulo);
                document.getElementById('evento-slug').value = slug;
                atualizarPreviewUrl();
            }
            
            // Tentar atualizar informações do usuário via API
            atualizarInformacoesUsuario();
        });

        function initializeQuillEditor() {
            console.log('Iniciando inicialização do Quill...');
            
            // Verificar se já foi inicializado
            if (credenciamentoEditor) {
                console.log('Quill já foi inicializado');
                return;
            }
            
            // Verificar se Quill está disponível
            if (typeof Quill === 'undefined') {
                console.error('Quill não foi carregado!');
                return;
            }
            
            // Verificar se o elemento existe
            const editorElement = document.getElementById('snow-editor');
            if (!editorElement) {
                console.error('Elemento #snow-editor não encontrado!');
                return;
            }
            
            console.log('Elemento encontrado:', editorElement);
            
            // Import Quill's built-in icons para customização
            const icons = Quill.import('ui/icons');
            
            // Customizar ícones com Tabler Icons
            icons['bold'] = '<i class="ti ti-bold"></i>';
            icons['italic'] = '<i class="ti ti-italic"></i>';
            icons['underline'] = '<i class="ti ti-underline"></i>';
            icons['list'] = '<i class="ti ti-list"></i>';
            icons['bullet'] = '<i class="ti ti-list-ul"></i>';
            icons['link'] = '<i class="ti ti-link"></i>';
            icons['blockquote'] = '<i class="ti ti-blockquote"></i>';
            icons['code-block'] = '<i class="ti ti-code"></i>';
            icons['clean'] = '<i class="ti ti-trash"></i>';
            icons['header']['1'] = '<i class="ti ti-h-1"></i>';
            icons['header']['2'] = '<i class="ti ti-h-2"></i>';
            icons['header']['3'] = '<i class="ti ti-h-3"></i>';
            icons['header'][''] = '<i class="ti ti-letter-t"></i>';
            
            try {
                credenciamentoEditor = new Quill('#snow-editor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{'font': []}],
                            ['bold', 'italic', 'underline'],
                            [{'color': []}, {'background': []}],
                            [{'header': [false, 1, 2, 3]}],
                            ['blockquote', 'code-block'],
                            [{'list': 'ordered'}, {'list': 'bullet'}],
                            ['link'],
                            ['clean']
                        ]
                    }
                });
                
                console.log('Quill credenciamento inicializado com sucesso:', credenciamentoEditor);
                
                // Sincronizar com input oculto
                credenciamentoEditor.on('text-change', function() {
                    const content = credenciamentoEditor.root.innerHTML;
                    document.getElementById('credenciamento-content').value = content;
                });
                
            } catch (error) {
                console.error('Erro ao inicializar Quill:', error);
            }
        }

        function adicionarLote() {
            loteCounter++;
            const loteId = `lote-${loteCounter}`;
            
            const lote = {
                id: loteId,
                nome: `Lote ${loteCounter}`,
                quantidade: 50,
                preco: 0.00
            };
            
            lotes.push(lote);
            renderizarLotes();
        }

        function renderizarLotes() {
            const container = document.getElementById('lotes-container');
            container.innerHTML = '';

            lotes.forEach((lote, index) => {
                const loteHtml = `
                    <div class="lote-card" data-lote-id="${lote.id}">
                        <div class="lote-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">${lote.nome}</h5>
                            <div>
                                <button type="button" class="btn btn-outline-primary btn-sm me-2" onclick="editarLote(${index})">
                                    <i class="bi bi-pencil"></i> Editar
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="excluirLote(${index})">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label text-muted">Quantidade de Vagas</label>
                                    <div class="fw-bold fs-5">${lote.quantidade}</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted">Preço</label>
                                    <div class="fw-bold fs-5">R$ ${parseFloat(lote.preco).toFixed(2)}</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted">Status</label>
                                    <div><span class="badge bg-success">Ativo</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', loteHtml);
            });
        }

        function editarLote(index) {
            const lote = lotes[index];
            document.getElementById('edit-lote-index').value = index;
            document.getElementById('edit-lote-nome').value = lote.nome;
            document.getElementById('edit-lote-quantidade').value = lote.quantidade;
            document.getElementById('edit-lote-preco').value = lote.preco;
            
            const modal = new bootstrap.Modal(document.getElementById('editLoteModal'));
            modal.show();
        }

        function salvarEdicaoLote() {
            const index = parseInt(document.getElementById('edit-lote-index').value);
            const nome = document.getElementById('edit-lote-nome').value;
            const quantidade = parseInt(document.getElementById('edit-lote-quantidade').value);
            const preco = parseFloat(document.getElementById('edit-lote-preco').value) || 0;

            if (nome && quantidade > 0) {
                lotes[index].nome = nome;
                lotes[index].quantidade = quantidade;
                lotes[index].preco = preco;
                
                renderizarLotes();
                
                const modal = bootstrap.Modal.getInstance(document.getElementById('editLoteModal'));
                modal.hide();
                
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Lote atualizado com sucesso.',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        }

        function excluirLote(index) {
            Swal.fire({
                title: 'Excluir Lote?',
                text: 'Esta ação não pode ser desfeita.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    lotes.splice(index, 1);
                    renderizarLotes();
                    
                    Swal.fire({
                        title: 'Excluído!',
                        text: 'Lote excluído com sucesso.',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }

        function atualizarPreviewUrl() {
            const slug = document.getElementById('evento-slug').value;
            const preview = document.getElementById('url-preview');
            
            if (slug) {
                preview.textContent = `https://eventos.mathetes.com/${slug}`;
            } else {
                preview.textContent = 'https://eventos.mathetes.com/seu-evento-aqui';
            }
        }

        function gerarSlug(texto) {
            return texto
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        // Form submission
        document.getElementById('eventStep3Form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validar se há pelo menos um lote
            if (lotes.length === 0) {
                Swal.fire({
                    title: 'Atenção!',
                    text: 'É necessário criar pelo menos um lote para o evento.',
                    icon: 'warning'
                });
                return;
            }

            // Capturar conteúdo do editor
            const credenciamentoContent = credenciamentoEditor.root.innerHTML;
            document.getElementById('credenciamento-content').value = credenciamentoContent;

            // Coletar dados do formulário
            const formData = {
                lotes: lotes,
                credenciamento: credenciamentoContent,
                evento_slug: document.getElementById('evento-slug').value
            };

            // Salvar na sessão (simulado)
            console.log('Dados do Step 3:', formData);
            
            // Enviar para processamento final
            finalizarEvento(formData);
        });

        function finalizarEvento(step3Data) {
            // Salvar dados do Step 3 no localStorage
            localStorage.setItem('event_step3_data', JSON.stringify(step3Data));
            console.log('Dados do Step 3 salvos:', step3Data);
            
            Swal.fire({
                title: 'Sucesso!',
                text: 'Configurações salvas. Prosseguindo para revisão final...',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                // Redirecionar para Step 4
                window.location.href = 'events-create-step4.php';
            });
        }

        async function atualizarInformacoesUsuario() {
            try {
                // Tentar recuperar informações do usuário via API
                if (window.eventosAPI && window.eventosAPI.isLoggedIn()) {
                    const userInfo = await window.eventosAPI.getUserInfo();
                    if (userInfo) {
                        // Atualizar nome e email no organizador
                        const organizerSection = document.querySelector('.organizer-info h6');
                        const organizerEmail = document.querySelector('.organizer-info p');
                        
                        if (organizerSection && userInfo.name) {
                            organizerSection.textContent = userInfo.name;
                        }
                        if (organizerEmail && userInfo.email) {
                            organizerEmail.textContent = userInfo.email;
                        }
                    }
                }
            } catch (error) {
                console.log('Não foi possível recuperar informações do usuário via API:', error);
                // Usar dados padrão do PHP
            }
        }
        
        // Remover adição automática de lote - usuário deve adicionar manualmente
    </script>
    <!-- Quill Editor JavaScript -->
    <script src="assets/plugins/quill/quill.js"></script>
</body>
</html>