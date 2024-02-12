@extends('pages.user.base')

@php
    $name = strtr($userSearch->full_name, ['-' => ' ']);
    $image = $userSearch->file_location;
@endphp

@section('container')
    <div class="bg-white w-screen h-auto mt-20 pt-6 flex flex-col items-center">
        <div class="w-40 h-40 rounded-full bg-stone-300">
            @if ($image == null)
                <img src="{{ asset('assets/image/def.png') }}" alt="profile" class="w-40 h-40 rounded-full object-cover">
            @else
                <img src="{{ asset('storage/image/' . $image) }}" alt="profile" class="w-40 h-40 rounded-full object-cover">
            @endif
        </div>
        <p class="font-semibold text-4xl mt-3">{{ $name }}</p>
        <p class="text-sm font-semibold text-gray-600 mt-2"><label>@</label>{{ $userSearch->username }}</p>
        <div class="flex justify-around w-64 mt-3 text-lg text-stone-400">
            <p>{{ $photos->count() }} Photos</p>
            <p>{{ $like }} Like</p>
            <p>0 Follower</p>
        </div>
        <div class="flex justify-evenly w-96 mt-3">
            <button class="bg-stone-600 text-white py-3 px-5 rounded-full hover:bg-stone-800"><></button>
            <button class="bg-stone-200 p-3 rounded-3xl hover:bg-stone-300">Message</button>
            <button class="bg-red-600 text-white py-3 px-5 rounded-3xl hover:bg-red-800" id="follow">Follow</button>
            <button class="bg-stone-600 text-white py-3 px-5 rounded-3xl hover:bg-stone-800 hidden" id="followed">Followed</button>
            <button class="bg-stone-600 text-white py-3 px-5 rounded-full hover:bg-stone-800"><></button>
        </div>
        <div class="flex justify-evenly w-64 mt-16 font-semibold">
            <a href="/ex-profile/photos/{{ $userSearch->username }}" class="button-profile">Photos</a>
            <a href="/ex-profile/album/{{ $userSearch->username }}" class="button-profile">Album</a>
            <a href="/ex-profile/favorite/{{ $userSearch->username }}" class="button-profile">Favorite</a>
        </div>
        <div class="mb-3">
            @yield('content')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const follow = document.getElementById("follow");
        const followed = document.getElementById("followed");

        follow.addEventListener('click', function() {
            followed.classList.remove('hidden');
            follow.classList.add('hidden');
        });

        followed.addEventListener('click', function() {
            follow.classList.remove('hidden');
            followed.classList.add('hidden');
        });
    </script>
@endsection
