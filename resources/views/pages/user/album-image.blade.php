@extends('pages.user.base')

@section('container')
@php
    $name = strtr($userDetail->full_name, ['-' => ' ']);
@endphp
    <div class="h-auto w-full pb-5 flex items-center justify-center flex-col mt-28">
        <h1 class="text-4xl font-bold mb-10">{{ $name }} Album</h1>
        <div class="bg-white w-3/4 h-full">
            <div class="flex">
                <div class="w-96 h-[30rem] bg-gray-400 rounded-3xl ml-28 relative flex items-center" id="thumbnail">
                    <img src="{{ asset('storage/post/' . $albumDetail->album_photos) }}" alt=""
                        class="w-full h-full object-cover rounded-3xl" id="photo">
                    {{-- <input type="file" name="image" id="inputImage" class="hidden" value="{{ $albumDetail->file_location }}"> --}}
                    {{-- <input type="text" name="oldImage" class="hidden" value="{{ $albumDetail->file_location }}"> --}}
                    {{-- <input type="hidden" name="id" value="{{ $albumDetail->id }}"> --}}
                </div>

                <div class="w-[50rem] h-[40rem] rounded-3xl ml-10 flex flex-col items-center">
                    <div class="w-11/12 h-14 mt-6">
                        <p class="text-lg font-semibold ml-2">Album Name : {{ $albumDetail->album_name }}</p>
                        {{-- <input type="text" id="album_name" name="album_name" placeholder="album_name" autocomplete="off"
                        class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2"
                        value="{{ $albumDetail->album_name }}"> --}}
                    </div>
                    <div class="w-11/12 h-32 mt-3">
                        <p class="text-lg font-semibold ml-2">Description : {{ $albumDetail->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="w-full h-auto mt-5 flex flex-col items-center pb-15">
        <h1 class="mb-5 text-xl font-bold">Photos in this Album</h1>
        <div class="columns-2 xl:columns-4 2xl:columns-7 gap-3 w-[94vw] mx-auto space-y-3">
            @foreach ($result as $item)
                <div class="break-inside-avoid">
                    <img class="rounded-3xl" src="{{ asset('storage/post/' . $item->file_location) }}"
                        id="{{ $item->id }}" alt="Programming">
                        <div class="w-auto h-6 p-2 bg-white pb-2 mb-5 rounded-2xl mt-3 flex justify-center text-gray-500">
                            <div class="flex items-center h-2 pb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4 rounded-2xl">
                                    <path
                                        d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                </svg>
                                <p class="ml-2 text-sm">{{ $item->likeTotal }} like</p>
                            </div>
                            <div class="flex items-center h-2 pb-4 ml-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-4 h-4 rounded-2xl">
                                    <path fill-rule="evenodd"
                                        d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="ml-2 text-sm">{{ $item->commentTotal }} comment</p>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <div id="darken" class="hidden absolute top-0 rounded-3xl w-full h-full bg-black opacity-60"></div> --}}
@endsection

@section('scripts')
    <script>
        // const inputImage = document.getElementById('inputImage');
        // const thumbnail = document.getElementById('thumbnail');
        // const darken = document.getElementById('darken');

        // thumbnail.addEventListener('mouseenter', () => {
        //     darken.classList.remove('hidden');
        //     thumbnail.appendChild(darken);
        // });

        // thumbnail.addEventListener('mouseleave', () => {
        //     darken.classList.add('hidden');
        // });

        // function previewImage(event) {
        //     var input = event.target;
        //     var reader = new FileReader();

        //     reader.onload = function() {
        //         var img = document.getElementById('photo');
        //         img.src = reader.result;
        //         img.style.display = 'block';
        //     };

        //     reader.readAsDataURL(input.files[0]);
        // }

        // thumbnail.addEventListener('click', () => {
        //     triggerFileInput();
        // });

        // inputImage.addEventListener('change', function() {
        //     var selectedFile = this.files[0];
        //     previewImage(event);
        // });

        // const triggerFileInput = () => {
        //     inputImage.click();
        // }
    </script>
@endsection
