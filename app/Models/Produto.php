<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['nome', 'preco', 'quantidade', 'categorias_id'];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public $timestamps = false;
}
