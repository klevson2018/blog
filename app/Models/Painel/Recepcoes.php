<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Recepcoes extends Model
{
    protected $fillable = ['paciente_id','descricao','urgencia','dataent'];
    
   protected $dates = ['dataent'];
 

    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }
} 