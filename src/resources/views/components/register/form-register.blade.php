<form wire:submit="submitFormRegister()" class="d-flex justify-content-center">
    <div class="w-50">
        <div class="col-md-12 row">
            @if($errors->has('register-user'))
                <div class="bg-danger p-2 mb-4">
                    <img class="m-2" src="{{ asset('assets/img/warn-icon.svg') }}" width="20px">
                    <span class="text-white">{{ $errors->first('register-user') }}</span>
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
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputFirstName1" class="form-label fw-bold text-white">Nome</label>
                    <input
                        wire:model.live="form.first_name"
                        type="text"
                        class="form-control input-smc"
                        placeholder="Primeiro nome"
                        id="exampleInputFirstName1"
                        aria-describedby="firstNameHelp"
                    >
                    <div id="firstNameHelp" class="form-text">
                        @error('form.first_name') <span class="error text-white">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputCpf1" class="form-label fw-bold text-white">CPF</label>
                    <input
                        wire:model.live="form.cpf"
                        type="text"
                        class="form-control input-smc"
                        placeholder="CPF"
                        id="exampleInputCpf1"
                        aria-describedby="cpfHelp"
                        maxlength="11"
                    >
                    <div id="cpfHelp" class="form-text">
                        @error('form.cpf') <span class="error text-white">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputLastName1" class="form-label fw-bold text-white">Sobrenome</label>
                    <input
                        wire:model.live="form.last_name"
                        type="text"
                        class="form-control input-smc"
                        placeholder="Sobrenome"
                        id="exampleInputLastName1"
                        aria-describedby="lastNameHelp"
                    >
                    <div id="lastNameHelp" class="form-text">
                        @error('form.last_name') <span class="error text-white">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputBirthDate1" class="form-label fw-bold text-white">Data de nascimento</label>
                    <input
                        wire:model.live="form.birth_date"
                        type="date"
                        class="form-control input-smc"
                        placeholder="Data de nascimento"
                        id="exampleInputBirthDate1"
                        aria-describedby="birthDateHelp"
                    >
                    <div id="birthDateHelp" class="form-text">
                        @error('form.birth_date') <span class="error text-white">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPasswordConfirmation1" class="form-label fw-bold text-white">Senha</label>
                <input
                    wire:model.live="form.password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Senha"
                    class="form-control input-smc"
                    id="exampleInputPasswordConfirmation1"
                    aria-describedby="passwordConfirmationHelp"
                >
                <div id="passwordConfirmationHelp" class="form-text">
                    @error('form.password_confirmation') <span class="error text-white">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold text-white">Confirmar Senha</label>
                <input
                    wire:model.live="form.password"
                    type="password"
                    name="password"
                    placeholder="Senha"
                    class="form-control input-smc"
                    id="exampleInputPassword1"
                    aria-describedby="passwordHelp"
                >
                <div id="passwordHelp" class="form-text">
                    @error('form.password') <span class="error text-white">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" class="w-100 btn btn-primary button-smc fw-bold mt-5">Registrar</button>
        </div>
    </div>
</form>
