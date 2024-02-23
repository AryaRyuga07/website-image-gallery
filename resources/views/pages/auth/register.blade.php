@extends('layout.app')

@section('body')
    <div class="w-screen h-screen bg-gray-200 flex justify-center items-center">
        <div
            class="w-5/6 h-5/6 bg-black shadow-lg rounded-3xl relative flex xl:flex-row xl:items-center flex-col justify-center">
            <img src="{{ asset('assets/image/katana-men.jpeg') }}"
                class="w-full h-1/2 xl:w-1/2 xl:h-full object-cover rounded-t-3xl xl:rounded-s-3xl xl:hidden block">
            <form method="post" action="{{ url('auth/register') }}"
                class="w-full xl:w-1/2 rounded-b-3xl xl:rounded-e-3xl flex flex-col items-center p-8 bg-black">
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
                <div class="xl:w-1/2 mb-4">
                    <input type="text" name="username" placeholder="username" autocomplete="off"
                        class="w-full h-14 rounded-3xl p-4">
                </div>
                <div class="xl:w-1/2 mb-4">
                    <input type="password" name="password" placeholder="password" class="w-full h-14 rounded-3xl p-4">
                </div>
                <div class="xl:w-1/2 mb-4">
                    <input type="email" name="email" placeholder="email" autocomplete="off"
                        class="w-full h-14 rounded-3xl p-4">
                </div>
                <div class="xl:w-1/2 mb-4">
                    <button type="submit"
                        class="px-16 xl:w-full h-12 bg-primary rounded-3xl font-semibold hover:bg-secondary text-white transition duration-300">Register</button>
                </div>
            </form>
            <img src="{{ asset('assets/image/katana-men.jpeg') }}"
                class="w-1/2 h-full object-cover rounded-e-3xl z-0 hidden xl:block">
            <a href="/auth/login"
                class="absolute top-4 left-4 bg-primary w-40 h-10 pt-2 text-center text-white rounded-3xl hover:cursor-pointer font-semibold hover:bg-secondary transition duration-300">
                <div class="">Login</div>
            </a>
        </div>
    </div>
@endsection
