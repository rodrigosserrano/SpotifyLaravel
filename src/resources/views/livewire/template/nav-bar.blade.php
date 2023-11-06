<div>
    <nav class="navbar navbar-expand-lg bg-smc">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">
                <img
                    src="{{ asset('assets/img/logo.svg') }}" alt="Save My Cash" width="160"
                    class="d-inline-block align-text-top ml-lg-2"
                ></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @if(!Route::is('login'))
                <x-template.navbar.content-navbar/>
            @endif
        </div>
    </nav>
</div>
