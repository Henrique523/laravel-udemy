<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_categorias');
    }
}
