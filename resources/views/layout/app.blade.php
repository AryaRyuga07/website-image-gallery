<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'PicRye' }}</title>
    @yield('head')
</head>
@vite('resources/css/app.css')

<body>
    <div id="root" class="overflow-x-hidden">
        @yield('body')
    </div>
    @yield('scripts')
</body>

</html>
