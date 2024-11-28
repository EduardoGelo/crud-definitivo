<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nome'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public $timestamps = false;
}