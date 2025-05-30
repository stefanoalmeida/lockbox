<?php

namespace App\Models;

use Core\Database;

class Nota
{
    public $id;
    public $usuario_id;
    public $titulo;
    public $nota;
    public $data_criacao;
    public $data_atualizacao;

    public static function all($pesquisar = null)
    {
        $db = new Database(config('database'));
        if ($pesquisar) {
            return
                $db->query(
                    // Trecho do código feito em aula que não funcionou (testar novamente)
                    // $db->query(
                    // query: "SELECT * FROM notas WHERE usuario_id = :usuario_id" . 
                    // ($pesquisar ? "AND titulo LIKE :pesquisar": null),
                    query: "SELECT * FROM notas WHERE usuario_id = :usuario_id AND titulo LIKE :pesquisar",
                    class: self::class,
                    params: array_merge(['usuario_id' => auth()->id], $pesquisar ? ['pesquisar' => "%$pesquisar%"] : [])

                )->fetchAll();
        } else {
            return
                $db->query(
                    query: "SELECT * FROM notas WHERE usuario_id = :usuario_id",
                    class: self::class,
                    params: ['usuario_id' => auth()->id]
                )->fetchAll();
        };
    }

    public static function update ($id, $titulo, $nota)
    {
        $db = new Database(config('database'));

        $db->query(
            query: "UPDATE notas SET titulo = :titulo, nota = :nota WHERE id = :id",
            params: [
                'id' => $id,
                'titulo' => $titulo,
                'nota' => $nota
            ]
        );
    }

    public static function delete($id)
    {
        $db = new Database(config('database'));

        $db->query(
            query: "DELETE FROM notas WHERE id = :id",
            params: [
                'id' => $id
            ]
        );
    }
}
