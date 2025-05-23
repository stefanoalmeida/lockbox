<?php

namespace App\Controllers;

use Core\Database;
use Core\Validacao;
use App\Models\Usuario;

class LoginController
{
    public function index()
    {
        return view('login', template: 'guest');
    }

    public function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $validacao = Validacao::validar([
            'email' => ['required', 'email'],
            'senha' => ['required']
        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('login', template: 'guest');
        }

        $DB = new Database(config('database'));

        $usuario = $DB->query(
            query: "SELECT * FROM usuarios WHERE email = :email",
            class: Usuario::class,
            params: compact('email')
        )->fetch();

        if (!($usuario && password_verify($senha, $usuario->senha))) {
            flash()->push('validacoes', ['email' => ['Usuário ou senha inválidos!']]);
            return view('login', template: 'guest');
        }

        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', "Seja bem vindo {$usuario->nome}!");
        return header('Location: /dashboard');
    }
}
