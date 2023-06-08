//producto.js

var db = require('../model/db')
const entityName = 'producto'

exports.list = function(req, res){
	db.list(entityName, 'id>0',
	function(rows){
		res.status(200).json(rows)
	} )
}


