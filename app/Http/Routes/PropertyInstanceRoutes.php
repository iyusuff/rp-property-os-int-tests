<?php

use App\Http\Controllers\PropertyInstance\PropertyInstanceController;

$app->group(['prefix' => 'propertyinstance'], function ($app) {

    $app->get('/', PropertyInstanceController::class . '@findByIds');
    $app->get('/{id:[\d]+}', PropertyInstanceController::class . '@find');
    $app->post(
        '/',
        ['middleware' => 'validator.propertyInstance', 'uses' => PropertyInstanceController::class . '@create']
    );
    $app->put(
        '/{id:[\d]+}',
        ['middleware' => 'validator.propertyInstance', 'uses' => PropertyInstanceController::class . '@update']
    );
    $app->patch(
        '/{id:[\d]+}',
        ['middleware' => 'validator.propertyInstance', 'uses' => PropertyInstanceController::class . '@patch']
    );
    $app->delete('/{id:[\d]+}', PropertyInstanceController::class . '@delete');
});
