<div class="col-md-8">
    <div class="row">
        <div class="col-md-4 pt-2 px-lg-4 pb-lg-5">
            <img class="rounded-circle"
                 src="{{ $user->picture_link }}"
                 title="{{ $user->first_name }}"
                 width="130rem"
            >
        </div>

        <form wire:submit="submitFormEdit" class="col-md-6">
            <h1 class="text-white">{{ $user->fullName }}</h1>
            <label class="text-white" for="exampleInputCpf1">CPF</label>
            <input
                wire:model.live="form.cpf"
                type="text"
                class="form-control input-smc"
                placeholder="CPF"
                id="exampleInputCpf1"
                aria-describedby="cpfHelp"
                maxlength="11"
                value="{{ $user?->prettyCpfOrCnpj }}"
            >
            <div id="cpfHelp" class="form-text">
                @error('form.cpf') <span class="error text-white">{{ $message }}</span> @enderror
            </div>

            <label class="text-white" for="exampleInputNascimento1">
                Data de nascimento
            </label>
            <input
                wire:model.live="form.birth_date"
                type="date"
                class="form-control input-smc"
                placeholder="Data de nascimento"
                id="exampleInputNascimento1"
                aria-describedby="dataHelp"
                value="{{ $user?->prettyBirthDate }}"
            >
            <div id="dataHelp" class="form-text">
                @error('form.birth_date') <span class="error text-white">{{ $message }}</span> @enderror
            </div>


            <button type="submit" class="w-100 btn button-smc fw-bold">Salvar</button>
        </form>
    </div>
</div>
