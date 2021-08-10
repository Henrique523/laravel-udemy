<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'desenvolvedores';

    public function projetos()
    {
        return $this->belongsToMany(Projeto::class, 'alocacoes')
            ->withPivot(['horas_semanais']);
    }
}
