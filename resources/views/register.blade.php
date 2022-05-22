@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container mx-auto flex justify-center py-8">
        <div class="bg-white w-1/2 rounded-l-md shadow-lg py-2">
            <h1 class="text-center text-2xl font-bold py-2 my-4">Register</h1>
            <form action="" method="post" class="">
                @csrf
                <div class="text-center mt-4">
                    <div class="mb-4">
                        <label for="first_name" class="block text-left mx-auto w-1/2 text-gray-500">First Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="first_name" id="first_name" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="block text-left mx-auto w-1/2 text-gray-500">Last Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="last_name" id="last_name" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-left mx-auto w-1/2 text-gray-500">Phone Number
                            <span class="text-sm text-gray-400">(numeric)</span>
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="phone" id="phone" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="city" class="block text-left mx-auto w-1/2 text-gray-500">City <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="city" id="city" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="postal_code" class="block text-left mx-auto w-1/2 text-gray-500">Postal Code
                            <span class="text-sm text-gray-400">(numeric, length: 5)</span>
                            <span class="text-red-500">*</span></label>
                        <input type="text" name="postal_code" id="postal_code" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="detail_address" class="block text-left mx-auto w-1/2 text-gray-500">Detail Address <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="detail_address" id="detail_address" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="balance" class="block text-left mx-auto w-1/2 text-gray-500">Balance</label>
                        <input type="text" name="balance" id="balance" placeholder="" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-left mx-auto w-1/2 text-gray-500">Email
                            <span class="text-sm text-gray-400">(must be a valid email)</span>
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="email" id="email" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-left mx-auto w-1/2 text-gray-500">Password
                            <span class="text-sm text-gray-400">(alphanumeric, minimal:
                                5)</span>
                            <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
                    <div class="mb-8">
                        <label for="confirm_password" class="block text-left mx-auto w-1/2 text-gray-500">Confirm Password
                            <span class="text-red-500">*</span></label>
                        <input type="password" name="confirm_password" id="confirm_password" autocomplete="off"
                            class="text-center w-1/2 rounded-md border-2 outline-gray-400 py-1">
                    </div>
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
    </div>
@endsection
