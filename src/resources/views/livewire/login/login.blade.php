<div class="container w-50 bg-smc-form p-lg-5 position-relative forms-smc">
    @vite(['resources/css/login.scss'])
    <h1
        class="fw-bold text-center text-white p-lg-5 display-4"
    >Faça o login agora mesmo
    </h1>
    <x-socialite-buttons.socialite-buttons/>

    <hr class="d-flex m-auto m-lg-5">

    <x-login.form-login/>

    <hr class="d-flex m-auto m-lg-5">

    <div class="w-100 text-center mt-5">
        <p class="d-inline" style="color: #bababa">Não tem uma conta? </p><a href="{{ route('register') }}" class="text-white smc-effect-text" wire:navigate>Inscrever-se no Save My Cash</a>
    </div>
</div>
