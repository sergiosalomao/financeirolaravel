<div style="position:absolute; z-index:100">
    <div class="collapse collapse-horizontal" id="collapseLancamento">

        <div class="card-submenu text-center ">

            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/cotton/96/000000/steak-rare.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('movimentos.create') }}">
                        <h4 class="mb-0"> Novo Lançamento</h4>
                    </a>
                    <p>Adiciona um movimento no caixa</p>
                </div>
            </div>

            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/natural-food.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('movimentos.manager') }}">
                        <h4 class="mb-0">Cancelar Lançamento</h4>
                    </a>
                    <p>Excluir um movimento do caixa</p>
                </div>
            </div>
            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/cotton/96/000000/toast--v1.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('caixas.index') }}">
                        <h4 class="mb-0">Consultar Caixa</h4>
                    </a>
                    <p>Consultar movimento caixa</p>
                </div>
            </div>
            <div class=" item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/cotton/96/000000/toast--v1.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('movimentos.index') }}">
                        <h4 class="mb-0">Consultar Lançamentos</h4>
                    </a>
                    <p>Consultar movimento Fluxo de Caixa</p>
                </div>
            </div>

            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="">

                        <h4 class="mb-0">Relatorios</h4>
                    </a>
                    <p>Relatorios de Lançamentos</p>
                </div>
            </div>

            <hr style="color: silver;height:1px">

            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('centros.index') }}">

                        <h4 class="mb-0">Centros de Custos</h4>
                    </a>
                    <p>Voce pode cadastrar varios centros de custos para gerenciar.</p>
                </div>
            </div>

            <div class="item-submenu d-flex flex-row align-items-center icon">
                {{-- <img src="https://img.icons8.com/fluent/96/000000/cherry.png" width="30" /> --}}
                <div class="">
                    <a href="{{ route('contas.index') }}">
                        <h4 class="mb-0">Contas</h4>
                    </a>
                    <p>Permite cadastrar varias contas para gerenciamento.</p>
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
