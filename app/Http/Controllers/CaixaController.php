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
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])->orderBy('data', 'asc')->paginate(10);
        $movimento = new Movimento();
        $movimento->calculaSaldo($movimentos);
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
        $movimento = new Movimento();
        $movimentos = $movimento->filtros($query, $request);
        $movimentos = $movimento->calculaSaldo($movimentos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        return view('caixas.index', compact('movimentos', 'contas', 'centros', 'fluxos'));
    }
}
