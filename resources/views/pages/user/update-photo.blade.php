@extends('pages.user.base')

@section('container')
    <div class="h-auto w-full pb-5 flex items-center justify-center flex-col mt-28">
        <h1 class="text-4xl font-bold mb-10">Update Photo</h1>
        <form action="/update-image" method="POST" class="bg-white w-3/4 h-full" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="w-96 h-[30rem] bg-gray-400 rounded-3xl ml-28 relative flex items-center cursor-pointer"
                    id="thumbnail">
                    <img src="{{ asset('storage/post/' . $photoDetail->file_location) }}" alt=""
                        class="w-full h-full object-cover rounded-3xl" id="photo">
                    <input type="file" name="image" id="inputImage" class="hidden"
                        value="{{ $photoDetail->file_location }}">
                    <input type="text" name="oldImage" class="hidden" value="{{ $photoDetail->file_location }}">
                    <input type="hidden" name="id" value="{{ $photoDetail->id }}">
                </div>

                <div class="w-[50rem] h-[40rem] rounded-3xl ml-10 flex flex-col items-center">
                    <div class="w-11/12 h-14 mt-6">
                        <label for="title" class="text-lg font-semibold ml-2">Title</label>
                        <input type="text" id="title" name="title" placeholder="title" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2"
                            value="{{ $photoDetail->title }}">
                    </div>
                    <div class="w-11/12 h-32 mt-16">
                        <label for="description" class="text-lg font-semibold ml-2">Description</label>
                        <textarea name="description" id="description" placeholder="Description"
                            class="resize-none w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2">{{ $photoDetail->description }}</textarea>
                    </div>
                    <div class="w-11/12 h-14 mt-16">
                        <label for="album" class="text-lg font-semibold ml-2">Album</label>
                        <select name="album" id="album"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2">
                            <option>--Select Album--</option>
                            @foreach ($album as $item)
                                <option value="{{ $item->id }}"
                                    {{ $photoDetail->album_id === $item->id ? 'selected' : '' }}>{{ $item->album_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-11/12 h-14 mt-16">
                        @foreach ($errors->all() as $error)
                            <p class="p-5 bg-red-500 text-white rounded-3xl font-bold italic">{{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="flex w-11/12 h-32 mt-16">
                        <div class="">
                            <p class="bg-gray-400 text-black p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-gray-300 button-page cursor-pointer" data-url="/profile">Cancel</p>
                        </div>
                        <div class="">
                            <button type="submit"
                                class="bg-red-500 text-white p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-red-600">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="darken" class="hidden absolute top-0 rounded-3xl w-full h-full bg-black opacity-60"></div>
@endsection

@section('scripts')
    <script>
        const inputImage = document.getElementById('inputImage');
        const thumbnail = document.getElementById('thumbnail');
        const darken = document.getElementById('darken');

        thumbnail.addEventListener('mouseenter', () => {
            darken.classList.remove('hidden');
            thumbnail.appendChild(darken);
        });

        thumbnail.addEventListener('mouseleave', () => {
            darken.classList.add('hidden');
        });

        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var img = document.getElementById('photo');
                img.src = reader.result;
                img.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        thumbnail.addEventListener('click', () => {
            triggerFileInput();
        });

        inputImage.addEventListener('change', function() {
            var selectedFile = this.files[0];
            previewImage(event);
        });

        const triggerFileInput = () => {
            inputImage.click();
        }
    </script>
@endsection
