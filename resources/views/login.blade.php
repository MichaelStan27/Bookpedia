@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="container mx-auto flex justify-center py-8">
        <div class="bg-white w-1/2 rounded-l-md shadow-lg py-2">
            <form action="" method="post">
                @csrf
                <div class="text-center mt-4">
                    <input type="text" name="email" id="email" placeholder="Email" autocomplete="off"
                        class="text-center w-1/2 mb-4 rounded-md border-2 outline-gray-400 py-1">
                    <input type="text" name="password" id="password" placeholder="Password" autocomplete="off"
                        class="text-center w-1/2 mb-4 rounded-md border-2 outline-gray-400 py-1">
                    <div class="mb-4">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="text-gray-400">Remember me</label>
                    </div>
                    <button type="submit"
                        class="text-white rounded-md border-2 w-1/2 py-1 bg-black hover:text-black hover:bg-gray-100 mb-4 shadow-md">Login</button>
                    <h1 class="text-gray-400 mb-4 rounded-full border-2 w-fit mx-auto p-2">OR</h1>
                    <a href="/register">
                        <div class="rounded-md text-white bg-gray-500 hover:bg-gray-600 w-1/2 py-1 shadow-md mb-7 mx-auto">
                            Register
                        </div>
                    </a>
                </div>
            </form>
        </div>
        <div
            class="bg-gradient-to-br from-gray-400 to-gray-100 w-1/4 rounded-r-md shadow-lg py-2 flex justify-center items-center border-l-2">
            <h1 class="text-center text-2xl font-bold py-2 my-4">Login</h1>
        </div>
    </div>
@endsection
