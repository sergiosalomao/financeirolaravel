<?php

namespace App\Http\Controllers;

use App\Http\Requests\TituloRequest;
use App\Models\Centro;
use App\Models\Conta;
use App\Models\Fluxo;
use App\Models\Titulo;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    public function index(Titulo $titulos)
    {
        $titulos = Titulo::with(['fluxo', 'centro', 'conta'])
            ->orderBy('vencimento', 'DESC')
            ->paginate(env('APP_PAGINATE'));
        $movimento = new Titulo();
        $movimentos = $movimento->calculaSaldo($titulos);

        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.index', compact('titulos','contas', 'centros', 'fluxos'));
    }

    public function create()
    {
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.create', compact('fluxos', 'contas', 'centros'));
    }

    public function edit(Titulo $titulos, Titulo $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $titulos = Titulo::find($request->id);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.edit', compact('contas', 'centros', 'fluxos', 'titulos'));
    }

    public function update(Titulo $titulos, TituloRequest $request)
    {
        $data = collect([]);
        $fluxo = Fluxo::find($request['fluxo_id']);
        $data = $data->merge([
            "vencimento"       => trim($request->vencimento),
            "tipo"       => trim($fluxo->tipo),
            "conta_id"   => trim($request->conta_id),
            "centro_id"  => trim($request->centro_id),
            "fluxo_id"   => trim($request->fluxo_id),
            "user_id"    => null,

            "nrdoc"      => trim($request->nrdoc),
            "descricao"  => trim($request->descricao),
            "valor"      => (float)str_replace(",", ".", $request->valor),
            "obs"        => trim($request->obs),
            "status"        => trim($request->status),
        ]);
        Titulo::find($request->id)->update($data->all());
        $titulos = Titulo::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'DESC')
            ->get();

        $titulo = new Titulo();
        $titulos = $titulo->calculaSaldo($titulos);

        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.manager', compact('titulos', 'contas', 'centros', 'fluxos'))->with('message', ['tipo' => 'success', 'texto' => 'Registro alterado com sucesso!']);;
    }

    public function store(Titulo $titulos, Request $request, Fluxo $fluxo)
    {

        try {
            $fluxo = Fluxo::find($request['fluxo_id']);
            $titulos->vencimento      = $request['vencimento'];
            $titulos->tipo      = $fluxo->tipo;
            $titulos->conta_id  = $request['conta_id'];
            $titulos->centro_id = $request['centro_id'];
            $titulos->fluxo_id  = $request['fluxo_id'];
            $titulos->user_id   = $request['user_id'];

            $titulos->nrdoc     = $request['nrdoc'];
            $titulos->descricao = $request['descricao'];
            $titulos->valor     = (float)str_replace(",", ".", $request['valor']);;
            $titulos->destacar  = $request['destacar'];
            $titulos->obs       = $request['obs'];
            $titulos->status       = $request['status'];
            $titulos->save();

            $fluxos  = Fluxo::all();
            $centros = Centro::all();
            $contas  = Conta::all();

            return view('titulos.create', compact('contas', 'centros', 'fluxos'))->with('message', ['tipo' => 'success', 'texto' => 'Registro salvo com sucesso!']);;
        } catch (\Exception $e) {
            return $retorno = $e;
        }
    }

    public function destroy(Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $titulos = Titulo::find($request->id)->delete();
        $titulos = Titulo::all();
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.manager', compact('contas', 'centros', 'fluxos', 'titulos'))->with('message', ['tipo' => 'success', 'texto' => 'Registro excluído com sucesso!']);;
    }

    public function details(Titulo $titulos, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $titulos = Titulo::find($request->id);
        return view('titulos.details', ['titulos' => $titulos]);
    }

    public function search(Titulo $titulos, Request $request)
    {
        $query = Titulo::with(['fluxo', 'centro', 'conta']);
        $titulos = new Titulo();
        $titulos = $titulos->filtros($query, $request);
        $titulos = $titulos->calculaSaldo($titulos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.index', compact('titulos', 'contas', 'centros', 'fluxos'));
    }

    public function manager(Request $request)
    {
        $titulos = Titulo::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'DESC')
            ->get();
        $titulos = new Titulo();
        $titulos = $titulos->calculaSaldo($titulos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.manager', compact('titulos', 'contas', 'centros', 'fluxos'));
    }

    public function searchManager(Titulo $titulos, Request $request)
    {
        $query = Titulo::with(['fluxo', 'centro', 'conta']);
        $titulos = new Titulo();
        $titulos = $titulos->filtros($query, $request);
        $titulos = $titulos->calculaSaldo($titulos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('titulos.manager', compact('titulos', 'contas', 'centros', 'fluxos'));
    }
}
