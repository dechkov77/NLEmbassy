@extends('layouts.admin')

@section('title', 'Edit Interest')

@section('content')
    <div class="container">
        <h1>Edit Interest</h1>
        <form action="{{ route('interests.update', $interest->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $interest->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required>{{ $interest->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Interest</button>
        </form>
    </div>
@endsection
