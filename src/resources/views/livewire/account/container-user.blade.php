@props(['user'])

<div class="container w-75 p-lg-5 mt-lg-4 container-smc">
    <div class="row">
        @if ($formEditProfile)
            <livewire:account.user.edit-info-user :user="$user"/>
        @else
            <livewire:account.user.info-user :user="$user"/>
        @endif

        <div wire:click="$set('formEditProfile', true)" class="col-md-4 justify-content-lg-end d-flex">
            <span id="edit-profile" style="cursor: pointer"><img src="{{ asset('assets/img/icon-edit.svg') }}" alt="Editar perfil" width="20px"></span>
        </div>
    </div>
</div>
