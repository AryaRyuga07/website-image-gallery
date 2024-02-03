@extends('pages.user.base')

@php
    $name = strtr($user->full_name, ['-' => ' ']);
    $image = $user->file_location;
    if ($image == null) {
        $image = 'def.png';
    }
@endphp

@section('container')
    <div class="bg-white w-screen h-auto mt-20 pt-6 flex flex-col items-center">
        <div class="w-40 h-40 rounded-full bg-stone-300"><img src="{{ url('assets/image/' . $image) }}" alt="profile"
                class="w-40 h-40 rounded-full object-cover"></div>
        <p class="font-semibold text-4xl mt-3">{{ $name }}</p>
        <p class="text-sm font-semibold text-gray-600 mt-2"><label>@</label>{{ $user->username }}</p>
        <div class="flex justify-around w-64 mt-3 text-lg text-stone-400">
            <p>0 foto</p>
            <p>0 suka</p>
            <p>0 mengikuti</p>
        </div>
        <div class="flex justify-evenly w-64 mt-3">
            <form action="/auth/logout" method="get">
                <button type="submit" class="bg-stone-200 py-3 px-5 rounded-3xl hover:bg-stone-300">Logout</button>
            </form>
            <button data-url="/update-profile" class="button-page bg-stone-200 p-3 rounded-3xl hover:bg-stone-300">Update
                Profile</button>
        </div>
        <div class="flex justify-evenly w-64 mt-16 font-semibold">
            <a href="/profile/photos" class="button-profile">Photos</a>
            <a href="/profile/album" class="button-profile">Album</a>
            <a href="/profile/favorite" class="button-profile">Favorite</a>
        </div>
        <div class="mb-3">
            @yield('content')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // const anotherPages = (url) => {
        //     // Lakukan permintaan AJAX
        //     var xhr = new XMLHttpRequest();
        //     xhr.onreadystatechange = function () {
        //         if (xhr.readyState === 4 && xhr.status === 200) {
        //             // Ganti konten halaman
        //             document.body.innerHTML = xhr.responseText;
        //             // Perbarui URL
        //             history.pushState({}, '', url);
        //             setEventHandlers();
        //         }
        //     };
        //     xhr.open('GET', url, true);
        //     xhr.send();
        // }

        // const setEventHandlers = () => {
        //     let urlPages = document.querySelectorAll('.button-profile');
        //     urlPages.forEach((urlPage) => {
        //         urlPage.addEventListener('click', (event) => {
        //             let url = urlPage.getAttribute('data-url');
        //             window.location.assign(url);
        //         });
        //     });
        // }

        // let buttonProfile = document.querySelectorAll('.button-profile');
        // buttonProfile.forEach((button) => {
        //     button.addEventListener('click', () => {
        //         let url = button.getAttribute('data-url');
        //         window.location.assign(url);
        //     })
        // })
    </script>
@endsection
