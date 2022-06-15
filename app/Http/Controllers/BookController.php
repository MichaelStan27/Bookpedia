<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function add_book_form(){
        return view('add-book');
    }

    public function create(Request $request){
        $request->validate([
            'isbn' => ['required', 'numeric', 'digits:13'],
            'title' => ['required'],
            'author' => ['required'],
            'released_year' => ['required', 'integer', 'digits:4'],
            'publisher' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg, png, webp, jpeg, svg'],
            'summary' => ['required', 'min:10'],
            'description' => ['required', 'min:10'],
            'type' => ['required'],
        ],[
            'type.required' => 'Check at least one of above items.'
        ]);

        //Upload image
        $path = "public/book-image/";
        $file = $request->file('image');
        $filename = $request->isbn.'.'.$file->extension();
        Storage::putFileAs(
            $path, $file, $filename
        );

        $types = $request->type;

        //var for transaction_type_id
        $type = NULL;
        //var for loan_price       
        $loan_price = NULL;    
        //var for sale_price
        $sale_price = NULL;
        
        
        if(count($types) === 2 ){
            $request->validate([
                'loan_price' => ['required','integer'],
                'sale_price' => ['required','integer'],
            ]);
            $loan_price = $request->loan_price;
            $sale_price = $request->sale_price;
            $type = 3;
            
        }elseif($types[0] === "sale"){
            $request->validate([
                'sale_price' => ['required','integer'],
            ]);
            $sale_price = $request->sale_price;
            $type = 2;
        }else{
            $request->validate([
                'loan_price' => ['required','integer'],
            ]);
            $loan_price = $request->loan_price;
            $type = 1;
        }

        Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'released_year' => $request->released_year,
            'publisher' => $request->publisher,
            'image' => $filename,
            'extension' => $file->extension(),
            'summary' => $request->summary,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'loan_price' => $loan_price,
            'sale_price' => $sale_price,
            'status_id' => 1,
            'transaction_type_id' => $type,
        ]);

        return redirect("/")->with('addBookMessage', 'Book added successfully');
    }
}
