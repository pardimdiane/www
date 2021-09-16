<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';


    public function vagas(){ //Relacionamento areas e vagas 
        return $this->hasMany('App\Vaga');
    }

    
}
