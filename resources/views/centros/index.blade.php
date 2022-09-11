@extends('layouts.main')
@section('content')


    <div class="card painel">
        <div class="card-header titulo-form">
            Centros de Custo
        </div>

        <div class="card-body">

            <button class="btn btn-sm btn-primary profile-button" type="button"
                onclick="window.location.href='/centros/create'">Adicionar</button>


            <div class="table-responsive-sm mt-3">
                <table class="table table-sm table-striped table-light text-black table-hover">
                    <thead>
                        <tr>
                            <th colspan="1">ID</th>
                            <th colspan="2">Centro de Custo</th>
                            <th colspan="2">Status</th>
                            <th colspan="2">Data Criação</th>
                            <th colspan="2" style="text-align: center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($centros as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td colspan="2">
                                    {{ $item->descricao }}
                                </td>
                                <td colspan="2">
                                    {{ $item->status }}
                                </td>
                                <td colspan="2">
                                    {{ date('d-m-Y', strtotime($item->created_at)) }}
                                </td>
                                <td colspan="3" style="text-align: center;font-size:3px">
                                    <a href="/centros/edit/{{ $item->id }}"><i
                                            class='bx bx-sm bx-sm bx-edit form-icons-edit'></i></a>
                                    <a href="/centros/delete/{{ $item->id }}"><i
                                            class='bx bx-sm bx-sm bx-trash form-icons-delete'></i></a>
                                    <a href="/centros/details/{{ $item->id }}"><i
                                            class='bx bx-sm bx-sm bx-info-square form-icons-info'></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align: right">
                    <button class="btn btn-primary btn-sm profile-button-back" type="button"
                        onclick="window.location.href='/'">Fechar</button>
                </div>

            </div>



        </div>
    @endsection
