<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta http-equiv="refresh" content="{{ env('REFRESH_DELAY') }}"/>


    <style>
        div.relative {
            position: relative;
            left:{{ $positions['left'] }}px;
            top: {{ $positions['top'] }}px;
        }
    </style>


</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>

<script>

    $(function(){
        $.ajax({
            url: '/wall',
            type: 'POST',
            data: {h: screen.height, w: screen.width}
        });
    });

</script>



</html>
