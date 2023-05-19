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

  socket.on( 'new_count_message', function( data ) {
    io.sockets.emit( 'new_count_message', { 
    	new_count_message: data.new_count_message

    });
  });

  socket.on( 'update_count_message', function( data ) {
    io.sockets.emit( 'update_count_message', {
    	update_count_message: data.update_count_message 
    });
  });

  socket.on( 'new_player_selection', function( data ) {
    io.sockets.emit( 'new_player_selection', {
			data:data.name,
			team:data.team,
    	created_at: data.created_at,
    	id: data.id
    });
  });


	socket.on( 'message', function( data ) {
    io.sockets.emit( 'message', {
    	id: data.id, 
    	image: data.image, 
    });
  });


  
});
