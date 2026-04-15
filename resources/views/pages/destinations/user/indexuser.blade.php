@extends('master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h2>List of Users</h2>
            <form action="{{ route('user.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search users..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
            <a class="btn btn-primary" href="{{ route('user.create') }}">Add User</a>
        </div>

        <div class="d-flex justify-content-center mb-3">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->id }}</a></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete {{ $user->name }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    let alertElement = document.querySelector('.alert');
    if (alertElement) {
        setTimeout(() => {
            alertElement.style.transition = 'opacity 0.5s ease-out';
            alertElement.style.opacity = '0';
            setTimeout(() => alertElement.remove(), 500);
        }, 3000);
    }
</script>
@endpush
