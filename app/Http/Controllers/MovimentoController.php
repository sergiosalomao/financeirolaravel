<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentoRequest;
use App\Models\Centro;
use App\Models\Conta;
use App\Models\Fluxo;
use App\Models\Movimento;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Session\Session;

class MovimentoController extends Controller
{
    public function index(Movimento $movimentos)
    {
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'DESC')
            ->paginate(env('APP_PAGINATE'));
        $movimento = new Movimento();
        $movimentos = $movimento->calculaSaldo($movimentos);
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
        return view('movimentos.create', compact('fluxos', 'contas', 'centros'));
    }

    public function edit(Movimento $movimentos, Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $movimentos = Movimento::find($request->id);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.edit', compact('contas', 'centros', 'fluxos', 'movimentos'));
    }

    public function update(Movimento $movimentos, MovimentoRequest $request)
    {
        $data = collect([]);
        $fluxo = Fluxo::find($request['fluxo_id']);
        $data = $data->merge([
            "data"       => trim($request->data),
            "tipo"       => trim($fluxo->tipo),
            "conta_id"   => trim($request->conta_id),
            "centro_id"  => trim($request->centro_id),
            "fluxo_id"   => trim($request->fluxo_id),
            "user_id"    => null,
            "titulo_id"  => null,
            "nrdoc"      => trim($request->nrdoc),
            "descricao"  => trim($request->descricao),
            "valor"      => (float)str_replace(",", ".", $request->valor),
            "obs"        => trim($request->obs),
        ]);
        Movimento::find($request->id)->update($data->all());
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'DESC')
            ->get();

        $movimento = new Movimento();
        $movimentos = $movimento->calculaSaldo($movimentos);

        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.manager', compact('movimentos', 'contas', 'centros', 'fluxos'))->with('message', ['tipo'=>'success','texto'=>'Registro alterado com sucesso!']);;
    }

    public function store(Movimento $movimentos, MovimentoRequest $request, Fluxo $fluxo)
    {
        
        try {
            $fluxo = Fluxo::find($request['fluxo_id']);
            $movimentos->data      = $request['data'];
            $movimentos->tipo      = $fluxo->tipo;
            $movimentos->conta_id  = $request['conta_id'];
            $movimentos->centro_id = $request['centro_id'];
            $movimentos->fluxo_id  = $request['fluxo_id'];
            $movimentos->user_id   = $request['user_id'];
            $movimentos->titulo_id = $request['titulo_id'];
            $movimentos->nrdoc     = $request['nrdoc'];
            $movimentos->descricao = $request['descricao'];
            $movimentos->valor     = (float)str_replace(",", ".", $request['valor']);;
            $movimentos->destacar  = $request['destacar'];
            $movimentos->obs       = $request['obs'];
            $movimentos->save();

            $fluxos  = Fluxo::all();
            $centros = Centro::all();
            $contas  = Conta::all();
         
            return view('movimentos.create', compact('contas', 'centros', 'fluxos'))->with('message', ['tipo'=>'success','texto'=>'Registro salvo com sucesso!']);;
        } catch (\Exception $e) {
            return $retorno = $e;
        }
    }

    public function destroy(Request $request)
    {
        if (!$request->id) throw new \Exception("ID não informado!", 1);
        $movimentos = Movimento::find($request->id)->delete();
        $movimentos = Movimento::all();
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.manager', compact('contas', 'centros', 'fluxos', 'movimentos'))->with('message', ['tipo'=>'success','texto'=>'Registro excluído com sucesso!']);;
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
        $movimento = new Movimento();
        $movimentos = $movimento->filtros($query, $request);
        $movimentos = $movimento->calculaSaldo($movimentos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.index', compact('movimentos', 'contas', 'centros', 'fluxos'));
    }

    public function manager(Request $request)
    {
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])
            ->orderBy('data', 'DESC')
            ->get();
        $movimento = new Movimento();
        $movimentos = $movimento->calculaSaldo($movimentos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.manager', compact('movimentos', 'contas', 'centros', 'fluxos'));
    }

    public function searchManager(Movimento $movimentos, Request $request)
    {
        $query = Movimento::with(['fluxo', 'centro', 'conta']);
        $movimento = new Movimento();
        $movimentos = $movimento->filtros($query, $request);
        $movimentos = $movimento->calculaSaldo($movimentos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('movimentos.manager', compact('movimentos', 'contas', 'centros', 'fluxos'));
    }
}
