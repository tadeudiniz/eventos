const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const { User, Company } = require('../models');
const { Op } = require('sequelize');

class AuthController {
  // Registro de usuário
  static async register(req, res) {
    try {
      const { name, email, password, role = 'participant', companyId } = req.body;

      // Validações básicas
      if (!name || !email || !password) {
        return res.status(400).json({
          success: false,
          message: 'Nome, email e senha são obrigatórios'
        });
      }

      // Verificar se email já existe
      const existingUser = await User.findOne({ where: { email } });
      if (existingUser) {
        return res.status(409).json({
          success: false,
          message: 'Email já cadastrado'
        });
      }

      // Verificar se empresa existe (se fornecida)
      if (companyId) {
        const company = await Company.findByPk(companyId);
        if (!company) {
          return res.status(400).json({
            success: false,
            message: 'Empresa não encontrada'
          });
        }
      }

      // Criar usuário
      const user = await User.create({
        name,
        email,
        password,
        role,
        companyId
      });

      // Gerar token
      const token = jwt.sign(
        { userId: user.id, email: user.email, role: user.role },
        process.env.JWT_SECRET,
        { expiresIn: process.env.JWT_EXPIRES_IN }
      );

      res.status(201).json({
        success: true,
        message: 'Usuário criado com sucesso',
        data: {
          user,
          token
        }
      });
    } catch (error) {
      console.error('Erro no registro:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Login
  static async login(req, res) {
    try {
      const { email, password } = req.body;

      if (!email || !password) {
        return res.status(400).json({
          success: false,
          message: 'Email e senha são obrigatórios'
        });
      }

      // Buscar usuário com empresa
      const user = await User.findOne({
        where: { email },
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name', 'status', 'plan']
          }
        ]
      });

      if (!user) {
        return res.status(401).json({
          success: false,
          message: 'Email ou senha inválidos'
        });
      }

      // Verificar senha
      const isPasswordValid = await user.checkPassword(password);
      if (!isPasswordValid) {
        return res.status(401).json({
          success: false,
          message: 'Email ou senha inválidos'
        });
      }

      // Verificar status do usuário
      if (user.status !== 'active') {
        return res.status(401).json({
          success: false,
          message: 'Usuário inativo. Entre em contato com o administrador.'
        });
      }

      // Atualizar último login
      await user.update({ lastLoginAt: new Date() });

      // Gerar token
      const token = jwt.sign(
        { 
          userId: user.id, 
          email: user.email, 
          role: user.role,
          companyId: user.companyId 
        },
        process.env.JWT_SECRET,
        { expiresIn: process.env.JWT_EXPIRES_IN }
      );

      res.json({
        success: true,
        message: 'Login realizado com sucesso',
        data: {
          user,
          token
        }
      });
    } catch (error) {
      console.error('Erro no login:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Logout (invalidar token - implementação simples)
  static async logout(req, res) {
    try {
      // Em uma implementação completa, você adicionaria o token a uma blacklist
      res.json({
        success: true,
        message: 'Logout realizado com sucesso'
      });
    } catch (error) {
      console.error('Erro no logout:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Verificar token
  static async verifyToken(req, res) {
    try {
      const user = req.user; // Vem do middleware de autenticação

      res.json({
        success: true,
        data: {
          user,
          valid: true
        }
      });
    } catch (error) {
      console.error('Erro na verificação do token:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Perfil do usuário atual
  static async profile(req, res) {
    try {
      const user = await User.findByPk(req.user.id, {
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name', 'status', 'plan', 'logo']
          }
        ]
      });

      res.json({
        success: true,
        data: {
          user
        }
      });
    } catch (error) {
      console.error('Erro ao buscar perfil:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Atualizar perfil
  static async updateProfile(req, res) {
    try {
      const { name, phone } = req.body;
      const userId = req.user.id;

      const updateData = {};
      if (name) updateData.name = name;
      if (phone !== undefined) updateData.phone = phone;

      await User.update(updateData, {
        where: { id: userId }
      });

      const updatedUser = await User.findByPk(userId, {
        include: [
          {
            model: Company,
            as: 'company',
            attributes: ['id', 'name', 'status', 'plan', 'logo']
          }
        ]
      });

      res.json({
        success: true,
        message: 'Perfil atualizado com sucesso',
        data: {
          user: updatedUser
        }
      });
    } catch (error) {
      console.error('Erro ao atualizar perfil:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }

  // Alterar senha
  static async changePassword(req, res) {
    try {
      const { currentPassword, newPassword } = req.body;
      const userId = req.user.id;

      if (!currentPassword || !newPassword) {
        return res.status(400).json({
          success: false,
          message: 'Senha atual e nova senha são obrigatórias'
        });
      }

      const user = await User.findByPk(userId);
      
      // Verificar senha atual
      const isCurrentPasswordValid = await user.checkPassword(currentPassword);
      if (!isCurrentPasswordValid) {
        return res.status(400).json({
          success: false,
          message: 'Senha atual incorreta'
        });
      }

      // Atualizar senha
      await user.update({ password: newPassword });

      res.json({
        success: true,
        message: 'Senha alterada com sucesso'
      });
    } catch (error) {
      console.error('Erro ao alterar senha:', error);
      res.status(500).json({
        success: false,
        message: 'Erro interno do servidor'
      });
    }
  }
}

module.exports = AuthController;