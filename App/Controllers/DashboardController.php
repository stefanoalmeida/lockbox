<?php

namespace App\Controllers;

use App\Models\Nota;

class DashboardController
{
    public function __invoke()
    {
        $pesquisar = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : null;
        $notas = Nota::all($pesquisar);

        $id = isset($_GET['id']) ? $_GET['id'] : (sizeof($notas) > 0 ? $notas[0]->id : null);

        $filtro = array_filter($notas, fn($n) => $n->id == $id);
        $notaSelecionada = array_pop($filtro);

        if (!$notaSelecionada) {
            return view('notas/nao-encontrada');
        }

        return view('dashboard', [
            'notas' => $notas,
            'notaSelecionada' => $notaSelecionada
        ]);
    }
}
