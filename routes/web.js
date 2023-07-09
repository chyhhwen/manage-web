var express = require('express');
var router = express.Router();
/* 引入 Controller */
const todoController = require('../controllers/todo');
const {request, response} = require("express");

/* 設定Web Router. */
router.get('/', function (req, res, next) {
  res.render('index');
});

router.get('/hello', (req, res) => {
  res.render('hello');
});
router.get('/search', (req, res) => {
  res.render('search');
});

router.post('/searchList', (req, res) => {
  res.send(req.body);
});
router.post('/check-login', (req, res) => {
  var user = req.body.username;
  var pass = req.body.password;
  if(user == '123' && pass == '456')
  {
    res.render('index');
  }
  else
  {
    res.render('index');
  }
});
router.get('/todos', todoController.getAll);

router.get('/test', todoController.getDB);

module.exports = router;