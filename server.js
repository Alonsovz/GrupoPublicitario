var socket = require('socket.io'),
    express = require('express'),
    // https = require('https'),
    http = require('http');
/*     logger = require('winston');


    logger.remove(logger.transports.Console);
    logger.add(logger.transports.Console, { colorize: true, timestamp: true});
    logger.info('SocketIO > listening on port');
 */


    var app = express();

    var http_server = http.createServer(app).listen(3008);


    function emitNewOrder(server) {
        var io = socket.listen(server);
        io.sockets.on('connection', function (socket) {
            socket.on("new_order", function(data){
                io.emit("new_order", data);
            });
        });
    }

    emitNewOrder(http_server);