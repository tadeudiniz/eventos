# Eventos API - Backend Node.js

API REST para sistema de gestão de eventos construída com Node.js, Express.js, Sequelize e MySQL.

## 🚀 Funcionalidades

- ✅ Autenticação JWT com refresh tokens
- ✅ Sistema multi-tenant (empresas)
- ✅ Gestão de usuários com roles hierárquicos
- ✅ CRUD completo de eventos
- ✅ Eventos presenciais, online e híbridos
- ✅ Sistema de permissões robusto
- ✅ Rate limiting e segurança
- ✅ Upload de arquivos (avatars, banners)
- ✅ Validações abrangentes
- ✅ Logs estruturados

## 🏗️ Estrutura do Projeto

```
back/
├── src/
│   ├── config/          # Configurações do banco e app
│   ├── controllers/     # Controladores das rotas
│   ├── middleware/      # Middlewares customizados
│   ├── models/          # Modelos do Sequelize
│   ├── routes/          # Definições das rotas
│   ├── services/        # Lógica de negócio
│   └── utils/           # Utilitários e helpers
├── uploads/             # Arquivos enviados pelos usuários
├── .env                 # Variáveis de ambiente
├── server.js            # Ponto de entrada da aplicação
└── package.json         # Dependências e scripts
```

## 🛠️ Instalação

### Pré-requisitos

- Node.js 16+ 
- MySQL 5.7+ ou 8.0+
- npm ou yarn

### 1. Instalar dependências

```bash
cd back
npm install
```

### 2. Configurar banco de dados

1. Crie um banco MySQL
2. Copie o arquivo `.env` e configure as variáveis:

```env
# Banco de Dados
DB_HOST=localhost
DB_PORT=3306
DB_NAME=eventos_db
DB_USER=root
DB_PASSWORD=sua_senha

# JWT
JWT_SECRET=sua_chave_secreta_muito_segura
JWT_EXPIRES_IN=24h

# CORS
CORS_ORIGIN=http://localhost
```

### 3. Inicializar banco de dados

```bash
npm run init-db
```

Este comando irá:
- Criar o banco de dados
- Criar as tabelas
- Inserir dados iniciais (usuários e empresas de teste)

### 4. Iniciar o servidor

```bash
# Desenvolvimento
npm run dev

# Produção
npm start
```

O servidor estará rodando em `http://localhost:3000`

## 📚 API Endpoints

### Autenticação
- `POST /api/auth/register` - Registrar usuário
- `POST /api/auth/login` - Fazer login
- `POST /api/auth/logout` - Fazer logout
- `GET /api/auth/verify` - Verificar token
- `GET /api/auth/profile` - Buscar perfil do usuário
- `PUT /api/auth/profile` - Atualizar perfil
- `PUT /api/auth/change-password` - Alterar senha

### Usuários
- `GET /api/users` - Listar usuários
- `GET /api/users/:id` - Buscar usuário
- `POST /api/users` - Criar usuário
- `PUT /api/users/:id` - Atualizar usuário
- `DELETE /api/users/:id` - Deletar usuário
- `GET /api/users/stats` - Estatísticas de usuários

### Eventos
- `GET /api/events` - Listar eventos
- `GET /api/events/:id` - Buscar evento
- `POST /api/events` - Criar evento
- `PUT /api/events/:id` - Atualizar evento
- `DELETE /api/events/:id` - Deletar evento
- `GET /api/events/stats` - Estatísticas de eventos

### Empresas
- `GET /api/companies` - Listar empresas (master)
- `GET /api/companies/:id` - Buscar empresa
- `POST /api/companies` - Criar empresa (master)
- `PUT /api/companies/:id` - Atualizar empresa
- `DELETE /api/companies/:id` - Deletar empresa (master)
- `GET /api/companies/stats` - Estatísticas de empresas (master)

### Utilitários
- `GET /health` - Health check do servidor

## 🔐 Sistema de Permissões

### Roles de Usuário

1. **master** - Acesso total ao sistema
   - Gerenciar todas as empresas
   - Gerenciar todos os usuários
   - Ver todas as estatísticas

2. **client_admin** - Administrador da empresa
   - Gerenciar usuários da sua empresa
   - Gerenciar eventos da sua empresa
   - Ver estatísticas da empresa

3. **client_organizer** - Organizador de eventos
   - Criar e gerenciar seus próprios eventos
   - Ver usuários da empresa

4. **participant** - Participante
   - Ver eventos públicos
   - Gerenciar seu próprio perfil

### Controle de Acesso

- Usuários só podem acessar dados da sua empresa
- Masters têm acesso a tudo
- Organizadores só podem gerenciar seus próprios eventos
- Validações automáticas em todas as rotas

## 🔧 Configurações Avançadas

### Rate Limiting

Configure no `.env`:
```env
RATE_LIMIT_WINDOW_MS=900000  # 15 minutos
RATE_LIMIT_MAX_REQUESTS=100  # Máximo de requests
```

### CORS

Configure origens permitidas:
```env
CORS_ORIGIN=http://localhost,https://seudominio.com
```

### Upload de Arquivos

Configure limites:
```env
MAX_FILE_SIZE=5242880  # 5MB
UPLOAD_PATH=uploads/
```

## 🧪 Testes

```bash
npm test
```

## 📝 Scripts Disponíveis

- `npm start` - Iniciar servidor em produção
- `npm run dev` - Iniciar servidor em desenvolvimento com nodemon
- `npm run init-db` - Inicializar banco de dados
- `npm test` - Executar testes
- `npm run db:migrate` - Executar migrações
- `npm run db:seed` - Executar seeds

## 🔍 Logs e Monitoramento

A aplicação inclui:
- Logs estruturados com Morgan
- Health check endpoint
- Tratamento de erros centralizado
- Graceful shutdown

## 🚨 Usuários Padrão

Após a inicialização, os seguintes usuários são criados:

**Master:**
- Email: `admin@mathetes.com`
- Senha: `admin123`
- Role: `master`

**Admin Empresa:**
- Email: `admin@empresa.com`
- Senha: `admin123`
- Role: `client_admin`

⚠️ **Altere essas senhas em produção!**

## 🐛 Troubleshooting

### Erro de conexão com banco
1. Verifique se o MySQL está rodando
2. Confirme as credenciais no `.env`
3. Verifique se o banco existe

### Erro de token JWT
1. Verifique se `JWT_SECRET` está configurado
2. Confirme se o token não expirou
3. Verifique se o header Authorization está correto

### Erro de CORS
1. Configure `CORS_ORIGIN` no `.env`
2. Verifique se a origem da requisição é permitida

## 📞 Suporte

Para dúvidas ou problemas:
1. Verifique os logs do servidor
2. Consulte a documentação da API
3. Entre em contato com a equipe de desenvolvimento