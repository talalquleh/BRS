@extends('layouts.nav')

@section('content')
    <div class="container py-3">

        <h2>Borrow ID: {{ $borrow->id }}</h2>
        <form action="{{ route('borrows.update',['borrow'=>$borrow]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <input value="{{ old('status', $borrow->status) }}"  type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                    name="status" placeholder="">
                    @error('status')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="request_processed_at">request_processed_at</label>
                <input value="{{ old('request_processed_at', $borrow->request_processed_at) }}" type="text"
                    class="form-control @error('request_processed_at') is-invalid @enderror " id="request_processed_at" name="request_processed_at" placeholder="">
                    @error('request_processed_at')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>

            <div class="form-group">
                <label for="deadline">deadline</label>
                <input value="{{ old('deadline', $borrow->deadline) }}" type="text" class="form-control @error('deadline') is-invalid @enderror" id="deadline"
                    name="deadline" placeholder="">
                    @error('deadline')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="returned_at">returned_at</label>
                <input value="{{ old('returned_at', $borrow->returned_at) }}" type="text" class="form-control @error('returned_at') is-invalid @enderror"
                    id="returned_at" name="returned_at" placeholder="">
                    @error('returned_at')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update Rental</button>
            </div>

        </form>

    </div>
@endsection
