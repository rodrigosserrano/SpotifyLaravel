<li class="nav-item dropdown mt-3 mb-3">
    <a class="nav-link dropdown-toggle text-white smc-effect-text fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Perfil
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img
                        src="{{ auth()->user()->picture_link }}"
                        class="rounded-circle"
                        width="65"
                    >
                </div>

                <div class="col-md-12 text-center">
                    <a class="nav-link text-black disabled text-center display-3" href="#">
                        Olá {{ auth()->user()->first_name }}
                    </a>
                </div>
            </div>
        </li>
        <hr>
        <li><a class="dropdown-item" href="{{ route('account') }}" wire:navigate>Conta</a></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
    </ul>
</li>
