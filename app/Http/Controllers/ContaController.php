<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index(Conta $contas)
    {
        $contas = Conta::all();
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

    public function update(Conta $contas, Request $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status)
        ]);
        Conta::find($request->id)->update($data->all());
        $contas = Conta::all();
        return view('contas.index', ['contas' => $contas]);
    }

    public function store(Conta $contas, Request $request)
    {
        $contas->descricao = $request['descricao'];
        $contas->status = $request['status'];
        $contas->save();
        $contas = Conta::all();
        return view('contas.index', ['contas' => $contas]);
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $contas = Conta::find($request->id)->delete();
        $contas = Conta::all();
        return view('contas.index', ['contas' => $contas]);
    }

    public function details(Conta $contas, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $contas = Conta::find($request->id);
        return view('contas.details', ['contas' => $contas]);
    }
}
