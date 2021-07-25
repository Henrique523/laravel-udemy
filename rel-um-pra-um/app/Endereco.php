<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cliente_id',
        'rua',
        'numero',
        'bairro',
        'cidade',
        'UF',
        'CEP',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cliente()
    {
//        return $this->belongsTo(Cliente::class);
//        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
