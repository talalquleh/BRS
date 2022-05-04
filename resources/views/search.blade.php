@extends('layouts.nav')


@section('content')


    <div class="container">
        <div class="row">
            @if (count($filteredBooks) == 0)
          
                <p class="lead p-5">
                    there are no books matching the search
                </p>
           
            @else
                @foreach ($filteredBooks as $book)
                    <div class="col-sm-3 my-3">
                        <div class="card h-100">
                            <img src="{{ $book->cover_image ? $book->cover_image : 'http://unblast.com/wp-content/uploads/2019/08/Book-Mockup-3.jpg' }}"
                                class="card-img-top">
                            <div class="card-body text-dark">
                                <h5 class="card-title">Title: {{ $book->title }}</h5>
                                <p class="card-text">Authors: {{ $book->authors }}</p>
                                <p class="card-text">Description: {{ $book->description }}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <form action="{{ route('books.show', ['book' => $book]) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type='submit' class="btn btn-success">Open</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach


                {{-- <div class="col-sm-3 my-3">
        <div class="card h-100">
          <a href="new-project.html" class="btn btn-secondary h-100 pt-5">Create a new book</a>
        </div>
      </div> --}}


        </div>
    </div>
    @endif

@endsection
