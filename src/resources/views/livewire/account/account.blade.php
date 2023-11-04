<div>
    <div class="container w-75 p-lg-5 mt-lg-4 container-smc">
        <div class="row">
            <livewire:account.user.info-user :user="$user"/>

            @if ($editProfileVar == false)
                <div wire:click="editProfile" class="col-md-4 justify-content-lg-end d-flex">
                    <span id="edit-profile" style="cursor: pointer"><img src="{{ asset('assets/img/icon-edit.svg') }}" alt="Editar perfil" width="20px"></span>
                </div>
            @endif
        </div>
    </div>

    <div class="container w-75 p-lg-5 mt-lg-4 container-smc">
        @if ($editProfileVar == false)
            <div class="row col-md-12 align-content-between justify-content-center">
                <livewire:account.bills.card-bill-info/>
                <livewire:account.bills.card-bill-info/>
                <livewire:account.bills.card-bill-info/>
                <livewire:account.bills.card-bill-info/>
                <livewire:account.bills.card-bill-info/>
                <livewire:account.bills.card-bill-info/>
            </div>
        @else
            <span wire:click="editProfile" style="cursor: pointer"><img src="{{ asset('assets/img/icon-arrow-left-solid.svg') }}" alt="Voltar" width="20px"></span>
            {{-- Edit profile --}}
        @endif
    </div>
</div>

