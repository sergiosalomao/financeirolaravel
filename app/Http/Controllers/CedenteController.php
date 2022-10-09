<?php

namespace App\Http\Controllers;

use App\Http\Requests\CedenteRequest;
use App\Models\Cedente;
use Illuminate\Http\Request;

class CedenteController extends Controller
{
    public function index(Cedente $cedentes)
    {
        $cedentes = Cedente::paginate(env('APP_PAGINATE'));;
        return view('cedente.index', compact('cedentes'));
    }

    public function create()
    {
        return view('cedente.create');
    }

    public function edit(Cedente $cedentes, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $cedentes = Cedente::find($request->id);
        return view('cedente.edit', ['cedentes' => $cedentes]);
    }

    public function update(Cedente $cedentes, CedenteRequest $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status)
        ]);
        Cedente::find($request->id)->update($data->all());
        $cedentes = Cedente::paginate(env('APP_PAGINATE'));;
        return view('cedente.index', ['cedentes' => $cedentes])->with('message', ['tipo'=>'success','texto'=>'Registro alterado com sucesso!']);;
    }

    public function store(Cedente $cedentes, CedenteRequest $request)
    {
        $cedentes->descricao = $request['descricao'];
        $cedentes->status = $request['status'];
        $cedentes->save();
        $cedentes = Cedente::paginate(env('APP_PAGINATE'));;
        return view('cedente.index', ['cedentes' => $cedentes])->with('message', ['tipo'=>'success','texto'=>'Registro salvo com sucesso!']);;
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $cedentes = Cedente::find($request->id)->delete();
        $cedentes = Cedente::paginate(env('APP_PAGINATE'));;
        return view('cedente.index', ['cedentes' => $cedentes])->with('message', ['tipo'=>'success','texto'=>'Registro excluído com sucesso!']);;
    }

    public function details(Cedente $cedentes, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $cedentes = Cedente::find($request->id);
        return view('cedente.details', ['cedentes' => $cedentes]);
    }
}
