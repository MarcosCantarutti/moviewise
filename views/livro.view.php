<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-stone-950 text-stone-200">

    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between px-8 py-4">
            <div class="font-bold text-xl tracking-wide">Book Wise</div>

            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-lime-500">Explorar</a></li>
                <li><a href="/meus-livros" class="hover:underline">Meus Livros</a></li>
            </ul>

            <ul>
                <li><a href="/login" class="hover:underline">Fazer login</a></li>
            </ul>
        </nav>
    </header>


    <main class="mx-auto max-w-screen-lg space-y-6">

        <!-- livro -->
        <?= $livro->titulo; ?>
        <?php require 'partials/_livro.php'; ?>

        <h2>Avaliações</h2>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3 gap-4">Avaliar
                <?php foreach ($avaliacoes as $avaliacao) : ?>
                    <div class="border border-stone-700 rounded p-2">
                        <?= $avaliacao->avaliacao; ?>
                        <?php
                        echo str_repeat("★", $avaliacao->nota);
                        ?>
                    </div>

                <?php endforeach; ?>
            </div>
            <div>
                <?php if (auth()): ?>
                    <div class="border border-stone-700 rounded">
                        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Me conte oque achou!</h1>
                        <form class=" p-4 space-y-4" method="POST" action="/avaliacao-criar">
                            <?php if ($validacoes = flash()->get('validacoes')) : ?>
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
                                <label class="text-stone-400 mb-1" for="avaliacao">Avaliações</label>
                                <textarea type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name="avaliacao" type="text"></textarea>
                            </div>

                            <div class="flex flex-col">
                                <input type="hidden" name="livro_id"
                                    value="<?= $livro->id; ?>" />
                                <label class="text-stone-400 mb-1" for="password">Nota</label>
                                <select class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name="nota">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>



                            <button type="submit" class="border-stone-800 border-2 rounded-md bg-stone-900 text-stone-400 px-4 py-1 hover:bg-stone-800"> Salvar</button>


                        </form>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </main>

</body>

</html>