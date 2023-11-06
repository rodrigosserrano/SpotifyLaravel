<div class="col-md-8">
    <div class="row">
        <div class="col-md-4 pt-2 px-lg-4 pb-lg-5">
            <img class="rounded-circle"
                 src="{{ $user->picture_link }}"
                 title="{{ $user->first_name }}"
                 width="130rem"
            >
        </div>
        <x-account.user.form-edit-user-info/>
    </div>
</div>
