/**
 * API Client para Sistema de Eventos
 * Gerencia comunicação com backend Node.js via JWT
 */

class EventosAPI {
    constructor() {
        this.baseURL = 'http://localhost:3000/api/v1';
        this.token = null;
        this.refreshToken = null;
        this.currentUser = null;
        
        // Carregar dados salvos do localStorage
        this.loadFromStorage();
    }

    /**
     * Carregar dados do localStorage
     */
    loadFromStorage() {
        try {
            this.token = localStorage.getItem('eventos_token');
            this.refreshToken = localStorage.getItem('eventos_refresh_token');
            const userData = localStorage.getItem('eventos_user');
            this.currentUser = userData ? JSON.parse(userData) : null;
            
            console.log('📦 Dados carregados do localStorage:', {
                hasToken: !!this.token,
                hasRefreshToken: !!this.refreshToken,
                hasUser: !!this.currentUser,
                userName: this.currentUser?.name
            });
        } catch (error) {
            console.error('❌ Erro ao carregar dados do localStorage:', error);
            this.clearStorage();
        }
    }

    /**
     * Salvar dados no localStorage
     */
    saveToStorage() {
        try {
            if (this.token) localStorage.setItem('eventos_token', this.token);
            if (this.refreshToken) localStorage.setItem('eventos_refresh_token', this.refreshToken);
            if (this.currentUser) localStorage.setItem('eventos_user', JSON.stringify(this.currentUser));
            
            console.log('💾 Dados salvos no localStorage');
        } catch (error) {
            console.error('❌ Erro ao salvar dados no localStorage:', error);
        }
    }

    /**
     * Limpar dados do localStorage
     */
    clearStorage() {
        localStorage.removeItem('eventos_token');
        localStorage.removeItem('eventos_refresh_token');
        localStorage.removeItem('eventos_user');
        this.token = null;
        this.refreshToken = null;
        this.currentUser = null;
        console.log('🗑️ Dados limpos do localStorage');
    }

    /**
     * Verificar se o usuário está logado
     */
    isLoggedIn() {
        return !!(this.token && this.currentUser);
    }

    /**
     * Obter token atual
     */
    getToken() {
        return this.token;
    }

    /**
     * Obter usuário atual
     */
    getCurrentUser() {
        return this.currentUser;
    }

    /**
     * Fazer requisição HTTP com headers automáticos
     */
    async makeRequest(endpoint, options = {}) {
        const url = `${this.baseURL}${endpoint}`;
        
        const defaultHeaders = {
            'Content-Type': 'application/json',
        };

        // Adicionar token de autorização se disponível
        if (this.token) {
            defaultHeaders['Authorization'] = `Bearer ${this.token}`;
        }

        const config = {
            headers: { ...defaultHeaders, ...options.headers },
            ...options
        };

        try {
            console.log(`🌐 Fazendo requisição: ${options.method || 'GET'} ${url}`);
            const response = await fetch(url, config);
            
            // Verificar se o token expirou
            if (response.status === 401 && this.token) {
                console.warn('🔄 Token expirado, tentando renovar...');
                const refreshed = await this.refreshAccessToken();
                if (refreshed) {
                    // Tentar novamente com novo token
                    config.headers['Authorization'] = `Bearer ${this.token}`;
                    return await fetch(url, config);
                } else {
                    // Refresh falhou, deslogar usuário
                    this.logout();
                    throw new Error('Sessão expirada. Faça login novamente.');
                }
            }

            return response;
        } catch (error) {
            console.error(`❌ Erro na requisição para ${url}:`, error);
            throw error;
        }
    }

    /**
     * Renovar token de acesso
     */
    async refreshAccessToken() {
        if (!this.refreshToken) {
            console.warn('⚠️ Não há refresh token disponível');
            return false;
        }

        try {
            const response = await fetch(`${this.baseURL}/auth/refresh`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ refreshToken: this.refreshToken })
            });

            if (response.ok) {
                const data = await response.json();
                this.token = data.data.token;
                this.saveToStorage();
                console.log('✅ Token renovado com sucesso');
                return true;
            } else {
                console.error('❌ Falha ao renovar token');
                return false;
            }
        } catch (error) {
            console.error('❌ Erro ao renovar token:', error);
            return false;
        }
    }

    /**
     * Fazer login
     */
    async login(email, password) {
        try {
            const response = await this.makeRequest('/auth/login', {
                method: 'POST',
                body: JSON.stringify({ email, password })
            });

            const data = await response.json();

            if (response.ok && data.success) {
                this.token = data.data.token;
                this.refreshToken = data.data.refreshToken;
                this.currentUser = data.data.user;
                this.saveToStorage();
                
                console.log('✅ Login realizado com sucesso:', this.currentUser.name);
                return data;
            } else {
                throw new Error(data.message || 'Erro no login');
            }
        } catch (error) {
            console.error('❌ Erro no login:', error);
            throw error;
        }
    }

    /**
     * Fazer logout
     */
    logout() {
        this.clearStorage();
        console.log('👋 Logout realizado');
    }

    /**
     * Listar usuários
     */
    async getUsers(page = 1, limit = 10, filters = {}) {
        try {
            const queryParams = new URLSearchParams({
                page: page.toString(),
                limit: limit.toString(),
                ...filters
            });

            const response = await this.makeRequest(`/users?${queryParams}`);
            const data = await response.json();

            if (response.ok) {
                return data;
            } else {
                throw new Error(data.message || 'Erro ao buscar usuários');
            }
        } catch (error) {
            console.error('❌ Erro ao buscar usuários:', error);
            throw error;
        }
    }

    /**
     * Obter usuário por ID
     */
    async getUserById(id) {
        try {
            const response = await this.makeRequest(`/users/${id}`);
            const data = await response.json();

            if (response.ok) {
                return data;
            } else {
                throw new Error(data.message || 'Erro ao buscar usuário');
            }
        } catch (error) {
            console.error('❌ Erro ao buscar usuário:', error);
            throw error;
        }
    }

    /**
     * Criar usuário
     */
    async createUser(userData) {
        try {
            const response = await this.makeRequest('/users', {
                method: 'POST',
                body: JSON.stringify(userData)
            });

            const data = await response.json();

            if (response.ok) {
                console.log('✅ Usuário criado com sucesso');
                return data;
            } else {
                throw new Error(data.message || 'Erro ao criar usuário');
            }
        } catch (error) {
            console.error('❌ Erro ao criar usuário:', error);
            throw error;
        }
    }

    /**
     * Atualizar usuário
     */
    async updateUser(id, userData) {
        try {
            const response = await this.makeRequest(`/users/${id}`, {
                method: 'PUT',
                body: JSON.stringify(userData)
            });

            const data = await response.json();

            if (response.ok) {
                console.log('✅ Usuário atualizado com sucesso');
                return data;
            } else {
                throw new Error(data.message || 'Erro ao atualizar usuário');
            }
        } catch (error) {
            console.error('❌ Erro ao atualizar usuário:', error);
            throw error;
        }
    }

    /**
     * Excluir usuário
     */
    async deleteUser(id) {
        try {
            const response = await this.makeRequest(`/users/${id}`, {
                method: 'DELETE'
            });

            if (response.ok) {
                console.log('✅ Usuário excluído com sucesso');
                return true;
            } else {
                const data = await response.json();
                throw new Error(data.message || 'Erro ao excluir usuário');
            }
        } catch (error) {
            console.error('❌ Erro ao excluir usuário:', error);
            throw error;
        }
    }

    /**
     * Listar empresas
     */
    async getCompanies() {
        try {
            const response = await this.makeRequest('/companies');
            const data = await response.json();

            if (response.ok) {
                return data;
            } else {
                throw new Error(data.message || 'Erro ao buscar empresas');
            }
        } catch (error) {
            console.error('❌ Erro ao buscar empresas:', error);
            throw error;
        }
    }

    /**
     * Verificar saúde do servidor
     */
    async healthCheck() {
        try {
            const response = await fetch('http://localhost:3000/health');
            const data = await response.json();
            return { ok: response.ok, data };
        } catch (error) {
            console.error('❌ Erro no health check:', error);
            return { ok: false, error: error.message };
        }
    }
}

// Criar instância global
window.eventosAPI = new EventosAPI();

// Log de inicialização
console.log('🚀 API Client inicializado:', {
    baseURL: window.eventosAPI.baseURL,
    isLoggedIn: window.eventosAPI.isLoggedIn(),
    currentUser: window.eventosAPI.getCurrentUser()?.name || 'Nenhum'
});