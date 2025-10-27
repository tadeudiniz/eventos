<?php include 'partials/html.php'; ?>

<head>
    <?php
    $title = "Criar Evento - Informações Básicas";
    include 'partials/title-meta.php';
    ?>
    
    <?php include 'partials/head-css.php'; ?>
    
    <!-- Quill editor css -->
    <link href="assets/plugins/quill/quill.core.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/quill/quill.bubble.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/quill/quill.snow.css" rel="stylesheet" type="text/css">
    
    <style>
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
        
        .event-type-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }
        
        .event-type-presencial {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .event-type-online {
            background: #d4edda;
            color: #155724;
        }
        
        .event-type-hibrido {
            background: #fff3cd;
            color: #856404;
        }
        
        .required {
            color: #dc3545;
        }
        
        .add-subtitle-link {
            font-size: 0.875rem;
            color: #4e73df;
            text-decoration: none;
            cursor: pointer;
        }
        
        .add-subtitle-link:hover {
            text-decoration: underline;
        }
        
        .social-media-section {
            display: none;
        }
        
        .social-input-group {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .social-prefix {
            background: #f8f9fc;
            border: 1px solid #ced4da;
            border-right: 0;
            border-radius: 0.375rem 0 0 0.375rem;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            color: #6c757d;
        }
        
        .social-input {
            border-radius: 0 0.375rem 0.375rem 0 !important;
        }
        
        .form-grid {
            display: grid;
            gap: 1rem;
        }
        
        .form-grid-2 {
            grid-template-columns: 1fr 1fr;
        }
        
        .form-grid-3 {
            grid-template-columns: 1fr 1fr 1fr;
        }
        
        @media (max-width: 768px) {
            .form-grid-2,
            .form-grid-3 {
                grid-template-columns: 1fr;
            }
        }
        
        .char-counter {
            font-size: 0.75rem;
            color: #6c757d;
            text-align: right;
            margin-top: 0.25rem;
        }
        
        .ql-editor {
            min-height: 120px;
        }
        
        .loading-spinner {
            display: none;
        }
        
        .btn-loading .loading-spinner {
            display: inline-block;
        }
        
        .btn-loading .btn-text {
            display: none;
        }
        
        /* Switch Toggle Styles */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
            margin-left: 10px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #4e73df;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        
        /* Map Container */
        .map-container {
            height: 300px;
            background: #f8f9fc;
            border: 1px solid #e3e6f0;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            margin-top: 10px;
        }
        
        .map-placeholder {
            text-align: center;
            padding: 2rem;
        }
        
        .map-placeholder i {
            font-size: 2rem;
            margin-bottom: 1rem;
            display: block;
        }
        
        .location-switch-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: 1rem;
            background: #f8f9fc;
            border-radius: 0.375rem;
            border: 1px solid #e3e6f0;
        }
        
        .location-switch-label {
            display: flex;
            align-items: center;
            margin: 0;
            font-weight: 500;
        }
        
        .location-notice {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 1rem;
            border-radius: 0.375rem;
            margin-top: 1rem;
        }
        
        .location-notice i {
            margin-right: 0.5rem;
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
                                    <div class="step-item completed">
                                        <div class="step-number">1</div>
                                        <span>Modalidade</span>
                                    </div>
                                    <div class="step-item active">
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

                    <!-- Form -->
                    <form id="eventForm" novalidate>
                        <!-- Event Type Display -->
                        <div class="row">
                            <div class="col-12">
                                <div id="event-type-display"></div>
                            </div>
                        </div>

                        <!-- Sobre o Evento -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="ti ti-info-circle me-2"></i>
                                        Sobre o evento
                                    </h5>
                                    
                                    <!-- Nome do Evento -->
                                    <div class="mb-3">
                                        <label for="eventTitle" class="form-label">
                                            Nome do evento <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="eventTitle" name="title" 
                                               placeholder="Digite o nome do evento" maxlength="255" required>
                                        <div class="char-counter">
                                            <span id="titleCounter">0</span>/255 caracteres
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <!-- Link para adicionar subtítulo -->
                                    <div class="mb-3">
                                        <a href="#" class="add-subtitle-link" id="addSubtitleLink">
                                            <i class="ti ti-plus me-1"></i>
                                            Adicionar subtítulo
                                        </a>
                                    </div>

                                    <!-- Subtítulo (oculto inicialmente) -->
                                    <div class="mb-3" id="subtitleSection" style="display: none;">
                                        <label for="eventSubtitle" class="form-label">Subtítulo</label>
                                        <input type="text" class="form-control" id="eventSubtitle" name="subtitle" 
                                               placeholder="Subtítulo do evento" maxlength="255">
                                        <div class="char-counter">
                                            <span id="subtitleCounter">0</span>/255 caracteres
                                        </div>
                                        <small class="text-muted">O subtítulo aparecerá logo abaixo do título principal</small>
                                    </div>

                                    <!-- Descrição -->
                                    <div class="mb-3">
                                        <label for="eventDescription" class="form-label">
                                            Descrição <span class="required">*</span>
                                        </label>
                                        <div id="snow-editor" style="height: 200px;">
                                            <p>Descreva os detalhes do seu evento aqui...</p>
                                            <p><br></p>
                                            <ul>
                                                <li>Informações sobre o conteúdo</li>
                                                <li>Palestrantes e agenda</li>
                                                <li>Benefícios para os participantes</li>
                                            </ul>
                                        </div>
                                        <input type="hidden" id="eventDescription" name="description">
                                        <div class="invalid-feedback"></div>
                                        <small class="text-muted">Use a barra de ferramentas acima para formatar sua descrição</small>
                                    </div>

                                    <!-- Categoria -->
                                    <div class="mb-3">
                                        <label for="eventCategory" class="form-label">
                                            Categoria do evento <span class="required">*</span>
                                        </label>
                                        <select class="form-select" id="eventCategory" name="category" required>
                                            <option value="">Selecione a categoria</option>
                                            <option value="congresso">Congresso, seminário, jornada</option>
                                            <option value="curso">Curso, workshop, oficina</option>
                                            <option value="esportivo">Esportivos</option>
                                            <option value="religioso">Religião & Espiritualidade</option>
                                            <option value="entretenimento">Entretenimento</option>
                                            <option value="feira">Feira, exposição</option>
                                            <option value="networking">Encontro, networking</option>
                                            <option value="outros">Outros</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <!-- Email para contato -->
                                    <div class="mb-3">
                                        <label for="eventEmail" class="form-label">
                                            E-mail para contato <span class="required">*</span>
                                        </label>
                                        <input type="email" class="form-control" id="eventEmail" name="contactEmail" 
                                               placeholder="contato@exemplo.com" required>
                                        <div class="invalid-feedback"></div>
                                        <small class="text-muted">E-mail que receberá as comunicações sobre o evento</small>
                                    </div>

                                    <!-- Redes Sociais -->
                                    <div class="mb-3">
                                        <a href="#" class="add-subtitle-link" id="addSocialMediaLink">
                                            <i class="ti ti-share me-1"></i>
                                            Adicionar Redes Sociais
                                        </a>
                                    </div>

                                    <div class="social-media-section" id="socialMediaSection">
                                        <div class="row">
                                            <!-- Twitter/X -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Perfil no X (Twitter)</label>
                                                <div class="social-input-group">
                                                    <span class="social-prefix">x.com/</span>
                                                    <input type="text" class="form-control social-input" 
                                                           name="twitter" placeholder="usuario" maxlength="60">
                                                </div>
                                            </div>

                                            <!-- Instagram -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Perfil no Instagram</label>
                                                <div class="social-input-group">
                                                    <span class="social-prefix">instagram.com/</span>
                                                    <input type="text" class="form-control social-input" 
                                                           name="instagram" placeholder="usuario" maxlength="80">
                                                </div>
                                            </div>

                                            <!-- Facebook -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Página no Facebook</label>
                                                <div class="social-input-group">
                                                    <span class="social-prefix">facebook.com/</span>
                                                    <input type="text" class="form-control social-input" 
                                                           name="facebook" placeholder="pagina" maxlength="80">
                                                </div>
                                                <small class="text-muted">Deve ser uma página, não um perfil</small>
                                            </div>

                                            <!-- LinkedIn -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">LinkedIn</label>
                                                <div class="social-input-group">
                                                    <span class="social-prefix">linkedin.com/</span>
                                                    <input type="text" class="form-control social-input" 
                                                           name="linkedin" placeholder="company/nome" maxlength="80">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data e Hora -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="ti ti-calendar me-2"></i>
                                        Data e Hora
                                    </h5>

                                    <div class="row">
                                        <!-- Início -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Início <span class="required">*</span></label>
                                            <div class="form-grid form-grid-2">
                                                <div>
                                                    <input type="date" class="form-control" id="startDate" 
                                                           name="startDate" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <input type="time" class="form-control" id="startTime" 
                                                           name="startTime" value="09:00" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Término -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Término <span class="required">*</span></label>
                                            <div class="form-grid form-grid-2">
                                                <div>
                                                    <input type="date" class="form-control" id="endDate" 
                                                           name="endDate" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <input type="time" class="form-control" id="endTime" 
                                                           name="endTime" value="18:00" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Timezone -->
                                    <div class="mb-3">
                                        <label for="timezone" class="form-label">Fuso Horário</label>
                                        <select class="form-select" id="timezone" name="timezone">
                                            <option value="America/Sao_Paulo">Brasília (GMT-3)</option>
                                            <option value="America/Manaus">Manaus (GMT-4)</option>
                                            <option value="America/Rio_Branco">Rio Branco (GMT-5)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Localização (condicional) -->
                        <div class="row" id="locationSection">
                            <div class="col-12">
                                <div class="form-section">
                                    <h5 class="form-section-title">
                                        <i class="ti ti-map-pin me-2"></i>
                                        Localização
                                    </h5>

                                    <!-- Presencial -->
                                    <div id="presencialLocation" style="display: none;">
                                        <!-- Switch para ativar mapa -->
                                        <div class="location-switch-container">
                                            <label class="location-switch-label">
                                                <i class="ti ti-map me-2"></i>
                                                Usar mapa interativo para selecionar localização
                                            </label>
                                            <label class="switch">
                                                <input type="checkbox" id="enableMapSwitch">
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <!-- Formulário de endereço -->
                                        <div id="addressForm">
                                            <div class="form-grid form-grid-2 mb-3">
                                                <div>
                                                    <label for="venue" class="form-label">
                                                        Local <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="venue" name="venue" 
                                                           placeholder="Ex: Hotel Mar, Centro de Convenções..." required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="zipCode" class="form-label">CEP</label>
                                                    <input type="text" class="form-control" id="zipCode" name="zipCode" 
                                                           placeholder="00000-000" data-mask="00000-000">
                                                </div>
                                            </div>

                                            <div class="form-grid form-grid-2 mb-3">
                                                <div>
                                                    <label for="address" class="form-label">
                                                        Endereço <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="address" name="address" 
                                                           placeholder="Rua, número" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="neighborhood" class="form-label">Bairro</label>
                                                    <input type="text" class="form-control" id="neighborhood" name="neighborhood" 
                                                           placeholder="Bairro">
                                                </div>
                                            </div>

                                            <div class="form-grid form-grid-3 mb-3">
                                                <div>
                                                    <label for="city" class="form-label">
                                                        Cidade <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="city" name="city" 
                                                           placeholder="Cidade" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="state" class="form-label">
                                                        Estado <span class="required">*</span>
                                                    </label>
                                                    <select class="form-select" id="state" name="state" required>
                                                        <option value="">Selecione</option>
                                                        <option value="AC">Acre</option>
                                                        <option value="AL">Alagoas</option>
                                                        <option value="AP">Amapá</option>
                                                        <option value="AM">Amazonas</option>
                                                        <option value="BA">Bahia</option>
                                                        <option value="CE">Ceará</option>
                                                        <option value="DF">Distrito Federal</option>
                                                        <option value="ES">Espírito Santo</option>
                                                        <option value="GO">Goiás</option>
                                                        <option value="MA">Maranhão</option>
                                                        <option value="MT">Mato Grosso</option>
                                                        <option value="MS">Mato Grosso do Sul</option>
                                                        <option value="MG">Minas Gerais</option>
                                                        <option value="PA">Pará</option>
                                                        <option value="PB">Paraíba</option>
                                                        <option value="PR">Paraná</option>
                                                        <option value="PE">Pernambuco</option>
                                                        <option value="PI">Piauí</option>
                                                        <option value="RJ">Rio de Janeiro</option>
                                                        <option value="RN">Rio Grande do Norte</option>
                                                        <option value="RS">Rio Grande do Sul</option>
                                                        <option value="RO">Rondônia</option>
                                                        <option value="RR">Roraima</option>
                                                        <option value="SC">Santa Catarina</option>
                                                        <option value="SP">São Paulo</option>
                                                        <option value="SE">Sergipe</option>
                                                        <option value="TO">Tocantins</option>
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="country" class="form-label">País</label>
                                                    <select class="form-select" id="country" name="country">
                                                        <option value="BR" selected>Brasil</option>
                                                        <option value="US">Estados Unidos</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CO">Colômbia</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="UY">Uruguai</option>
                                                        <option value="PY">Paraguai</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Container do Mapa -->
                                        <div id="mapContainer" style="display: none;">
                                            <div class="map-container">
                                                <div class="map-placeholder">
                                                    <i class="ti ti-map-pin"></i>
                                                    <p><strong>Mapa Interativo</strong></p>
                                                    <p>Clique no mapa para selecionar a localização do evento</p>
                                                    <small class="text-muted">O endereço será preenchido automaticamente</small>
                                                </div>
                                            </div>
                                            <input type="hidden" id="latitude" name="latitude">
                                            <input type="hidden" id="longitude" name="longitude">
                                        </div>
                                    </div>

                                    <!-- Online -->
                                    <div id="onlineLocation" style="display: none;">
                                        <div class="location-notice">
                                            <i class="ti ti-info-circle"></i>
                                            <strong>Evento Online:</strong> Você pode configurar o link de transmissão acessando o menu "Transmissão" no painel do evento.
                                        </div>
                                    </div>

                                    <!-- Híbrido -->
                                    <div id="hibridoLocation" style="display: none;">
                                        <!-- Switch para ativar mapa -->
                                        <div class="location-switch-container">
                                            <label class="location-switch-label">
                                                <i class="ti ti-map me-2"></i>
                                                Usar mapa interativo para selecionar localização
                                            </label>
                                            <label class="switch">
                                                <input type="checkbox" id="enableMapSwitchHybrid">
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                        <!-- Formulário de endereço para híbrido -->
                                        <div id="addressFormHybrid">
                                            <h6 class="mb-3"><i class="ti ti-building me-2"></i>Local Físico</h6>
                                            <div class="form-grid form-grid-2 mb-3">
                                                <div>
                                                    <label for="venueHybrid" class="form-label">
                                                        Local <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="venueHybrid" name="venueHybrid" 
                                                           placeholder="Ex: Hotel Mar, Centro de Convenções..." required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="zipCodeHybrid" class="form-label">CEP</label>
                                                    <input type="text" class="form-control" id="zipCodeHybrid" name="zipCodeHybrid" 
                                                           placeholder="00000-000" data-mask="00000-000">
                                                </div>
                                            </div>

                                            <div class="form-grid form-grid-2 mb-3">
                                                <div>
                                                    <label for="addressHybrid" class="form-label">
                                                        Endereço <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="addressHybrid" name="addressHybrid" 
                                                           placeholder="Rua, número" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="neighborhoodHybrid" class="form-label">Bairro</label>
                                                    <input type="text" class="form-control" id="neighborhoodHybrid" name="neighborhoodHybrid" 
                                                           placeholder="Bairro">
                                                </div>
                                            </div>

                                            <div class="form-grid form-grid-3 mb-3">
                                                <div>
                                                    <label for="cityHybrid" class="form-label">
                                                        Cidade <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="cityHybrid" name="cityHybrid" 
                                                           placeholder="Cidade" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="stateHybrid" class="form-label">
                                                        Estado <span class="required">*</span>
                                                    </label>
                                                    <select class="form-select" id="stateHybrid" name="stateHybrid" required>
                                                        <option value="">Selecione</option>
                                                        <option value="AC">Acre</option>
                                                        <option value="AL">Alagoas</option>
                                                        <option value="AP">Amapá</option>
                                                        <option value="AM">Amazonas</option>
                                                        <option value="BA">Bahia</option>
                                                        <option value="CE">Ceará</option>
                                                        <option value="DF">Distrito Federal</option>
                                                        <option value="ES">Espírito Santo</option>
                                                        <option value="GO">Goiás</option>
                                                        <option value="MA">Maranhão</option>
                                                        <option value="MT">Mato Grosso</option>
                                                        <option value="MS">Mato Grosso do Sul</option>
                                                        <option value="MG">Minas Gerais</option>
                                                        <option value="PA">Pará</option>
                                                        <option value="PB">Paraíba</option>
                                                        <option value="PR">Paraná</option>
                                                        <option value="PE">Pernambuco</option>
                                                        <option value="PI">Piauí</option>
                                                        <option value="RJ">Rio de Janeiro</option>
                                                        <option value="RN">Rio Grande do Norte</option>
                                                        <option value="RS">Rio Grande do Sul</option>
                                                        <option value="RO">Rondônia</option>
                                                        <option value="RR">Roraima</option>
                                                        <option value="SC">Santa Catarina</option>
                                                        <option value="SP">São Paulo</option>
                                                        <option value="SE">Sergipe</option>
                                                        <option value="TO">Tocantins</option>
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div>
                                                    <label for="countryHybrid" class="form-label">País</label>
                                                    <select class="form-select" id="countryHybrid" name="countryHybrid">
                                                        <option value="BR" selected>Brasil</option>
                                                        <option value="US">Estados Unidos</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CO">Colômbia</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="UY">Uruguai</option>
                                                        <option value="PY">Paraguai</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Container do Mapa para híbrido -->
                                        <div id="mapContainerHybrid" style="display: none;">
                                            <div class="map-container">
                                                <div class="map-placeholder">
                                                    <i class="ti ti-map-pin"></i>
                                                    <p><strong>Mapa Interativo</strong></p>
                                                    <p>Clique no mapa para selecionar a localização física do evento</p>
                                                    <small class="text-muted">O endereço será preenchido automaticamente</small>
                                                </div>
                                            </div>
                                            <input type="hidden" id="latitudeHybrid" name="latitudeHybrid">
                                            <input type="hidden" id="longitudeHybrid" name="longitudeHybrid">
                                        </div>

                                        <!-- Aviso sobre transmissão online -->
                                        <div class="location-notice">
                                            <i class="ti ti-info-circle"></i>
                                            <strong>Transmissão Online:</strong> Você pode configurar o link de transmissão acessando o menu "Transmissão" no painel do evento.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-section">
                                    <div class="d-flex justify-content-between">
                                        <a href="events-create-step1.php" class="btn btn-secondary">
                                            <i class="ti ti-arrow-left me-1"></i>
                                            Voltar
                                        </a>
                                        <button type="submit" class="btn btn-primary" id="btnNext">
                                            <span class="loading-spinner spinner-border spinner-border-sm me-1"></span>
                                            <span class="btn-text">
                                                Continuar
                                                <i class="ti ti-arrow-right ms-1"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
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

    <script>
        let quill;
        let eventType = 'presencial'; // Default
        
        // Verificação de autenticação e inicialização
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🔄 Events-create-step2.php carregado');
            
            // Verificar tipo do evento na URL
            const urlParams = new URLSearchParams(window.location.search);
            const typeParam = urlParams.get('type');
            
            if (typeParam) {
                eventType = typeParam;
                console.log('Tipo de evento recebido:', eventType);
            }
            
            // Função para aguardar API client
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
            
            waitForAPIClient(function() {
                // Verificar autenticação
                if (!window.eventosAPI.isLoggedIn()) {
                    console.warn('⚠️ Usuário não está logado');
                    // Mostrar aviso mas permitir acesso à página
                    showAuthWarning();
                } else {
                    console.log('✅ Usuário está logado');
                }
                
                // Inicializar página independente do status de login
                initializePage();
            });
        });
        
        function initializePage() {
            // Mostrar tipo de evento
            displayEventType();
            
            // Configurar editor
            initializeQuillEditor();
            
            // Configurar máscaras
            initializeInputMasks();
            
            // Configurar eventos
            setupEventListeners();
            
            // Configurar localização baseada no tipo
            setupLocationFields();
            
            // Carregar dados do usuário
            loadUserData();
            
            console.log('✅ Página inicializada com sucesso');
        }
        
        function displayEventType() {
            const typeDisplay = document.getElementById('event-type-display');
            const typeLabels = {
                'presencial': 'Presencial',
                'online': 'Online',
                'hibrido': 'Híbrido'
            };
            
            const typeClasses = {
                'presencial': 'event-type-presencial',
                'online': 'event-type-online',
                'hibrido': 'event-type-hibrido'
            };
            
            const typeIcons = {
                'presencial': 'ti-building',
                'online': 'ti-device-desktop',
                'hibrido': 'ti-device-laptop'
            };
            
            typeDisplay.innerHTML = `
                <div class="event-type-badge ${typeClasses[eventType]}">
                    <i class="ti ${typeIcons[eventType]} me-2"></i>
                    Evento ${typeLabels[eventType]}
                </div>
            `;
        }
        
        function initializeQuillEditor() {
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
            
            quill = new Quill('#snow-editor', {
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
            
            console.log('Quill inicializado:', quill);
            
            // Sincronizar com input oculto
            quill.on('text-change', function() {
                const description = quill.root.innerHTML;
                document.getElementById('eventDescription').value = description;
            });
        }
        
        function initializeInputMasks() {
            // Máscara para CEP
            const cepInput = document.getElementById('zipCode');
            if (cepInput) {
                Inputmask('99999-999').mask(cepInput);
            }
        }
        
        function setupEventListeners() {
            // Contador de caracteres
            setupCharacterCounters();
            
            // Adicionar subtítulo
            document.getElementById('addSubtitleLink').addEventListener('click', function(e) {
                e.preventDefault();
                const subtitleSection = document.getElementById('subtitleSection');
                subtitleSection.style.display = 'block';
                this.style.display = 'none';
                document.getElementById('eventSubtitle').focus();
            });
            
            // Adicionar redes sociais
            document.getElementById('addSocialMediaLink').addEventListener('click', function(e) {
                e.preventDefault();
                const socialSection = document.getElementById('socialMediaSection');
                socialSection.style.display = 'block';
                this.style.display = 'none';
            });
            
            // Validação de datas
            setupDateValidation();
            
            // Switches do mapa
            setupMapSwitches();
            
            // Submit do formulário
            document.getElementById('eventForm').addEventListener('submit', handleFormSubmit);
            
            // Auto-completar CEP
            document.getElementById('zipCode').addEventListener('blur', handleCepLookup);
        }
        
        function setupCharacterCounters() {
            const inputs = [
                { input: 'eventTitle', counter: 'titleCounter', max: 255 },
                { input: 'eventSubtitle', counter: 'subtitleCounter', max: 255 }
            ];
            
            inputs.forEach(item => {
                const input = document.getElementById(item.input);
                const counter = document.getElementById(item.counter);
                
                if (input && counter) {
                    input.addEventListener('input', function() {
                        counter.textContent = this.value.length;
                        
                        if (this.value.length > item.max * 0.9) {
                            counter.style.color = '#dc3545';
                        } else {
                            counter.style.color = '#6c757d';
                        }
                    });
                }
            });
        }
        
        function setupLocationFields() {
            const locationSections = {
                'presencial': 'presencialLocation',
                'online': 'onlineLocation',
                'hibrido': 'hibridoLocation'
            };
            
            // Ocultar todas as seções
            Object.values(locationSections).forEach(sectionId => {
                const section = document.getElementById(sectionId);
                if (section) section.style.display = 'none';
            });
            
            // Mostrar seção correta
            const currentSection = document.getElementById(locationSections[eventType]);
            if (currentSection) {
                currentSection.style.display = 'block';
            }
            
            // Para eventos híbridos, também mostrar campos presenciais
            if (eventType === 'hibrido') {
                const presencialSection = document.getElementById('presencialLocation');
                if (presencialSection) presencialSection.style.display = 'block';
            }
        }
        
        function setupDateValidation() {
            const startDate = document.getElementById('startDate');
            const endDate = document.getElementById('endDate');
            const startTime = document.getElementById('startTime');
            const endTime = document.getElementById('endTime');
            
            // Data mínima é hoje
            const today = new Date().toISOString().split('T')[0];
            startDate.min = today;
            endDate.min = today;
            
            // Quando data de início muda, ajustar data de fim
            startDate.addEventListener('change', function() {
                endDate.min = this.value;
                if (endDate.value && endDate.value < this.value) {
                    endDate.value = this.value;
                }
            });
            
            // Validar horários se for no mesmo dia
            function validateTimes() {
                if (startDate.value === endDate.value) {
                    if (startTime.value >= endTime.value) {
                        endTime.setCustomValidity('Horário de término deve ser posterior ao início');
                    } else {
                        endTime.setCustomValidity('');
                    }
                } else {
                    endTime.setCustomValidity('');
                }
            }
            
            [startDate, endDate, startTime, endTime].forEach(input => {
                input.addEventListener('change', validateTimes);
            });
        }
        
        function setupMapSwitches() {
            // Switch para eventos presenciais
            const enableMapSwitch = document.getElementById('enableMapSwitch');
            const mapContainer = document.getElementById('mapContainer');
            const addressForm = document.getElementById('addressForm');
            
            if (enableMapSwitch) {
                enableMapSwitch.addEventListener('change', function() {
                    if (this.checked) {
                        mapContainer.style.display = 'block';
                        addressForm.style.display = 'none';
                        // TODO: Inicializar mapa aqui
                        console.log('🗺️ Mapa ativado para evento presencial');
                    } else {
                        mapContainer.style.display = 'none';
                        addressForm.style.display = 'block';
                        // Limpar coordenadas
                        document.getElementById('latitude').value = '';
                        document.getElementById('longitude').value = '';
                    }
                });
            }
            
            // Switch para eventos híbridos
            const enableMapSwitchHybrid = document.getElementById('enableMapSwitchHybrid');
            const mapContainerHybrid = document.getElementById('mapContainerHybrid');
            const addressFormHybrid = document.getElementById('addressFormHybrid');
            
            if (enableMapSwitchHybrid) {
                enableMapSwitchHybrid.addEventListener('change', function() {
                    if (this.checked) {
                        mapContainerHybrid.style.display = 'block';
                        addressFormHybrid.style.display = 'none';
                        // TODO: Inicializar mapa aqui
                        console.log('🗺️ Mapa ativado para evento híbrido');
                    } else {
                        mapContainerHybrid.style.display = 'none';
                        addressFormHybrid.style.display = 'block';
                        // Limpar coordenadas
                        document.getElementById('latitudeHybrid').value = '';
                        document.getElementById('longitudeHybrid').value = '';
                    }
                });
            }
        }
        
        function initializeMap(containerId, latInputId, lngInputId) {
            // Placeholder para inicialização do mapa
            // Esta função pode ser expandida para integrar com Google Maps, Leaflet, etc.
            console.log(`🗺️ Inicializando mapa no container: ${containerId}`);
            
            // Exemplo de estrutura para Google Maps ou Leaflet
            // const mapContainer = document.getElementById(containerId);
            // const map = new google.maps.Map(mapContainer, {
            //     center: { lat: -23.550520, lng: -46.633308 }, // São Paulo
            //     zoom: 13
            // });
            
            // map.addListener('click', function(e) {
            //     document.getElementById(latInputId).value = e.latLng.lat();
            //     document.getElementById(lngInputId).value = e.latLng.lng();
            //     // Atualizar endereço via geocoding reverso
            //     reverseGeocode(e.latLng.lat(), e.latLng.lng());
            // });
        }
        
        function reverseGeocode(lat, lng) {
            // Placeholder para geocoding reverso
            // Esta função converteria coordenadas em endereço
            console.log(`📍 Geocoding reverso para: ${lat}, ${lng}`);
            
            // Exemplo com Google Maps Geocoding API
            // const geocoder = new google.maps.Geocoder();
            // geocoder.geocode({ location: { lat: lat, lng: lng } }, function(results, status) {
            //     if (status === 'OK' && results[0]) {
            //         // Preencher campos de endereço automaticamente
            //         fillAddressFields(results[0]);
            //     }
            // });
        }
        
        function loadUserData() {
            if (window.eventosAPI && window.eventosAPI.isLoggedIn()) {
                const user = window.eventosAPI.getCurrentUser();
                if (user && user.email) {
                    document.getElementById('eventEmail').value = user.email;
                }
            } else {
                console.log('ℹ️ Usuário não logado - campos não preenchidos automaticamente');
            }
        }
        
        async function handleCepLookup() {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length === 8) {
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const data = await response.json();
                    
                    if (!data.erro) {
                        document.getElementById('address').value = data.logradouro;
                        document.getElementById('neighborhood').value = data.bairro;
                        document.getElementById('city').value = data.localidade;
                        document.getElementById('state').value = data.uf;
                    }
                } catch (error) {
                    console.log('Erro ao buscar CEP:', error);
                }
            }
        }
        
        async function handleFormSubmit(e) {
            e.preventDefault();
            
            const btnNext = document.getElementById('btnNext');
            btnNext.classList.add('btn-loading');  
            btnNext.disabled = true;
            
            try {
                // Sincronizar descrição do Quill com campo hidden antes da validação
                if (quill) {
                    const description = quill.root.innerHTML;
                    document.getElementById('eventDescription').value = description;
                }
                
                // Validar formulário
                if (!validateForm()) {
                    throw new Error('Por favor, corrija os erros no formulário');
                }
                
                // Coletar dados do formulário
                const formData = collectFormData();
                
                console.log('Dados do evento:', formData);
                
                // Por enquanto, simular salvamento
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Salvar dados na sessão (simulado via localStorage temporariamente)
                localStorage.setItem('event_step2_data', JSON.stringify(formData));
                console.log('Dados salvos no localStorage:', formData);
                
                // Sucesso
                await Swal.fire({
                    title: 'Sucesso!',
                    text: 'Informações básicas salvas. Continuando para configurações...',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
                
                console.log('Redirecionando para Step 3...');
                // Redirecionar para próxima etapa
                window.location.href = 'events-create-step3.php';
                
            } catch (error) {
                console.error('Erro ao salvar:', error);
                
                await Swal.fire({
                    title: 'Erro',
                    text: error.message || 'Erro ao salvar as informações',
                    icon: 'error'
                });
            } finally {
                btnNext.classList.remove('btn-loading');
                btnNext.disabled = false;
            }
        }
        
        function validateForm() {
            const form = document.getElementById('eventForm');
            let isValid = true;
            
            // Validar apenas campos obrigatórios que estão visíveis
            const visibleRequiredInputs = form.querySelectorAll('[required]');
            
            visibleRequiredInputs.forEach(input => {
                // Pular validação do campo hidden de descrição (será validado separadamente)
                if (input.id === 'eventDescription') {
                    return;
                }
                
                // Verificar se o campo está visível (não está em uma div oculta)
                const isVisible = input.offsetParent !== null;
                
                if (isVisible) {
                    if (!input.value || !input.value.trim()) {
                        showInputError(input, 'Este campo é obrigatório');
                        isValid = false;
                        console.log('Campo obrigatório vazio:', input.name || input.id);
                    } else {
                        clearInputError(input);
                    }
                } else {
                    // Limpar erro de campos ocultos
                    clearInputError(input);
                }
            });
            
            // Validar descrição do Quill
            if (quill) {
                const description = quill.getText().trim();
                console.log('Descrição do Quill:', description);
                if (!description) {
                    showError('A descrição do evento é obrigatória');
                    isValid = false;
                    console.log('Descrição vazia');
                }
            } else {
                console.log('Quill não inicializado');
                showError('Editor de texto não foi inicializado corretamente');
                isValid = false;
            }
            
            // Validar datas
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const startTime = document.getElementById('startTime').value;
            const endTime = document.getElementById('endTime').value;
            
            if (startDate === endDate && startTime >= endTime) {
                showInputError(document.getElementById('endTime'), 'Horário deve ser posterior ao início');
                isValid = false;
                console.log('Erro de horário');
            }
            
            // Validar campos específicos por tipo de evento
            if (eventType === 'presencial') {
                const venue = document.getElementById('venue');
                const address = document.getElementById('address');
                const city = document.getElementById('city');
                const state = document.getElementById('state');
                
                if (!venue.value.trim()) {
                    showInputError(venue, 'Local é obrigatório para eventos presenciais');
                    isValid = false;
                }
                if (!address.value.trim()) {
                    showInputError(address, 'Endereço é obrigatório para eventos presenciais');
                    isValid = false;
                }
                if (!city.value.trim()) {
                    showInputError(city, 'Cidade é obrigatória para eventos presenciais');
                    isValid = false;
                }
                if (!state.value) {
                    showInputError(state, 'Estado é obrigatório para eventos presenciais');
                    isValid = false;
                }
            }
            
            if (eventType === 'hibrido') {
                const venueHybrid = document.getElementById('venueHybrid');
                const addressHybrid = document.getElementById('addressHybrid');
                const cityHybrid = document.getElementById('cityHybrid');
                const stateHybrid = document.getElementById('stateHybrid');
                
                if (!venueHybrid.value.trim()) {
                    showInputError(venueHybrid, 'Local é obrigatório para eventos híbridos');
                    isValid = false;
                }
                if (!addressHybrid.value.trim()) {
                    showInputError(addressHybrid, 'Endereço é obrigatório para eventos híbridos');
                    isValid = false;
                }
                if (!cityHybrid.value.trim()) {
                    showInputError(cityHybrid, 'Cidade é obrigatória para eventos híbridos');
                    isValid = false;
                }
                if (!stateHybrid.value) {
                    showInputError(stateHybrid, 'Estado é obrigatório para eventos híbridos');
                    isValid = false;
                }
            }
            
            console.log('Validação concluída, isValid:', isValid);
            return isValid;
        }
        
        function collectFormData() {
            const form = document.getElementById('eventForm');
            const formData = new FormData(form);
            
            // Adicionar dados específicos
            const data = {
                type: eventType,
                title: formData.get('title'),
                subtitle: formData.get('subtitle'),
                description: quill.root.innerHTML,
                category: formData.get('category'),
                contactEmail: formData.get('contactEmail'),
                startDate: formData.get('startDate'),
                startTime: formData.get('startTime'),
                endDate: formData.get('endDate'),
                endTime: formData.get('endTime'),
                timezone: formData.get('timezone'),
                socialMedia: {
                    twitter: formData.get('twitter'),
                    instagram: formData.get('instagram'),
                    facebook: formData.get('facebook'),
                    linkedin: formData.get('linkedin')
                }
            };
            
            // Adicionar dados de localização se for presencial/híbrido
            if (eventType === 'presencial') {
                data.location = {
                    venue: formData.get('venue'),
                    address: formData.get('address'),
                    neighborhood: formData.get('neighborhood'),
                    city: formData.get('city'),
                    state: formData.get('state'),
                    zipCode: formData.get('zipCode'),
                    country: formData.get('country')
                };
            } else if (eventType === 'hibrido') {
                data.location = {
                    venue: formData.get('venueHybrid'),
                    address: formData.get('addressHybrid'),
                    neighborhood: formData.get('neighborhoodHybrid'),
                    city: formData.get('cityHybrid'),
                    state: formData.get('stateHybrid'),
                    zipCode: formData.get('zipCodeHybrid'),
                    country: formData.get('countryHybrid')
                };
                // Adicionar URL da reunião online
                data.meetingUrl = formData.get('meetingUrl');
            }
            
            // Adicionar URL da reunião para eventos online
            if (eventType === 'online') {
                data.meetingUrl = formData.get('meetingUrl');
            }
            
            return data;
        }
        
        function showInputError(input, message) {
            input.classList.add('is-invalid');
            const feedback = input.parentNode.querySelector('.invalid-feedback');
            if (feedback) {
                feedback.textContent = message;
            }
        }
        
        function clearInputError(input) {
            input.classList.remove('is-invalid');
        }
        
        function showError(message, redirect = false) {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger alert-dismissible fade show position-fixed';
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
            alertDiv.innerHTML = `
                <i class="ti ti-alert-circle me-2"></i>
                <strong>Erro:</strong> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alertDiv);
            
            if (redirect) {
                setTimeout(() => {
                    window.location.href = 'auth-sign-in.php';
                }, 2000);
            }
        }
        
        function showAuthWarning() {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-warning alert-dismissible fade show position-fixed';
            alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 450px;';
            alertDiv.innerHTML = `
                <i class="ti ti-info-circle me-2"></i>
                <strong>Login Recomendado:</strong> Para salvar o evento, você precisará fazer login. 
                <a href="auth-sign-in.php" class="alert-link">Fazer login agora</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(alertDiv);
            
            // Auto-remover após 10 segundos
            setTimeout(() => {
                alertDiv.remove();
            }, 10000);
        }
    </script>
    
    <!-- Quill Editor JavaScript -->
    <script src="assets/plugins/quill/quill.js"></script>
</body>
</html>