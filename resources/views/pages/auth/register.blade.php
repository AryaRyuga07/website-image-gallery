@extends('layout.app')

@section('body')
    <div class="w-screen h-screen bg-gray-200 flex justify-center items-center">
        <div class="w-5/6 h-5/6 bg-secondary shadow-lg rounded-3xl relative flex flex-col justify-center">
            <form method="post" action="{{ url('auth/register') }}" class="w-full flex flex-col items-center p-8">
                <p class="mb-12 text-4xl font-bold text-center text-white">
                    Sign Up
                </p>
                @csrf
                @if (Session::has('register_error'))
                    <div class="mb-4">
                        <div class="w-96 rounded-lg bg-red-100 text-red-800 px-4 py-3">
                            {{ Session::get('register_error') }}
                        </div>
                    </div>
                @endif
                <div class="mb-4">
                    <input type="text" name="username" placeholder="username" autocomplete="off" class="w-96 h-14 rounded-3xl p-4">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="password" class="w-96 h-14 rounded-3xl p-4">
                </div>
                <div class="mb-4">
                    <input type="email" name="email" placeholder="email" autocomplete="off" class="w-96 h-14 rounded-3xl p-4">
                </div>
                <div class="mb-4 flex flex-col">
                    <button type="submit" class="w-96 h-12 bg-primary rounded-3xl font-semibold hover:bg-third text-white transition duration-300">Register</button>
                </div>
            </form>
            <a href="/auth/login" class="absolute top-4 right-4 bg-primary w-20 h-10 pt-2 text-center text-white rounded-3xl hover:cursor-pointer font-semibold hover:bg-third transition duration-300"><div class="">Login</div></a>
        </div>
    </div>
@endsection
