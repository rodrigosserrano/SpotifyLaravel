<div class="col-md-8">
    <div class="row">
        <div class="col-md-4 pt-2 px-lg-5 pb-lg-5">
            <img class="rounded-circle"
                 src="{{ $user->picture_link }}"
                 title="{{ $user->first_name }}"
                 width="130rem"
            >
        </div>

        <div class="col-md-6">
            <h1 class="text-white">{{ $user->fullName }}</h1>
            <h6 class="text-white fw-bold">{{ $user->prettyCpfOrCnpj ?? 'CPF não cadastrado'}}</h6>
            <h6 class="text-white fw-bold">{{ $user->prettyBirthDate ?? 'Data de nascimento não cadastrada'}}</h6>
            <livewire:account.user.status-user-tag :status="$user->status"/>
        </div>
    </div>
</div>
