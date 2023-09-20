<div>
    <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">
                <img
                    src="{{ asset('assets/img/logo.svg') }}" alt="Logo" width="150"
                    class="d-inline-block align-text-top p-2 ml-lg-2"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if(!Route::is('login'))
                <div class="d-flex collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0 d-flex">
                        <li class="nav-item mt-3 mb-3">
                            <a class="nav-link text-white sptf-effect-text" aria-current="page" href="#">Premium</a>
                        </li>
                        <li class="nav-item mt-3 mb-3">
                            <a class="nav-link text-white sptf-effect-text" href="#">Suporte</a>
                        </li>
                        <li class="nav-item mt-3 mb-3">
                            <a class="nav-link text-white sptf-effect-text" href="#">Baixar</a>
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
            @endif
        </div>
    </nav>
</div>
