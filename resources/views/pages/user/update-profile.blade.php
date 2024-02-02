@extends('pages.user.setting')

@php
    $full_name = explode('-', $user->full_name);
    $image = $user->file_location;

    if ($image == null) {
        $image = 'def.png';
    }
@endphp

@section('content')
    <div>
        <p class="font-bold text-3xl mb-12 pt-6">Update Profile</p>
        <form action="/update-profile" method="post" class="w-auto h-auto flex" enctype="multipart/form-data">
            @csrf
            <div class="w-40 h-40 rounded-full darken-brightness mr-12">
                <img src="{{ url('assets/image/' . $image) }}" id="profileImage" alt="profile"
                    class="w-40 h-40 rounded-full hover:cursor-pointer mr-12 object-cover">
            </div>
            <div class="w-[50vw]">
                <div class="flex">
                    <div class="w-1/2 h-14 mr-6">
                        <label for="firstname" class="text-lg font-semibold ml-2">First Name</label>
                        <input type="text" id="firstname" name="firstname" placeholder="firstname" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2" autocomplete="off"
                            value="{{ $full_name != null ? $full_name[0] : '' }}">
                    </div>
                    <div class="w-1/2 h-14">
                        <label for="lastname" class="text-lg font-semibold ml-2">Last Name</label>
                        <input type="text" id="lastname" name="lastname" placeholder="lastname" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2" autocomplete="off"
                            value="{{ $full_name != null ? $full_name[1] ?? null : '' }}">
                    </div>
                </div>
                <div class="w-full h-32 mt-16 mb-20">
                    <label for="address" class="text-lg font-semibold ml-2">Address</label>
                    <textarea name="address" id="address" placeholder="address"
                        class="resize-none w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2" autocomplete="off">{{ $user->address != null ? $user->address : '' }}</textarea>
                </div>
                <div class="flex">
                    <div class="mb-4 flex flex-col mr-6">
                        <button
                            class="w-52 h-12 bg-gray-400 rounded-3xl font-semibold hover:bg-gray-300 transition duration-300">Cancel</button>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <button type="submit"
                            class="w-52 h-12 bg-red-600 rounded-3xl font-semibold text-white hover:bg-red-500 transition duration-300">Saved</button>
                    </div>
                </div>
            </div>
            <input type="file" name="image" id="fileInput" class="hidden" />
        </form>
    </div>

    <div id="darken" class="hidden absolute top-0 rounded-full w-40 h-40 bg-black opacity-60"></div>

    <div class="hidden absolute w-7 h-7 bottom-2 right-6  rounded-full z-40 hover:cursor-pointer no-darken" id="bookmark">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-10 h-10 p-2 bg-white rounded-full">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var img = document.getElementById('profileImage');
                img.src = reader.result;
                img.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        const fileInput = document.getElementById('fileInput');
        const newDraft = document.getElementById('darken');

        const triggerFileInput = () => {
            fileInput.click();
        }

        // Pemrosesan file setelah dipilih (opsional)
        fileInput.addEventListener('change', function() {
            var selectedFile = this.files[0];
            previewImage(event);
        });

        newDraft.addEventListener('click', () => {
            triggerFileInput();
        });




        let images = document.querySelectorAll('.darken-brightness');
        const bookmarking = document.getElementById('bookmark');
        const darken = document.getElementById('darken');
        images.forEach((img) => {
            img.addEventListener('mouseenter', (event) => {
                bookmark.classList.remove('hidden');
                darken.classList.remove('hidden');
                img.appendChild(darken);
                img.appendChild(bookmark);

                bookmark.addEventListener('click', () => {
                    triggerFileInput();
                })
            });
            img.addEventListener('mouseleave', (event) => {
                bookmark.classList.add('hidden');
                darken.classList.add('hidden');
            });
        });
    </script>
@endsection
