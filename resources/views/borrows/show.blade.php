@extends('layouts.nav')


@section('content')
    <div class="container py-3">
      <h2>Rental ID: {{$borrow->id}}</h2>
      <div class="list-group">
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark"> Reader ID: {{$borrow->user_id }} </p>
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark"> Status: {{$borrow->status }} </p>
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">request_processed_at :  {{$borrow->request_processed_at}}</p>
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">request_managed_by : {{$borrow->request_managed_by }}</p>
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">deadline: {{$borrow->deadline }}</p>
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">Returned at : {{$borrow->returned_at }}</p>
          <p class="d-flex justify-content-between align-items-center list-group-item bg-dark">Return Managed by : {{$borrow->return_managed_by }}</p>
       
      </div>
    
      @if (Auth::user()->is_librarian )
        <form action="{{route('borrows.edit',['borrow'=>$borrow])}}" method="POST" class="d-inline">
          @csrf
          @method('GET')
          <button type="submit" class="btn btn-success">EDIT</button>
        </form>
        <form action="{{route('borrows.destroy',['borrow'=>$borrow])}}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
      @endif
    </div>
@endsection