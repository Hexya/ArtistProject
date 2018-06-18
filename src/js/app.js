const $    = require("jquery");

window.$ = $;

//FRONT
require('./bundle/home.app.js');
require('./bundle/message.app.js');

//ADMIN
require('./bundle/admin/add-artiste.app.js');
require('./bundle/admin/add-artwork.app.js');
require('./bundle/admin/add-category.app.js');