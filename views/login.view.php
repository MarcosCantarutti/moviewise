<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form class=" p-4 space-y-4" method="POST">
            <?php if ($validacoes = flash()->get('validacoes_login')) : ?>
                <div class="border-red-800 border-2 rounded-md bg-red-900 text-red-400 px-4 py-1">
                    <ul>

                        <li>Deu ruim!</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email">Email</label>
                <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Email" name="email" required type="email">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="password">Senha</label>
                <input class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Senha" name="password" required type="password">
            </div>

            <button type="submit" class="border-stone-800 border-2 rounded-md bg-stone-900 text-stone-400 px-4 py-1 hover:bg-stone-800"> Logar</button>


        </form>
    </div>

    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
        <form class=" p-4 space-y-4" method="POST" action="/registrar">

            <?php if ($validacoes = flash()->get('validacoes_registrar')) : ?>
                <div class="border-red-800 border-2 rounded-md bg-red-900 text-red-400 px-4 py-1">
                    <ul>

                        <li>Deu ruim!</li>
                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="name">Nome</label>
                <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Nome" name="name" required type="name">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email">Email</label>
                <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Email" name="email" required type="email">
            </div>


            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="email_confirm">Confirmar email</label>
                <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Confirmar email" name="email_confirm" required type="email">
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="password">Senha</label>
                <input class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Senha" name="password" required type="password">
            </div>

            <button type="reset" class="border-stone-800 border-2 rounded-md bg-stone-900 text-stone-400 px-4 py-1 hover:bg-stone-800"> Cancelar</button>
            <button type="submit" class="border-stone-800 border-2 rounded-md bg-stone-900 text-stone-400 px-4 py-1 hover:bg-stone-800"> Registrar</button>


        </form>
    </div>

</div>