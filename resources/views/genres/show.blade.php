@extends('layouts.nav')

@section('content')
    <div class="container py-3 ">
        <div class="list-group p-5">
            <a class="list-group-item list-group-item-action active text-center btn btn-light">
                Genere ID: {{ $genre->id }}
            </a>
            <button class="btn btn-dark text-left ">
               Name: 
                {{ $genre->name }}
            </button>
            <button class="btn btn-dark text-left">
             Style: 
                {{ $genre->style }}
            </button>
            <div class="d-inline pt-3">
                @if (auth()->user() and Auth::user()->is_librarian)
                    <form action="{{route('genres.edit',['genre'=>$genre])}}" method="POST" class="d-inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-success">EDIT</button>
                    </form>
                    <form action="{{route('genres.destroy',['genre'=>$genre])}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success">DELETE</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection
