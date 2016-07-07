//config.js
var config = {
	dbconfig: {
		client: 'mysql',
		  connection: {
		    host     : '127.0.0.1',
		    user     : 'root',
		    password : '',
		    database : 'm17pedidos'
		  }
	},
	/*
	// MSSQL Config
	dbconfig: {
		server: "localhost",
		database: "dbseguridad",
		user: "sa",
		password: "123",
		port: 1433
	},
	*/
	serverconfig:{
		port:3001
	}	
}
/*
var knex = require('knex')({
  client: 'mysql',
  connection: {
    host     : '127.0.0.1',
    user     : 'your_database_user',
    password : 'your_database_password',
    database : 'myapp_test'
  }
});
*/

module.exports = config