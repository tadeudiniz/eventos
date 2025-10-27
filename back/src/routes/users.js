const express = require('express');
const UsersController = require('../controllers/UsersController');
const { authenticateToken, requireRole } = require('../middleware/auth');

const router = express.Router();

// Aplicar autenticação a todas as rotas
router.use(authenticateToken);

// Rotas que qualquer usuário logado pode acessar
router.get('/stats', UsersController.stats);

// Rotas que requerem permissões específicas
router.get('/', requireRole(['master', 'client_admin', 'client_organizer']), UsersController.index);
router.get('/:id', requireRole(['master', 'client_admin', 'client_organizer']), UsersController.show);
router.post('/', requireRole(['master', 'client_admin']), UsersController.store);
router.put('/:id', requireRole(['master', 'client_admin']), UsersController.update);
router.delete('/:id', requireRole(['master', 'client_admin']), UsersController.destroy);

module.exports = router;