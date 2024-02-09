@extends('layout.app')

@php
    $image = $user->file_location;
@endphp

@section('body')
    <div class="w-auto h-auto bg-white-200">
        <nav class="w-full h-20 bg-white flex items-center justify-around fixed top-0 z-50">
            <div class="w-8 h-8 ml-5 rounded-full"><img src="{{ asset('assets/image/kuduga.jpg') }}" alt="kuduga"
                    class="rounded-full"></div>
            <button data-url="/" class="button-page">
                <div class="w-auto h-12 px-6 rounded-3xl hover:bg-stone-200 flex items-center font-semibold">Home</div>
            </button>
            <button class="button-page" data-url="/explore">
                <div class="w-auto h-12 px-6 rounded-3xl flex items-center hover:bg-stone-200 font-semibold">Explore</div>
            </button>
            <form action="/search" method="post" class="w-[128vh] h-12 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 absolute text-stone-500 font-bold ml-4" id="searchIcon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text" placeholder="Search..." class="w-full h-full rounded-3xl bg-stone-200 py-2 pl-12"
                    id="searchInput">
            </form>
            <button class="button-page" data-url="/creation">
                <div class="w-auto h-12 px-6 rounded-3xl flex items-center hover:bg-stone-200 font-semibold">Post</div>
            </button>
            <div class="mr-3 flex items-center">
                <button class="button-page" data-url="/profile">
                    <div class="w-9 h-9 rounded-full mr-2">
                        @if ($image == null)
                            <img src="{{ asset('assets/image/def.png') }}" alt="profile"
                                class="rounded-full w-9 h-9 object-cover">
                        @else
                            <img src="{{ asset('storage/image/' . $image) }}" alt="profile"
                                class="rounded-full w-9 h-9 object-cover">
                        @endif
                    </div>
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 font-bold cursor-pointer text-slate-500" id="arrowDown">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                <div class="hidden w-40 h-64 bg-white shadow-lg z-50 top-12 right-10" id="cardLog"></div>
            </div>
        </nav>

        <div>
            @yield('container')
        </div>
    </div>
@endsection
