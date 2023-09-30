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
        return $livros = $this->repository->getAll();
        return response()->json($livros, 200);
    }

    public function create(LivroRequest $request)
    {
        $livroCriado = $this->repository->create($request);
        return response()->json($livroCriado, 201);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

    public function update(LivroRequest $request, $id)
    {
        $livroEditado = $this->repository->update($request, $id);
        return response()->json($livroEditado);
    }

    public function show($id)
    {
        $livro = $this->repository->show($id);
        return response()->json($livro);
    }
}
