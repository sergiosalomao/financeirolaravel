@extends('layouts.main')
@section('content')
 

    <div class="card painel">
        <div class="card-header titulo-form">
            Contas
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Dados:</h5>
            <form action="{{ route('contas.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $contas->id }}" hidden>   
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Conta</label>
                    <input disabled name="descricao" type="text" class="form-control form-control-sm" placeholder="digite a conta" value="{{ $contas->descricao }}">
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select disabled name="status" type="text" class="form-select form-select-sm" >
                        <option value="{{ $contas->status }}" selected>{{ $contas->status }}</option>
                        <option value="Ativo">ATIVO</option>
                        <option value="Inativo">INATIVO</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary profile-button-back" type="button"
                        onclick="window.location.href='/contas'">Fechar</button>
                
                    </div>
                </div>
            </div>
            </form>
        </div>
    @endsection
