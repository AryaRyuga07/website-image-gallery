@extends('pages.user.base')

@section('container')
    <div class="bg-gray-50 w-screen h-auto mt-20 flex justify-start">
        <div class="w-56 h-[87vh] pt-6 mr-12 pl-5">
            <button class="text-md font-semibold mb-5 button-page" data-url="/update-profile">Profile Management</button>
            <button class="text-md font-semibold mb-5 button-page" data-url="/update-account">Account Management</button>
            <button class="text-md font-semibold button-page" data-url="/delete-account">Delete Account</button>
        </div>

        <div>
            @yield('content')
        </div>
    </div>
@endsection
