<?php

use App\Http\Controllers\Property\PropertyController;

$app->group(['prefix' => 'property'], function ($app) {
    $app->get('/', PropertyController::class . '@findByIds');
    $app->get('/{id:[\d]+}', PropertyController::class . '@find');
    $app->post('/', ['middleware' => 'validator.property', 'uses' => PropertyController::class . '@create']);
    $app->put('/{id:[\d]+}', ['middleware' => 'validator.property', 'uses' => PropertyController::class . '@update']);
    $app->patch('/{id:[\d]+}', ['middleware' => 'validator.property', 'uses' => PropertyController::class . '@patch']);
    $app->delete('/{id:[\d]+}', PropertyController::class . '@delete');
});
