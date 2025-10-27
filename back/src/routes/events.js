const express = require('express');
const EventsController = require('../controllers/EventsController');
const { authenticateToken, requireRole } = require('../middleware/auth');

const router = express.Router();

// Aplicar autenticação a todas as rotas
router.use(authenticateToken);

// Rotas que qualquer usuário logado pode acessar
router.get('/stats', EventsController.stats);

// Rotas de eventos
router.get('/', EventsController.index);
router.get('/:id', EventsController.show);
router.post('/', requireRole(['master', 'client_admin', 'client_organizer']), EventsController.store);
router.put('/:id', requireRole(['master', 'client_admin', 'client_organizer']), EventsController.update);
router.delete('/:id', requireRole(['master', 'client_admin', 'client_organizer']), EventsController.destroy);

module.exports = router;