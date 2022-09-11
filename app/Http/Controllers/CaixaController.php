<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Conta;
use App\Models\Fluxo;
use App\Models\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaixaController extends Controller
{
    public function index(Movimento $movimentos)
    {
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'asc')
            ->get();

        $saldos = collect([]);
        $saldoAnterior = 0;
        $saldo = 0;
        $valor = 0;
        $i = 0;
        foreach ($movimentos as $key => $item) {
            if ($item->tipo ==  'DEBITO') $valor = -$item->valor;
            $movimentos[$key]->saldo = $saldoAnterior + $valor;
            if ($item->tipo ==  'CREDITO') $valor = $item->valor;
            $movimentos[$key]->saldo = $saldoAnterior + $valor;
            $saldoAnterior = $movimentos[$key]->saldo;
            $item->valor =  number_format($item->valor, 2);
            $item->saldo = number_format($item->saldo, 2);
        }

        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();

        return view('caixas.index', compact('movimentos', 'contas', 'centros', 'fluxos'));
    }

    public function create()
    {
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();

        return view('caixas.create', compact('fluxos', 'contas', 'centros'));
    }

   

    public function search(Movimento $movimentos, Request $request)
    {
        $query = Movimento::with(['fluxo', 'centro', 'conta']);
        if ($request['data-inicio'] && $request['data-fim']) {

            $query->whereBetween('data', [date($request['data-inicio']), date($request['data-fim'])]);
        }

        if ($request['conta_id']) {

            $query->where('conta_id', $request['conta_id']);
        }

        if ($request['fluxo_id']) {
            $query->where('fluxo_id', $request['fluxo_id']);
        }

        if ($request['tipo']) {

            $query->where('tipo', $request['tipo']);
        }

        if ($request['nrdoc']) {

            $query->where('nrdoc', 'LIKE', '%' . $request['nrdoc'] . '%');
        }

        if ($request['descricao']) {

            $query->where('descricao', 'LIKE', '%' . $request['descricao'] . '%');
        }

        if ($request['valor']) {

            $query->where('valor', $request['valor']);
        }

        $movimentos = $query->orderBy('data', 'asc')
            ->get();

        //dd($query->toSql());

        $saldoAnterior = 0;
        $saldo = 0;
        $valor = 0;
        $i = 0;
        foreach ($movimentos as $key => $item) {
            if ($item->tipo ==  'DEBITO') $valor = -$item->valor;
            $movimentos[$key]->saldo = $saldoAnterior + $valor;
            if ($item->tipo ==  'CREDITO') $valor = $item->valor;
            $movimentos[$key]->saldo = $saldoAnterior + $valor;
            $saldoAnterior = $movimentos[$key]->saldo;
            $item->valor =  number_format($item->valor, 2);
            $item->saldo = number_format($item->saldo, 2);
        }

        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();

        return view('caixas.index', compact('movimentos', 'contas', 'centros', 'fluxos'));
    }
}
