@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-5">Buku-Buku Terpopuler</h1>
        <div class="grid grid-cols-4 gap-5">

            <div class="bg-gray-100 rounded-lg shadow-md overflow-hidden w-64">
                <div class="bg-gray-400 w-full bg-cover h-64">
                </div>
                <div class="p-5">
                    <p>Book title</p>
                    <p class="font-bold text-lg">Rp. 200.000</p>
                </div>
            </div>

        </div>
    </div>
@endsection
