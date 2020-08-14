<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link type="text/css" href="{{ asset('css/style.css')  }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&display=swap" rel="stylesheet">
    @stack('styles')
    <title>Shopping Cart</title>
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
