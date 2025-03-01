@extends('layouts.admin')

@section('title', 'Modules')

@section('content')
    <div class="container">
        <h1>Modules</h1>
        <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Add Module</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $module)
                    <tr>
                        <td>{{ $module->course->title }}</td>
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->order }}</td>
                        <td>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
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
