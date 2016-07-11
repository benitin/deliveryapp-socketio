//pedido.js
var db = require('../model/db')
const entityName = 'pedido'

exports.save = function (req, res) {
	var pedido = {
		id				:  0,
		idCliente		: req.body.idCliente,
		idPuntoEntrega	: req.body.idPuntoEntrega,
		fechaLimite		: req.body.fechaLimite,
		latitud			: req.body.latitud,
		longitud		: req.body.longitud,
		idProducto      : req.body.idProducto,
		idEstado		: 1
	}
	iomsg = {
		type : "pedido",
		data : pedido,
		res	 :null
	}
	console.log("pedido",iomsg)

	db.save(entityName, pedido, function(row){
		console.log('result pedido:', row)
		res.status(200).json(row[0])
		iomsg.res = row
		global.serverEmitter.emit("emit", iomsg)
		console.log('emit:', iomsg)
	})
}

exports.list = function(req, res){
	estado = req.params.estado
	db.list(entityName, (estado==0 ? 'estado>0' : 'estado='+estado),
	function(rows){
		res.status(200).json(rows)
	} )
}
