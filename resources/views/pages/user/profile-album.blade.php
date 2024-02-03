@extends('pages.user.profile')

@section('content')
    <div class="mt-5 h-auto w-[94vw] mx-auto flex gap-3 flex-wrap">
        <div
            class="w-52 h-72 bg-gray-200 rounded-3xl flex flex-col justify-center items-center cursor-pointer hover:bg-gray-50 transition duration-100 shadow-lg">
            <p class="text-4xl font-bold mb-4">+</p>
            <p>Add Album</p>
        </div>

        @foreach ($album as $item)
            <div
                class="relative w-52 h-72 bg-gray-200 rounded-3xl flex flex-col items-center cursor-pointer hover:bg-white transition duration-100 shadow-lg">
                <p class="text-xl font-bold mb-4 mt-6 absolute z-50 text-yellow-800">{{ $item->album_name }}</p>
                <div class="absolute w-full h-full object-cover rounded-3xl grid grid-cols-2">
                    <div class="bg-black w-full h-full rounded-tl-3xl"></div>
                    <div class="bg-blue-500 w-full h-full rounded-tr-3xl"></div>
                    <div class="bg-green-500 w-full h-full rounded-bl-3xl"></div>
                    <div class="bg-white w-full h-full rounded-br-3xl"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
