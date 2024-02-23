<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'RyeVision Gallery' }}</title>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/css/tailwind.css') }}"></script>
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-file-encode.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-file-validate-type.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-crop.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-exif-orientation.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-preview.min.js') }}"></script> -->
    <!-- {{-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-preview.min.css') }}"></script> --}} -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-resize.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-transform.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/plugins/filepond-plugin-image-validate-size.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/filepond.min.js') }}"></script> -->
    <!-- <script src="{{ asset('assets/filepond/filepond.min.css') }}"></script> -->
    @yield('head')
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#1D5D9B',
                            secondary: '#75C2F6',
                            third: '#F4D160',
                            fourth: '#FBEEAC',
                        }
                    }
                },
            }
        </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @layer utilities {
            .darken-brightness:hover {
                /* filter: brightness(60%); */
                /* border-radius: 24px; */
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
