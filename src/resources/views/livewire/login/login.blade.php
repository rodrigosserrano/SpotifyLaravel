@vite([
    'resources/css/login.css',
])
<div class="container col-4 bg-black p-lg-5 position-relative form-login ">
    <h1
        class="fw-bold text-white text-center p-lg-5 display-4"
    >Entrar no Spotify
    </h1>
    <div class="d-flex justify-content-center">
        <button class="btn btn-spty-transparent">
            <span class="icon-google p-3"></span>Continuar com o google</button>
    </div>
    <hr class="d-flex m-auto m-lg-5">
    <livewire:login-form-component/>

</div>
