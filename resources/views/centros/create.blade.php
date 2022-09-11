@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="/css/forms.css">

    <div class="card painel">
        <div class="card-header titulo-form">
            Centros de Custo
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Cadastrar Dados:</h5>
            <form action="{{ route('centros.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Centro de Custo</label>
                    <input name="descricao" type="text" class="form-control" placeholder="digite o centro de custo" value="">
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select name="status" type="text" class="form-select" >
                        <option value="I" selected>Selecione um Status</option>
                        <option value="ATIVO">ATIVO</option>
                        <option value="INATIVO">INATIVO</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary profile-button-back" type="button" onclick="window.location.href='/centros'">Fechar</button>
                        <button class="btn btn-sm btn-primary profile-button" type="submit">Gravar</button>
                    </div>
                </div>
            </div>
            </form>

        </div>
    @endsection
