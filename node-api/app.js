var createError = require('http-errors');
var express = require('express');
var cookieParser = require('cookie-parser');
var logger = require('morgan');

var ledRouter = require('./routes/api/led');
var userRouter = require('./routes/user');
var userAuth = require('./routes/auth');

var app = express();

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());

app.use('/auth', userAuth);
app.use('/user', userRouter);
app.use('/led', ledRouter);
app.use('/', function(req, res) {
  res.end();
});

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.json({message: 'error: ' + err.message});
  res.end();
});

module.exports = app;
