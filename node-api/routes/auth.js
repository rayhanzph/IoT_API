var express = require('express');
var router = express.Router();
var user = require('../databases/user');

router.post('/', user.auth);

module.exports = router;