@extends('pages.user.profile')

@section('content')
    <div class="mt-5">
        <div class="columns-2 xl:columns-4 2xl:columns-7 gap-3 w-[94vw] mx-auto space-y-3">
            @foreach ($photos as $item)
                <div class="darken-brightness break-inside-avoid">
                    <img class="rounded-3xl" src="{{ asset('storage/post/' . $item->file_location) }}" id="{{ $item->id }}"
                        alt="Programming">
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
        <div class="hidden absolute w-5 h-5 bottom-6 right-16  rounded-full z-40 hover:cursor-pointer no-darken"
            id="dot">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
        </div>
        <div class="hidden absolute w-5 h-5 bottom-6 right-7 rounded-full z-40 hover:cursor-pointer no-darken"
            id="delete">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </div>
        <div class="hidden absolute w-5 h-5 bottom-6 right-24 mr-1 rounded-full z-40 hover:cursor-pointer no-darken"
            id="edit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 p-2 bg-white rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
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
        const del = document.getElementById('delete');
        const edit = document.getElementById('edit');
        images.forEach((img) => {
            img.addEventListener('mouseenter', (event) => {
                // bookmark.classList.remove('hidden');
                darken.classList.remove('hidden');
                dot.classList.remove('hidden');
                del.classList.remove('hidden');
                edit.classList.remove('hidden');
                img.appendChild(darken);
                img.appendChild(bookmark);
                img.appendChild(dot);
                img.appendChild(del);
                img.appendChild(edit);
            });
            img.addEventListener('mouseleave', (event) => {
                // bookmark.classList.add('hidden');
                darken.classList.add('hidden');
                dot.classList.add('hidden');
                del.classList.add('hidden');
                edit.classList.add('hidden');
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
        edit.addEventListener('click', function(e) {
            e.stopPropagation();
            let id = e.currentTarget.parentNode.querySelector('img').id;
            urlUpdate(id);
        });
        del.addEventListener('click', function(e) {
            e.stopPropagation();
            let id = e.currentTarget.parentNode.querySelector('img').id;
            var confirm = window.confirm('Are you sure want to delete this image?');

            if (confirm) {
                window.location.href = "/delete/" + id;
            }
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
        const urlUpdate = (param) => {
            const requestOptions = {
                method: 'POST',
                body: JSON.stringify(param),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            };

            // URL endpoint untuk POST request
            const postEndpoint = '/update-photo';

            // Lakukan request POST
            fetch(postEndpoint, requestOptions)
                .then(response => response.json())
                .then(data => {
                    console.log(data.url);
                    window.location.href = "/update-photo/" + data.url;
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
