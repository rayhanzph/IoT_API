var mysql = require('mysql');

var con = mysql.createConnection({
    host: "127.0.0.1",
    database: "iot",
    user: "root",
    password: ""
});

con.connect(function(err) {
    if(err) {
        console.log("connecting to database error: " + err);
    }
});

module.exports = con;