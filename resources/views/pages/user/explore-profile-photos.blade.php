@extends('pages.user.explore-profile')

@section('content')
    <div class="mt-5">
        <div class="columns-4 2xl:columns-7 gap-3 w-[94vw] mx-auto space-y-3">
            @foreach ($photos as $item)
                <div class="darken-brightness break-inside-avoid">
                    <img class="rounded-3xl" src="{{ asset('storage/post/' . $item->file_location) }}"
                        id="{{ $item->id }}" alt="Programming">
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
        <div class="hidden absolute w-5 h-5 bottom-6 right-6 rounded-full z-40 hover:cursor-pointer no-darken"
            id="dot">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
        </div>
        <div class="hidden absolute w-7 h-7 top-4 right-6 rounded-full z-50 hover:cursor-pointer no-darken"
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
            img.addEventListener('click', function() {
                let id = this.querySelector('img').id;
                // window.location.href = '/explore-image';
            });
        });
        bookmark.addEventListener('click', function(e) {
            e.stopPropagation();
            console.log(e.currentTarget.parentNode.querySelector('img').id)
        });
        dot.addEventListener('click', function(e) {
            e.stopPropagation();
            let id = e.currentTarget.parentNode.querySelector('img').id;
            window.location.href = "/download/" + id;
        });
        darken.addEventListener('click', function(e) {
            e.stopPropagation();
            let id = e.currentTarget.parentNode.querySelector('img').id;
            urlAccess(id);
        });

        const urlAccess = (param) => {
            const requestOptions = {
                method: 'POST',
                body: JSON.stringify(param),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            };

            // URL endpoint untuk POST request
            const postEndpoint = '/explore-image';

            // Lakukan request POST
            fetch(postEndpoint, requestOptions)
                .then(response => response.json())
                .then(data => {
                    console.log(data.url);
                    window.location.href = "/explore-image/" + data.url;
                })
                .catch(error => {
                    // Tangani kesalahan jika terjadi
                    console.error('Error:', error);
                });
        }

        // const urlPages = (url) => {
        //     let dataToSend = {
        //         key1: 'value1',
        //         key2: 'value2'
        //     };

        // Pindah ke halaman baru dengan mengirim data melalui metode POST
        //     fetch('/explore-image' + url, {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //             },
        //             body: JSON.stringify(dataToSend),
        //         })
        //         .then(response => {
        //             // Handle response jika diperlukan
        //             if (response.ok) {
        //                 return response.json();
        //             } else {
        //                 throw new Error('Network response was not ok');
        //             }
        //         })
        //         .then(data => {
        //             // Lakukan sesuatu dengan data yang diterima
        //             // ...
        //         })
        //         .catch(error => {
        //             // Handle error jika diperlukan
        //             console.error('Error:', error);
        //         });
        // }
    </script>
@endsection
