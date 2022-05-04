@extends('layouts.nav')


@section('content')
    <div class="container py-3">
        <h2>Title: {{ $book->title }}</h2>
        <div class="list-group">
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark"> Authors:
                {{ $book->authors }} </p>
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">Description:
                {{ $book->description }}</p>
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">released_at:
                {{ $book->released_at }}</p>
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">pages: {{ $book->pages }}
            </p>
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">language code:
                {{ $book->language_code }}</p>
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">ISBAN: {{ $book->isbn }}
            </p>
            <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">Number in stock:
                {{ $book->in_stock }}</p>
        </div>
        @if (auth()->user() and !Auth::user()->is_librarian)
            @if ($status !== null)
                <button type="submit" class="btn btn-info">{{ $status }}</button>
            @else
                <form action="{{ route('borrows.book', ['book' => $book]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Borrow</button>
                </form>
            @endif
        @endif
        @if (auth()->user() and Auth::user()->is_librarian)
            <form action="{{ route('books.edit', ['book' => $book]) }}" method="POST" class="d-inline">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-success">EDIT</button>
            </form>
            <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-success">DELETE</button>
            </form>
        @endif
    </div>
@endsection
