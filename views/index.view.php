<form class="w-full flex space-x-2 mt-6">
    <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" placeholder="Pesquisar..." name="pesquisar">
    <button type="submit"> &#9740; </button>
</form>


<section class="grid-cols-1 md:grid-cols-2 lg:grid-cols-4 grid gap-4">
    <?php foreach ($filmes as $filme) {
        require 'partials/_filme.php';
    } ?>

</section>