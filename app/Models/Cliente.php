<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['nome', 'email', 'cpf'];

    public $timestamps = false;

   // public function NomeDaTabelaQueVaiMandar'em minusculo, é uma função'()
   // {
   //     return $this->hasMany(NomeClasse::class, 'clientes_id');
   // }

}
