<?php

namespace App\Controllers\Notas;

use App\Models\Nota;

class IndexController
{
    public function __invoke()
    {
        $pesquisar = request()->get('pesquisar');
        
        $notas = Nota::all($pesquisar);

        $notaSelecionada = $this->getNotaSlecionada($notas);

        if (!$notaSelecionada) {
            return view('notas/nao-encontrada');
        }

        return view('notas/index', [
            'notas' => $notas,
            'notaSelecionada' => $notaSelecionada
        ]);
    }

    private function getNotaSlecionada($notas)
    {
        $id = request()->get('id', sizeof($notas) > 0 ? $notas[0]->id : null);

        $filtro = array_filter($notas, fn($n) => $n->id == $id);
        return array_pop($filtro);
    }
}
