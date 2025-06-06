<?php

namespace Core;

class Session
{
    public function get($chave, $padrao = null)
    {
        return isset($_SESSION[$chave]) ? $_SESSION[$chave] : $padrao;
    }

    public function set($chave, $valor)
    {
        $_SESSION[$chave] = $valor;
    }

    public function forget($chave)
    {
        unset ($_SESSION[$chave]);
    }
}