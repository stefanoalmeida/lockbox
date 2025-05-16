<?php

namespace App\Controllers;

class DashboardController
{
    public function __invoke()
    {
        if(!auth()) {
            return header('login');
        }

        echo "Estou logado " . auth()->nome . "!";
    }
}