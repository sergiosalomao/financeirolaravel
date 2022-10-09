@extends('layouts.main')
@section('content')
 

    <div class="card painel">
        <div class="card-header titulo-form">
            Cedentes
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Dados:</h5>
            <form action="{{ route('cedentes.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $cedentes->id }}" hidden>   
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Cedente</label>
                    <input disabled name="descricao" type="text" class="form-control form-control-sm" placeholder="digite a conta" value="{{ $cedentes->descricao }}">
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select disabled name="status" type="text" class="form-select form-select-sm" >
                        <option value="{{ $cedentes->status }}" selected>{{ $cedentes->status }}</option>
                        <option value="Ativo">ATIVO</option>
                        <option value="Inativo">INATIVO</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary form-button-back" type="button"
                        onclick="window.location.href='/cedentes'">Fechar</button>
                
                    </div>
                </div>
            </div>
            </form>
        </div>
    @endsection
