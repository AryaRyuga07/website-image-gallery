@extends('pages.user.base')

@section('container')
    <div class="bg-slate-400 w-screen h-screen mt-20 flex">
        <div class="bg-white w-1/4 h-full border border-slate-300 flex flex-col">
            <div class="w-full h-36 border-b pb-5">
                <p class="font-semibold text-xl ml-6 mt-6">Draft (0)</p>
                <input type="file" id="fileInput" class="hidden" />
                <button class="bg-stone-200 p-3 rounded-3xl font-semibold text-center mt-6 ml-6 w-72 hover:bg-stone-300" id="newDraft">Add New Draft</button>
            </div>
            <div class="w-11/12 h-80 mx-auto mt-3 overflow-auto">
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2   ">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2   ">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2   ">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2   ">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2   ">20 hari hingga habis masa berlakunya</p>
                </div>
                <div class="w-full h-28 rounded-3xl flex items-center">
                    <div class="w-40 h-full border-black flex items-center">
                        <input type="checkbox" class="w-5 h-5 rounded-3xl bg-none border border-black mx-2">
                        <div class="w-20 h-20 bg-stone-400 rounded-xl"></div>
                    </div>
                    <p class="text-slate-400 text-md ml-2   ">20 hari hingga habis masa berlakunya</p>
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
                    <p class="text-black text-md ml-2 font-bold">Pilih semua</p>
                </div>
            </div>
        </div>
        <div class="bg-white w-3/4 h-full border border-slate-300 overflow-auto">
            <div class="w-full h-20 border-b flex justify-between items-center">
                <p class="font-semibold text-xl ml-6">Pin</p>
                <div class="mr-6 flex items-center">
                    <p class="mr-6 font-semibold text-lg text-stone-400">Change Saved</p>
                    <button class="bg-red-500 text-white p-3 rounded-3xl font-semibold text-center w-32 mr-6 hover:bg-red-600">Publish</button>
                </div>
            </div>
            <div class="w-full h-full bg-red-500 overflow-auto"></div>
        </div>
    </div>
@endsection