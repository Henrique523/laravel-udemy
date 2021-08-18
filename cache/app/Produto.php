<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preco',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'produto_categorias');
    }
}
