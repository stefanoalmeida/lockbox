<div class="bg-base-300 rounded-l-box w-56">
    <div class="bg-base-200 p-4 rounded-tl-box">
        + Nova Nota
    </div>
</div>
<div class="bg-base-200 rounded-r-box w-full p-10">
    <?php require base_path('views/partials/_mensagem.view.php') ?>
    <form action="/notas/criar" method="post" class="flex flex-col space-y-6">
        <?php
        $validacoes = flash()->get('validacoes');
    ?>
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Título</legend>
            <input type="text" name="titulo" class="input w-full" placeholder="Digite o seu título" />
            <?php if (isset($validacoes['titulo'])) { ?>
                <div class="label text-xs text-error"><?= $validacoes['titulo'][0] ?>
                </div>
            <?php } ?>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Sua nota</legend>
            <textarea class="textarea h-24 w-full" name="nota" placeholder=""></textarea>
            <?php if (isset($validacoes['nota'])) { ?>
                <div class="label text-xs text-error"><?= $validacoes['nota'][0] ?>
                </div>
            <?php } ?>
        </fieldset>

        <div class="flex justify-end items-center">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>