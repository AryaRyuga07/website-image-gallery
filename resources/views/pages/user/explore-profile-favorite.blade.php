@extends('pages.user.explore-profile')

@section('content')
    <div class="mt-5">
        <div class="columns-4 2xl:columns-7 gap-3 w-[94vw] mx-auto space-y-3">
            @foreach ($photos as $item)
                <div class="rounded-3xl darken-brightness break-inside-avoid" id="gambar1">
                    <img class="rounded-3xl" src="{{ asset('storage/post/' . $item->file_location) }}" alt="Programming">
                </div>
            @endforeach
        </div>

        <div id="darken" class="hidden absolute top-0 rounded-3xl w-full h-full bg-black opacity-60"></div>

        <div class="hidden absolute w-7 h-7 top-4 right-6  rounded-full z-40 hover:cursor-pointer no-darken" id="bookmark">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
        </div>
        <div class="hidden absolute w-5 h-5 bottom-6 right-7  rounded-full z-40 hover:cursor-pointer no-darken"
            id="dot">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        </div>
        <div class="hidden absolute w-7 h-7 top-4 right-6  rounded-full z-50 hover:cursor-pointer no-darken"
            id="bookmark-slash">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
            </svg>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let images = document.querySelectorAll('.darken-brightness');
        const bookmarking = document.getElementById('bookmark');
        const bookmarkSlash = document.getElementById('bookmark-slash');
        const darken = document.getElementById('darken');
        const dot = document.getElementById('dot');
        images.forEach((img) => {
            img.addEventListener('mouseenter', (event) => {
                bookmark.classList.remove('hidden');
                darken.classList.remove('hidden');
                dot.classList.remove('hidden');
                img.appendChild(darken);
                img.appendChild(bookmark);
                img.appendChild(dot);
            });
            img.addEventListener('mouseleave', (event) => {
                bookmark.classList.add('hidden');
                darken.classList.add('hidden');
                dot.classList.add('hidden');
                // img.removeChild(darken);
                // img.removeChild(bookmark);
            });
        });
    </script>
@endsection
