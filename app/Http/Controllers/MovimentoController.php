<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Conta;
use App\Models\Fluxo;
use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    public function index(Movimento $movimentos)
    {
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'DESC')
            ->get();

          
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

        return view('movimentos.index', compact('movimentos', 'contas', 'centros', 'fluxos'));

    
    }

    public function create()
    {
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();

        return view('movimentos.create', compact('fluxos','contas','centros'));
    }

    public function edit(Movimento $movimentos, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $movimentos = Movimento::find($request->id);
        return view('movimentos.edit', ['movimentos' => $movimentos]);
    }

    public function update(Movimento $movimentos, Request $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status),
            "tipo"          => trim($request->tipo)
        ]);
        Movimento::find($request->id)->update($data->all());
        
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
        ->orderBy('data', 'DESC')
        ->get();
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.index', compact('movimentos','contas','centros','fluxos'));
    }

    public function store(Movimento $movimentos, Request $request)
    {
        
        $movimentos->data = $request['data'];
        $movimentos->tipo = $request['tipo'];
        $movimentos->conta_id = $request['conta_id'];
        $movimentos->centro_id = $request['centro_id'];
        $movimentos->fluxo_id = $request['fluxo_id'];
        $movimentos->user_id = $request['user_id'];
        $movimentos->titulo_id = $request['titulo_id'];
        $movimentos->nrdoc = $request['nrdoc'];
        $movimentos->descricao = $request['descricao'];
        $movimentos->valor = $request['valor'];
        $movimentos->destacar = $request['destacar'];
        $movimentos->obs = $request['obs'];

        $movimentos->save();
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
        ->orderBy('data', 'DESC')
        ->get();
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();

    return view('caixas.index', compact('movimentos','contas','centros','fluxos'));
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $movimentos = Movimento::find($request->id)->delete();
        $movimentos = Movimento::all();
        return view('movimentos.index', ['movimentos' => $movimentos]);
    }

    public function details(Movimento $movimentos, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $movimentos = Movimento::find($request->id);
        return view('movimentos.details', ['movimentos' => $movimentos]);
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

        return view('movimentos.index', compact('movimentos', 'contas', 'centros', 'fluxos'));

     
    }
}
