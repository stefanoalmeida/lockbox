<?php

namespace App\Middlewares;

class AuthMiddleware
{
    public function handle() 
    {
        if (!auth()) {
            return header('Location: /login');
        }
    }
}