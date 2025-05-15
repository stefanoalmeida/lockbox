<?php

$controller = str_replace('/', '', parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    if (!$controller) $controller = 'index';

    if (!file_exists("../controllers/{$controller}.controller.php")) {
        abort(404);
    }

    require_once "../controllers/{$controller}.controller.php";


