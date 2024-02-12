@extends('pages.user.explore-profile')

@section('content')
    <div class="mt-5 h-auto w-[94vw] mx-auto flex gap-3 flex-wrap">
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
