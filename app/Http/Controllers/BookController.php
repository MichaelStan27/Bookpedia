<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller {

    public function viewBookDetail(Book $book) {
        return view('book-detail', [
            'book' => $book,
            'books_from_user' => Book::limit(4)->where('user_id', $book->user_id)->get(),
            'related_books' => Book::limit(4)->where('category_id', $book->category_id)->get()
        ]);
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
        $filename = $request->title . $randomString . '.' . $file->extension();
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
                'loan_price' => ['required', 'numeric'],
                'sale_price' => ['required', 'numeric'],
            ]);
            $loan_price = $request->loan_price;
            $sale_price = $request->sale_price;
            $type = 3;
        } elseif ($types[0] === "sale") {
            $request->validate([
                'sale_price' => ['required', 'numeric'],
            ]);
            $sale_price = $request->sale_price;
            $type = 2;
        } else {
            $request->validate([
                'loan_price' => ['required', 'numeric'],
            ]);
            $loan_price = $request->loan_price;
            $type = 1;
        }

        $user = auth()->user();

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'released_year' => $request->released_year,
            'publisher' => $request->publisher,
            'image' => 'book-image/' . $filename,
            'summary' => $request->summary,
            'description' => $request->description,
            'user_id' => $user->id,
            'loan_price' => $loan_price,
            'sale_price' => $sale_price,
            'status_id' => 1,
            'transaction_type_id' => $type,
            'category_id' => $request->category,
        ]);

        return redirect()->route('profile', $user)->with('message', 'Book added successfully!');
    }

    public function update_book_form($id) {
        $categories = Category::all();
        $book = Book::with('category')
            ->where('id', $id)->first();

        return view('update-book')->with(['book' => $book, 'categories' => $categories]);
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => ['required'],
            'category' => ['required', 'exists:categories,id'],
            'author' => ['required'],
            'released_year' => ['required', 'integer', 'digits:4'],
            'publisher' => ['required'],
            'image' => ['image', 'mimes:jpg, png, webp, jpeg, svg'],
            'summary' => ['required', 'min:10'],
            'description' => ['required', 'min:10'],
            'type' => ['required'],
        ], [
            'type.required' => 'Check at least one of above items.'
        ]);

        $types = $request->type;

        //var for transaction_type_id
        $type = NULL;
        //var for loan_price       
        $loan_price = NULL;
        //var for sale_price
        $sale_price = NULL;


        if (count($types) === 2) {
            $request->validate([
                'loan_price' => ['required', 'numeric'],
                'sale_price' => ['required', 'numeric'],
            ]);
            $loan_price = $request->loan_price;
            $sale_price = $request->sale_price;
            $type = 3;
        } elseif ($types[0] === "sale") {
            $request->validate([
                'sale_price' => ['required', 'numeric'],
            ]);
            $sale_price = $request->sale_price;
            $type = 2;
        } else {
            $request->validate([
                'loan_price' => ['required', 'numeric'],
            ]);
            $loan_price = $request->loan_price;
            $type = 1;
        }

        if ($request->file('image')) {
            // Storage::deleteDirectory($book->isbn."-img/");
            Storage::deleteDirectory("public/$book->image");

            //Upload image
            $path = "public/book-image/";
            $file = $request->file('image');
            $randomString = Str::random(7);
            $filename = $request->title . $randomString . '.' . $file->extension();
            Storage::putFileAs(
                $path,
                $file,
                $filename
            );
            $filename = 'book-image/' . $filename;
        } else {
            $filename = $book->image;
        }

        $user = auth()->user();

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'released_year' => $request->released_year,
            'publisher' => $request->publisher,
            'image' => $filename,
            'summary' => $request->summary,
            'description' => $request->description,
            'user_id' => $user->id,
            'loan_price' => $loan_price,
            'sale_price' => $sale_price,
            'status_id' => 1,
            'transaction_type_id' => $type,
            'category_id' => $request->category,
        ]);

        return redirect()->route('profile', $user)->with('message', 'Book updated successfully!');
    }

    public function destroy(Book $book) {
        $book->delete();

        return redirect()->route('profile', auth()->user())->with("message", "Book deleted successfully!");
    }
}
