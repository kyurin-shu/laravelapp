<!DOCTYPE html>
<html lang="en">
<head>
    <title>laravelapp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app" class="main-content">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>