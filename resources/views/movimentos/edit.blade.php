@extends('layouts.main')
@section('content')


    <div class="card painel">
        <div class="card-header titulo-form">
            Centros de Custo
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Editar Dados:</h5>
            <div class="row mt-4">
                <div class="col-md-6">
                    <label class="labels-form">Centro de Custo</label>
                    <input name="descricao" type="text" class="form-control" placeholder="digite o centro de custo" value="">
                    @error('descricao')
                    <span class="form-label-error"> {{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-6"><label class="labels-form">Status</label>
                    <select name="status" type="text" class="form-select" >
                        <option value="I" selected>Selecione um Status</option>
                        <option value="A">ATIVO</option>
                        <option value="I">INATIVO</option>
                    </select>
                    @error('status')
                    <span class="form-label-error"> {{ $message }}</span>
                @enderror
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-primary profile-back-button" type="button">Voltar</button>
                        <button class="btn btn-primary profile-button" type="button">Editar</button>
                    </div>
                </div>
            </div>

        </div>
    @endsection
