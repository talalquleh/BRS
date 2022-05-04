@extends('layouts.nav')

@section('content')
    <div class="container py-3">

        <h2>New Book </h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">title </label>
                <input value="{{ old('title', '') }}"  type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" placeholder="">
                    @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="authors">authors </label>
                <input value="{{ old('authors', '') }}" type="text"
                    class="form-control @error('authors') is-invalid @enderror " id="authors " name="authors" placeholder="">
                    @error('authors')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>

            <div class="form-group">
                <label for="description">description</label>
                <input value="{{ old('description', '') }}" type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" placeholder="">
                    @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="released_at">released_at</label>
                <input value="{{ old('released_at', '') }}" type="text" class="form-control @error('released_at') is-invalid @enderror"
                    id="released_at" name="released_at" placeholder="">
                    @error('released_at')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="cover_image">cover_image</label>
                <input value="{{ old('cover_image', '') }}" type="text" class="form-control @error('cover_image') is-invalid @enderror"
                    id="cover_image" name="cover_image" placeholder="">
                    @error('cover_image')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>
            <div class="form-group">
                <label for="pages">pages</label>
                <input value="{{ old('pages', '') }}" type="text" class="form-control @error('pages') is-invalid @enderror"
                    id="pages" name="pages" placeholder="">
                    @error('pages')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div> <div class="form-group">
                <label for="language_code">language_code</label>
                <input value="{{ old('language_code', '') }}" type="text" class="form-control @error('language_code') is-invalid @enderror"
                    id="language_code" name="language_code" placeholder="">
                    @error('language_code')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div> <div class="form-group">
                <label for="isbn">isbn</label>
                <input value="{{ old('isbn', '') }}" type="text" class="form-control @error('isbn') is-invalid @enderror"
                    id="isbn" name="isbn" placeholder="">
                    @error('isbn')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div> <div class="form-group">
                <label for="in_stock">in_stock</label>
                <input value="{{ old('in_stock', '') }}" type="text" class="form-control @error('in_stock') is-invalid @enderror"
                    id="in_stock" name="in_stock" placeholder="">
                    @error('in_stock')
                    <div class="invalid-feedback">
                      {{ $message }}
                   
                    </div>
                  @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Create Book</button>
            </div>

        </form>

    </div>
@endsection
