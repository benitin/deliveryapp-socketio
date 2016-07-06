var express = require('express')
var app     = express()
var http    = require('http').Server(app)
var bodyParser= require('body-parser')


var config  = require('./config')

app.use(bodyParser.urlencoded({ extended: true}))
app.use(bodyParser.json())

// Code
/*
---schema.sql

create table test(
	id    int auto_increment,
	fecha datetime not null,
	primary key(id)
)

*/
var router = express.Router()

router.get('/', function(req, res){
	res.status(200).jsonp({message:'API Rest - With Node JS - Event Driven Architecture'})
})

router.route('/test')
	.get(function(req, res){
		knex.select('*').from('test')
		.map(function(row){
			res.status(200).json(row)
			console.log(row)
		})
	})//get(usuario.list)
	.post(function(req, res){
		knex('test').insert({id:0,fecha:new Date()}).map(function(row){
			res.status(200).json(row)
			console.log(row)
		})
	})//post(usuario.save)

// Init Listening
app.use('/api', router)
app.disable('etag')




// End Code

// RTA
var io     = require('socket.io')(http),
    events = require('events')
 global.serverEmitter = new events.EventEmitter()
// RTA
io.on('connection', function (socket) {
    socket.on('chat message', function(msg){
        io.emit('chat message', msg)
    })
    global.serverEmitter.on("emit",function(data){
    	socket.emit("emit",data)
    })
    console.log('user connect')
})
// end RTA


// Inciamos la api
http.listen(config.serverconfig.port, function(){
	console.log(new Date().toISOString().substring(0, 19)+':escuchando en el puerto *:' + config.serverconfig.port)
})

