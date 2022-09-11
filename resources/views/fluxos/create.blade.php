@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="/css/forms.css">

    <div class="card painel">
        <div class="card-header titulo-form">
            Fluxos 
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Cadastrar Dados:</h5>
            <form action="{{ route('fluxos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Fluxo</label>
                    <input name="descricao" type="text" class="form-control form-control-sm" placeholder="digite o fluxo" value="">
                </div>

                <div class="col-md-6"><label class="labels-form">Tipo Movimento</label>
                    <select name="tipo" type="text" class="form-select form-select-sm" >
                        <option value="" selected>Selecione um Tipo</option>
                        <option value="CREDITO">CREDITO</option>
                        <option value="DEBITO">DEBITO</option>
                    </select>
                </div>

                <div class="col-md-6 mt-3"><label class="labels-form">Status</label>
                    <select name="status" type="text" class="form-select form-select-sm" >
                        <option value="" selected>Selecione um Status</option>
                        <option value="ATIVO">ATIVO</option>
                        <option value="INATIVO">INATIVO</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary profile-button-back" type="button" onclick="window.location.href='/fluxos'">Fechar</button>
                        <button class="btn btn-sm btn-primary profile-button" type="submit">Gravar</button>
                    </div>
                </div>
            </div>
            </form>

        </div>
    @endsection
