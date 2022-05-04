@extends('layouts.nav')

@section('content')
    <div class="container p-5">
        <h1 class="display-4">Book Rental System</h1>
        <p class="lead">
            A place where you can store, edit and view your your favourite books.
        </p>

        <p class="lead">Number of users in the system: {{ $countUsers }}</p>
        <p class="lead">Number of genres: {{ $countGenres }}</p>
        <p class="lead">Number of books: {{ $countBooks }}</p>
        <p class="lead"> Number of active book rentals (in accepted status): {{ $countActiveBooks }} </p>
        <!-- <hr class="my-4" /> -->
        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
    </div>

    <div class="container p-5 ">
        <form action="search" method="POST">
            <div class="input-group">
                <input type="search" class="form-control rounded" name="filterInput"
                    placeholder="type name of book or author" aria-label="Search" aria-describedby="search-addon" />
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-outline-primary">search</button>
            </div>
        </form>
    </div>

    <div class="container py-3 ">
        <div class="list-group p-5 ">
            <form action="{{ route('genres.index') }}" method="POST">
                @csrf
                @method('GET')
                <button class="list-group-item list-group-item-action active text-center btn btn-light">
                    Genres List
                    <br>
                    <span>

                        [click on genre to filter books]
                    </span>
                </button>
            </form>
            @foreach ($genres as $genre)
                <form action="{{ route('genres.books', ['genre' => $genre]) }}" method="POST">
                    @csrf
                    @method('GET')
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

        </div>
    </div>
@endsection
