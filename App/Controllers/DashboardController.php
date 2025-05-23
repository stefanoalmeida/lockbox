<?php

namespace App\Controllers;

class DashboardController
{
    public function __invoke()
    {
        if(!auth()) {
            return header('login');
        }

        return view('dashboard', [
            'user' => auth()
        ]);
    }
}