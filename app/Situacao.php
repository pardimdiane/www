<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $table = 'situacaos';

    // protected $fillable = [
    //     'situacoes'
    // ];

    public function vagas(){  //Relacionamento situação e vaga
        return $this->hasMany('App\Vaga');
    }
}

