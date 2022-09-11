@extends('layouts.main')
@section('content')


    <div class="card painel">
        <div class="card-header titulo-form">
            Movimento
        </div>

        <div class="card-body">

            <button class="btn btn-sm btn-primary profile-button" type="button"
                onclick="window.location.href='/movimentos/create'">Adicionar</button>

                <button class="btn btn-sm btn-primary  profile-button-back profile-button-filter" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                   Filtros
                  </button>
               


            {{-- Filtros --}}
          
            <div class="collapse filter-panel" id="collapseFilter">
                <form action="{{ route('movimentos.search') }}" method="POST" enctype="multipart/form-data">
                  @csrf 
                    <div class="card mb-3 mt-3">
                <div class="card-header">
                    <h6><span class="fa fa-calendar mr-3"></span>Filtros</h6>
                </div>
               
                <div class="card-body">
                   
                    <div class="row">
                        <div class="col-md-2">
                            <label class="labels-form">Data</label>
                            <input name="data-inicio" type="date" class="form-control form-control-sm" value="">
                        </div>
                        <div class="col-md-2">
                            <label class="labels-form">Data</label>
                            <input name="data-fim" type="date" class="form-control form-control-sm" value="">
                        </div>

                        <div class="col-md-2">
                            <label class="labels-form">Tipo</label>
                            <select name="tipo" type="text" class="form-select form-select-sm">
                                <option value="" selected>Selecione</option>
                                <option value="CREDITO">CREDITO</option>
                                <option value="DEBITO">DEBITO</option>
                            </select>
                        </div>

                        <div class="col-md-3"><label class="labels-form">Conta</label>
                            <select name="conta_id" type="text" class="form-select form-select-sm">
                                <option value="" selected>Selecione uma conta</option>
                                @foreach ($contas as $item)
                                    <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="labels-form">Fluxo</label>
                            <select name="fluxo_id" type="text" class="form-select form-select-sm">
                                <option value="" selected>Selecione um fluxo</option>
                                @foreach ($fluxos as $item)
                                    <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <label class="labels-form">Centro</label>
                            <select name="centro_id" type="text" class="form-select form-select-sm">
                                <option value="" selected>Selecione um centro de custo</option>
                                @foreach ($centros as $item)
                                    <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="labels-form">Nr.Doc.</label>
                            <input name="nrdoc" type="text" class="form-control form-control-sm" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels-form">Descrição</label>
                            <input name="descricao" type="text" class="form-control form-control-sm" value="">
                        </div>
                        <div class="col-md-2">
                            <label class="labels-form">Valor</label>
                            <input name="valor" type="text" class="form-control form-control-sm" value="">
                        </div>
                        
                        <div class="col-md-2">
                            <button id="btn_pesquisar" class="btn btn-sm btn-primary profile-button-filter" type="submit">Pesquisar</button>
                        </div>
                    </div>
                </div>

            </div>
            </form>

            </div>
            {{-- End Filtros --}}


            <div class="table-responsive mt-3">
                <table class="table table-striped table-light text-black table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Centro Custo</th>
                            <th>Conta</th>
                            <th>Nr.Doc</th>
                            <th>Descrição</th>
                            <th>Fluxo</th>
                            <th>Tipo</th>
                            <th  style="text-align: right">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimentos as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($item->data)) }}
                                </td>

                                <td>
                                    {{ $item->centro['descricao'] }}
                                </td>
                                <td>
                                    {{ $item->conta['descricao'] }}
                                </td>
                                <td>
                                    {{ $item->nrdoc }}
                                </td>
                                <td>
                                    {{ $item->descricao }}
                                </td>
                                <td>
                                    {{ $item->fluxo['descricao'] }}
                                </td>
                                <td>
                                    <strong>{{ $item->tipo }} </strong>
                                </td>
                                <td  style="text-align: right">
                                    <strong>{{ $item->valor }}</strong>
                                   
                                    @if ($item->destacar)
                                    <strong class="form-icons-important">[!]</strong>
                                     {{--  <i class='bx bx-sm bx-left-arrow-circle form-icons-important'></i> --}}
                                 @endif
                                </td>



                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <div style="text-align: right">
                    <button class="btn btn-sm btn-primary profile-button-back" type="button"
                        onclick="window.location.href='/'">Fechar</button>
                </div>

            </div>



        </div>
    @endsection
