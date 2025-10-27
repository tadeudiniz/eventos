require('dotenv').config();
const express = require('express');
const cors = require('cors');
const helmet = require('helmet');
const morgan = require('morgan');
const compression = require('compression');
const rateLimit = require('express-rate-limit');
const path = require('path');

// Importar configurações e rotas
const { sequelize } = require('./src/config/database');
const authRoutes = require('./src/routes/auth');
const userRoutes = require('./src/routes/users');
const eventRoutes = require('./src/routes/events');
const companyRoutes = require('./src/routes/companies');

// Middleware de erro
const errorHandler = require('./src/middleware/errorHandler');

const app = express();
const PORT = process.env.PORT || 3000;

// Rate limiting
const limiter = rateLimit({
  windowMs: parseInt(process.env.RATE_LIMIT_WINDOW_MS) || 15 * 60 * 1000, // 15 minutos
  max: parseInt(process.env.RATE_LIMIT_MAX_REQUESTS) || 100, // Limite de 100 requests por windowMs
  message: {
    error: 'Muitas requisições feitas deste IP, tente novamente em alguns minutos.'
  },
  standardHeaders: true,
  legacyHeaders: false
});

// Middlewares globais
app.use(helmet());
app.use(compression());
app.use(limiter);

// CORS configuração
const corsOptions = {
  origin: function (origin, callback) {
    // Permitir requisições sem origin (Postman, mobile apps, etc.)
    if (!origin) return callback(null, true);
    
    const allowedOrigins = [
      'http://localhost',
      'http://localhost:80',
      'http://localhost:8080',
      'http://127.0.0.1',
      'http://127.0.0.1:80',
      'http://127.0.0.1:8080',
      process.env.CORS_ORIGIN
    ].filter(Boolean);
    
    if (allowedOrigins.indexOf(origin) !== -1) {
      callback(null, true);
    } else {
      callback(new Error('Não permitido pelo CORS'));
    }
  },
  credentials: true,
  methods: ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization', 'X-Requested-With']
};

app.use(cors(corsOptions));

// Logging
app.use(morgan('combined'));

// Body parsing
app.use(express.json({ limit: '10mb' }));
app.use(express.urlencoded({ extended: true, limit: '10mb' }));

// Servir arquivos estáticos
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// Rota de health check
app.get('/health', (req, res) => {
  res.json({
    status: 'OK',
    timestamp: new Date().toISOString(),
    uptime: process.uptime(),
    environment: process.env.NODE_ENV || 'development'
  });
});

// API Routes
app.use('/api/v1/auth', authRoutes);
app.use('/api/v1/users', userRoutes);
app.use('/api/v1/events', eventRoutes);
app.use('/api/v1/companies', companyRoutes);

// Rota 404
app.use('*', (req, res) => {
  res.status(404).json({
    success: false,
    message: 'Endpoint não encontrado',
    path: req.originalUrl
  });
});

// Middleware de tratamento de erros
app.use(errorHandler);

// Função para iniciar o servidor
async function startServer() {
  try {
    // Testar conexão com banco de dados
    await sequelize.authenticate();
    console.log('✅ Conexão com banco de dados estabelecida com sucesso.');

    // Sincronizar modelos (desenvolvimento)
    if (process.env.NODE_ENV === 'development') {
      await sequelize.sync({ alter: true });
      console.log('✅ Modelos sincronizados com o banco de dados.');
    }

    // Iniciar servidor
    app.listen(PORT, () => {
      console.log(`🚀 Servidor rodando na porta ${PORT}`);
      console.log(`🌍 Ambiente: ${process.env.NODE_ENV || 'development'}`);
      console.log(`📊 Health check: http://localhost:${PORT}/health`);
    });

  } catch (error) {
    console.error('❌ Erro ao iniciar servidor:', error);
    process.exit(1);
  }
}

// Tratamento de erros não capturados
process.on('unhandledRejection', (reason, promise) => {
  console.error('Unhandled Rejection at:', promise, 'reason:', reason);
  process.exit(1);
});

process.on('uncaughtException', (error) => {
  console.error('Uncaught Exception:', error);
  process.exit(1);
});

// Graceful shutdown
process.on('SIGTERM', async () => {
  console.log('SIGTERM received, shutting down gracefully');
  await sequelize.close();
  process.exit(0);
});

process.on('SIGINT', async () => {
  console.log('SIGINT received, shutting down gracefully');
  await sequelize.close();
  process.exit(0);
});

// Iniciar servidor
startServer();

module.exports = app;