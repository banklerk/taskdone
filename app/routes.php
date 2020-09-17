<?php


use App\Controllers\ResetPasswordController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\TasksController;
use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use DI\ContainerBuilder;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use League\Plates\Engine;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions(
    [
        Engine::class       => static function () {
            return new Engine('../app/Views');
        },
        Swift_Mailer::class => static function () {
            $transport = (new Swift_SmtpTransport(
                config('mail.smtp'),
                config('mail.port'),
                config('mail.encryption')
            ))->setAuthMode('login')->setUsername(config('mail.email'))->setPassword(config('mail.password'));
            return new Swift_Mailer($transport);
        },
        QueryFactory::class => static function () {
            return new QueryFactory('mysql');
        },
        PDO::class          => static function () {
            $driver   = config('database.driver');
            $host     = config('database.host');
            $db_name  = config('database.db_name');
            $username = config('database.username');
            $password = config('database.password');

            return new PDO("$driver:host=$host;dbname=$db_name", $username, $password);
        },
        Auth::class         => static function ($container) {
            return new Auth($container->get('PDO'));
        },
    ]
);

$container = $containerBuilder->build();


$dispatcher = simpleDispatcher(
    function (RouteCollector $r) {
        $r->get('/', [HomeController::class, 'home']);
        $r->get('/tasks', [TasksController::class, 'index']);
        $r->get('/tasks/create', [TasksController::class, 'create']);
        $r->get('/tasks/{id}', [TasksController::class, 'show']);
        $r->post('/tasks/store', [TasksController::class, 'store']);
        $r->get('/tasks/{id}/edit', [TasksController::class, 'edit']);
        $r->post('/tasks/{id}/update', [TasksController::class, 'update']);
        $r->get('/tasks/{id}/delete', [TasksController::class, 'delete']);

        $r->get('/login', [LoginController::class, 'showForm']);
        $r->post('/login', [LoginController::class, 'login']);
        $r->get('/logout', [LoginController::class, 'logout']);

        $r->get('/password-recovery', [ResetPasswordController::class, 'showForm']);
        $r->post('/password-recovery', [ResetPasswordController::class, 'recovery']);
        $r->get('/password-recovery/form', [ResetPasswordController::class, 'showSetForm']);
        $r->post('/password-recovery/change', [ResetPasswordController::class, 'change']);
        $r->get('/email-verification', [ResetPasswordController::class, 'resendForm']);

        $r->get('/register', [RegisterController::class, 'showForm']);
        $r->post('/register', [RegisterController::class, 'register']);
        $r->get('/verify_email', [RegisterController::class, 'verify']);
    }
);

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri        = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ...
        dd('404 Not Found');
    break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ...
        dd('405 Method Not Allowed');
    break;

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars    = $routeInfo[2];

        $container->call($handler, $vars);
        // ... call $handler with $vars
    break;
}
