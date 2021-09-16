<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $fillable = [
        "nomeFantasia",
        "telefone",
        "celular",
        "cnpj",
        "estado",
        "cidade",
        "bairro",
        "rua",
        "numero",
    ];

    public function usuarios(){ //Relacionamento empresa e usuario
        return $this->belongsTo('App\User');
    }

    
    public function vagas(){ //Relacionamento empresa e vaga
        return $this->hasMany('App\Vaga', 'empresa_id');
    }


}
