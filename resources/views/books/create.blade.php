@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Add New Book</h1>
        <form class="row g-3" method="POST" action="{{ route("books.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" placeholder="Write book description" name="description"></textarea>
            </div>
            <div class="col-md-4 mb-3">
                <label for="author" class="form-label">Author</label>
                <select name="author" class="form-control">
                    <option value="">--- Select Author ---</option>
                    @foreach ($authors as $author => $value)
                        <option value="{{ $author }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" class="form-control">
                    <option value="">--- Select Genre ---</option>
                    @foreach ($genres as $genre => $value)
                        <option value="{{ $genre }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cover" class="form-label">Book Cover</label>
                <input type="file" id="cover" name="cover">
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary">Add Book</button>
            </div>
        </form>
    </div>
@endsection
