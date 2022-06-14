<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function add_book_form(){
        return view('add-book');
    }

    public function create(Request $request){
        $validation = $request->validate([
            'isbn' => ['required', 'numeric', 'digits:13'],
            'title' => ['required'],
            'author' => ['required'],
            'released_year' => ['required', 'integer', 'digits:4'],
            'publisher' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg, png, webp, jpeg, svg'],
            'summary' => ['required'],
            'description' => ['required'],
            'type' => ['required', 'min:1'],
            'loan_price' => ['required', 'integer'],
            'sale_price' => ['required', 'integer'],
        ],[
            'type.required' => 'Check at least one of above items.'
        ]);

        $path = "public/book-image/";
        $file = $request->file('image');
        $filename = $request->isbn.'.'.$file->extension();
        
        Storage::putFileAs(
            $path, $file, $filename
        );

        $types = $request->type;
        $type = 1; //default loan
        if($types[1] == 'on' && $types[2] == 'on') $type = 3;
        elseif( $types[2] == 'on') $type = 2;

        Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->Author,
            'released_year' => $request->released_year,
            'publisher' => $request->publisher,
            'image' => $request->image,
            'summary' => $request->summary,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'loan_price' => $request->loan_price,
            'sale_price' => $request->sale_price,
            'status_id' => 1,
            'transaction_type_id' => $type,
        ]);

        return dd("success");
    }
}
