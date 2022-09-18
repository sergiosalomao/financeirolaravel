<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  font-size: x-small;

}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>  
    <h5>Relatorio de Movimento Caixa</h5>    
<table class="table table-striped table-light text-black table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                          {{--   <th>Centro Custo</th> --}}
                            <th>Conta</th>
                            <th>Nr.Doc</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th style="text-align: right">Valor</th>
                            <th style="text-align: right">Saldo</th>

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

                                {{-- <td>
                                    {{ $item->centro['descricao'] }}
                                </td> --}}
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
                                    {{ $item->tipo }}
                                </td>

                                <td style="text-align: right">
                                    R${{ $item->valor }}
                                </td>
                                <td colspan="2" style="text-align: right">
                                    <strong>{{ $item->saldo }}</strong>

                                    @if ($item->destacar)
                                        <strong class="form-icons-important">[!]</strong>
                                        {{-- <i class='bx bx-sm bx-left-arrow-circle form-icons-important'></i> --}}
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
</body>
</html>
              
