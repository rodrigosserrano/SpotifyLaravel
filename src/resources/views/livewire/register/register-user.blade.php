<div class="container w-50 bg-smc-form p-lg-5 position-relative forms-smc">
    <h1
        class="fw-bold text-center text-white p-lg-5 display-4"
    >Registre-se, é grátis
    </h1>
    <x-socialite-buttons.socialite-buttons/>
    <hr class="d-flex m-auto m-lg-5">

    <x-register.form-register/>
    <hr class="d-flex m-auto m-lg-5">

    <div class="w-100 text-center mt-5">
        <p class="d-inline" style="color: #bababa">Já tem uma conta? </p><a href="{{ route('login') }}" class="text-white smc-effect-text" wire:navigate>Entre agora mesmo</a>
    </div>
</div>
