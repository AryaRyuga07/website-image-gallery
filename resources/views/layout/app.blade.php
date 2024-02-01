<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'RyeVision Gallery' }}</title>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    @yield('head')
    @if (env('VITE_ENABLED', 'true') === 'true')
        @vite('resources/css/app.css')
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @layer utilities {
            .darken-brightness:hover {
                /* filter: brightness(60%); */
                border-radius: 24px;
                cursor: zoom-in;
                position: relative;
            }
            .no-darken {
                filter: brightness(100%);
            }
        }
    </style>
</head>


<body>
    <div id="root" class="overflow-x-hidden">
        @yield('body')
    </div>
    @yield('scripts')
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/pages.js') }}"></script>
</body>

</html>
