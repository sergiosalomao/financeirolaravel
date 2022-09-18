<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Conta;
use App\Models\Fluxo;
use App\Models\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

class CaixaController extends Controller
{
    public function index(Movimento $movimentos)
    {
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();
        $movimentos = Movimento::with(['fluxo', 'centro', 'conta'])->orderBy('data', 'asc')->paginate(env('APP_PAGINATE'));
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

    public function extrairPdf(Movimento $movimentos, Request $request)
    {

        $query = Movimento::with(['fluxo', 'centro', 'conta']);
        $movimento = new Movimento();
        $movimentos = $movimento->filtros($query, $request);
        $movimentos = $movimento->calculaSaldo($movimentos);
        $fluxos  = Fluxo::all();
        $centros = Centro::all();
        $contas  = Conta::all();

        $pdf = PDF::loadView('caixas.relcaixa', compact('movimentos', 'contas', 'centros', 'fluxos'))->setOptions(['defaultFont' => 'arial']);

        return $pdf->download('movimento-caixa.pdf');
    }
}
