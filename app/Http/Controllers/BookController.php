<?php

namespace Database\Factories;
namespace App\Http\Controllers;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('access', Book::class);

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $this->authorize('access', Book::class);
        Book::create($request->validated());
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //check wither the user already requested borrowing the book or not
        $latest_rental = null;
        if (Auth::user()) {
            if (!Auth::user()->is_librarian) {
                //filter borrows for a user
                $filteredBorrows = array_filter($book->borrows->toArray(), function ($borrow) {
                    return $borrow['user_id'] == Auth::user()->id;
                });
                if (count($filteredBorrows) !== 0) {
                    $max_rental_time = strtotime("");
                    foreach ($filteredBorrows as $borrow) {
                        if (strtotime($borrow['request_processed_at']) >= $max_rental_time) {
                            $max_rental_time = strtotime($borrow['request_processed_at']);
                            $latest_rental = $borrow;
                        }
                    }
                }
            }
        }
        if ($latest_rental == null) return  view('books.show', ['book' => $book, 'status' => $latest_rental]);

        return view('books.show', ['book' => $book, 'status' => $latest_rental['status']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $this->authorize('access', $book);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->authorize('access', $book);
        $book->update($request->validated());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $this->authorize('access', $book);
        $book->delete();
        return redirect('/');
    }
}
