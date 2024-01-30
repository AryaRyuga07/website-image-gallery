@extends('layout.app')

@section('body')
    <div class="w-screen h-screen bg-slate-200 overflow-hidden">
        <nav class="w-full h-20 bg-white flex items-center justify-around fixed top-0">
            <div class="w-12 h-12 rounded-full bg-blue-300"></div>
            <a href="/" class="button-page" data-url="/" id="home-page">
                <div class="w-auto h-12 px-6 rounded-3xl hover:bg-stone-200 flex items-center font-semibold">Home</div>
            </a>
            <a href="/explore" class="button-page" data-url="/explore" id="explore-page">
                <div class="w-auto h-12 px-6 rounded-3xl flex items-center hover:bg-stone-200 font-semibold">Explore</div>
            </a>
            <div><input type="text" placeholder="Search..." class="w-[128vh] h-12 rounded-3xl bg-stone-200 py-2 px-3 ">
            </div>
            <a href="/creation" class="button-page" data-url="/creation" id="creation-page">
                <div class="w-auto h-12 px-6 rounded-3xl flex items-center hover:bg-stone-200 font-semibold">Post</div>
            </a>
            <div class="mr-3 flex items-center">
                <a href="/profile" class="button-page" data-url="/profile">
                    <div class="w-9 h-9 rounded-full bg-blue-300 mr-2"></div>
                </a>
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
