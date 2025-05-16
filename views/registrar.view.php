<div class="grid grid-cols-2">
    <div class="hero min-h-screen flex ml-40">
        <div class="hero-content -mt-20">
            <div>
                <p class="py-2 text-xl">Bem vindo ao</p>
                <h1 class="text-6xl font-bold">LockBox</h1>
                <p class="py-4 text-xl pb-4">
                    onde você guarda <span class="italic">tudo</span> com segurança.
                </p>
            </div>
        </div>
    </div>
    <div class="bg-white hero mr-40 min-h-screen text-black">
        <div class="hero-content -mt-20">
            <form action="/registrar" method="post">
                <?php
                $validacoes = flash()->get('validacoes');
                ?>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 bg-white">
                    <legend class="text-black text-2xl">Registrar</legend>

                    <?php if ($mensagem = flash()->get('mensagem')) : ?>
                        <div role="alert" class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span><?= $mensagem ?></span>
                        </div>
                    <?php endif ?>


                    <label class="label">Nome</label>
                    <input
                        type="text"
                        name="nome"
                        class="input bg-gray-200 text-gray-600"
                        placeholder="Digite seu nome"
                        value="<?= old('nome') ?>" />
                    <?php if (isset($validacoes['nome'])) : ?>
                        <div class="label text-xs text-error"><?= $validacoes['nome'][0] ?>
                        </div>
                    <?php endif ?>

                    <label class="label">Email</label>
                    <input
                        type="text"
                        name="email"
                        class="input bg-gray-200 text-gray-600"
                        placeholder="Digite seu melhor e-mail"
                        value="<?= old('email') ?>" />
                    <?php if (isset($validacoes['email'])) : ?>
                        <div class="label text-xs text-error"><?= $validacoes['email'][0] ?>
                        </div>
                    <?php endif ?>

                    <label class="label">Confirmar e-mail</label>
                    <input
                        type="text"
                        name="email_confirmacao"
                        class="input bg-gray-200 text-gray-600"
                        placeholder="Confirme seu e-mail"
                        value="<?= old('email_confirmacao') ?>" />

                    <label class="label">Password</label>
                    <input
                        type="password"
                        name="senha"
                        class="input bg-gray-200 text-gray-600"
                        placeholder="Digite sua senha"
                        value="<?= old('senha') ?>" />
                    <?php if (isset($validacoes['senha'])) : ?>
                        <div class="label text-xs text-error"><?= str_replace('O', 'A', $validacoes['senha'][0]) ?>
                        </div>
                    <?php endif ?>

                    <button class="btn btn-neutral mt-4">Registrar</button>
                    <a href="/login" class="btn btn-link">Já tenho uma conta</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>