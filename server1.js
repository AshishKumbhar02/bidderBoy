const express = require('express');
const app = express();
const bodyParser = require("body-parser");
const https = require('https');
const fs = require('fs');
var path = require('path');

// Specify the paths to your SSL certificate and private key
//const sslOptions = {
  //  key: fs.readFileSync('/etc/apache2/ssl/maptek.key'),
   // cert: fs.readFileSync('/etc/apache2/ssl/maptekCA.crt'),
//};
var sslOptions = {
  key: fs.readFileSync(path.resolve('/etc/apache2/ssl/maptekkey.pem')),
  cert: fs.readFileSync(path.resolve('/etc/apache2/ssl/maptek.pem'))
};
const server = https.createServer(sslOptions, app);
const io = require('socket.io')(server, {
    cors: { origin: "*"}
});

app.use(bodyParser.json());

io.on('connection', (socket) => {
    console.log('Connection');
    
    socket.on('sendChatToServer', (message) => {
        console.log(message);
        socket.broadcast.emit('sendChatToClient', message);
    });

    socket.on('disconnect', () => {
        console.log('Disconnect');
    });
});

app.get('/send_last_product_bid', (req, res) => {
    var amount_per_bid = req.query.amount_per_bid;
    var product_id = req.query.product_id;
    var name = req.query.name;
    let message = [amount_per_bid, product_id, name];
    io.emit('sendChatToClient', message);
    res.send(message);
});

// Change the port to the desired SSL port (e.g., 443)
server.listen(3000, () => {
    console.log('Server is running with SSL');
});
