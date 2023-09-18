<form wire:submit="submitFormLogin()" class="d-flex justify-content-center">
    <div class="w-50">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-white fw-bold">Email</label>
            <input
                wire:model.blur="validateEmail"
                wire:dirty.class="border-yellow"
                wire:model="form.email"
                type="email"
                class="form-control input-sptf"
                placeholder="Email"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
            >
            <div id="emailHelp" class="form-text">
                @error('form.email') <span class="error">{{ $message }}</span> @enderror
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
            @error('form.password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-100 btn btn-primary button-sptf fw-bold">Entrar</button>
    </div>
</form>
