<div class="bg-base-300 rounded-l-box w-56 flex flex-col text-center">
    <?php foreach ($notas as $key => $nota) : ?>
        <a href="/notas?id=<?= $nota->id ?><?= request()->get('pesquisar', '', '&pesquisar=') ?>" class="w-full p-2 cursor-pointer hover:bg-base-200
        <?php if ($key == 0): ?> rounded-tl-box <?php endif ?>
        <?php if ($nota->id == $notaSelecionada->id): ?> bg-base-200 <?php endif ?>">
            <?= $nota->titulo ?>
        </a>
    <?php endforeach ?>
</div>
<div class="bg-base-200 rounded-r-box w-full p-10 flex flex-col space-y-6">
    <form action="/nota" method="POST" id="form-atualizacao">
        <?php
        $validacoes = flash()->get('validacoes');
        ?>
        <input type="hidden" name="__method" value="PUT">
        <input type="hidden" name="id" value="<?= $notaSelecionada->id ?>">
        <fieldset class="fieldset">
            <legend class="fieldset-legend">Título</legend>
            <input type="text" name="titulo" class="input w-full" placeholder="Digite o seu título" value="<?= $notaSelecionada->titulo ?>" />
            <?php if (isset($validacoes['titulo'])) : ?>
                <div class="label text-xs text-error"><?= $validacoes['titulo'][0] ?>
                </div>
            <?php endif ?>
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">Sua nota</legend>
            <textarea class="textarea h-24 w-full" name="nota" placeholder=""><?= $notaSelecionada->nota ?></textarea>
            <?php if (isset($validacoes['nota'])) : ?>
                <div class="label text-xs text-error"><?= $validacoes['nota'][0] ?>
                </div>
            <?php endif ?>
        </fieldset>
    </form>

    <div class="flex justify-between items-center">
        <form action="/nota" method="POST">
            <input type="hidden" name="__method" value="DELETE">
            <input type="hidden" name="id" value="<?= $notaSelecionada->id ?>">
            <button class="btn btn-error" type="submit">Deletar</button>
        </form>
        <button class="btn btn-primary" type="submit" form="form-atualizacao">Atualizar</button>
    </div>
</div>