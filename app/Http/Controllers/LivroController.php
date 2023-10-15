<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use App\Repositories\Livroservice;
use App\Services\LivroService as ServicesLivroService;

class LivroController extends Controller
{
    protected $service;

    public function __construct(ServicesLivroService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $livros = $this->service->getAll();
        return response()->json($livros, 200);
    }

    public function create(LivroRequest $request)
    {
        $livroCriado = $this->service->create($request);
        return response()->json($livroCriado, 201);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function update(LivroRequest $request, $id)
    {
        $livroEditado = $this->service->update($request, $id);
        return response()->json($livroEditado);
    }

    public function show($id)
    {
        $livro = $this->service->show($id);
        return response()->json($livro);
    }

    public function order()
    {
        $livro = Livro::orderBy('nome')->get();
        return response()->json(["message"=> "Ordenado por ordem alfábetica!", $livro]);
    }
}
