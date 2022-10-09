@extends('layouts.main')
@section('content')


    <div class="card painel">
        <div class="card-header titulo-form">
            sacados
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Editar Dados:</h5>
            <form action="{{ route('sacados.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $sacados->id }}" hidden>   
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Sacado</label>
                    <input id="1" name="descricao" type="text" class="form-control form-control-sm" placeholder="digite o sacado" value="{{ $sacados->descricao }}">
                    @error('descricao')
                    <span class="form-label-error"> {{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select id="2" name="status" type="text" class="form-select form-select-sm" >
                        <option value="{{ $sacados->status }}" selected>{{ $sacados->status }}</option>
                        <option value="ATIVO">ATIVO</option>
                        <option value="INATIVO">INATIVO</option>
                    </select>
                    @error('status')
                    <span class="form-label-error"> {{ $message }}</span>
                @enderror
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary form-button" type="submit">Gravar</button>
                        <button class="btn btn-sm  btn-primary form-button-back" type="button"
                        onclick="window.location.href='/sacados'">Fechar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    @endsection
