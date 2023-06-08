//cliente.js
var db = require('../model/db')
const entityName = 'cliente'
exports.save = function (req, res){
	var cliente = {
			id 			: 0,
			nombre 		: req.body.nombre,
			login		: req.body.login,
			password	: req.body.password, 
			direccion	: req.body.direccion,
			telefono 	: req.body.telefono, 
			estado		: 1
		}
	db.save(entityName, cliente, function(row){
		res.status(200).json(row)
	})
}

exports.login = function(req, res){
	console.log('Login:'+req.body.login)
	console.log('password:'+req.body.password)
	db.findOne(
		entityName, 
		"login='"+req.body.login+"' and password=password('"+req.body.password+"')",
		function(cliente){
			res.status(200).json(cliente[0])
		})
}

exports.pedidos = function(req, res){
	iomsg = {
		type	: 'pedidos',
		data	: req.params.idCliente,
		res		: null
	}
	console.log('idCliente:'+req.params.idCliente)
	db.list('pedido', 'idCliente=' + req.params.idCliente
		,function(rows){
			res.status(200).json(rows)
			iomsg.res = rows
			global.serverEmitter.emit('emit', iomsg)
		})
}

exports.puntosentrega = function(req, res){
	db.list('puntoentrega','idCliente='+req.params.idCliente
		,function(puntos){
			res.status(200).json(puntos)
		})
}

/*
 Test
exports.test = function (req, res){
	var test = {
		id 		: 0,
		fecha	: new Date()
	}
	db.save('test', test, function(row){
		res.status(200).json(row)
	})
}
exports.testList = function (req, res){
	db.list('test', function(row){
		res.status(200).json(row)
	})
}*/