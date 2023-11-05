<div class="container w-50 bg-smc-form p-lg-5 position-relative form-login">
    @vite(['resources/css/login.scss'])
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

    <form wire:submit="submitFormLogin()" class="d-flex justify-content-center">
        <div class="w-50">
            @if($errors->has('user'))
                <div class="bg-danger p-2 mb-4">
                    <img class="m-2" src="{{ asset('assets/img/warn-icon.svg') }}" width="20px">
                    <span class="text-white">{{ $errors->first('user') }}</span>
                </div>
            @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold text-white">Email</label>
                <input
                    wire:model.live="form.email"
                    type="email"
                    class="form-control input-smc"
                    placeholder="Email"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                >
                <div id="emailHelp" class="form-text">
                    @error('form.email') <span class="error text-white">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold text-white">Senha</label>
                <input
                    wire:model.live="form.password"
                    type="password"
                    placeholder="Senha"
                    class="form-control input-smc"
                    id="exampleInputPassword1"
                >
            </div>
            <div>
                @error('form.password') <span class="error text-white">{{ $message }}</span> @enderror
            </div>

            <div class="form-check form-switch mt-4 mb-4">
                <input wire:model.live="form.remember" class="form-check-input check-smc" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label text-white" for="flexSwitchCheckChecked">Lembrar de mim</label>
            </div>

            <button type="submit" class="w-100 btn btn-primary button-smc fw-bold">Entrar</button>

            <div class="w-100 text-center mt-5">
                <a href="#" class="text-white smc-effect-text">Esqueceu sua senha?</a>
            </div>
        </div>
    </form>

    <hr class="d-flex m-auto m-lg-5">

    <div class="w-100 text-center mt-5">
        <p class="d-inline" style="color: #bababa">Não tem uma conta? </p><a href="#" class="text-white smc-effect-text">Inscrever-se no Save My Cash</a>
    </div>
</div>
