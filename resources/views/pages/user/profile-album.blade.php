@extends('pages.user.profile')

@section('content')
    <div class="mt-5 h-auto w-[94vw] mx-auto flex gap-3 flex-wrap">
        <div class="w-52 h-72 bg-gray-200 rounded-3xl flex flex-col justify-center items-center cursor-pointer hover:bg-gray-50 transition duration-100 shadow-lg"
            id="album">
            <p class="text-4xl font-bold mb-4">+</p>
            <p>Add Album</p>
        </div>

        @foreach ($album as $item)
            <div
                class="darken-brightness relative w-52 h-72 bg-gray-200 rounded-3xl flex flex-col items-center cursor-pointer hover:bg-white transition duration-100 shadow-lg">
                <p class="w-3/4 text-center text-xl font-bold mb-4 absolute z-50 top-3 bg-white rounded-xl py-2 px-5 border-2 border-black">{{ $item->album_name }}
                </p>
                <div class="absolute w-full h-full object-cover rounded-3xl grid grid-cols-2 grid-rows-2 overflow-hidden">
                    @php
                        $latestData = $latest->where('album_id', '=', $item->id);
                    @endphp
                    @foreach ($latestData as $photo)
                        <div class="w-full h-full rounded-3xl"><img
                                src="{{ url('/assets/image/draft/' . $photo->file_location) }}"
                                class="bg-black w-full h-full object-cover"></div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div id="darken" class="hidden absolute top-0 rounded-3xl w-full h-full bg-black opacity-60"></div>
@endsection

@section('scripts')
    <script>
        const album = document.getElementById('album');
        let imagesAlbum = document.querySelectorAll('.darken-brightness');
        const darken = document.getElementById('darken');
        imagesAlbum.forEach((img) => {
            img.addEventListener('mouseenter', (event) => {
                darken.classList.remove('hidden');
                img.appendChild(darken);
            });
            img.addEventListener('mouseleave', (event) => {
                darken.classList.add('hidden');
            });
            img.addEventListener('click', function() {
                let id = this.querySelector('img').id;
                console.log(id)
                // window.location.href = '/explore-image';
            });
        });

        album.addEventListener('click', () => {
            window.location.href = "/add-album";
        });
    </script>
@endsection
