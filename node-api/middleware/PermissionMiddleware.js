var user = require('../databases/user');
var md5 = require('md5');
var jwt = require('jsonwebtoken');

var secret = 'RyccoAtika1904';

exports.validJWTNeeded = function(req, res, next) {
    var token = req.headers['access-token'];

    if(token) {
        user.verifyToken(token, function(result) {
            if(result) {
                req.jwt = jwt.verify(token, secret);
                return next();
            } else {
                res.status(401);
                return res.json({
                    message: 'Token invalid'
                });
            }
        });
    } else {
        res.status(401);
        return res.json({
            message: 'Token invalid'
        });
    }
};

exports.onlyUserLogin = function(req, res, next) {
    if(req.jwt.permission >= 5) {
        return next();
    } else {
        res.status(403);
        return res.json({
            message: 'You must login and get your api key'
        });
    }
};

exports.onlyAdmin = function(req, res, next) {
    if(req.jwt.permission == 7) {
        return next();
    } else {
        res.status(403);
        return res.json({
            message: 'Admin Area'
        });
    }
};