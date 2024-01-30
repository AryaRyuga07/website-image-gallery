@extends('pages.user.base')

@section('container')
    <div class="bg-white w-screen h-screen mt-20 pt-6 flex flex-col items-center">
        <div class="w-40 h-40 rounded-full bg-stone-300"></div>
        <p class="font-semibold text-4xl mt-3">Identity V</p>
        <div class="flex justify-around w-64 mt-3 text-lg text-stone-400">
            <p>0 foto</p>
            <p>0 suka</p>
            <p>0 mengikuti</p>
        </div>
        <div class="flex justify-evenly w-64 mt-3">
            <div class="bg-stone-200 py-3 px-5 rounded-3xl">Share</div>
            <div class="bg-stone-200 p-3 rounded-3xl">Update Profile</div>
        </div>
        <div class="flex justify-evenly w-64 mt-16 font-semibold">
            <div>Photos</div>
            <div>Favorite</div>
        </div>
        <div class="w-screen h-40 bg-emerald-200 mt-10"></div>
    </div>
@endsection