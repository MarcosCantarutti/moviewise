<?php

if (!auth()) {
    header('location: /');
}

$filmes  = Filme::myMovies(auth()->id);

view('meus-filmes', compact('filmes'));
