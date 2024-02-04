@extends('layout.app')

@section('body')
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="hidden" id="cardDetail">
            <div class="bg-white w-[60vw] h-[62vh] rounded-3xl shadow-2xl flex">
                <div class="bg-white w-1/2 h-full rounded-s-3xl overflow-hidden">
                    <img src="{{ url('assets/image/profile.jpg') }}" alt="image"
                        class="w-auto h-auto rounded-s-3xl object-cover">
                </div>
                <div class="w-1/2 h-full rounded-e-3xl">
                    <div class="w-full h-1/3">
                        <div class="h-1/2 flex justify-between items-center">
                            <div class="m-7">ooo</div>
                            <button
                                class="w-32 h-14 p-3 bg-black text-white rounded-3xl px-7 text-lg font-semibold mr-7 hover:bg-gray-700">Save</button>
                        </div>
                        <div class="h-1/2 flex items-center">
                            <div class="w-20 h-20 rounded-full bg-black ml-7">
                                <img src="{{ url('assets/image/yopi2.jpg') }}" class="rounded-full">
                            </div>
                            <div class="ml-8">
                                <p class="text-2xl font-bold">Airani Iofifteen</p>
                                <p class="text-md">@airani_iofifteen</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-2/5 border-black mt-7 ml-7 pr-5">
                        <p class="font-semibold text-xl mb-5">Comment</p>
                        <div class="w-[95%] h-48 overflow-auto">
                            <div class="w-[94%] h-24 bg-gray-300 rounded-3xl mb-5 p-1">
                                <div class="w-full h-auto flex">
                                    <div class="w-14 h-14 bg-black rounded-full mx-3 mt-2">
                                        <img src="{{ url('assets/image/towa.jpg') }}"
                                            class="object-cover w-14 h-14 rounded-full">
                                    </div>
                                    <div class="w-3/4">
                                        <p class="text-md font-bold">Tokoyami Towa</p>
                                        <p class="text-sm">Itu Ayang Kamu ya pi? Kok keren banget sih...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-1/5 border-t border-gray-300">
                        <div class="flex justify-between p-3 items-center mb-3">
                            <p class="text-lg font-semibold">3 Comment</p>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold mr-3">100 Likes</p>
                                <div class="w-6 h-6 bg-red-500 rounded-full"></div>
                            </div>
                        </div>
                        <div class="flex justify-between p-3 items-center">
                            <div class="w-10 h-10 bg-black rounded-full mr-3">
                                <img src="{{ url('assets/image/yopi2.jpg') }}" class="w-10 h-10 object-cover rounded-full">
                            </div>
                            <input type="text" placeholder="Comment"
                                class="w-full border border-gray-300 rounded-3xl p-2 bg-gray-200">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
