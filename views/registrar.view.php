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
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4 bg-white">
                    <legend class="text-black text-2xl">Registrar</legend>

                    <label class="label">Nome</label>
                    <input type="text" class="input bg-gray-200 text-gray-600" placeholder="Digite seu nome" />

                    <label class="label">Email</label>
                    <input type="email" class="input bg-gray-200 text-gray-600" placeholder="Digite seu melhor e-mail" />

                    <label class="label">Confirmar e-mail</label>
                    <input type="email-confirmacao" class="input bg-gray-200 text-gray-600" placeholder="Confirme seu e-mail" />

                    <label class="label">Password</label>
                    <input type="password" class="input bg-gray-200 text-gray-600" placeholder="Digite sua senha" />

                    <button class="btn btn-neutral mt-4">Registrar</button>
                    <a href="/login" class="btn btn-link">Já tenho uma conta</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>