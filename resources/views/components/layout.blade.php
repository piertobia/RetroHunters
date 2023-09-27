<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/media/logo.ico" type="image/ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Retro Hunters' }}</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/9e81fed8b0.js" crossorigin="anonymous"></script>
</head>

<body class="body-custom">
    <x-navbar />
    
    <header class="mt-5">
        @if (session('message'))
            <div class="alert alert-success mt-3 mb-0 z-index">
                {{ session('message') }}
            </div>
        @endif
        @if (session('access.denied'))
            <div class="alert alert-danger mt-3 mb-0 z-index">
                {{ session('access.denied') }}
            </div>
        @endif
    </header>

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
