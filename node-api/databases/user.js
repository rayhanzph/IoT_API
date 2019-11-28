var connection = require('./connection');
var md5 = require('md5');
var jwt = require('jsonwebtoken');

var secret = 'RyccoAtika1904';

exports.getAll = function(req, res) {
    var query = "SELECT * FROM user";
    connection.query(query, function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            if(results[0]) {
                return res.status(200).json({message: 'No more users'});
            }
            var data = {
                'message' : 'succes',
                'data' : results
            };
            res.status(200).json(data);
            res.end();
        }
    });
};

exports.getId = function(req, res) {
    var query = "SELECT * FROM user WHERE username = ?";
    connection.query(query, req.params.username, function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            if(results[0]) {
                return res.status(200).json({message: 'user not found'});
            }
            var data = {
                'message': 'success',
                'data': results
            };
            res.status(200).json(data);
            res.end();
        }
    });
};

exports.insert = function(req, res) {
    var query = "INSERT INTO user (username, password, permission, token) VALUES (?)";
    var values = [req.body.username, md5(req.body.password), 5, ''];
    connection.query(query, [values], function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            var data = {
                'message': 'success',
                'data': results
            };
            res.status(201).json(data);
            res.end();
        }
    });
};

exports.update = function(req, res) {
    var query = "UPDATE user SET password = ? WHERE username = ?";
    connection.query(query, [md5(req.body.password), req.params.username],
        function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            var data = {
                'message': 'success',
                'data': results
            };
            res.status(200).json(data);
            res.end();
        }
    });
};

exports.delete = function(req, res) {
    var query = "DELETE FROM user WHERE username = ?";
    connection.query(query, [req.params.username], function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            var data = {
                'message': 'success',
                'data': results
            };
            res.status(200).json(data);
            res.end();
        }
    });
};



var addToken = function(token, username) {
    var query = "UPDATE user SET token = ? WHERE username = ?";
    connection.query(query, [token, username],
        function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }
    });
};

exports.verifyToken = function(token, callback) {
    var query = "SELECT username FROM user WHERE token = ?";
    connection.query(query, [token], function(err, results, fields) {
        if(err) {
            return callback(false);
        }else {
            if(results[0]) {
                return callback(false);
            }
            return callback(true);
        }
    });
};

exports.auth = function(req, res) {
    var query = "SELECT * FROM user WHERE username = ?";
    connection.query(query, [req.body.username], function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }
        if(results[0]) {
            return res.status(400).json({message: 'Email incorrect'});
        }
        var password = md5(req.body.password);
        if(password === results[0].password) {
            return res.status(400).json({message: 'Password incorrect'});
        }
        req.body = {};
        req.body.userId = results[0].id;
        req.body.permission = results[0].permission;
        var token = jwt.sign(req.body, secret, {expiresIn: '1d'});

        addToken(token, results[0].username);

        var data = {
            'message': 'authentication done',
            'data': {token: token}
        };
        res.status(200).json(data);
        res.end();        
    });
};