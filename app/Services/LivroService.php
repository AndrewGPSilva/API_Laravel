<?php

namespace App\Services;

use App\Repositories\LivroRepository;

class LivroService
{
    protected $repository;

    public function __construct(LivroRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() {
        return $this->repository->getAll();
    }

    public function create($dados)
    {
        return $this->repository->create($dados);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function update($dados, $id)
    {
        return $this->repository->update($dados, $id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }
}
