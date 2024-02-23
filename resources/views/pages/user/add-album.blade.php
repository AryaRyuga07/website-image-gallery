@extends('pages.user.base')

@section('container')
    <div class="h-auto w-full pb-5 flex items-center justify-center flex-col mt-28">
        <h1 class="text-4xl font-bold mb-10">Add Album</h1>
        <form action="/add-album" method="POST" class="bg-white w-3/4 h-full" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-96 h-[30rem] bg-gray-400 rounded-3xl ml-28 relative flex items-center" id="thumbnail">
                    <img src="{{ asset('/assets/image/thumb.jpg') }}" alt="" class="w-full h-full object-fill rounded-3xl">
                    {{-- <img src="" id="imgPrev" alt="image" class="hidden w-full h-full rounded-3xl"> --}}
                    {{-- <input type="file" class="hidden" name="image" id="inputImage"> --}}
                    {{-- <div class="hidden w-full h-full bg-red-600 rounded-3xl object-cover" id="newImg"></div> --}}
                </div>

                <div class="w-[50rem] h-[40rem] rounded-3xl ml-10 flex flex-col items-center">
                    <div class="w-11/12 h-14 mt-6">
                        <label for="album" class="text-lg font-semibold ml-2">Album</label>
                        <input type="text" id="album" name="album" placeholder="Album" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2">
                    </div>
                    <div class="w-11/12 h-32 mt-16">
                        <label for="description" class="text-lg font-semibold ml-2">Description</label>
                        <textarea name="description" id="description" placeholder="Description"
                            class="resize-none w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2"></textarea>
                    </div>
                    <div class="flex w-11/12 h-32 mt-16">
                        <div class="">
                            <p data-url="/profile/album"
                                class="bg-gray-400 text-black p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-gray-300 cursor-pointer button-page">Cancel</p>
                        </div>
                        <div class="">
                            <button type="submit"
                                class="bg-red-500 text-white p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-red-600">Add
                                Album</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        // const inputImage = document.getElementById('inputImage');
        // const thumbnail = document.getElementById('thumbnail');

        // function previewImage(event) {
        //     var input = event.target;
        //     var reader = new FileReader();

        //     reader.onload = function() {
        //         var img = document.getElementById('imgPrev');
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
