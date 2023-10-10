<?php

namespace App\Exceptions;

use Exception;

class BookNotFound extends Exception
{
    public function __construct(string $id)
    {
        parent::__construct("Livro com ID {$id} não encontrado!");
    }
}
