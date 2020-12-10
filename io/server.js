var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io')(server);
var fs = require('fs');
var https = require('https');


let opts = {
    port: 6001,
    host: 'friendsonly.me', //address to your site
    key: fs.readFileSync('/home/admin/conf/web/friendsonly.me/ssl/friendsonly.me.key').toString(),
    cert: fs.readFileSync('/home/admin/conf/web/friendsonly.me/ssl/friendsonly.me.pem').toString(),
    NPNProtocols: ['http/2.0', 'spdy', 'http/1.1', 'http/1.0']
}


// const opts = {
//     key: fs.readFileSync('/home/admin/conf/web/ssl.gamebtl.com.key').toString(),
//     cert: fs.readFileSync('/home/admin/conf/web/ssl.gamebtl.com.pem').toString()
// }

var httpsServer = https.createServer(opts, app);
httpsServer.listen(6001, function(){
    console.log("HTTPS on port 6001");
})
//
// app.get('/', function (req, res) {
//     res.render('index');
// })

io.attach(httpsServer);
io.attach(server);

// app = require('https').createServer(serverOptions),
// io = require('socket.io')(app),
let Redis = require('ioredis'),
    redis = new Redis(),
    axios = require('axios');

redis.psubscribe('*', function (error, count) {
});

let clients = 0;
io.sockets.on('connection', function(socket) {
    clients++;
    io.emit('online', clients);
    socket.on('disconnect', function() {
        clients--;
        io.emit('online', clients);
    });
    console.log(clients);
});


io.on('disconnection', function () {
    console.log('disconnected');
});

console.log(io.engine.clientsCount);

redis.on('pmessage', function (pattern, channel, message) {
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
    console.log(channel + ':' + message.event)
});
