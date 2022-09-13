<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index(Conta $contas)
    {
        $contas = Conta::paginate(15);;
        return view('contas.index', compact('contas'));
    }

    public function create()
    {
        return view('contas.create');
    }

    public function edit(Conta $contas, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $contas = Conta::find($request->id);
        return view('contas.edit', ['contas' => $contas]);
    }

    public function update(Conta $contas, ContaRequest $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status)
        ]);
        Conta::find($request->id)->update($data->all());
        $contas = Conta::paginate(15);;
        return view('contas.index', ['contas' => $contas])->with('successMsg','Registro alterado com sucesso!');
    }

    public function store(Conta $contas, ContaRequest $request)
    {
        $contas->descricao = $request['descricao'];
        $contas->status = $request['status'];
        $contas->save();
        $contas = Conta::paginate(15);;
        return view('contas.index', ['contas' => $contas])->with('successMsg','Registro salvo com sucesso!');
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $contas = Conta::find($request->id)->delete();
        $contas = Conta::paginate(15);;
        return view('contas.index', ['contas' => $contas])->with('successMsg','Registro excluido com sucesso!');;
    }

    public function details(Conta $contas, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $contas = Conta::find($request->id);
        return view('contas.details', ['contas' => $contas]);
    }
}
