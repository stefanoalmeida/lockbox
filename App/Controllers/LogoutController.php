<?php

namespace App\Controllers;

class LogoutController
{
    public function __invoke()
    {
        session_destroy();

        return header('Location: /login');
    }
}
