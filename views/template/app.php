<!doctype html>
<html lang="pt-BR" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>LockBox</title>
</head>

<body>
    <div class="mx-auto max-w-screen-lg flex flex-col h-screen space-y-6">
        <?php require base_path('views/partials/_navbar.view.php') ?>

        <?php require base_path('views/partials/_pesquisar.view.php') ?>

        <?php require base_path('views/partials/_mensagem.view.php') ?>

        <div class="flex flex-grow pb-6">
            <?php require_once base_path("views/{$view}.view.php") ?>
        </div>
    </div>
</body>

</html>