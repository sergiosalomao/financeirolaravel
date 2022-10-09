<div id="teste" style="position:absolute; z-index:100">
    <div class="collapse collapse-horizontal" id="collapseTitulo">

        <div class="card-submenu text-center ">

            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/cotton/96/000000/steak-rare.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('titulos.create') }}">
                        <h4 class="mb-0"> Novo Titulo</h4>
                    </a>
                    <p>Adiciona nova conta a pagar ou receber</p>
                </div>
            </div>

           
            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/cotton/96/000000/toast--v1.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('caixas.index') }}">
                        <h4 class="mb-0">Baixar titulo</h4>
                    </a>
                    <p>Realiza a baixa de titulos pagos e recebidos</p>
                </div>
            </div>
            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/cotton/96/000000/toast--v1.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('movimentos.index') }}">
                        <h4 class="mb-0">Consultar titulos</h4>
                    </a>
                    <p>Consultar contas a pagar e receber</p>
                </div>
            </div>

            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="">

                        <h4 class="mb-0">Relatorios</h4>
                    </a>
                    <p>Relatorios de Titulos</p>
                </div>
            </div>
          
            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/natural-food.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('movimentos.manager') }}">
                        <h4 class="mb-0">Cancelar Titulos</h4>
                    </a>
                    <p>Excluir ou editar um titulo</p>
                </div>
            </div>
            <hr style="color: silver;height:1px">

            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('cedentes.index') }}">

                        <h4 class="mb-0">Cadastro de Cedentes</h4>
                    </a>
                    <p>Voce pode cadastrar varios cedentes.</p>
                </div>
            </div>

            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('sacados.index') }}">
                        <h4 class="mb-0">Sacado</h4>
                    </a>
                    <p>Voce pode cadastrar varios sacados.</p>
                </div>
            </div>
            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('fluxos.index') }}">

                        <h4 class="mb-0">Fluxos</h4>
                    </a>
                    <p>Permite cadastrar varios fluxos para controle de fluxo de caixa.</p>
                </div>
            </div>


        </div>
    </div>
</div>
