<?php

namespace App\Controllers;

use App\Models\Usuario;
use Core\Database;
use Core\Validacao;

class LoginController
{
    public function index()
    {
        return view('login', template: 'guest');
    }

    public function login()
    {
        $email = request()->post('email');
        $senha = request()->post('senha');

        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'senha' => ['required'],
        ], request()->all());

        if ($validacao->naoPassou()) {
            return view('login', template: 'guest');
        }

        $DB = new Database(config('database'));

        $usuario = $DB->query(
            query: 'SELECT * FROM usuarios WHERE email = :email',
            class: Usuario::class,
            params: compact('email')
        )->fetch();

        if (! ($usuario && password_verify($senha, $usuario->senha))) {
            flash()->push('validacoes', ['email' => ['Usuário ou senha inválidos!']]);

            return view('login', template: 'guest');
        }

        session()->set('auth', $usuario);
        flash()->push('mensagem', "Seja bem vindo {$usuario->nome}!");

        return redirect('/notas');
    }
}
