@props(['title'])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body class="bg-dark bg-opacity-10">
    <div class="d-flex justify-content-center align-items-center min-vh-100 w-100 mx-auto" style="max-width: 20rem">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $title ?? config('app.name', 'Laravel') }}</h5>
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
