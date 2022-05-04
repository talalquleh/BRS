<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Http\Requests\StoreBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Filter borrows 
        if (!Auth::user()->is_librarian) {

            $filteredBorrows = Borrow::all()->filter(function ($borrow) {
                return $borrow->user_id == Auth::user()->id;
            });
            // dd($filted_borrows);
            return view('borrows.index', ['filteredBorrows' => $filteredBorrows]);
        }

            $filteredBorrows = Borrow::all()->filter(function ($borrow) {
                return $borrow->request_managed_by == Auth::user()->id||$borrow->return_managed_by == Auth::user()->id;
            });
            return view('borrows.index', ['filteredBorrows' => $filteredBorrows]);

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowRequest $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //if reader or librarian
        return view('borrows.show', ['borrow' => $borrow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
        $this->authorize('access', $borrow);
        return view('borrows.edit',['borrow'=>$borrow]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowRequest  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowRequest $request, Borrow $borrow)
    {
        //
        $this->authorize('access', $borrow);
        $borrow->update($request->validated());
     
        return redirect()->route('borrows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
        $this->authorize('access',$borrow);
        $borrow->delete();
        return redirect()->route('borrows.index');
    }
}
