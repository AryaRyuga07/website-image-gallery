@extends('pages.user.base')

@php
    $fill = 'hidden';
    $first = 'block';
    if ($likedUser->count() !== 0) {
        $fill = 'block';
        $first = 'hidden';
    }
@endphp

@section('container')
    <div class="w-screen h-auto flex flex-col items-center p-28">
        <div class="bg-white w-[60vw] h-auto pb-3 rounded-3xl shadow-2xl flex">
            <div class="bg-white w-1/2 h-full rounded-s-3xl overflow-hidden">
                <img src="{{ url('assets/image/draft/' . $photoDetail->file_location) }}" alt="image"
                    class="w-auto h-auto rounded-s-3xl object-cover">
            </div>
            <div class="w-1/2 h-full rounded-e-3xl">
                <div class="w-full h-1/3">
                    <div class="h-1/3 flex justify-between items-center">
                        <div class="m-7">ooo</div>
                        <button
                            class="w-32 h-14 p-3 bg-black text-white rounded-3xl px-7 text-lg font-semibold mr-7 hover:bg-gray-700">Save</button>
                    </div>
                    <div class="h-1/3 flex items-center">
                        <div class="w-14 h-14 rounded-full bg-black ml-7">
                            <img src="{{ url('assets/image/' . $photoDetail->user_photo) }}" class="rounded-full">
                        </div>
                        <div class="ml-4">
                            <p class="text-xl font-bold flex items-center">{{ strtr($photoDetail->full_name, ['-' => ' ']) }}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5 text-blue-500 ml-2 mt-1">
                                    <path fill-rule="evenodd"
                                        d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </p>
                            <p class="text-sm">{{ '@' . $photoDetail->username }}</p>
                        </div>
                    </div>
                    <div class="h-1/3 flex items-center mt-4">
                        <div class="ml-8">
                            <p class="text-2xl font-bold mb-2 mt-4">{{ $photoDetail->title }}</p>
                            <p class="text-md h-20 overflow-auto">{{ $photoDetail->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full h-2/5 border-black mt-14 ml-7 pr-5">
                    <p class="font-semibold text-xl mb-5">Comment</p>
                    <div class="w-[95%] h-48 overflow-auto">
                        @foreach ($comment as $item)
                            <div class="w-[94%] h-auto bg-gray-300 rounded-3xl mb-5 p-3">
                                <div class="w-full h-auto flex">
                                    <div class="w-14 h-14 bg-black rounded-full mx-3">
                                        <img src="{{ url('assets/image/' . $item->user_photo) }}"
                                            class="object-cover w-14 h-14 rounded-full">
                                    </div>
                                    <div class="w-3/4">
                                        <p class="text-md font-bold">{{ strtr($item->full_name, ['-' => ' ']) }}</p>
                                        <p class="text-sm">{{ $item->comment }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="h-1/5 border-t border-gray-300">
                    <div class="flex justify-between p-3 items-center mb-3">
                        <p class="text-lg font-semibold">{{ $comment->count() }} Comment</p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold mr-3">{{ $like->count() }} Likes</p>
                            <div class="w-6 h-6 rounded-full" id="like">
                                <p class="hidden">{{ $photoDetail->id }}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 cursor-pointer {{ $first }}" id="likeFirst">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6 cursor-pointer {{ $fill }}" id="likeFill">
                                    <path
                                        d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between p-3 items-center">
                        <div class="w-10 h-10 bg-black rounded-full mr-3">
                            <img src="{{ url('assets/image/' . $user->file_location) }}"
                                class="w-10 h-10 object-cover rounded-full">
                        </div>
                        <form action="/comment" method="post" class="flex w-full relative">
                            @csrf
                            <div class="w-full bg-gray-200 rounded-3xl border border-gray-300">
                                <input type="text" placeholder="Comment" name="comment" autocomplete="off"
                                    class="w-11/12 bg-gray-200 rounded-3xl p-2 border border-transparent focus:border-transparent">
                                <input type="hidden" name="photoId" value="{{ $photoDetail->id }}">
                            </div>
                            <button type="submit" class="w-10 h-10 absolute -right-1 mt-[0.15rem]" id="sendComment">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6" id="sendCommentFirst">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6 hidden" id="sendCommentFill">
                                    <path
                                        d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- Another Images --}}
        <div class="mt-28 flex flex-col items-center">
            <p class="text-2xl font-bold">Another Images</p>
            <div>
                <div class="mt-10 pt-4 columns-4 2xl:columns-7 gap-3 w-[94vw] mx-auto space-y-3 pb-28">
                    @foreach ($photos as $item)
                        <div class="darken-brightness break-inside-avoid" id="gambar1">
                            <img class="rounded-3xl" src="{{ url('assets/image/draft/' . $item->file_location) }}"
                                alt="Programming">
                        </div>
                    @endforeach
                </div>

                <div id="darken" class="hidden absolute top-0 rounded-3xl w-full h-full bg-black opacity-60"></div>

                <div class="hidden absolute w-7 h-7 top-4 right-6  rounded-full z-40 hover:cursor-pointer no-darken"
                    id="bookmark">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10 p-2 bg-white rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                </div>
                <div class="hidden absolute w-5 h-5 bottom-6 right-7  rounded-full z-40 hover:cursor-pointer no-darken"
                    id="dot">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 p-2 bg-white rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </div>
                <div class="hidden absolute w-7 h-7 top-4 right-6  rounded-full z-50 hover:cursor-pointer no-darken"
                    id="bookmark-slash">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 h-10 p-2 bg-white rounded-full">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m3 3 1.664 1.664M21 21l-1.5-1.5m-5.485-1.242L12 17.25 4.5 21V8.742m.164-4.078a2.15 2.15 0 0 1 1.743-1.342 48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185V19.5M4.664 4.664 19.5 19.5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let images = document.querySelectorAll('.darken-brightness');
        const bookmarking = document.getElementById('bookmark');
        const bookmarkSlash = document.getElementById('bookmark-slash');
        const darken = document.getElementById('darken');
        const dot = document.getElementById('dot');
        const sendComment = document.getElementById('sendComment');
        const sendCommentFirst = document.getElementById('sendCommentFirst');
        const sendCommentFill = document.getElementById('sendCommentFill');
        const like = document.getElementById('like');
        const likeFirst = document.getElementById('likeFirst');
        const likeFill = document.getElementById('likeFill');

        images.forEach((img) => {
            img.addEventListener('mouseenter', (event) => {
                bookmark.classList.remove('hidden');
                darken.classList.remove('hidden');
                dot.classList.remove('hidden');
                img.appendChild(darken);
                img.appendChild(bookmark);
                img.appendChild(dot);
            });
            img.addEventListener('mouseleave', (event) => {
                bookmark.classList.add('hidden');
                darken.classList.add('hidden');
                dot.classList.add('hidden');
                // img.removeChild(darken);
                // img.removeChild(bookmark);
            });
            darken.addEventListener('click', (event) => {
                window.location.href = '/explore-image';
            });
        });


        sendComment.addEventListener('mouseenter', () => {
            sendCommentFirst.classList.add('hidden')
            sendCommentFill.classList.remove('hidden')
        });

        sendComment.addEventListener('mouseleave', () => {
            sendCommentFirst.classList.remove('hidden')
            sendCommentFill.classList.add('hidden')
        });

        like.addEventListener('click', function() {
            let id = this.querySelector('p').innerHTML
            urlLike(id);
            // likeFirst.classList.toggle('hidden');
            // likeFill.classList.toggle('hidden');
        });

        const urlLike = (data) => {
            const requestOptions = {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            };

            // URL endpoint untuk POST request
            const postEndpoint = '/like';

            // Lakukan request POST
            fetch(postEndpoint, requestOptions)
                .then(response => response.json())
                .then(data => {
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
@endsection
