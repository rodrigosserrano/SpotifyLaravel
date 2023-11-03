<div class="d-flex collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-1 mb-lg-0 d-flex">
        <li class="nav-item mt-3 mb-3">
            <a class="nav-link text-white sptf-effect-text" aria-current="page" href="#">Test1</a>
        </li>
        <li class="nav-item mt-3 mb-3">
            <a class="nav-link text-white sptf-effect-text" href="#">Test2</a>
        </li>
        <li class="nav-item mt-3 mb-3">
            <a class="nav-link text-white disabled" href="#">|</a>
        </li>
        @auth
            <li class="nav-item dropdown mt-3 mb-3">
                <a class="nav-link dropdown-toggle text-white sptf-effect-text fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <li><a class="dropdown-item" href="{{ route('account') }}">Conta</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                </ul>
            </li>
        @else
            <a class="nav-link text-white mt-3 mb-3 sptf-effect-text" href="#">Inscrever-se</a>
            <a class="nav-link signin-button" href="{{ route('login') }}">Entrar</a>
        @endauth
    </ul>
</div>
