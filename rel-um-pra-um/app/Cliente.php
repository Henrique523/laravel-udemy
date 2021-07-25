<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function endereco()
    {
//        return $this->hasOne(Endereco::class);
        return $this->hasOne(Endereco::class, 'cliente_id', 'id');
    }
}
