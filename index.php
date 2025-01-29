<?php
// index.php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use MongoDB\Client;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\WebSocket\Server;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\AdminController;
use App\Models\User;
use Firebase\JWT\JWT;

$config = include __DIR__ . '/src/config.php';

$client = new Client($config['mongo_uri']);

$routes = include __DIR__ . '/src/routes.php';

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());
$matcher = new UrlMatcher($routes, $context);

$resolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$request = Request::createFromGlobals();

try {
    $attributes = $matcher->matchRequest($request);
    $request->attributes->add($attributes);

    $controller = $resolver->getController($request);
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);
} catch (\Symfony\Component\Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (\Symfony\Component\Routing\Exception\MethodNotAllowedException $exception) {
    $response = new Response('Method Not Allowed', 405);
}

$response->send();

// WebSocket server
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Server($client)
        )
    ),
    8080
);

$server->run();