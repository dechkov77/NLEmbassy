@extends('layouts.admin')

@section('title', 'Add Lesson')

@section('content')
    <div class="container">
        <h1>Add Lesson</h1>
        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="module_id" class="form-label">Module</label>
                <select name="module_id" class="form-control" required>
                    <option value="">Select Module</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="video_url" class="form-label">Video URL</label>
                <input type="url" name="video_url" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="order_number" class="form-label">Order</label>
                <input type="number" name="order_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Lesson</button>
        </form>
    </div>
@endsection
