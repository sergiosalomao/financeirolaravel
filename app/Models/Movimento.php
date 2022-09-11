<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;
    
    
    public $fillable = ['saldo','data','tipo','conta_id','centro_id','fluxo_id','user_id','titulo_id','nrdoc','descricao','valor','destacar','obs'];

    public function fluxo(){
        return $this->belongsTo(Fluxo::class, 'fluxo_id', 'id');
    }
    public function centro(){
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    public function conta(){
        return $this->belongsTo(Conta::class, 'conta_id', 'id');
    }
}
