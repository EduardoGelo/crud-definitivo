<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    // Especificando o nome correto da tabela
    protected $table = 'materiais';

    protected $fillable = [
        'nome',
        'quantidade',
        'unidade_medida',
        'categoria',
    ];
}
