@extends('layouts.admin')

@section('title', 'Edit Module')

@section('content')
    <div class="container">
        <h1>Edit Module</h1>
        <form action="{{ route('modules.update', $module->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select name="course_id" class="form-control" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ $module->course_id == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Module Name</label>
                <input type="text" name="name" class="form-control" value="{{ $module->name }}" required>
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Order</label>
                <input type="number" name="order" class="form-control" value="{{ $module->order }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Module</button>
        </form>
    </div>
@endsection
