@extends('layouts.nav')

@section('content')
    <div class="container py-3 ">
        <div class="list-group p-5">
            <a class="list-group-item list-group-item-action active text-center btn btn-light">
                Genere List
            </a>
            @foreach ($genres as $genre)
                <form action="{{ route('genres.show', ['genre' => $genre]) }}">
                    <button type="submit" class="list-group-item list-group-item-action">
                        <span>
                            {{ $genre->name }}
                        </span>
                        <span class="font-italic font-weight-bold">
                            {{ $genre->style }}
                        </span>
                    </button>
                </form>
            @endforeach
            <div class="d-inline pt-3">

                @if (auth()->user() and Auth::user()->is_librarian)
                    <form action="{{ route('genres.create') }}" method="POST" class="d-inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-success">Add Genre</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection
