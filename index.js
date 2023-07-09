require('dotenv').config()  // 設定全域變數 .env 檔，以process.env.變數名讀取

const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser');
var createError = require('http-errors');
const express = require('express');
var engine = require('ejs-locals');
const session = require('express-session')



const app = express();
const port = process.env.PORT;
const App_debug = process.env.APP_DEBUG==='true'?true:false;

app.engine('ejs', engine);
app.set('views', './views');
app.set('view engine', 'ejs');

app.use('/public', express.static('public'));   //設定靜態資料夾
app.use(bodyParser.json());
app.use(cookieParser())
app.use(bodyParser.urlencoded({ extended: false }));
app.use(session({
    secret: 'mySecret',
    name: 'user',
    resave: true,
    saveUninitialized: false, // not stored in store and cookie if not logged in yet
    // cookie: { maxAge: 600000 }
}))

// Start router
var webRouter = require('./routes/web');
var apiRouter = require('./routes/api');
app.use('/', webRouter);
app.use('/api', apiRouter);
// End router

// catch 404 and forward to error handler
app.use(function(req, res, next) {
    next(createError(404));
});
  
// error handler
app.use(function(err, req, res, next) {
    // set locals, only providing error in development
    res.locals.message = err.message;
    res.locals.error = App_debug ? err : {};

    // render the error page
    res.status(err.status || 500);
    res.render('error');
});

app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`);
});