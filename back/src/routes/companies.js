const express = require('express');
const CompaniesController = require('../controllers/CompaniesController');
const { authenticateToken, requireRole } = require('../middleware/auth');

const router = express.Router();

// Aplicar autenticação a todas as rotas
router.use(authenticateToken);

// Rotas que apenas master pode acessar
router.get('/', requireRole(['master']), CompaniesController.index);
router.post('/', requireRole(['master']), CompaniesController.store);
router.delete('/:id', requireRole(['master']), CompaniesController.destroy);
router.get('/stats', requireRole(['master']), CompaniesController.stats);

// Rotas que master e admins da empresa podem acessar
router.get('/:id', requireRole(['master', 'client_admin']), CompaniesController.show);
router.put('/:id', requireRole(['master', 'client_admin']), CompaniesController.update);

module.exports = router;