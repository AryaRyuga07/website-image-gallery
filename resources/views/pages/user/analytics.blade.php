@extends('pages.user.base')

@section('container')
    <div class="w-screen h-[90vh]">
        <div class="w-full h-full mt-20 pt-4 flex justify-around">
            <div class="w-96 flex flex-col items-center">
                <div class="ml-10 w-96 h-[30rem] bg-slate-200 rounded-3xl">
                    <img src="" alt="Image" class="w-full h-full rounded-3xl" id="imageAnalytics">
                </div>
                <div class="w-96 h-6 p-7 ml-8 bg-white pb-2 mb-5 rounded-2xl mt-3 flex justify-center text-gray-500">
                    <div class="flex items-center h-2 pb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 h-10 rounded-2xl">
                            <path
                                d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>
                        <p class="ml-2 text-xl" id="likes">0 likes</p>
                    </div>
                    <div class="flex items-center h-2 pb-4 ml-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 h-10 rounded-2xl">
                            <path fill-rule="evenodd"
                                d="M4.804 21.644A6.707 6.707 0 0 0 6 21.75a6.721 6.721 0 0 0 3.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 0 1-.814 1.686.75.75 0 0 0 .44 1.223ZM8.25 10.875a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25ZM10.875 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="ml-2 text-xl" id="comments">0 comments</p>
                    </div>
                </div>
            </div>
            <div class="w-2/4 h-96">
                <div class="flex">
                    <select name="mode" id="mode"
                        class="w-72 h-12 bg-slate-300 rounded-3xl p-3 mb-6 border-none mr-6">
                        <option value="photos">Photos</option>
                        <option value="album">Album</option>
                    </select>
                    <select name="mode" id="mode" class="w-72 h-12 bg-slate-300 rounded-3xl p-3 mb-6 border-none">
                        <option>--Urutkan menurut--</option>
                        <option value="like">Like</option>
                        <option value="comment">Comment</option>
                    </select>
                </div>
                <div class="w-full h-[40rem] rounded-3xl overflow-auto overflow-x-hidden" id="photos_section">
                    <div class="w-full h-20 mx-3 my-3 flex items-center">
                        <p class="w-20 ml-2 text-xl font-bold">Image</p>
                        <p class="w-52 ml-5 text-xl font-bold">Title</p>
                        <p class="w-96 ml-8 text-xl font-bold">Description</p>
                        <p class="w-20 text-xl font-bold">Album</p>
                    </div>
                    @foreach ($photos as $item)
                        <div class="w-auto h-24 mx-3 my-3 flex items-center hover:bg-slate-200 cursor-pointer rounded-3xl draft-image" data-like="{{ $item->likes_count }}" data-comment="{{ $item->comments_count }}">
                            <img src="{{ asset('storage/post/' . $item->file_location) }}" class="w-20 h-20 object-cover rounded-3xl">  
                            <p class="truncate w-52 text-xl ml-5">{{ $item->title }}</p>
                            <p class="truncate w-96 text-xl ml-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi itaque adipisci mollitia, sequi delectus porro nihil suscipit incidunt amet? Recusandae impedit in est ab dolorum non tempora provident harum, aperiam repellat eum natus earum cupiditate? Iure eum quaerat eveniet perferendis.</p>
                            <p class="truncate w-20 atext-xl ml-5">New</p>
                        </div>
                    @endforeach
                </div>
                <div class="w-full h-[40rem] rounded-3xl overflow-auto overflow-x-hidden hidden" id="albums_section">
                    <div class="w-full h-20 mx-3 my-3 flex items-center">
                        <p class="w-20 ml-2 text-xl font-bold">Image</p>
                        <p class="w-52 ml-5 text-xl font-bold">Title</p>
                        <p class="w-96 ml-8 text-xl font-bold">Description</p>
                    </div>
                    @foreach ($albums as $item)
                        <div class="w-auto h-24 mx-3 my-3 flex items-center hover:bg-slate-200 cursor-pointer rounded-3xl draft-image" data-like="{{ $item->likes_count }}" data-comment="{{ $item->comments_count }}">
                            <img src="{{ asset('storage/post/' . $item->last_uploaded_image) }}" class="w-20 h-20 object-cover rounded-3xl">  
                            <p class="truncate w-52 text-xl ml-5">{{ $item->album_name }}</p>
                            <p class="truncate w-96 text-xl ml-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi itaque adipisci mollitia, sequi delectus porro nihil suscipit incidunt amet? Recusandae impedit in est ab dolorum non tempora provident harum, aperiam repellat eum natus earum cupiditate? Iure eum quaerat eveniet perferendis.</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let listPhoto = document.querySelectorAll('.draft-image');
        let img = document.getElementById('imageAnalytics');
        let mode = document.getElementById('mode');
        let photosSection = document.getElementById('photos_section');
        let albumsSection = document.getElementById('albums_section');
        let likes = document.getElementById('likes');
        let comments = document.getElementById('comments');
        let photoLike = document.querySelectorAll('photo-like');
        let photoComment = document.querySelectorAll('photo-comment');
        listPhoto.forEach((list) => {
            const imgElement = list.querySelector('img');
            list.addEventListener('click', () => {
                let source = imgElement.src;
                let liked = list.getAttribute('data-like');
                let commented = list.getAttribute('data-comment');
                likes.innerText = liked + " Likes";
                comments.innerText = commented + " Comments";
                img.src = source;
                const imageName = source.split('/');
                // img.value = imageName[5];
            })
        });
        mode.addEventListener('change', () => {
            if(mode.value == "photos"){
                photosSection.classList.remove('hidden');
                albumsSection.classList.add('hidden');
            } else if(mode.value == "album"){
                photosSection.classList.add('hidden');
                albumsSection.classList.remove('hidden');
            }
        })
    </script>
@endsection
