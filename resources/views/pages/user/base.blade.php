@extends('layout.app')

@section('body')
    <div class="w-screen h-screen bg-slate-200">
        <nav class="w-full h-20 bg-white flex items-center justify-around fixed top-0">
            <div class="w-12 h-12 rounded-full bg-blue-300"></div>
            <a href="/"><div class="w-auto h-12 px-6 rounded-3xl bg-stone-900 text-white flex items-center font-semibold">Home</div></a>
            <a href="/explore"><div class="w-auto h-12 px-6 rounded-3xl flex items-center hover:bg-stone-200 font-semibold">Explore</div></a>
            <div><input type="text" placeholder="Search..." class="w-[128vh] h-12 rounded-3xl bg-stone-200 py-2 px-3 "></div>
            <a href="/creation"><div class="w-auto h-12 px-6 rounded-3xl flex items-center hover:bg-stone-200 font-semibold">Post</div></a>
            <a href="/profile"><div class="w-12 h-12 rounded-full bg-blue-300 mr-3"></div></a>
        </nav>

        <div>
            @yield('container')
        </div>
    </div>
@endsection
