<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    public function tipoOcorrencias()
    {
        return $this->belongsTo('App\TipoOcorrencia');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
