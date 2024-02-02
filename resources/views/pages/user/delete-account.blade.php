@extends('pages.user.setting')

@section('content')
    <div>
        <p class="font-bold text-3xl mb-8 pt-6">Delete Account</p>
            <div class="w-[50vw]">
                <div class="flex flex-col">
                    <div class="ml-1 mb-3">
                        <p>Delete data and Account</p>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <button data-url="/delete-acc" onclick="confirm('Are You Sure Want to Delete this account??')" type="submit"
                            class="w-52 h-12 bg-red-600 rounded-3xl font-semibold text-white hover:bg-red-500 transition duration-300 button-page">Delete</button>
                    </div>
                </div>
            </div>
    </div>
@endsection
