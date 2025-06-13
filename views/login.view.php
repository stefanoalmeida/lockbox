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
            <form action="/login" method="post">
                <?php
                $validacoes = flash()->get('validacoes');
                ?>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 bg-white">
                    <legend class="text-black text-2xl">Login</legend>

                    <label class="label">Email</label>
                    <input
                        type="text"
                        name="email"
                        class="input bg-gray-200 text-gray-600"
                        placeholder="Email"
                        value="<?= old('email') ?>" />
                    <?php if (isset($validacoes['email'])) { ?>
                        <div class="label text-xs text-error"><?= $validacoes['email'][0] ?>
                        </div>
                    <?php } ?>

                    <label class="label">Password</label>
                    <input
                        type="password"
                        name="senha"
                        class="input bg-gray-200 text-gray-600"
                        placeholder="Digite sua senha" />
                    <?php if (isset($validacoes['senha'])) { ?>
                        <div class="label text-xs text-error"><?= $validacoes['senha'][0] ?></div>
                    <?php } ?>
                    <button class="btn btn-neutral mt-4">Login</button>
                    <a href="/registrar" class="btn btn-link">Registrar</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>