<?php

use Core\Route;
use App\Middlewares\AuthMiddleware;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Middlewares\GuestMiddleware;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\Notas\CriarController;
use App\Controllers\Notas\AtualizarController;
use App\Controllers\Notas\IndexController as NotasIndexController;

(new Route())
    ->get('/', IndexController::class, GuestMiddleware::class)
    ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
    ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
    ->get('/registrar', [RegisterController::class, 'index'], GuestMiddleware::class)
    ->post('/registrar', [RegisterController::class, 'register'], GuestMiddleware::class)


    ->get('/logout', LogoutController::class, AuthMiddleware::class)
    ->get('/notas', NotasIndexController::class, AuthMiddleware::class)
    ->get('/notas/criar', [CriarController::class, 'index'], AuthMiddleware::class)
    ->post('/notas/criar', [CriarController::class, 'store'], AuthMiddleware::class)
    ->put('/nota', AtualizarController::class, AuthMiddleware::class)
    ->run();
