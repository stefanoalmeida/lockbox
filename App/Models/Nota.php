<?php

namespace App\Models;

use Carbon\Carbon;
use Core\Database;

class Nota
{
    public $id;

    public $usuario_id;

    public $titulo;

    public $nota;

    public $data_criacao;

    public $data_atualizacao;

    public function dataCriacao()
    {
        return Carbon::parse($this->data_criacao);
    }

    public function dataAtualizacao()
    {
        return Carbon::parse($this->data_atualizacao);
    }

    public function nota()
    {
        if (session()->get('mostrar')) {
            return decrypt($this->nota);
        }

        return str_repeat('*', 50);
    }

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
                    query: 'SELECT * FROM notas WHERE usuario_id = :usuario_id AND titulo LIKE :pesquisar',
                    class: self::class,
                    params: array_merge(['usuario_id' => auth()->id], $pesquisar ? ['pesquisar' => "%$pesquisar%"] : [])

                )->fetchAll();
        } else {
            return
                $db->query(
                    query: 'SELECT * FROM notas WHERE usuario_id = :usuario_id',
                    class: self::class,
                    params: ['usuario_id' => auth()->id]
                )->fetchAll();
        }
    }

    public static function create($data)
    {
        $DB = new Database(config('database'));

        $DB->query(
            query: 'INSERT INTO notas (usuario_id, titulo, nota, data_criacao, data_atualizacao) 
            VALUES (:usuario_id, :titulo, :nota, :data_criacao, :data_atualizacao)',
            params: array_merge($data, [
                'data_criacao' => date('Y-m-d H:i:s'),
                'data_atualizacao' => date('Y-m-d H:i:s'),
            ])
        );
    }

    public static function update($id, $titulo, $nota)
    {
        $db = new Database(config('database'));

        $set = 'titulo = :titulo';

        if ($nota) {
            $set .= ', nota = :nota';
        }

        $db->query(
            query: "UPDATE notas SET $set WHERE id = :id",
            params: array_merge([
                'id' => $id,
                'titulo' => $titulo,
            ], $nota ? ['nota' => encrypt($nota)] : [])
        );
    }

    public static function delete($id)
    {
        $db = new Database(config('database'));

        $db->query(
            query: 'DELETE FROM notas WHERE id = :id',
            params: [
                'id' => $id,
            ]
        );
    }
}
