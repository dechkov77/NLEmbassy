@extends('layouts.admin')

@section('title', 'Edit Lesson')

@section('content')
    <div class="container">
        <h1>Edit Lesson</h1>
        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="module_id" class="form-label">Module</label>
                <select name="module_id" class="form-control" required>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}" {{ $lesson->module_id == $module->id ? 'selected' : '' }}>{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $lesson->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" required>{{ $lesson->content }}</textarea>
            </div>
            <div class="mb-3">
                <label for="video_url" class="form-label">Video URL</label>
                <input type="url" name="video_url" class="form-control" value="{{ $lesson->video_url }}" required>
            </div>
            <div class="mb-3">
                <label for="order_number" class="form-label">Order</label>
                <input type="number" name="order_number" class="form-control" value="{{ $lesson->order_number }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Lesson</button>
        </form>
    </div>
@endsection
