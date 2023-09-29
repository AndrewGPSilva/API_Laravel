<?php

namespace App\Http\Controllers;

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
}
