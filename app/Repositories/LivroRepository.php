<?php

namespace App\Repositories;

use App\Models\Livro;

class LivroRepository {

    public function getAll()
    {
        $livros = Livro::all();
        return $livros;
    }
}
