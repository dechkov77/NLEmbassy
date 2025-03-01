@extends('layouts.admin')

@section('title', 'Add Interest')

@section('content')
    <div class="container">
        <h1>Add Interest</h1>
        <form action="{{ route('interests.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Interest</button>
        </form>
    </div>
@endsection
