<?php

namespace App\Repositories;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;

class LivroRepository {

    protected $model;

    public function __construct(Livro $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        $livros = $this->model->all();
        return $livros;
    }

    public function create(LivroRequest $request)
    {
        $dados = $request->all();
        $livroCriado = $this->model->create($dados);
        return $livroCriado;
    }
}
