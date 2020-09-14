<?php

//klein router autoload
require_once __DIR__ . '/vendor/autoload.php';

//controllers autoload
require_once 'autoloader.php';

$route = new \Klein\Klein();

//* login *//

$route->respond('GET', '/login', ['LoginController', 'index']);

$route->respond('POST', '/login', function ($request, $response, $service, $app) {
    return LoginController::store($request, $response, $service, $app);
});

//* register *//

$route->respond('GET', '/register', ['RegisterController', 'index']);

$route->respond('POST', '/register', function ($request, $response, $service, $app) {
    return RegisterController::store($request, $response, $service, $app);
});

//* books *//
$route->respond('GET', '/', ['BookController', 'index']);

$route->respond('GET', '/book/create', function ($request, $response, $service, $app) {
    return BookController::create($request, $response, $service, $app);
});

$route->respond('POST', '/', function ($request, $response, $service, $app) {
    return BookController::store($request, $response, $service, $app);
});
$route->respond('GET', '/book/[i:id]', function ($request, $response, $service, $app) {
    return BookController::edit($request, $response, $service, $app);
});

//PUT
$route->respond('POST', '/book/[i:id]', function ($request, $response, $service, $app) {
    return BookController::update($request, $response, $service, $app);
});

//DELETE
$route->respond('POST', '/book/[i:id]/delete', function ($request, $response, $service, $app) {
    return BookController::destroy($request, $response, $service, $app);
});




//* authors *//
$route->respond('GET', '/author', ['AuthorController', 'create']);

$route->respond('POST', '/author', function ($request, $response, $service, $app) {
    return AuthorController::store($request, $response, $service, $app);
});

$route->respond('GET', '/author/[i:id]', function ($request, $response, $service, $app) {
    return AuthorController::edit($request, $response, $service, $app);
});

//UPDATE
$route->respond('POST', '/author/[i:id]', function ($request, $response, $service, $app) {
    return AuthorController::update($request, $response, $service, $app);
});

//DELETE
$route->respond('POST', '/author/[i:id]/delete', function ($request, $response, $service, $app) {
    return AuthorController::destroy($request, $response, $service, $app);
});



//* categories *//
$route->respond('GET', '/category', ['CategoryController', 'create']);
$route->respond('POST', '/category', function ($request, $response, $service, $app) {
    return CategoryController::store($request, $response, $service, $app);
});

$route->respond('GET', '/category/[i:id]', function ($request, $response, $service, $app) {
    return CategoryController::edit($request, $response, $service, $app);
});

//UPDATE
$route->respond('POST', '/category/[i:id]', function ($request, $response, $service, $app) {
    return CategoryController::update($request, $response, $service, $app);
});

//DELETE
$route->respond('POST', '/category/[i:id]/delete', function ($request, $response, $service, $app) {
    return CategoryController::destroy($request, $response, $service, $app);
});



// Handle errors
$route->onHttpError(function ($code, $router) {
    switch ($code) {
        case 404:
            $router->response()->body('Got lost?! ' . $code);
            break;
        case 405:
            $router->response()->body('You can\'t do that! ' . $code);
            break;
        default:
            $router->response()->body('Oh no, a bad error happened that caused a ' . $code);
    }
});

$route->dispatch();
