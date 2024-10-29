<?php

if (!auth()) {
    header('location: /');
}

$livros  = Livro::myBooks(auth()->id);

view('meus-livros', compact('livros'));
