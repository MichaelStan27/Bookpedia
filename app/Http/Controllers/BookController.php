<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller {

    public function viewBookDetail(Book $book) {
        dd($book->title);
        return view('book-detail');
    }

    public function add_book_form() {
        $categories = Category::all();
        return view('add-book')->with('categories', $categories);
    }

    public function create(Request $request) {
        $request->validate([
            'title' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'author' => ['required'],
            'released_year' => ['required', 'integer', 'digits:4'],
            'publisher' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg, png, webp, jpeg, svg'],
            'summary' => ['required', 'min:10'],
            'description' => ['required', 'min:10'],
            'type' => ['required'],
        ], [
            'type.required' => 'Check at least one of above items.',
            'category.required' => 'Select one of the book categories above'
        ]);

        //Upload image
        $path = "public/book-image/";
        $file = $request->file('image');
        $randomString = Str::random(7);
        $filename = $request->title.$randomString.'.'. $file->extension();
        Storage::putFileAs(
            $path,
            $file,
            $filename
        );

        $types = $request->type;

        //var for transaction_type_id
        $type = NULL;
        //var for loan_price       
        $loan_price = NULL;
        //var for sale_price
        $sale_price = NULL;


        if (count($types) === 2) {
            $request->validate([
                'loan_price' => ['required', 'integer'],
                'sale_price' => ['required', 'integer'],
            ]);
            $loan_price = $request->loan_price;
            $sale_price = $request->sale_price;
            $type = 3;
        } elseif ($types[0] === "sale") {
            $request->validate([
                'sale_price' => ['required', 'integer'],
            ]);
            $sale_price = $request->sale_price;
            $type = 2;
        } else {
            $request->validate([
                'loan_price' => ['required', 'integer'],
            ]);
            $loan_price = $request->loan_price;
            $type = 1;
        }

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'released_year' => $request->released_year,
            'publisher' => $request->publisher,
            'image' => 'book-image/' . $filename,
            'summary' => $request->summary,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'loan_price' => $loan_price,
            'sale_price' => $sale_price,
            'status_id' => 1,
            'transaction_type_id' => $type,
            'category_id' => $request->category,
        ]);

        return redirect("/")->with('addBookMessage', 'Book added successfully');
    }

    public function update_book_form($id) {
        $book = Book::where('id', $id)->first();

        return view('update-book')->with('book', $book);
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg, png, webp, jpeg, svg'],
            'summary' => ['required', 'min:10'],
            'description' => ['required', 'min:10'],
            'type' => ['required'],
        ], [
            'type.required' => 'Check at least one of above items.'
        ]);

        // Storage::deleteDirectory($book->isbn."-img/");
        Storage::deleteDirectory('public/book-image/' . $book->image);

        //Upload image
        $path = "public/book-image/";
        $file = $request->file('image');
        $randomString = Str::random(7);
        $filename = $request->title.$randomString.'.'.$file->extension();
        Storage::putFileAs(
            $path,
            $file,
            $filename
        );

        $types = $request->type;

        //var for transaction_type_id
        $type = NULL;
        //var for loan_price       
        $loan_price = NULL;
        //var for sale_price
        $sale_price = NULL;


        if (count($types) === 2) {
            $request->validate([
                'loan_price' => ['required', 'integer'],
                'sale_price' => ['required', 'integer'],
            ]);
            $loan_price = $request->loan_price;
            $sale_price = $request->sale_price;
            $type = 3;
        } elseif ($types[0] === "sale") {
            $request->validate([
                'sale_price' => ['required', 'integer'],
            ]);
            $sale_price = $request->sale_price;
            $type = 2;
        } else {
            $request->validate([
                'loan_price' => ['required', 'integer'],
            ]);
            $loan_price = $request->loan_price;
            $type = 1;
        }

        $book->update([
            'image' => 'book-image/' . $filename,
            'summary' => $request->summary,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'loan_price' => $loan_price,
            'sale_price' => $sale_price,
            'status_id' => 1,
            'transaction_type_id' => $type,
        ]);

        return redirect("/profile")->with('updateBookMessage', 'Book added successfully');
    }
}
