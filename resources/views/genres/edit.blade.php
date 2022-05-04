@extends('layouts.nav')

@section('content')
    <div class="container py-3">

        <h2>Genre ID: {{ $genre->id }}</h2>
        <form action="{{ route('genres.update',['genre'=>$genre]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">name</label>
                <input value="{{ old('name', $genre->name) }}"  type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="">
                    @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
            
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="style">style</label>
                <input value="{{ old('style', $genre->style) }}" type="text"
                    class="form-control @error('style') is-invalid @enderror " id="style" name="style" placeholder="">
                    @error('style')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>

        

            <div class="form-group">
                <button type="submit" class="btn btn-success">Update Genre</button>
            </div>

        </form>

    </div>
@endsection
