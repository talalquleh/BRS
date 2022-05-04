<?php

use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\GenreController;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use App\Models\User;
// use GuzzleHttp\Psr7\Request;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // home page for all (unknown/readers/librarians)
    $activeCount = count(array_filter(Borrow::all()->toArray(), function ($borrow) {
        return $borrow['status'] === 'ACCEPTED';
    }));
    return view('homePage', ['genres' => Genre::all(), 'countBooks' => Book::count(), 'countGenres' => Genre::count(), 'countActiveBooks' => $activeCount, 'countUsers' => User::count()]);
})->name('AllHomePage');


Route::get('search', function (Request $req) {
    // searches for all users in data base and return the data to view 

    $filteredBooks = Book::all()->filter(function ($book) use ($req) {
        return (strpos(strtolower($book->title), strtolower($req->filterInput)) !== false || strpos(strtolower($book->authors),strtolower($req->filterInput)) !== false);
    });
    return view('search', ['filteredBooks' => $filteredBooks]);
});


Route::get('genres/{genre}/books', function (Genre $genre) {
    //filtering all books with the given genre 
    $filteredBooks = $genre->books;
    return view('search', ['filteredBooks' => $filteredBooks]);
})->name('genres.books');


Route::post('borrows/{book}/borrow', function (Book $book) {
    //filtering all books with the given genre 
    $latest_rental = null;
    if (Auth::user()) {
        if (!Auth::user()->is_librarian) {
            Borrow::create(
                [
                    'user_id' => Auth::user()->id,
                    'book_id' => $book->id,
                    'status' => 'PENDING',
                    'request_processed_at' => date("Y-m-d"),
                    'request_managed_by' => 1,
                    // 'returned_at'=>null,
                    'return_managed_by' => 1,
                    'deadline' => date("Y-m-d", strtotime("+15 days")),
                ]
            );

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
    if ($latest_rental == null) return  redirect()->route('books.show', ['book' => $book, 'status' => $latest_rental]);

    return redirect()->route('books.show', ['book' => $book, 'status' => $latest_rental['status']]);
})->name('borrows.book');

//Resource Controllers for all
Route::resource('genres', GenreController::class);
Route::resource('books', BookController::class);
Route::resource('borrows', BorrowController::class);




// })->name('borrows.changeState');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
