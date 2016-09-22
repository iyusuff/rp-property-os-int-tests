<?php

use App\Http\Controllers\PropertyType\PropertyTypeController;

$app->group(['prefix' => 'propertytype'], function ($app) {
    $app->get('/', PropertyTypeController::class . '@index');
    $app->get('/{id:[\d]+}', PropertyTypeController::class . '@find');
    $app->post('/', ['middleware' => 'validator.propertyType', 'uses' => PropertyTypeController::class . '@create']);
    $app->put(
        '/{id:[\d]+}',
        ['middleware' => 'validator.propertyType', 'uses' => PropertyTypeController::class . '@update']
    );
    $app->patch(
        '/{id:[\d]+}',
        ['middleware' => 'validator.propertyType', 'uses' => PropertyTypeController::class . '@patch']
    );
    $app->delete('/{id:[\d]+}', PropertyTypeController::class . '@delete');
});
