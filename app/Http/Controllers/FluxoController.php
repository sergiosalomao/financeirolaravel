<?php

namespace App\Http\Controllers;

use App\Http\Requests\FluxoRequest;
use App\Models\Fluxo;
use Illuminate\Http\Request;

class FluxoController extends Controller
{
    public function index(Fluxo $fluxos)
    {
        $fluxos = Fluxo::paginate(env('APP_PAGINATE'));;
        return view('fluxos.index', compact('fluxos'));
    }

    public function create()
    {
        return view('fluxos.create');
    }

    public function edit(Fluxo $fluxos, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $fluxos = Fluxo::find($request->id);
        return view('fluxos.edit', ['fluxos' => $fluxos]);
    }

    public function update(Fluxo $fluxos, FluxoRequest $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status),
            "tipo"          => trim($request->tipo)
        ]);
        Fluxo::find($request->id)->update($data->all());
        $fluxos = Fluxo::paginate(env('APP_PAGINATE'));;
        return view('fluxos.index', ['fluxos' => $fluxos])->with('message', ['tipo'=>'success','texto'=>'Registro alterado com sucesso!']);;
    }

    public function store(Fluxo $fluxos, FluxoRequest $request)
    {
        $fluxos->descricao = $request['descricao'];
        $fluxos->status = $request['status'];
        $fluxos->tipo = $request['tipo'];
        $fluxos->save();
        $fluxos = Fluxo::paginate(env('APP_PAGINATE'));;
        return view('fluxos.index', ['fluxos' => $fluxos])->with('message', ['tipo'=>'success','texto'=>'Registro salvo com sucesso!']);;
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $fluxos = Fluxo::find($request->id)->delete();
        $fluxos = Fluxo::paginate(env('APP_PAGINATE'));;
        return view('fluxos.index', ['fluxos' => $fluxos])->with('message', ['tipo'=>'success','texto'=>'Registro excluído com sucesso!']);;
    }

    public function details(Fluxo $fluxos, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $fluxos = Fluxo::find($request->id);
        return view('fluxos.details', ['fluxos' => $fluxos]);
    }
}
