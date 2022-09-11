@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="/css/forms.css">

    <div class="card painel">
        <div class="card-header titulo-form">
            Contas
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Editar Dados:</h5>
            <form action="{{ route('contas.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $contas->id }}" hidden>   
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Conta</label>
                    <input name="descricao" type="text" class="form-control form-control-sm" placeholder="digite a conta" value="{{ $contas->descricao }}">
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select name="status" type="text" class="form-select form-select-sm" >
                        <option value="{{ $contas->status }}" selected>{{ $contas->status }}</option>
                        <option value="ATIVO">ATIVO</option>
                        <option value="INATIVO">INATIVO</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm  btn-primary profile-button-back" type="button"
                        onclick="window.location.href='/contas'">Fechar</button>
                    <button class="btn btn-sm btn-primary profile-button" type="submit">Gravar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    @endsection
