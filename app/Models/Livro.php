<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $primaryKey = 'id';

    protected $fillable = ['nome', 'autor', 'categoria', 'imagem'];
}
