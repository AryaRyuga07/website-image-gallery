@extends('pages.user.base')

@section('container')
    <div class="bg-slate-400 w-screen h-screen mt-20 flex">
        <div class="bg-white w-1/4 h-full border border-slate-300 flex flex-col justify-between">
            <div class="w-full h-48 border-b">
                <p class="font-semibold text-xl ml-6 mt-6">Draft (0)</p>
                <div class="bg-stone-200 p-3 rounded-3xl font-semibold text-center mt-14 mx-auto w-96">Add New Draft</div>
            </div>
            <div class="w-full h-max"></div>
            <div class="w-full h-32 border-t"></div>
        </div>
        <div class="bg-white w-3/4 h-full border border-slate-300">
            <div class="w-full h-20 border-b flex justify-between items-center">
                <p class="font-semibold text-xl ml-6">Pin</p>
                <div class="mr-6 flex items-center">
                    <p class="mr-6 font-semibold text-lg text-stone-400">Change Saved</p>
                    <div class="bg-red-500 text-white p-3 rounded-3xl font-semibold text-center w-32 mr-6">Publish</div>
                </div>
            </div>
        </div>
    </div>
@endsection