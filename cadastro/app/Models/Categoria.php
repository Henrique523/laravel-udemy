<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
