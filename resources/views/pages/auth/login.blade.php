@extends('layout.app')

@section('body')
    <div class="w-screen h-screen bg-gray-200 flex justify-center items-center">
        <div class="w-5/6 h-5/6 bg-black shadow-lg rounded-3xl relative flex xl:flex-row xl:items-center flex-col justify-center">
            <img src="{{ asset('assets/image/katan-flower.jpeg') }}" class="w-full h-1/2 xl:w-1/2 xl:h-full object-cover rounded-t-3xl xl:rounded-s-3xl">
            <form method="post" action="{{ url('auth/login') }}" class="w-full xl:w-1/2 rounded-b-3xl xl:rounded-e-3xl flex flex-col items-center p-8 bg-black">
                <p class="mb-12 text-4xl font-bold text-center text-white">
                    RyeVision Gallery
                </p>
                {{-- <p class="mb-12 text-lg text-center text-white font-semibold">Supported by <a target="_blank" class="font-bold underline" href="https://www.kuduga.com/">Kuduga</a></p> --}}
                @csrf
                @if (Session::has('login_error'))
                    <div class="mb-4">
                        <div class="rounded-lg bg-red-200 text-red-800 px-4 py-3">
                            {{ Session::get('login_error') }}
                        </div>
                    </div>
                @endif
                @if (Session::has('register_success'))
                    <div class="mb-4">
                        <div class="rounded-lg bg-green-200 text-green-800 px-4 py-3">
                            {{ Session::get('register_success') }}
                        </div>
                    </div>
                @endif
                <div class="xl:w-1/2 mb-4">
                    <input type="text" name="username" placeholder="username" autocomplete="off" class="w-full h-14 rounded-3xl p-4">
                </div>
                <div class="xl:w-1/2 mb-4">
                    <input type="password" name="password" placeholder="password" class="w-full h-14 rounded-3xl p-4">
                </div>
                <div class="xl:w-1/2 mb-4 flex flex-col items-center">
                    <button type="submit" class="px-20 xl:w-full h-12 bg-secondary rounded-3xl font-semibold hover:bg-primary transition duration-300">Login</button>
                    {{-- <a class="text-white font-medium ml-3 mt-3 underline hover:cursor-pointer">forgot password?</a> --}}
                </div>
            </form>
            <a href="/auth/register" class="absolute top-4 right-4 bg-secondary w-20 h-10 pt-2 text-center rounded-3xl hover:cursor-pointer font-semibold hover:bg-primary transition duration-300"><div class="">Sign Up</div></a>
        </div>
    </div>
@endsection
