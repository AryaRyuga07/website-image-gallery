@extends('pages.user.base')

@section('container')
    <div class="bg-slate-400 w-screen h-[92.5vh] mt-20 flex">
        <div class="bg-white w-1/4 h-full border border-slate-300 flex flex-col justify-between">
            <div class="w-full h-36 border-b pb-5">
                <p class="font-semibold text-xl ml-6 mt-6">Draft (0)</p>
                <input type="file" id="fileInput" class="hidden" multiple />
                <button class="bg-stone-200 p-3 rounded-3xl font-semibold text-center mt-6 ml-6 w-[20vw] hover:bg-stone-300"
                    id="newDraft">Add New Draft</button>
            </div>
            <div class="w-11/12 h-full mx-auto mt-1 overflow-auto">
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2">20 hari hingga habis masa berlakunya</p>
                </div>
            </div>
            <div class="w-full h-24 border-t">
                <div class="w-full h-full border-black flex items-center ml-3">
                    <input type="checkbox" class="w-7 h-7 rounded-3xl border border-black mx-2">
                    <p class="text-black text-md ml-2 font-bold">Choose All</p>
                </div>
            </div>
        </div>
        <div class="bg-white w-3/4 h-full border border-slate-300 overflow-auto">
            <div class="w-[75vw] bg-white h-20 border-b flex justify-between items-center fixed z-50">
                <p class="font-semibold text-xl ml-6">Pin</p>
                <div class="mr-6 flex items-center">
                    <p class="mr-6 font-semibold text-lg text-stone-400">Change Saved</p>
                    <button
                        class="bg-red-500 text-white p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-red-600">Publish</button>
                </div>
            </div>
            <div class="w-full h-screen bg-gray-200 pt-28 flex">
                @php
                    $img = asset('assets/image/towa.jpg');
                @endphp
                @if ($img == null)
                    <div class="w-96 h-[30rem] bg-white rounded-3xl ml-28"></div>
                @else
                    <div class="w-96 h-[30rem] bg-black rounded-3xl ml-28 relative"><img src="{{ $img }}"
                            alt="towa"
                            class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 max-w-full max-h-full"></div>
                @endif
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
                        <select name="album" id="album" class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2">
                            <option>-- Select Album --</option>
                            <option value="new">New</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const fileInput = document.getElementById('fileInput');
        const newDraft = document.getElementById('newDraft');

        const triggerFileInput = () => {
            fileInput.click();
        }

        // Pemrosesan file setelah dipilih (opsional)
        fileInput.addEventListener('change', function() {
            var selectedFile = this.files[0];
            console.log(selectedFile);
            console.log('Nama file yang dipilih:', selectedFile.name);
            // Tambahan logika pemrosesan file sesuai kebutuhan
        });

        newDraft.addEventListener('click', () => {
            triggerFileInput();
        });
    </script>
@endsection
