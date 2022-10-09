<?php

namespace App\Http\Controllers;

use App\Http\Requests\CentroRequest;
use App\Models\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index(Centro $centros)
    {
        $centros = Centro::paginate(env('APP_PAGINATE'));
        return view('centros.index', compact('centros'));
    }

    public function create()
    {
        return view('centros.create');
    }

    public function edit(Centro $centros, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $centros = Centro::find($request->id);
        return view('centros.edit', ['centros' => $centros]);
    }

    public function update(Centro $centros, CentroRequest $request)
    {
        $data = collect([]);
        $data = $data->merge([
            "descricao"       => trim($request->descricao),
            "status"          => trim($request->status)
        ]);
        Centro::find($request->id)->update($data->all());
        $centros = Centro::paginate(env('APP_PAGINATE'));
        return view('centros.index', ['centros' => $centros])->with('message', ['tipo'=>'success','texto'=>'Registro alterado com sucesso!']);;
    }

    public function store(Centro $centros, CentroRequest $request)
    {
        $centros->descricao = $request['descricao'];
        $centros->status = $request['status'];
        $centros->save();
        $centros = Centro::paginate(env('APP_PAGINATE'));
        return view('centros.index', ['centros' => $centros])->with('message', ['tipo'=>'success','texto'=>'Registro salvo com sucesso!']);;
    }

    public function destroy(Request $request)
    {

        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $centros = Centro::find($request->id)->delete();
        $centros = Centro::paginate(env('APP_PAGINATE'));
        return view('centros.index', ['centros' => $centros])->with('message', ['tipo'=>'success','texto'=>'Registro excluído com sucesso!']);;
    }

    public function details(Centro $centros, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $centros = Centro::find($request->id);
        return view('centros.details', ['centros' => $centros]);
    }
}
