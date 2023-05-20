var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {
	socket.on( 'message', function( data ) {
    io.sockets.emit( 'message', {
    	id: data.id, 
    	image: data.image, 
    	status: data.status, 
    	team: data.team, 
    	captain: data.captain, 
    	name: data.name, 
    });
  });


  
});
