<?php

$id = $_GET['id'];

$filme = Filme::get($id);

$avaliacoes = $database->query('SELECT * FROM avaliacoes WHERE filme_id = :id', Avaliacao::class, ['id' => $id])->fetchAll();

view('filme', compact('filme', 'avaliacoes'));
