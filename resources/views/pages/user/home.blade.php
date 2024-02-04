@extends('pages.user.base')

@section('container')
    <div class="w-screen h-auto flex flex-col items-center pt-20 pb-8 mt-10">
        @for ($i = 0; $i < 10; $i++)
            <div class="bg-slate-200 h-auto w-[50vw] rounded-3xl mb-10">
                <div class="w-full h-24 flex justify-between items-center">
                    <div class="w-72 h-full flex items-center">
                        <div class="w-20 h-20 rounded-full mx-5"><img src="{{ asset('assets/image/yopi2.jpg') }}"
                                alt="yopi" class="rounded-full"></div>
                        <div class="flex flex-col">
                            <p class="text-xl font-semibold">Airani Iofifteen</p>
                            <p class="text-sm">20 Januari 2024</p>
                        </div>
                    </div>
                    <div class="w-72 h-full flex justify-end items-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8 mx-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-11/12 mx-auto mt-2">
                    <p class="text-md font-serif text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                        cumque officia sunt odio exercitationem ipsum harum repudiandae deleniti velit doloremque quas
                        reprehenderit est voluptatibus, consectetur ipsa, consequuntur molestias dolorem temporibus.</p>
                </div>
                <div class="w-11/12 mx-auto h-[60%] bg-blue-200 flex border-y border-gray-400">
                    <img src="{{ asset('assets/image/rushia.jpg') }}" alt="post" class="w-1/2 h-full">
                    <img src="{{ asset('assets/image/ayame.jpg') }}" alt="post" class="w-1/2 h-full">
                </div>
                <div class="w-11/12 mx-auto h-32">
                    <div class="w-full h-8 flex flex-col justify-center">
                        <div class="flex items-center justify-between pt-5">
                            <div class="flex items-center mt-16">
                                <div class="flex mr-12 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-14 h-14 mr-2 cursor-pointer likedButton">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-14 h-14 mr-2 cursor-pointer hidden liked">
                                        <path
                                            d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                    </svg>
                                    <p class="text-3xl font-bold likeTotal">32</p>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-14 h-14 mr-2 cursor-pointer"
                                        id="commentButton">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                    <p class="text-3xl font-bold">100</p>
                                </div>
                            </div>
                            <div class="mb-3 mt-16">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-14 h-14">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection

@section('scripts')
    <script>
        const likeButtons = document.querySelectorAll('.likedButton');
        const likedElements = document.querySelectorAll('.liked');
        const totalLikedElements = document.querySelectorAll('.likeTotal');
        const comment = document.querySelectorAll('commentButton');

        likeButtons.forEach((like, index) => {
        let intTotalLiked = parseInt(totalLikedElements[index].textContent);

        like.addEventListener('click', () => {
            like.classList.add('hidden');
            likedElements[index].classList.remove('hidden');
            intTotalLiked += 1;
            totalLikedElements[index].textContent = intTotalLiked + '';
        });

        likedElements[index].addEventListener('click', () => {
            likedElements[index].classList.add('hidden');
            like.classList.remove('hidden');
            intTotalLiked -= 1;
            totalLikedElements[index].textContent = intTotalLiked + '';
        });
    });
    </script>
@endsection
