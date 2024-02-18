@extends('pages.user.base')

@section('container')
    <div>
        <div class="mt-20 pt-4 columns-2 xl:columns-4 2xl:columns-7 gap-3 w-[94vw] mx-auto space-y-3 pb-28">
            @php
                $arrayRandom = $result->toArray();
                shuffle($arrayRandom);
            @endphp
            @foreach ($arrayRandom as $item)
                <div class="break-inside-avoid">
                    <div class="darken-brightness break-inside-avoid">
                        <img class="rounded-3xl" src="{{ asset('storage/post/' . $item['file_location']) }}"
                            id="{{ $item['id'] }}" alt="Programming">
                    </div>
                    <div class="w-auto h-6 p-2 bg-white pb-2 mb-5 rounded-2xl mt-3 flex justify-center text-gray-500">
                        <div class="flex items-center h-2 pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 rounded-2xl">
                                <path
                                    d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                            </svg>
                            <p class="ml-2 text-sm">{{ $item['likeTotal'] }} like</p>
                        </div>
                        <div class="flex items-center h-2 pb-4 ml-5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 rounded-2xl">
                                <path fill-rule="evenodd"
                                    d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="ml-2 text-sm">{{ $item['commentTotal'] }} comment</p>
                        </div>
                    </div>
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
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
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
                // img.appendChild(bookmark);
                img.appendChild(dot);
            });
            img.addEventListener('mouseleave', (event) => {
                // bookmark.classList.add('hidden');
                darken.classList.add('hidden');
                dot.classList.add('hidden');
                // img.removeChild(darken);
                // img.removeChild(bookmark);
            });
            img.addEventListener('click', function() {
                let id = this.querySelector('img').id;
                console.log(id)
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
