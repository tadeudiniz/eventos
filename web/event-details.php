<?php include('partials/html.php'); ?>
<?php $title = "Detalhes do Evento"; include('partials/title-meta.php'); ?>
<?php include('partials/head-css.php'); ?>
<body>
<div class="wrapper">
    <?php include('partials/menu.php'); ?>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <?php $subtitle = "Evento"; $title = "Detalhes do Evento"; include('partials/page-title.php'); ?>
                <div id="loading-state" class="text-center my-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <div>Carregando evento...</div>
                </div>
                <div id="event-details" style="display:none;">
                    <div class="card mb-4 shadow-sm border-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <span class="me-2"><i class="ti ti-calendar-event fs-2 text-primary"></i></span>
                                <h3 id="event-title" class="mb-0"></h3>
                                <span id="event-status" class="badge rounded-pill ms-3 px-3 py-2"></span>
                            </div>
                            <h5 id="event-subtitle" class="text-muted mb-3"></h5>
                            <div class="mb-3">
                                <span id="event-type" class="badge bg-info text-dark me-2"></span>
                                <span class="badge bg-secondary"><i class="ti ti-users me-1"></i> <span id="event-participants"></span> participantes</span>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-light text-dark border me-2"><i class="ti ti-clock-hour-4 me-1"></i> Início: <span id="event-start"></span></span>
                                <span class="badge bg-light text-dark border"><i class="ti ti-clock-hour-10 me-1"></i> Fim: <span id="event-end"></span></span>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-light text-dark border"><i class="ti ti-map-pin me-1"></i> <span id="event-location"></span></span>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-light text-dark border"><i class="ti ti-user me-1"></i> Organizador: <span id="event-organizer"></span></span>
                            </div>
                            <hr>
                            <div class="mb-2">
                                <div id="share-url-group" style="display:none;">
                                    <label class="form-label fw-semibold"><i class="ti ti-share me-1"></i> Compartilhe</label>
                                    <div class="input-group">
                                        <span id="copy-success-msg" style="display:none; margin-left:10px; padding:7px; color:#28a745; font-weight:500;">Copiado!</span>
                                        <input type="text" class="form-control" id="event-url" readonly value="">
                                        <button class="btn btn-outline-primary" type="button" id="copy-url-btn" title="Copiar URL">
                                            <i class="ti ti-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="empty-state" class="alert alert-warning text-center my-5" style="display:none;">
                    Evento não encontrado.
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>
<?php include 'partials/customizer.php'; ?>
<?php include 'partials/footer-scripts.php'; ?>
<script src="assets/js/api-client.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        const eventId = params.get('id');
        if (!eventId) {
            document.getElementById('loading-state').style.display = 'none';
            document.getElementById('empty-state').style.display = 'block';
            return;
        }
        waitForAPIClient(function() {
            loadEventDetails(eventId);
        });
    });
    function waitForAPIClient(callback, attempts = 0) {
        if (window.eventosAPI) {
            callback();
        } else if (attempts < 20) {
            setTimeout(() => waitForAPIClient(callback, attempts + 1), 200);
        } else {
            document.getElementById('loading-state').style.display = 'none';
            document.getElementById('empty-state').style.display = 'block';
        }
    }
    async function loadEventDetails(id) {
        try {
            const response = await window.eventosAPI.getEvent(id);
            console.log('🔎 Evento retornado:', response);
            if (response && response.data) {
                const event = response.data.event || response.data;
                console.log('🔎 Dados do evento:', event);
                document.getElementById('event-title').textContent = event.title || event.nome || '';
                document.getElementById('event-subtitle').textContent = event.subtitle || event.subtitulo || '';
                document.getElementById('event-type').textContent = formatEventType(event.type || event.tipo);
                document.getElementById('event-type').className = 'event-type-badge type-' + (event.type || event.tipo);
                document.getElementById('event-status').textContent = '- ' + formatEventStatus(event.status || event.situacao);
                document.getElementById('event-status').className = 'event-status-badge status-' + (event.status || event.situacao);
                document.getElementById('event-start').textContent = formatEventDate(event.startDate || event.dataInicio, event.startTime || event.horaInicio);
                document.getElementById('event-end').textContent = formatEventDate(event.endDate || event.dataFim, event.endTime || event.horaFim);
                document.getElementById('event-location').textContent = formatEventLocation(event);
                document.getElementById('event-participants').textContent = event.participants || event.participantes || 0;
                document.getElementById('event-organizer').textContent = (event.organizer?.name || event.organizador?.nome || '');
                // Exibir apenas a URL cadastrada do evento
                let url = '';
                if (event.slug) {
                    // Remove numeração final do slug (ex: -1761587221900)
                    const slugBase = event.slug.replace(/-\d{10,}$/,'');
                    url = `https://eventos.mathetes.com/${slugBase}`;
                } else {
                    url = event.url || event.link || event.doityUrl || '';
                }
                if (url) {
                    document.getElementById('event-url').value = url;
                    document.getElementById('share-url-group').style.display = 'block';
                } else {
                    document.getElementById('share-url-group').style.display = 'none';
                }
                document.getElementById('loading-state').style.display = 'none';
                document.getElementById('event-details').style.display = 'block';
                // Função copiar URL (deve ser registrada após exibir os detalhes)
                const copyBtn = document.getElementById('copy-url-btn');
                if (copyBtn) {
                    copyBtn.onclick = function() {
                        const urlInput = document.getElementById('event-url');
                        urlInput.select();
                        urlInput.setSelectionRange(0, urlInput.value.length);
                        try {
                            const successful = document.execCommand('copy');
                            if (successful) {
                                copyBtn.classList.add('btn-success');
                                copyBtn.title = 'Copiado!';
                                // Exibe mensagem de sucesso
                                const msg = document.getElementById('copy-success-msg');
                                if (msg) {
                                    msg.style.display = 'inline';
                                    setTimeout(() => {
                                        msg.style.display = 'none';
                                        copyBtn.classList.remove('btn-success');
                                        copyBtn.title = 'Copiar URL';
                                    }, 1200);
                                } else {
                                    setTimeout(() => {
                                        copyBtn.classList.remove('btn-success');
                                        copyBtn.title = 'Copiar URL';
                                    }, 1000);
                                }
                            }
                        } catch (err) {
                            alert('Não foi possível copiar.');
                        }
                    };
                }
            } else {
                document.getElementById('loading-state').style.display = 'none';
                document.getElementById('empty-state').style.display = 'block';
            }
        } catch (error) {
            document.getElementById('loading-state').style.display = 'none';
            document.getElementById('empty-state').style.display = 'block';
        }
    }
    function formatEventType(type) {
        const types = { presencial: 'Presencial', online: 'Online', hibrido: 'Híbrido' };
        return types[type] || type;
    }
    function formatEventStatus(status) {
        const statuses = { published: 'Publicado', draft: 'Rascunho', cancelled: 'Cancelado', active: 'Ativo', completed: 'Finalizado' };
        return statuses[status] || status;
    }
    function formatEventDate(date, time) {
        if (!date) return '';
        let dateObj;
        if (date instanceof Date) {
            dateObj = date;
        } else if (typeof date === 'string' && date.includes('T')) {
            dateObj = new Date(date);
        } else if (typeof date === 'string') {
            dateObj = new Date(date + 'T' + (time || '00:00'));
        } else {
            return date;
        }
        if (isNaN(dateObj.getTime())) return date;
        return dateObj.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' }) + (time ? ' às ' + time : '');
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
</script>
</body>
</html>
