//db.js
var config= require('../config')
var knex  = require('knex')(config.dbconfig)


exports.save = function(name, entity, callback){
	//knex('test').insert({id:0,fecha:new Date()}).map(function(row)
	knex(name).insert(entity).then(function(row){
		console.log(row)
		callback(row)
	})
	/*knex(name).insert(entity).map(function(row){
		callback(row) 
		console.log(row)
	})*/
}

exports.findOne = function(name, condition, callback){
	knex.select('*').from(name).where(knex.raw(condition))
		.then(function(entity){
			//console.log(entity)
			callback(entity)
		})
}

exports.list = function(name, condition, callback){
	knex.select('*').from(name).where(knex.raw(condition))
		.then(function(row){
			//console.log(row)
			callback(row)
		})

	/*knex.select('*').from(name)
		.map(function(row){
			console.log(row)
			callback(row)
		})*/
}

