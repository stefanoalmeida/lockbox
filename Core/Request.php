<?php

namespace Core;

class Request
{
    public function get($chave, $valor = null, $prefixo = null)
    {
        return isset($_GET[$chave])
        ? ($prefixo ?: null).$_GET[$chave]
        : $valor;
    }

    public function post($chave, $valor = null, $prefixo = null)
    {
        return isset($_POST[$chave])
        ? ($prefixo ?: null).$_POST[$chave]
        : $valor;
    }

    public function all()
    {
        return $_POST;
    }
}
