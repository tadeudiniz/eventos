const User = require('./User');
const Company = require('./Company');
const Event = require('./Event');

// Definir relacionamentos

// User - Company
User.belongsTo(Company, {
  foreignKey: 'companyId',
  as: 'company'
});

Company.hasMany(User, {
  foreignKey: 'companyId',
  as: 'users'
});

// Event - User (Organizer)
Event.belongsTo(User, {
  foreignKey: 'organizerId',
  as: 'organizer'
});

User.hasMany(Event, {
  foreignKey: 'organizerId',
  as: 'organizedEvents'
});

// Event - Company
Event.belongsTo(Company, {
  foreignKey: 'companyId',
  as: 'company'
});

Company.hasMany(Event, {
  foreignKey: 'companyId',
  as: 'events'
});

// Exportar todos os modelos
module.exports = {
  User,
  Company,
  Event
};