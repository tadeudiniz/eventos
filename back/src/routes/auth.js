const express = require('express');
const AuthController = require('../controllers/AuthController');
const { authenticateToken } = require('../middleware/auth');

const router = express.Router();

// Rotas públicas
router.post('/register', AuthController.register);
router.post('/login', AuthController.login);

// Rotas protegidas
router.use(authenticateToken); // Aplicar middleware a todas as rotas abaixo

router.post('/logout', AuthController.logout);
router.get('/verify', AuthController.verifyToken);
router.get('/profile', AuthController.profile);
router.put('/profile', AuthController.updateProfile);
router.put('/change-password', AuthController.changePassword);

module.exports = router;