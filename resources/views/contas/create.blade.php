@extends('layouts.main')
@section('content')
 

    <div class="card painel">
        <div class="card-header titulo-form">
            Contas
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Cadastrar Dados:</h5>
            <form action="{{ route('contas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="labels-form">Conta</label>
                        <input id="1" name="descricao" type="text" class="form-control form-control-sm"
                            placeholder="digite a descricao da conta" value="{{old('descricao')}}">
                            @error('descricao')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6"><label class="labels-form">Status</label>
                        <select id="2"  name="status" type="text" class="form-select form-select-sm">
                            <option value="{{old('status')}}" selected>Selecione um Status</option>
                            <option value="ATIVO">ATIVO</option>
                            <option value="INATIVO">INATIVO</option>
                        </select>
                        @error('status')
                        <span class="form-label-error"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-sm btn-primary profile-button-back" type="button"
                                onclick="window.location.href='/contas'">Fechar</button>
                            <button id="3" class="btn btn-sm btn-primary profile-button" type="submit">Gravar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    @endsection
