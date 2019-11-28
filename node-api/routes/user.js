var express = require('express');
var router = express.Router();
var user = require('../databases/user');
var middleware = require('../middleware/PermissionMiddleware');

router.post('/', [
    user.insert
]);

router.get('/', [
    middleware.validJWTNeeded, 
    middleware.onlyAdmin, 
    user.getAll
]);

router.get('/:username', [
    middleware.validJWTNeeded, 
    middleware.onlyUserLogin,
    user.getId
]);

router.patch('/:username', [
    middleware.validJWTNeeded, 
    middleware.onlyUserLogin,
    user.update
]);

router.delete('/:username', [
    middleware.validJWTNeeded, 
    middleware.onlyAdmin, 
    user.delete]);

module.exports = router;