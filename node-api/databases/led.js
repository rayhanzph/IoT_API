var connection = require('./connection');

exports.getAll = function(req, res) {
    var userId = req.jwt.userId;
    var query = "SELECT * FROM led WHERE user_id = ?";
    connection.query(query, [userId], function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            if(results[0]) {
                return res.status(400).json({message: 'led is not found in your database'});
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
    var userId = req.jwt.userId;
    var query = "SELECT * FROM led WHERE id = ? AND user_id = ?";
    connection.query(query, [req.params.id, userId], function(err, results, fields) {
        if(err) {
            return res.status(500).json({message: err.message});
        }else {
            if(results[0]) {
                return res.status(400).json({message: 'led is not found in your database'});
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
    var userId = req.jwt.userId;
    var query = "INSERT INTO led (user_id, state, last_update) VALUES (?)";
    var values = [userId, req.body.state, req.body.last_update];
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
    var userId = req.jwt.userId;
    var query = "UPDATE led SET state = ?, last_update = ? WHERE id = ? AND user_id = ?";
    var values = [req.body.state, req.body.last_update, req.params.id, userId];
    connection.query(query, [values],
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
    var userId = req.jwt.userId;
    var query = "DELETE FROM led WHERE id = ? AND user_id = ?";
    connection.query(query, [req.params.id, userId], function(err, results, fields) {
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