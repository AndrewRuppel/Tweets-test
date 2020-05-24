<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweets</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>

<div id="app" class="py-5">
    <main class="container-fluid">
        @yield('content')
    </main>
</div>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
</body>
</html>
