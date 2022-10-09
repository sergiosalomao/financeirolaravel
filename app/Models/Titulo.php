<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    use HasFactory;
    public $fillable = ['vencimento','tipo','conta_id','centro_id','fluxo_id','user_id','nrdoc','descricao','valor','destacar','obs','status'];


    public function calculaSaldo($titulos)
    {
        $saldoAnterior = 0;
        $saldo = 0;
        $valor = 0;
        foreach ($titulos as $key => $item) {
            if ($item->tipo ==  'DEBITO') $valor = -$item->valor;
            $titulos[$key]->saldo = $saldoAnterior + $valor;
            if ($item->tipo ==  'CREDITO') $valor = $item->valor;
            $titulos[$key]->saldo = $saldoAnterior + $valor;
            $saldoAnterior = $titulos[$key]->saldo;
            $item->valor =  number_format($item->valor, 2,'.','');
            $item->saldo = number_format($item->saldo, 2,'.','');
        }
        return $titulos;
    }

    public function fluxo(){
        return $this->belongsTo(Fluxo::class, 'fluxo_id', 'id');
    }
    public function centro(){
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    public function conta(){
        return $this->belongsTo(Conta::class, 'conta_id', 'id');
    }


    public function filtros($query, $request){
        if ($request['data-inicio'] && $request['data-fim']) {
            $query->whereBetween('vencimento', [date($request['data-inicio']), date($request['data-fim'])]);
        }
        if ($request['conta_id']) {
            $query->where('conta_id', $request['conta_id']);
        }
        if ($request['fluxo_id']) {
            $query->where('fluxo_id', $request['fluxo_id']);
        }
        if ($request['centro_id']) {
            $query->where('centro_id', $request['centro_id']);
        }
        if ($request['tipo']) {

            $query->where('tipo', $request['tipo']);
        }
        if ($request['nrdoc']) {

            $query->where('nrdoc', 'LIKE', '%' . $request['nrdoc'] . '%');
        }
        if ($request['descricao']) {

            $query->where('descricao', 'ILIKE', '%' . $request['descricao'] . '%');
        }
        if ($request['valor']) {

            $query->where('valor', $request['valor']);
        }
        return $query->orderBy('vencimento', 'asc')->paginate(env('APP_PAGINATE'));
        //dd($query->toSql());
    }

}
