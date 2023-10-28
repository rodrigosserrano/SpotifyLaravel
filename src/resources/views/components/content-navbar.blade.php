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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white sptf-effect-text" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img
                        src="{{ asset('assets/img/icon-profile.svg') }}"
                        class="mt-3 mb-3"
                        width="25"
                    > Perfil
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Conta</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                </ul>
            </li>
        @else
            <a class="nav-link text-white mt-3 mb-3 sptf-effect-text" href="#">Inscrever-se</a>
            <a class="nav-link signin-button" href="{{ route('login') }}">Entrar</a>
        @endauth
    </ul>
</div>
