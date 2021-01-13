<?php

ob_start();

require __DIR__.'/vendor/autoload.php';

// BOOTSTRAP

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ':');
$route->namespace('Source\\App');

// WEB ROUTES
$route->group(null);
$route->get('/', 'Web:home');
$route->post('/buscar', 'Web:search');
$route->get('/buscar/{object}/{type}/{neighborhoods}/{dorms}/{value}/{code}', 'Web:search');

//auth
$route->group(null);
$route->get('/entrar', 'Web:login');
$route->post('/entrar', 'Web:login');
$route->get('/cadastrar', 'Web:register');
$route->post('/cadastrar', 'Web:register');
$route->get('/recuperar', 'Web:forget');
$route->post('/recuperar', 'Web:forget');
$route->get('/recuperar/{code}', 'Web:reset');
$route->post('/recuperar/resetar', 'Web:reset');

//optin
$route->group(null);
$route->get('/confirma', 'Web:confirm');
$route->get('/obrigado/{email}', 'Web:success');

// ADMIN ROUTES
$route->group('/admin');
$route->get('/', 'Admin:home');
$route->get('/locatarios', 'Admin:tenants');
$route->get('/locatario/{tenant}', 'Admin:tenant');
$route->post('/locatario', 'Admin:tenant');
$route->get('/locadores', 'Admin:proprietaries');
$route->get('/locador/{proprietary}', 'Admin:proprietary');
$route->post('/locador', 'Admin:proprietary');
$route->get('/contratos', 'Admin:contracts');
$route->post('/contrato', 'Admin:contract');


$route->get("/sair", "Admin:logout");

// ERROR ROUTES
$route->group('/ops');
$route->get('/{errcode}', 'Web:error');

// ROUTE
$route->dispatch();

// ERROR REDIRECT
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
