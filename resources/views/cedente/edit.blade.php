@extends('layouts.main')
@section('content')


    <div class="card painel">
        <div class="card-header titulo-form">
            Cedentes
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Editar Dados:</h5>
            <form action="{{ route('cedentes.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $cedentes->id }}" hidden>   
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Cedente</label>
                    <input id="1" name="descricao" type="text" class="form-control form-control-sm" placeholder="digite a conta" value="{{ $cedentes->descricao }}">
                    @error('descricao')
                    <span class="form-label-error"> {{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select id="2" name="status" type="text" class="form-select form-select-sm" >
                        <option value="{{ $cedentes->status }}" selected>{{ $cedentes->status }}</option>
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
                        onclick="window.location.href='/cedentes'">Fechar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    @endsection
