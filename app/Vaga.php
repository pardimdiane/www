<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $table = 'vagas';

    protected $fillable = [
        "situacao_id",
        "tipoVaga_id",
        "area_id",
        "nome",
        "descricao",
        "requisitos",
        "salario",
        "contatoVaga",
        "local",
        
    ];


    public function empresas(){//Relacionamento vaga e empresa
        return $this->belongsTo('App\Empresa');
    }

    public function situacaos(){ //Relacionamento vaga e situação
        return $this->belongsTo('App\Situacao');
    }

    public function tipovagas(){ //Relacionamento vaga e tipoDaVaga
        return $this->belongsTo('App\Tipovaga');
    }

    public function areas(){ //Relacionamento vagas e areas 
        return $this->belongsTo('App\Area');
    }

}
