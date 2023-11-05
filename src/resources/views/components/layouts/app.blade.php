<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Save My Cash' }}</title>
        @vite([
            'resources/css/app.scss',
            'resources/js/app.js'
        ])
    </head>
    <body>
        <livewire:template.nav-bar/>
        {{ $slot }}
    </body>
</html>
