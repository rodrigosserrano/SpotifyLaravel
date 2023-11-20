@props([
    'navItems' => \Illuminate\Support\Facades\Auth::guest()
        ? 'template.navbar.guest.nav-items'
        : 'template.navbar.logged.nav-items'
])
<div class="d-flex collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-1 mb-lg-0 d-flex">

        <x-dynamic-component component="{{ $navItems }}" />

        <li class="nav-item mt-3 mb-3">
            <a class="nav-link text-white disabled" href="#">|</a>
        </li>
        @auth
            <x-template.navbar.logged.dropdown-account />
        @else
            <x-template.navbar.guest.signin-signup-buttons />
        @endauth
    </ul>
</div>
