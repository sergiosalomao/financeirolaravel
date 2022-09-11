@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="/css/forms.css">

    <div class="card painel">
        <div class="card-header titulo-form">
            Detalhes do Fluxos
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Dados:</h5>
            <form action="{{ route('contas.update') }}" method="POST" enctype="multipart/form-data">
           @csrf
        
                <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Fluxo</label>
                    <input disabled name="descricao" type="text" class="form-control form-control-sm" value="{{$fluxos->descricao}}">
                </div>

                <div class="col-md-6">
                    <label class="labels-form">Tipo</label>
                    <select disabled name="tipo" type="text" class="form-select form-select-sm" >
                        <option value="{{ $fluxos->tipo }}" selected>{{ $fluxos->tipo }}</option>
                        <option value="D">DEBITO</option>
                        <option value="C">CREDITO</option>
                    </select>
                </div>
                

                <div class="col-md-6 mt-3">
                    <label  class="labels-form">Status</label>
                    <select disabled name="status" type="text" class="form-select form-select-sm" >
                        <option value="{{ $fluxos->status }}" selected>{{ $fluxos->status }}</option>
                        <option value="A">ATIVO</option>
                        <option value="I">INATIVO</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary profile-button-back" type="button" onclick="window.location.href='/fluxos'">Voltar</button>
                    
                    </div>
                </div>
            </div>

        </div>
    @endsection
