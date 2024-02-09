@extends('pages.user.profile')

@section('content')
    <div class="mt-5 h-auto w-[94vw] mx-auto flex gap-3 flex-wrap">
        <div class="w-52 h-72 bg-gray-200 rounded-3xl flex flex-col justify-center items-center cursor-pointer hover:bg-gray-50 transition duration-100 shadow-lg"
            id="album">
            <p class="text-4xl font-bold mb-4">+</p>
            <p>Add Album</p>
        </div>

        @foreach ($album as $item)
            <div class="darken-brightness relative w-52 h-72 bg-gray-200 rounded-3xl flex flex-col items-center cursor-pointer hover:bg-white transition duration-100 shadow-lg overflow-hidden"
                id="{{ $item->id }}">
                @if ($photos->count() !== 0)
                    <img src="{{ asset('storage/post/' . $photos->first()->file_location) }}" class="w-full h-full object-cover">
                @else
                    {{-- <img src="{{ asset('storage/post/' . $photos->file_location) }}" class="w-full h-full object-cover"> --}}
                @endif
                <p
                    class="w-3/4 text-center text-xl font-bold mb-4 absolute z-10 top-3 bg-white rounded-xl py-2 px-5 border-2 border-black">
                    {{ $item->album_name }}
                </p>
                {{-- <div
                    class="absolute w-full h-full object-cover rounded-3xl grid grid-cols-{{ $albumPhotos->count() >= 2 ? '2' : '1' }} grid-rows-{{ $albumPhotos->count() >= 3 ? '2' : '1' }} overflow-hidden">
                    @foreach ($albumPhotos as $photo)
                        <div class="w-full h-full rounded-3xl"><img
                                src="{{ url('/assets/image/draft/' . $photo->file_location) }}"
                                class="bg-black w-full h-full object-cover"></div>
                    @endforeach
                </div> --}}
            </div>
        @endforeach
    </div>

    <div id="darken" class="hidden absolute top-0 rounded-3xl w-full h-full bg-black opacity-60"></div>
    <div class="hidden absolute w-5 h-5 bottom-6 right-7 rounded-full z-40 hover:cursor-pointer no-darken" id="delete">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-8 h-8 p-2 bg-white rounded-full">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>

    </div>
@endsection

@section('scripts')
    <script>
        const album = document.getElementById('album');
        let imagesAlbum = document.querySelectorAll('.darken-brightness');
        const darken = document.getElementById('darken');
        const del = document.getElementById('delete');
        imagesAlbum.forEach((img) => {
            img.addEventListener('mouseenter', (event) => {
                darken.classList.remove('hidden');
                del.classList.remove('hidden');
                img.appendChild(del);
                img.appendChild(darken);
            });
            img.addEventListener('mouseleave', (event) => {
                darken.classList.add('hidden');
                del.classList.add('hidden');
            });
            img.addEventListener('click', function() {
                let id = this.querySelector('img').id;
                console.log(id)
                // window.location.href = '/explore-image';
            });
        });

        del.addEventListener('click', function(e) {
            e.stopPropagation();
            let id = e.currentTarget.parentNode.id;
            var confirm = window.confirm('Are you sure want to delete this album?');

            if (confirm) {
                window.location.href = "/delete-album/" + id;
            }
        });

        album.addEventListener('click', () => {
            window.location.href = "/add-album";
        });
    </script>
@endsection
