//pedido.js
var db = require('../model/db')
const entityName = 'pedido'

exports.save = function (req, res) {
	var pedido = {
		id				:  0,
		idCliente		: req.body.idCliente,
		idPuntoEntrega	: req.body.idPuntoEntrega,
		fechaLiminte	: req.body.fechaLiminte,
		latitud			: req.body.latitud,
		longitud		: req.body.longitud,
		estado			: 1
	}
	iomsg = {
		type : "pedido",
		data : pedido,
		res	 :null
	}

	db.save(entityName, pedido, function(row){
		res.status(200).json(row)
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
