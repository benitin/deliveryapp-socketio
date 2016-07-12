//pedido.js
var db = require('../model/db')
const entityName = 'pedido'

exports.save = function (req, res) {
	carrito = req.body
	//console.log(carrito)
	iomsg = {
		type 		 : "pedido",
		data 		 : null,
		pedido		 : carrito.pedido,
		puntoEntrega : carrito.puntoEntrega,
		cliente 	 : carrito.cliente,
		res	 :null
	}
	//res.status(200).json(0)
	var pedido = {
		id				:  0,
		idCliente		: carrito.pedido.idCliente,
		idPuntoEntrega	: carrito.pedido.idPuntoEntrega,
		idProducto      : carrito.pedido.idProducto,
		fechaLimite		: carrito.pedido.fechaLimite,
		latitud			: carrito.pedido.latitud,
		longitud		: carrito.pedido.longitud,
		idEstado		: 1,
		cantidad		: carrito.pedido.cantidad,
		precio			: carrito.pedido.precio
	}
	
	//console.log("pedido",iomsg)
	var cantidad = 0

	console.log("detalle",carrito.pedido.detalle)

	db.save(entityName, pedido, function(row){
		console.log('result pedido:', row)
		idPedido = row[0]
		if(idPedido>0){
			console.log("guardando detalle",idPedido)
			for(item in carrito.pedido.detalle){
				item.idPedido = idPedido
				console.log('detalle', item)
				db.save('detallepedido', item, function(row){
					cantidad++
				})
			}
			res.status(200).json(idPedido)
			iomsg.res = cantidad
			/*global.serverEmitter.emit("emit", iomsg)
			console.log('emit:', iomsg)
			*/
			//if(cantidad==carrito.detalle.length){}
		}
		
	})
}

exports.list = function(req, res){
	estado = req.params.estado
	db.list(entityName, (estado==0 ? 'estado>0' : 'estado='+estado),
	function(rows){
		res.status(200).json(rows)
	} )
}
