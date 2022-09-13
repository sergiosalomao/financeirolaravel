@extends('layouts.main')
@section('content')


    <div class="card painel">
        <div class="card-header titulo-form">
            Fluxos
        </div>

        <div class="card-body">

            <button class="btn btn-sm btn-primary form-button" type="button"
                onclick="window.location.href='/fluxos/create'">Adicionar</button>


            <div class="table-responsive-sm mt-3">
                <table class="table table-sm table-striped table-light text-black table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th colspan="2">Fluxos</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Data Criação</th>
                            <th colspan="3" style="text-align: center">Ações</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($fluxos as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td colspan="2">
                                    {{ $item->descricao }}
                                </td>

                                <td style="height:1px">
                                    {{ $item->tipo }}
                                </td>
                                <td>
                                    {{ $item->status }}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($item->created_at)) }}
                                </td>
                                <td colspan="3" style="text-align: center;font-size:3px">
                                    <a href="/fluxos/edit/{{ $item->id }}"><i
                                            class='bx bx-sm bx-sm bx-edit form-icons-edit'></i></a>
                                    <a href="/fluxos/delete/{{ $item->id }}"><i
                                            class='bx bx-sm bx-sm bx-trash form-icons-delete'></i></a>
                                    <a href="/fluxos/details/{{ $item->id }}"><i
                                            class='bx bx-sm bx-sm bx-info-square form-icons-info'></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- PAGINAÇÃO --}}
                <div class="d-flex justify-content-center">
                  {{ $fluxos->links() }}
              </div>
                <div style="text-align: right">
                    <button class="btn btn-sm btn-primary form-button-back" type="button"
                        onclick="window.location.href='/'">Fechar</button>
                </div>

            </div>



        </div>
    @endsection
