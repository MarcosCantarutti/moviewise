<div class="p-2 rounded border-stone-800 border-2 bg-stone-900 ">

    <div class="flex">
        <div class="w-1/3"><img src="<?= $filme->imagem ?>" class="w-60 rounded"></div>
        <div class="space-y-1">
            <a href="/filme?id=<?= $filme->id; ?>" class="font-semibold hover:underline"> <?= $filme->titulo; ?></a>
            <div class="text-xs italic"> <?= $filme->diretor; ?></div>
            <div class="text-xs italic"><?= $notaFinal = str_repeat('?', $filme->nota_avaliacoes); ?>(<?= $filme->count_avaliacoes; ?>)</div>
        </div>
    </div>

    <div class="text-sm mt-2">
        <?= $filme->descricao; ?>
    </div>
</div>