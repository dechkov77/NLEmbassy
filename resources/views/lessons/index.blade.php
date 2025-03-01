@extends('layouts.admin')

@section('title', 'Lessons')

@section('content')
    <div class="container">
        <h1>Lessons</h1>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary mb-3">Add Lesson</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Module</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Video</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->module->name }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->order_number }}</td>
                        <td><a href="{{ $lesson->video_url }}" target="_blank">Watch</a></td>
                        <td>
                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
