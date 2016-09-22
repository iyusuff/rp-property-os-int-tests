<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use \PropertySearch\PropertySearchController;

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(
    ['middleware' => 'jsonApi.enforceMediaType'],
    function () use ($app) {

        include __DIR__ . '/Routes/PropertyTypeRoutes.php';
        include __DIR__ . '/Routes/PropertyRoutes.php';
        include __DIR__ . '/Routes/PropertyInstanceRoutes.php';
    }
);

$app->get('/search', PropertySearchController::class . '@search');

/**
 * Healthcheck to ensure the application is healthy.  When deployed this endpoint will determine healthy nodes
 * where the application can live.  In the event of network connectivity failure with any external dependencies,
 * this healthcheck should fail.
 */
$app->get('/healthcheck/{token}', function ($token) {
    if ($token == env('HEALTHCHECK_TOKEN')) {
        $connection = DB::connection();
        $connection->disconnect();
        return response('');
    }
    throw new \Exception('Invalid healthcheck token');
});
