const express = require("express");
const app = express();
const bodyParser = require("body-parser");

const server = require("http").createServer(app);
const io = require("socket.io")(server, {
  cors: { origin: "*" },
});
app.use(bodyParser.json());

io.on("connection", (socket) => {
  console.log("connection");
  socket.on("sendChatToServer", (message) => {
    console.log(message);
    // io.sockets.emit('sendChatToClient', message);
    socket.broadcast.emit("sendChatToClient", message);
  });

  socket.on("disconnect", (socket) => {
    console.log("Disconnect");
  });
});
// export {io};
// module.exports = io;

app.get("/send_last_product_bid", (req, res) => {
  var amount_per_bid = req.query.amount_per_bid;
  var product_id = req.query.product_id;
  var name = req.query.name;
  console.log(name);
  let message = [amount_per_bid, product_id, name];
  // socket.emit('sendChatToServer', message);
  io.emit("sendChatToClient", message);
  res.send(message);
});
server.listen(3000, () => {
  console.log("Server is running");
});
