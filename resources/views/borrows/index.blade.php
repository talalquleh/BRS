@extends('layouts.nav')

@section('content')
<div class="container py-3 ">
    <div class="list-group p-5 ">
        <a class="list-group-item list-group-item-action active text-center">
            Rental List
        </a>
        @foreach ($filteredBorrows as $borrow)
            <form action="{{route('borrows.show',['borrow'=>$borrow])}}" method="POST">
                @csrf
                @method('GET')
                <button class="list-group-item list-group-item-action" type="submit">
                    <span>Book Name:
                        {{ $borrow->book->title }}
                    </span>
                    <span>-Book_ID:
                        {{ $borrow->book_id }}
                    </span>
                     
                    <span class="font-italic font-weight-bold">-Status:
                        {{ $borrow->status }}
                    </span>
                    <span class=" font-weight-bold ">-Deadline:
                        {{ $borrow->deadline }}
                    </span>
                </button>
            </form>
        @endforeach
    </div>
</div>
@endsection
