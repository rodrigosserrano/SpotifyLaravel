@vite([
    'resources/css/login.scss',
])
<div class="container w-50 bg-smc-form p-lg-5 position-relative form-login ">
    <h1
        class="fw-bold text-center text-white p-lg-5 display-4"
    >Faça o login agora mesmo
    </h1>
    <div class="d-flex justify-content-center">
        <a href="{{ url('oauth/google') }}">
            <button class="btn btn-spty-transparent">
                <span class="icon-google p-3"></span>Continuar com o google
            </button>
        </a>
    </div>
    <hr class="d-flex m-auto m-lg-5">

    <livewire:login.login-component/>

    <hr class="d-flex m-auto m-lg-5">

    <div class="w-100 text-center mt-5">
        <p class="d-inline" style="color: #bababa">Não tem uma conta? </p><a href="#" class="text-white smc-effect-text">Inscrever-se no Save My Cash</a>
    </div>
</div>
