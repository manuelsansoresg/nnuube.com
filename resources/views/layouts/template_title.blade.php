<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title->titulo }} - Nnuube </title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit($title->descripcion, 155) }}">
    <meta name="keywords" content="{{ $title->palabras_clave }}">
    <meta property="og:site_name" content="nnuube">
    <meta property="og:title" content="{{ $title->titulo }} - Nnuube">
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit($title->descripcion, 155) }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{  asset('storage/' . $title->imagen) }}">
    <meta property="og:image:secure_url" content="{{  asset('storage/' . $title->imagen) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="es_MX" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@nnuube">
    <meta name="twitter:title" content="{{ $title->titulo }} - Nnuube">
    <meta name="twitter:description" content="{{ \Illuminate\Support\Str::limit($title->descripcion, 155) }}">
    <meta name="twitter:creator" content="@nnuube">
    <meta name="twitter:image" content="{{  asset('storage/' . $title->imagen) }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <link href="{{ asset('css/jquery.rateyo.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/brands.css" integrity="sha384-1KLgFVb/gHrlDGLFPgMbeedi6tQBLcWvyNUN+YKXbD7ZFbjX6BLpMDf0PJ32XJfX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css" integrity="sha384-jLuaxTTBR42U2qJ/pm4JRouHkEDHkVqH0T1nyQXn1mZ7Snycpf6Rl25VBNthU4z0" crossorigin="anonymous">
</head>
<body>

    <main class="py-4">
        @yield('content')
    </main>
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
</body>