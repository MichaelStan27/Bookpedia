@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="container mx-auto py-8">
        <div class="text-3xl font-bold">PROFILE</div>
        <div class="container px-2 py-6 h-full">
            <div class="bg-white flex rounded-md">
                <div class="p-2"> 
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-full w-1/4 mb-4" alt="">
                        <h5 class="text-xl font-medium leading-tight mb-2">John Mayer</h5>
                        <p class="text-gray-500">johnmayer@gmail.com</p>
                </div>
                <div class="text-center mt-4 px-[20%]">
                    <div class="mb-4">
                        <label for="password" class="block text-left text-gray-500">Password
                        <input type="password" name="password" id="password" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1"
                            value="1234567890">
                        @error('isbn')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="membersice" class="block text-left text-gray-500">Member since
                        <b>24 Mei 2022</b>
                    </div>
                </div>
            </div>
        </div>
        <hr class="p-4">
        <div class="text-3xl font-bold">MANAGE BOOK</div>
        <div class="container px-2 py-6 h-full">
            <div class="bg-white flex justify-center rounded-md">
                <div class="p-1"> 
                    <div class="text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="rounded-full w-1/4 mb-4 mx-auto" alt="">
                        <h5 class="text-xl font-medium leading-tight mb-2">John Mayer</h5>
                        <p class="text-gray-500">johnmayer@gmail.com</p>
                    </div>
                </div>
                <div class="text-center mt-4 px-[20%]">
                    <div class="mb-4">
                        <label for="password" class="block text-left text-gray-500">Password
                        <input type="password" name="password" id="password" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1"
                            value="1234567890">
                        @error('isbn')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="membersice" class="block text-left text-gray-500">Member since
                        <b>24 Mei 2022</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
