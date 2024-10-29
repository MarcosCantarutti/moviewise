<?php

$id = $_GET['id'];



$livro = Livro::get($id);

$avaliacoes = $database->query('SELECT * FROM avaliacoes WHERE livro_id = :id', Avaliacao::class, ['id' => $id])->fetchAll();

view('livro', compact('livro', 'avaliacoes'));
