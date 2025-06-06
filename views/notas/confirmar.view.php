<div class="bg-base-300 rounded-box w-full flex flex-col items-center justify-center space-y-4 text-xl font-bold">
    <form action="/mostrar" method="POST" class="max-w-md flex flex-col gap-4">
        <?php
        $validacoes = flash()->get('validacoes');
        ?>
        <div class="text-center">Digite sua senha para começar a ver todas as suas notas descriptografadas:</div>

        <legend class="fieldset-legend">Senha</legend>
        <input type="password" name="senha" class="input w-full" />
        <?php if (isset($validacoes['senha'])) : ?>
            <div class="label text-xs text-error"><?= $validacoes['senha'][0] ?>
            </div>
        <?php endif ?>

        <button class="btn btn-primary">Abrir minhas notas</button>
    </form>
</div>