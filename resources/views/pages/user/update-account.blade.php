@extends('pages.user.setting')

@section('content')
    <div>
        <p class="font-bold text-3xl mb-8 pt-6">Account Management</p>
        <form action="/update-account" method="post" class="w-auto h-auto flex" enctype="multipart/form-data">
            @csrf
            <div class="w-[50vw]">
                <div class="flex flex-col mb-16">
                    @if (Session::has('update_error'))
                        <div class="mb-4">
                            <div class="rounded-lg bg-red-100 text-red-800 px-4 py-3">
                                {{ Session::get('update_error') }}
                            </div>
                        </div>
                    @endif
                    @if (Session::has('update_success'))
                        <div class="mb-4">
                            <div class="rounded-lg bg-green-100 text-green-800 px-4 py-3">
                                {{ Session::get('update_success') }}
                            </div>
                        </div>
                    @endif
                    <div class="w-1/2 h-14 mr-6 mb-12">
                        <label for="username" class="text-lg font-semibold ml-2">Username</label>
                        <input type="text" id="username" name="username" placeholder="username" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2" autocomplete="off"
                            value="{{ $user->username }}">
                    </div>
                    <div class="w-1/2 h-14">
                        <label for="password" class="text-lg font-semibold ml-2">Password (Optional)</label>
                        <input type="password" id="password" name="password" placeholder="password" autocomplete="off"
                            class="w-full h-full bg-none border-2 border-gray-300 rounded-3xl p-4 mt-2" autocomplete="off">
                    </div>
                </div>
                <div class="flex">
                    <div class="mb-4 flex flex-col mr-6">
                        <button
                            class="w-52 h-12 bg-gray-400 rounded-3xl font-semibold hover:bg-gray-300 transition duration-300">Cancel</button>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <button type="submit"
                            class="w-52 h-12 bg-red-600 rounded-3xl font-semibold text-white hover:bg-red-500 transition duration-300">Saved</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
