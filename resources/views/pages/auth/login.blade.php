@extends('layout.app')

@section('body')
    <div class="w-screen h-screen bg-gray-200 flex justify-center items-center">
        <div class="w-5/6 h-5/6 bg-primary shadow-lg rounded-3xl relative flex flex-col justify-center">
            <form method="post" action="{{ url('auth/login') }}" class="w-full flex flex-col items-center p-8">
                <p class="mb-2 text-4xl font-bold text-center text-white">
                    RyeVision Gallery
                </p>
                <p class="mb-12 text-lg text-center text-white font-semibold">Supported by Kuduga</p>
                @csrf
                @if (Session::has('login_error'))
                    <div class="mb-4">
                        <div class="rounded-lg bg-red-100 text-red-800 px-4 py-3">
                            {{ Session::get('login_error') }}
                        </div>
                    </div>
                @endif
                <div class="mb-4">
                    <input type="text" name="username" placeholder="username" autocomplete="off" class="w-96 h-14 rounded-3xl p-4">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="password" class="w-96 h-14 rounded-3xl p-4">
                </div>
                <div class="mb-4 flex flex-col">
                    <button type="submit" class="w-96 h-12 bg-secondary rounded-3xl font-semibold hover:bg-third transition duration-300">Login</button>
                    <a class="text-white font-medium ml-3 mt-3 underline hover:cursor-pointer">forgot password?</a>
                </div>
            </form>
            <a href="/auth/register" class="absolute top-4 right-4 bg-secondary w-20 h-10 pt-2 text-center rounded-3xl hover:cursor-pointer font-semibold hover:bg-third transition duration-300"><div class="">Sign Up</div></a>
        </div>
    </div>
@endsection
