<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Repositories\LivroRepository;

class LivroController extends Controller
{
    protected $repository;

    public function __construct(LivroRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $livros = $this->repository->getAll();
        return response()->json($livros, 200);
    }

    public function create(LivroRequest $request)
    {
        $livroCriado = $this->repository->create($request);
        return response()->json($livroCriado, 201);
    }
}
