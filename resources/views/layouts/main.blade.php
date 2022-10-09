<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Styles --}}
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet"
        type="application/json">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forms.css">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.js" type="text/javascript"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>



    <title>SISMOV - Organize suas finanças</title>
</head>

<!--SideBar start-->

<body id="body-pd">
    @include('layouts.header')
    @include('layouts.sidebar-vendas')
    @include('layouts.sidebar-lancamentos')
    @include('layouts.sidebar-titulos')
    @include('layouts.sidebar')

    {{-- Conteudo --}}
    <div class="container">
     {{--    @include('layouts.flash-message') --}}
        @include('layouts.modal-delete')
        @yield('content')

    </div>
    @include('layouts.footer')



</body>

</html>


{{-- JavaScript --}}
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="/js/main.js"></script>
<script src="/js/forms.js"></script>

 {{-- toastr js --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

 <script>
    $(document).ready(function() {
        toastr.options.timeOut = 4000;
        @if (@$message['tipo'] == 'error')
            toastr.error('{{ $message['texto'] }}');
        @elseif(@$message['tipo'] == 'success')
            toastr.success('{{ $message['texto'] }}');
        @endif
    });

</script>

 
