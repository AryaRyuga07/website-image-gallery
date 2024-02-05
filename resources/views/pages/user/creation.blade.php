@extends('pages.user.base')

@section('container')
    <div class="bg-slate-400 w-screen h-[92.5vh] mt-20 flex">
        <div class="bg-white w-1/4 h-full border border-slate-300 flex flex-col justify-between">
            <div class="w-full h-36 border-b pb-5">
                <p class="font-semibold text-xl ml-6 mt-6">Draft ({{ $draft->count() }})</p>
                <input type="file" name="files[]" id="fileInput" class="hidden" multiple />
                <button class=" bg-stone-200 p-3 rounded-3xl font-semibold text-center mt-6 ml-6 w-[20vw] hover:bg-stone-300"
                    id="newDraft">Add New Draft</button>
            </div>
            <div class="w-11/12 h-full mx-auto mt-1 overflow-auto">
                @if ($draft->count() == 0)
                    <div class="w-full h-28 rounded-3xl flex items-center">
                        <div class="w-40 h-full border-black flex items-center">
                            <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                            <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                        </div>
                        <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                    </div>
                @else
                    @foreach ($draft as $item)
                        <div class="w-full h-28 rounded-3xl flex items-center hover:bg-gray-300 cursor-pointer draft-image"
                            id="{{ $item->id }}">
                            <div class="w-40 h-full border-black flex items-center">
                                <input type="checkbox" data-id="{{ $item->id }}"
                                    class="checkbox w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                                <div class="w-20 h-20 rounded-xl"><img
                                        src="{{ url('assets/image/draft/' . $item->file_location) }}" alt="image"
                                        class="w-full h-full rounded-xl object-cover"></div>
                            </div>
                            <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="w-full h-24 border-t">
                <div class="w-auto h-full border-black flex justify-between items-center ml-3">
                    <div class="flex items-center">
                        <input type="checkbox" class="w-7 h-7 rounded-3xl border border-black mx-2" id="selectAllCb">
                        <p class="text-black text-md ml-2 font-bold">Choose All</p>
                    </div>
                    <form method="post" action="/delete-draft">
                        @csrf
                        <button type="submit" class="bg-red-500 p-2 rounded-xl hover:bg-red-300 text-white mr-4"
                            onclick="confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <form action="/post-image" method="POST" class="bg-white w-3/4 h-full border border-slate-300 overflow-auto"
            enctype="multipart/form-data">
            @csrf
            <div class="w-[75vw] bg-white h-20 border-b flex justify-between items-center fixed z-50">
                <p class="font-semibold text-xl ml-6">Pin</p>
                @if (Session::has('login_error'))
                    <div
                        class="absolute left-20 w-32 h-10 bg-green-300 border border-green-500 rounded-lg flex items-center justify-center">
                        {{ Session::get('login_error') }}
                    </div>
                @endif
                <div class="mr-6 flex items-center">
                    <p class="mr-6 font-semibold text-lg text-stone-400">Publish Image Now</p>
                    <button type="submit"
                        class="bg-red-500 text-white p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-red-600">Publish</button>
                </div>
            </div>
            <div class="w-full h-auto bg-gray-200 pt-32 flex">
                <div class="max-w-96 w-auto h-full max-h-[30rem] bg-black rounded-3xl ml-28 relative">
                    <img src="" id="imgPrev" alt="image" class="hidden w-auto h-auto rounded-3xl object-cover">
                    <input type="hidden" name="image" id="inputImage">
                    <div class="hidden w-full h-full bg-red-600 rounded-3xl object-cover" id="newImg"></div>
                </div>

                <div class="w-[50rem] h-[40rem] rounded-3xl ml-10 flex flex-col items-center">
                    <div class="w-11/12 h-14 mt-6">
                        <label for="title" class="text-lg font-semibold ml-2">Title</label>
                        <input type="text" id="title" name="title" placeholder="Title" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2">
                    </div>
                    <div class="w-11/12 h-32 mt-16">
                        <label for="description" class="text-lg font-semibold ml-2">Description</label>
                        <textarea name="description" id="description" placeholder="Description"
                            class="resize-none w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2"></textarea>
                    </div>
                    <div class="w-11/12 h-14 mt-16">
                        <label for="album" class="text-lg font-semibold ml-2">Album</label>
                        <select name="album" id="album"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2">
                            @foreach ($album as $item)
                                <option value="{{ $item->id }}">{{ $item->album_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const fileInput = document.getElementById('fileInput');
        const newDraft = document.getElementById('newDraft');
        const newImage = document.getElementById('newImg');
        const draftImage = document.querySelectorAll('.draft-image');
        let img = document.getElementById('imgPrev');
        const inputImage = document.getElementById('inputImage');

        // Send Image to Database
        fileInput.addEventListener('change', function() {
            var selectedFiles = this.files;
            var firstFile = this.files[0];
            if (selectedFiles) {
                var formData = new FormData();
                for (var i = 0; i < selectedFiles.length; i++) {
                    formData.append('images[]', selectedFiles[i]);
                }

                fetch('/draft', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        window.location.reload();
                        setTimeout(() => {
                            img.src = "/assets/image/draft/" + data.image;
                        }, 3000);
                        // previewImage(event);
                    })
                    .catch(error => console.error('Error: ', error));
            }
        });

        newDraft.addEventListener('click', () => {
            // var img = document.getElementById('imgPrev');
            // var div = document.getElementById('newImg');
            // img.src = "";
            // img.classList.add('hidden');
            // div.classList.remove('hidden');
            triggerFileInput();
        });

        draftImage.forEach((draft) => {
            const imgElement = draft.querySelector('img');
            draft.addEventListener('click', () => {
                let source = imgElement.src;
                img.classList.remove('hidden');
                img.src = source;
                const imageName = source.split('/');
                inputImage.value = imageName[6];
                // console.log(imageName[6]);
            })
        });

        const triggerFileInput = () => {
            fileInput.click();
        }

        // function previewImage(event) {
        //     var input = event.target;
        //     var reader = new FileReader();

        //     reader.onload = function() {
        //         var img = document.getElementById('imgPrev');
        //         img.src = reader.result;
        //     };
        //     reader.readAsDataURL(input.files[0]);
        // }

        newImage.addEventListener('click', () => {
            triggerFileInput();
        });




        // Delete with Checkbox
        document.addEventListener('DOMContentLoaded', function() {
            let checkboxes = document.querySelectorAll('.checkbox');
            let selectAllCheckbox = document.getElementById('selectAllCb')

            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateHiddenInput();
            });

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateHiddenInput();
                });
            });

            function updateHiddenInput() {
                // Tambah atau hapus id ke dalam array terpilih
                let selectedIds = [];

                checkboxes.forEach(function(cb) {
                    if (cb.checked) {
                        selectedIds.push(cb.getAttribute('data-id'));
                    }
                });

                // Simpan array terpilih ke dalam input tersembunyi
                let hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_ids';
                hiddenInput.value = selectedIds.join(',');

                // Hapus input lama jika ada
                let oldInput = document.querySelector('input[name="selected_ids"]');
                if (oldInput) {
                    oldInput.remove();
                }

                // Tambahkan input tersembunyi ke dalam formulir
                document.querySelector('form').appendChild(hiddenInput);
                console.log(selectedIds)
            }
        });
    </script>
@endsection
