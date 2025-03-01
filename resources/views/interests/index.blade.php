@extends('layouts.admin')

@section('title', 'Interests')

@section('content')
    <div class="container">
        <h1>Interests</h1>
        <a href="{{ route('interests.create') }}" class="btn btn-primary mb-3">Add Interest</a>

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
                @foreach($interests as $interest)
                    <tr>
                        <td>{{ $interest->name }}</td>
                        <td>{{ $interest->description }}</td>
                        <td>
                            <a href="{{ route('interests.edit', $interest->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('interests.destroy', $interest->id) }}" method="POST" style="display:inline;">
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
