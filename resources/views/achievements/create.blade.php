@extends('layouts.admin')

@section('title', 'Add Achievement')

@section('content')
    <div class="container">
        <h1>Add Achievement</h1>
        <form action="{{ route('achievements.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Achievement</button>
        </form>
    </div>
@endsection
