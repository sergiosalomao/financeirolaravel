@extends('layouts.main')
@section('content')
    <div class="card painel">
        <div class="card-header titulo-form">
            Cadastro de Titulo
        </div>

        
{{--         @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach 
 --}}
        <div class="card-body">
            <h5 class="card-title subtitulo-form">Cadastrar Dados:</h5>
            <form action="{{ route('titulos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">

                    <div class="col-md-2">


                        <input name="status" type="text" hidden value="EM ABERTO">


                        <label class="labels-form">Data</label>
                        <?php $mytime = Carbon\Carbon::now();
                        ?>
                        <input id="1" autofocus name="vencimento" type="date" class="form-control form-control-sm"
                            value="{{date('Y-m-d');}}" onkeypress="">
                        @error('vencimento')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label class="labels-form">Centro Custo</label>
                        <select id="2" name="centro_id" type="text" class="form-select form-select-sm">
                            <option value="" selected>Selecione um centro de custo</option>
                            @foreach ($centros as $item)
                                <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                            @endforeach

                        </select>
                        @error('centro_id')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-2"><label class="labels-form">Conta</label>
                        <select id="3" name="conta_id" type="text" class="form-select form-select-sm">
                            <option value="" selected>Selecione uma conta</option>
                            @foreach ($contas as $item)
                                <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                            @endforeach

                        </select>
                        @error('conta_id')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="labels-form">Fluxo</label>
                        <select id="4" name="fluxo_id" type="text" class="form-select form-select-sm">
                            <option value="" selected>Selecione um Fluxo</option>
                            @foreach ($fluxos as $item)
                                <option value="{{ $item->id }}">{{ $item->descricao }}
                                    [{{ $prisn = substr($item->tipo, 0, 1) }}] </option>
                            @endforeach
                        </select>
                        @error('fluxo_id')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label class="labels-form">Valor</label>
                        <input id="5" name="valor" type="text" class="number form-control form-control-sm"
                            value="">
                        @error('valor')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2">
                        <label class="labels-form">N. Documento</label>
                        <input id="6" name="nrdoc" type="text" class="form-control form-control-sm"
                            value="">
                        @error('nrdoc')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>

                    {{-- aqui seria o titulo --}}

                    <div class="col-md-10">
                        <label class="labels-form">Descrição</label>
                        <input id="7" name="descricao" type="text" class="form-control form-control-sm"
                            value="">
                        @error('descricao')
                            <span class="form-label-error"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col-md-12">
                        <label class="labels-form">Observações</label>
                        <input id="8" name="obs" type="text" class="form-control form-control-sm"
                            value="">
                    </div>

                </div>

                <div class="row ">
                    <div class="col-12">
                        <input  id="check-destacar" class="form-check-input form-checkbox" type="checkbox"
                            value="false" name="destacar">
                        <label class="form-check-label form-checkbox-label">
                            Destacar Movimento no Relatório
                        </label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <button id="10" class="btn btn-sm btn-primary form-button" type="submit">Gravar</button>
                        <button id="10" class="btn btn-sm btn-primary form-button-back" type="button"
                            onclick="window.location.href='/'">Fechar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
