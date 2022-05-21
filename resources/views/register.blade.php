@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container mx-auto flex justify-center py-8">
        <div class="bg-white w-1/2 rounded-l-md shadow-lg py-2">
            <form action="" method="post">
                @csrf
                <div class="text-center mt-4">
                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off"
                        class="text-center w-1/2 mb-4 rounded-md border-2 outline-gray-400 py-1">
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off"
                        class="text-center w-1/2 mb-4 rounded-md border-2 outline-gray-400 py-1">
                    <input type="text" name="password" id="password" placeholder="Password" autocomplete="off"
                        class="text-center w-1/2 mb-8 rounded-md border-2 outline-gray-400 py-1">
                    <button type="submit"
                        class="text-white rounded-md border-2 w-1/2 py-1 bg-black hover:text-black hover:bg-gray-100 mb-8 shadow-md">Create
                        Account</button>
                    <h1 class="text-gray-400 mb-4 border-y-2 w-1/2 text-center mx-auto">If you already have an account </h1>
                    <a href="/login">
                        <div class="rounded-md text-white bg-gray-500 hover:bg-gray-600 w-1/2 py-1 shadow-md mb-7 mx-auto">
                            Login
                        </div>
                    </a>
                </div>
            </form>
        </div>
        <div class="bg-gray-100 w-1/4 rounded-r-md shadow-lg py-2 flex justify-center items-center border-l-2">
            <h1 class="text-center text-2xl font-bold py-2 my-4">Register</h1>
        </div>
    </div>
@endsection
