<form wire:submit="submitFormLogin()" class="d-flex justify-content-center">
    <div class="w-50">
        @if($errors->has('user'))
        <div class="bg-danger p-2 mb-4">
            <img class="m-2" src="{{ asset('assets/img/warn-icon.svg') }}" width="20px">
            <span class="text-white">{{ $errors->first('user') }}</span>
        </div>
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white fw-bold">Email</label>
            <input
                wire:model="form.email"
                type="email"
                class="form-control input-sptf"
                placeholder="Email"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
            >
            <div id="emailHelp" class="form-text">
                @error('form.email') <span class="error text-white">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-white fw-bold">Senha</label>
            <input
                wire:model="form.password"
                type="password"
                placeholder="Senha"
                class="form-control input-sptf"
                id="exampleInputPassword1"
            >
        </div>
        <div>
            @error('form.password') <span class="error text-white">{{ $message }}</span> @enderror
        </div>

        <div class="form-check form-switch mt-4 mb-4">
            <input wire:model="form.remember" class="form-check-input check-sptf" type="checkbox" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label text-white" for="flexSwitchCheckChecked">Lembrar de mim</label>
        </div>

        <button type="submit" class="w-100 btn btn-primary button-sptf fw-bold">Entrar</button>

        <div class="w-100 text-center mt-5">
            <a href="#" class="text-white sptf-effect-text">Esqueceu sua senha?</a>
        </div>
    </div>
</form>
