<?php

namespace App\Http\Controllers;

use App\Http\Requests\SacadoRequest;
use App\Models\Sacado;
use Illuminate\Http\Request;

class SacadoController extends Controller
{
    public function index(Sacado $sacados)
    {
        $sacados = Sacado::paginate(env('APP_PAGINATE'));;
        return view('sacado.index', compact('sacados'));
    }

    public function create()
    {
        return view('sacado.create');
    }

    public function edit(Sacado $sacados, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $sacados = Sacado::find($request->id);
        return view('sacado.edit', ['sacados' => $sacados]);
    }

    public function update(Sacado $sacados, SacadoRequest $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status)
        ]);
        Sacado::find($request->id)->update($data->all());
        $sacados = Sacado::paginate(env('APP_PAGINATE'));;
        return view('sacado.index', ['sacados' => $sacados])->with('message', ['tipo'=>'success','texto'=>'Registro alterado com sucesso!']);;
    }

    public function store(Sacado $sacados, SacadoRequest $request)
    {
        $sacados->descricao = $request['descricao'];
        $sacados->status = $request['status'];
        $sacados->save();
        $sacados = Sacado::paginate(env('APP_PAGINATE'));;
        return view('sacado.index', ['sacados' => $sacados])->with('message', ['tipo'=>'success','texto'=>'Registro salvo com sucesso!']);;
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $sacados = Sacado::find($request->id)->delete();
        $sacados = Sacado::paginate(env('APP_PAGINATE'));;
        return view('sacado.index', ['sacados' => $sacados])->with('message', ['tipo'=>'success','texto'=>'Registro excluído com sucesso!']);;
    }

    public function details(Sacado $sacados, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $sacados = Sacado::find($request->id);
        return view('sacado.details', ['sacados' => $sacados]);
    }
}
