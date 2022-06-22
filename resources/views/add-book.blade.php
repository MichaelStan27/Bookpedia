@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container mx-auto flex justify-center py-8">
        <div class="bg-white w-1/2 rounded-lg shadow-xl py-2">
            <h1 class="text-center text-2xl font-bold py-2 my-14">Add New Book</h1>
            <form action="{{ route('add-book') }}" method="post" class="" enctype="multipart/form-data">
                @csrf
                <div class="text-center mt-4 px-[20%]">
                    <div class="mb-4">
                        <label for="title" class="block text-left text-gray-500">Title <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('title') border-red-500 @enderror"
                            value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-left text-gray-500">Category <span
                                class="text-red-500">*</span></label>
                        <select name="category" id="category" placeholder=""
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('category') border-red-500 @enderror">
                            <option class="bg-[#c7ccf7]" value="" @if (!old('category')) selected @endif
                                disabled>Select game category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category') === $category->category_name) selected @endif>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="author" class="block text-left text-gray-500">Author
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="author" id="author" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('author') border-red-500 @enderror"
                            value="{{ old('author') }}">
                        @error('author')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="released_year" class="block text-left text-gray-500">Released Year
                            <span class="text-sm text-gray-400">(numeric, length: 4)</span>
                            <span class="text-red-500">*</span></label>
                        <input type="number" name="released_year" id="released_year" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('released_year') border-red-500 @enderror"
                            value="{{ old('released_year') }}">
                        @error('released_year')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="publisher" class="block text-left text-gray-500">Publisher <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="publisher" id="publisher" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('publisher') border-red-500 @enderror"
                            value="{{ old('publisher') }}">
                        @error('publisher')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="my-2 hidden" id="preview-img">
                            <h1 class="text-lg font-semibold">Preview</h1>
                            <img class="w-[50%] m-auto p-2 rounded-lg border-2 border-gray-500">
                        </div>

                        <label for="image" class="block text-left text-gray-500">Photo
                            <span class="text-sm text-gray-400">(file extentions : jpg, png, webp, jpeg, svg)</span>
                            <span class="text-red-500">*</span></label>
                        <input type="file" name="image" id="image" placeholder=""
                            class="text-left w-full rounded-md border-2 outline-gray-400 @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="summary" class="block text-left text-gray-500">Summary
                            <span class="text-sm text-gray-400">(min: 10)</span>
                            <span class="text-red-500">*</span></label>
                        <textarea type="text" name="summary" id="summary" placeholder=""
                            class="p-5 w-full rounded-md border-2 outline-gray-400 @error('summary') border-red-500 @enderror" cols="30"
                            rows="10">{{ old('summary') }}</textarea>
                        @error('summary')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-left text-gray-500">Description
                            <span class="text-sm text-gray-400">(min: 10)</span>
                            <span class="text-red-500">*</span></label>
                        <textarea type="text" name="description" id="description" placeholder=""
                            class="w-full p-5 rounded-md border-2 outline-gray-400 @error('description') border-red-500 @enderror"
                            cols="30" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <div class="mb-4 flex justify-evenly">
                            <div><input type="checkbox" name="type[]" id="lend_type" value="loan"
                                    @error('loan_price') checked @enderror> Loan</div>
                            <div><input type="checkbox" name="type[]" id="sell_type" value="sale"
                                    @error('sale_price') checked @enderror> Sale</div>
                        </div>
                        @error('type')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 @error('loan_price') @else hidden @enderror" id="loan_price">
                        <label for="loan_price" class="block text-left text-gray-500">Loan Price
                            <span class="text-red-500">*</span></label>
                        <input type="number" name="loan_price" id="loan_price" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('loan_price') border-red-500 @enderror"
                            value="{{ old('loan_price') }}">
                        @error('loan_price')
                            <p class="text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 @error('sale_price') @else hidden @enderror" id="sale_price">
                        <label for="sale_price" class="block text-left text-gray-500">Sale Price
                            <span class="text-red-500">*</span></label>
                        <input type="number" name="sale_price" id="sale_price" placeholder="" autocomplete="off"
                            class="text-left px-3 w-full rounded-md border-2 outline-gray-400 py-1 @error('sale_price') border-red-500 @enderror"
                            value="{{ old('sale_price') }}">
                        @error('sale_price')
                            <p class="   text-red-500 text-sm text-left">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white rounded-md border-2 w-1/2 py-1 mt-8 bg-black hover:text-black hover:bg-gray-100 mb-8 shadow-md">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
