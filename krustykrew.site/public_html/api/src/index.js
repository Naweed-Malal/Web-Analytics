//const express = require('express')
////const mysql = require('mysql');
////const bodyParser = require('body-parser');
//const app = express()
//const PORT = 8080;
//
//app.use(express.json())
//
////app.use(bodyParser.json());
//
//app.get('/static', (req, res) => {
//    res.json("hey")
//})
//
////app.post('/static', (req, res) => {
//  //  const temp = JSON.parse(req.body)
//    //console.log(temp)
//    //res.json(temp)
////})
//
//app.listen(PORT, () => console.log(`it's alive on http://krustykrew.site:${PORT}`))

// app.js file

var jsonServer = require('json-server');

// Returns an Express server
var server = jsonServer.create();

// Set default middlewares (logger, static, cors and no-cache)
server.use(jsonServer.defaults());

// Add custom routes
// server.get('/custom', function (req, res) { res.json({ msg: 'hello' }) })

// Returns an Express router
var router = jsonServer.router('test.json');

server.use(router);

server.listen(8080);
