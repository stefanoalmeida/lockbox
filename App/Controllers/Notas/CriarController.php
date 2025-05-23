<?php

namespace App\Controllers\Notas;

class CriarController
{
    public function index()
    {
        return view('notas/criar');
    }

    public function store() 
    {
        var_dump($_POST);
        die();
    }
}