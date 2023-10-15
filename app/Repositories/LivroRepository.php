<?php

namespace App\Repositories;

use App\Exceptions\BookNotFound;
use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LivroRepository
{

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
        try {
            $dados = $request->all();
            $livroCriado = $this->model->create($dados);
            return response()->json(["message" => "Livro cadastrado com sucesso!", "livro" => $livroCriado], 201);
        } catch (\Exception $e) {
            return response()->json(["message" => "Falha no cadastro: " . $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $livro = $this->model->findOrFail($id);
            $livro->delete();
            return response()->json(["message" => "Livro removido com sucesso!"], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "Livro não encontrado"], 404);
        } catch (\Exception $e) {
            return response()->json(["message" => "Erro ao remover o livro: " . $e->getMessage()], 500);
        }
    }

    public function update(LivroRequest $request, $id)
    {
        try {
            $livro = $this->model->findOrFail($id);
            $dadosLivro = $request->all();
            $livro->update($dadosLivro);
            return response()->json(["message" => "Livro atualizado com sucesso!", "livro" => $livro], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "Livro não encontrado"], 404);
        } catch (\Exception $e) {
            return response()->json(["message" => "Erro ao atualizar o livro: " . $e->getMessage()], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $livro = $this->model->findOrFail($id);
        } catch (BookNotFound $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }

        return response()->json(['livro'=> $livro]);
    }

    public function bynome()
    {
        $livros = $this->model->orderBy('nome')->get();
        return $livros;
    }

    public function bycategoria()
    {
        $livros = $this->model->orderBy('categoria')->get();
        return $livros;
    }

    public function byautor()
    {
        $livros = $this->model->orderBy('autor')->get();
        return $livros;
    }
}
