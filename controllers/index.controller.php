<?php


$pesquisar = $_REQUEST['pesquisar'] ?? '';

$filmes = Filme::all($pesquisar);

view('index', compact('filmes'));
