@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="/css/forms.css">

    <div class="card painel">
        <div class="card-header titulo-form">
            Movimento Caixa
        </div>

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Cadastrar Dados:</h5>
            <form action="{{ route('movimentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label class="labels-form">Data</label>
                        <input name="data" type="date" class="form-control form-control-sm" value="">
                    </div>

                    <div class="col-md-3">
                        <label class="labels-form">Centro Custo</label>
                        <select name="centro_id" type="text" class="form-select form-select-sm">
                            <option value="" selected>Selecione um centro de custo</option>
                            @foreach ($centros as $item)
                            <option value="{{$item->id}}">{{$item->descricao}}</option>
                            @endforeach
      
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="labels-form">Tipo</label>
                        <select name="tipo" type="text" class="form-select form-select-sm">
                            <option value="" selected>Selecione</option>
                            <option value="CREDITO">CREDITO</option>
                            <option value="DEBITO">DEBITO</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="labels-form">Valor</label>
                        <input name="valor" type="text" class="form-control form-control-sm" value="">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2">
                        <label class="labels-form">N. Documento</label>
                        <input name="nrdoc" type="text" class="form-control form-control-sm" value="">
                    </div>

                    {{-- aqui seria o titulo --}}

                    <div class="col-md-10">
                        <label class="labels-form">Descrição</label>
                        <input name="descricao" type="text" class="form-control form-control-sm" value="">
                    </div>
                </div>

                <div class="row mt-4">
                    
                    <div class="col-md-3"><label class="labels-form">Conta</label>
                        <select name="conta_id" type="text" class="form-select form-select-sm" >
                            <option value="" selected>Selecione uma conta</option>
                            @foreach ($contas as $item)
                            <option value="{{$item->id}}">{{$item->descricao}}</option>
                            @endforeach
      
                        </select>
                    </div>
                    
                    <div class="col-md-9">
                        <label class="labels-form">Fluxo</label>
                        <select name="fluxo_id" type="text" class="form-select form-select-sm">
                            <option value="" selected>Selecione um tipo</option>
                           @foreach ($fluxos as $item)
                           <option value="{{$item->id}}">{{$item->descricao}}</option>
                           @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <label class="labels-form">Observações</label>
                        <input name="nrdoc" type="text" class="form-control form-control-sm" value="">
                    </div>
                </div>

                <div class="row ">
                    <div class="col-12">
                        <input class="form-check-input form-checkbox" type="checkbox" value="" name="destacar">
                        <label class="form-check-label form-checkbox-label">
                            Destacar Movimento no Relatório
                        </label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <button class="btn btn-sm btn-primary profile-button-back" type="button"
                            onclick="window.location.href='/'">Fechar</button>
                        <button class="btn btn-sm btn-primary profile-button" type="submit">Gravar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
