@extends('layouts.main')
@section('content')
  

    <div class="card painel">
        <div class="card-header titulo-form">
            Centros de Custo - Detalhes
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Dados:</h5>
            <form action="{{ route('centros.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="labels-form">Centro de Custo</label>
                        <input id="1" name="descricao" type="text" class="form-control form-control-sm" placeholder="digite o centro de custo"
                            value="{{ $centros->descricao }}" disabled>
                            <input name="id" value="{{ $centros->id }}" hidden>
                    </div>

                    <div class="col-md-6"><label class="labels-form">Status</label>
                        <select id="2" name="status" type="text" class="form-select form-select-sm" disabled>
                            <option value="{{ $centros->status }}" selected>{{ $centros->status }}</option>
                            <option value="Ativo">ATIVO</option>
                            <option value="Inativo">INATIVO</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-sm btn-primary form-button-back" type="button" onclick="window.location.href='/centros'">Fechar</button>
                        
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
