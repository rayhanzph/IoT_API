var express = require('express');
var router = express.Router();
var led = require('../../databases/led');
var middleware = require('../../middleware/PermissionMiddleware');

router.get('/:id', [
    middleware.validJWTNeeded,
    middleware.onlyUserLogin,
    led.getId
]);

router.get('/', [
    middleware.validJWTNeeded,
    middleware.onlyUserLogin,
    led.getAll
]);

router.post('/', [
    middleware.validJWTNeeded,
    middleware.onlyUserLogin,
    led.insert
]);

router.patch('/:id', [
    middleware.validJWTNeeded,
    middleware.onlyUserLogin,
    led.update
]);

router.delete('/:id', [
    middleware.validJWTNeeded,
    middleware.onlyUserLogin,
    led.delete
]);

module.exports = router;