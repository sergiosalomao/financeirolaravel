@extends('layouts.main')
@section('content')
    <div class="card painel">
        <div class="card-header titulo-form">
            Detalhes do Movimento
        </div>

        {{-- @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach --}}

        <div class="card-body">
            <h5 class="card-title subtitulo-form">Dados:</h5>
            <form action="{{ route('movimentos.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <input name="id" value="{{ $movimentos->id }}" hidden>
                    <div class="col-md-2">
                        <label class="labels-form">Data</label>
                        <input disabled id="1"  name="data" type="date" class="form-control form-control-sm"
                            value="{{ $movimentos->data }}" onkeypress="">
                        @error('data')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label class="labels-form">Centro Custo</label>
                        <select disabled id="2" name="centro_id" type="text" class="form-select form-select-sm">
                            <option value="{{ $movimentos->centro_id }}" selected>{{ $movimentos->centro['descricao'] }}</option>
                           

                        </select>
                        @error('centro_id')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2"><label class="labels-form">Conta</label>
                        <select disabled id="3" name="conta_id" type="text" class="form-select form-select-sm">
                            <option value="{{ $movimentos->conta_id }}" selected>{{ $movimentos->conta['descricao'] }}</option>
                          

                        </select>
                        @error('conta_id')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="labels-form">Fluxo</label>
                        <select disabled id="4" name="fluxo_id" type="text" class="form-select form-select-sm">
                            <option value="{{ $movimentos->fluxo_id }}" selected>{{ $movimentos->fluxo['descricao'] }}</option>
                           
                        </select>
                        @error('fluxo_id')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label class="labels-form">Valor</label>
                        <input disabled id="5" name="valor" type="text" class="form-control form-control-sm"
                            value="{{ $movimentos->valor }}">
                        @error('valor')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2">
                        <label class="labels-form">N. Documento</label>
                        <input disabled id="6" name="nrdoc" type="text" class="form-control form-control-sm"
                            value="{{ $movimentos->nrdoc }}">
                        @error('nrdoc')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    {{-- aqui seria o titulo --}}

                    <div class="col-md-10">
                        <label class="labels-form">Descrição</label>
                        <input disabled id="7" name="descricao" type="text" class="form-control form-control-sm"
                            value="{{ $movimentos->descricao }}">
                        @error('descricao')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col-md-12">
                        <label class="labels-form">Observações</label>
                        <input disabled id="8" name="obs" type="text" class="form-control form-control-sm"
                            value="{{ $movimentos->obs }}">
                    </div>

                </div>

                <div class="row ">
                    <div class="col-12">
                        <input disabled id="9" id="check-destacar" class="form-check-input form-checkbox" type="checkbox"
                            value="{{ $movimentos->destacar }}" name="destacar">
                        <label class="form-check-label form-checkbox-label">
                            Destacar Movimento no Relatório
                        </label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <button id="10" class="btn btn-sm btn-primary form-button-back" type="button"
                            onclick="window.location.href='/movimentos/manager'">Fechar</button>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
