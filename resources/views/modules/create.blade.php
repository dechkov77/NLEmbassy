@extends('layouts.admin')

@section('title', 'Add Module')

@section('content')
    <div class="container">
        <h1>Add Module</h1>
        <form action="{{ route('modules.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select name="course_id" class="form-control" required>
                    <option value="">Select Course</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Module Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Order</label>
                <input type="number" name="order" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Module</button>
        </form>
    </div>
@endsection
