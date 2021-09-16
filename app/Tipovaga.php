<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipovaga extends Model
{
    protected $table = 'tipovagas';


    public function vagas(){ //Relacionamento tipoDaVaga e vaga
        return $this->hasMany('App\Vaga');
    }
}
