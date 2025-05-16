<?php
require "../Core/helpers.php";

spl_autoload_register(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

session_start();

require_once base_path("/config/routes.php");

