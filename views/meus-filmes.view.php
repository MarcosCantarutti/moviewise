<h1 class="mt-6 font-bold text-lg">Meus filmes</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 flex flex-col gap-4">
        <?php foreach ($filmes as $filme) {
            require 'partials/_filme.php';
        } ?>
    </div>

    <div>
        <div class="border border-stone-700 rounded">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastre um novo filme!</h1>
            <form class=" p-4 space-y-4" method="POST" action="/filme-criar" enctype="multipart/form-data">
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
                    <label class="text-stone-400 mb-1" for="imagem">Imagem</label>
                    <input type="file" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name='imagem'>
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="titulo">T�tulo</label>
                    <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name="titulo" type="text" />
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="diretor">Diretor</label>
                    <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name="diretor" type="text" />
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="titulo">Descri��o</label>
                    <textarea type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name="descricao" type="text"></textarea>
                </div>
                <div class="flex flex-col">
                    <label class="text-stone-400 mb-1" for="ano_de_lancamento">Ano de lan�amento</label>
                    <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" name="ano_de_lancamento" type="text" />
                </div>


                <button type="submit" class="border-stone-800 border-2 rounded-md bg-stone-900 text-stone-400 px-4 py-1 hover:bg-stone-800"> Salvar</button>


            </form>
        </div>
    </div>
</div>