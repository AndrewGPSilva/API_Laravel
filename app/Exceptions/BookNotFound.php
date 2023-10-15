<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookNotFound extends ModelNotFoundException
{
    public function __construct(string $id)
    {
        parent::__construct("Livro com ID {$id} não encontrado!");
    }

    public function Message(string $id)
    {
        return response()->json(['message' => 'O livro de ID' . $id . 'não foi encontrado!']);
    }
}
