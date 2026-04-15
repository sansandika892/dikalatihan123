@extends('master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h2>List of Attractions</h2>
            <a class="btn btn-primary" href="{{ route('attractions.create') }}">Add Attraction</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attractions as $attraction)
                    <tr>
                        <td><a href="{{ route('attractions.show', $attraction->id) }}">{{ $attraction->id }}</a></td>
                        <td>{{ $attraction->name }}</td>
                        <td>{{ Str::limit($attraction->description, 50) }}</td>
                        <td>{{ $attraction->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('attractions.edit', $attraction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('attractions.destroy', $attraction->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No attractions found. <a href="{{ route('attractions.create') }}">Create one</a>.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
