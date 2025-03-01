@extends('layouts.admin')

@section('title', 'Achievements')

@section('content')
    <div class="container">
        <h1>Achievements</h1>
        <a href="{{ route('achievements.create') }}" class="btn btn-primary mb-3">Add Achievement</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($achievements as $achievement)
                    <tr>
                        <td>{{ $achievement->name }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>
                            <a href="{{ route('achievements.edit', $achievement->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" style="display:inline;">
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
