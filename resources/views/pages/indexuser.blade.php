@extends('master')

@section('content')
    <div class ="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h2> list of Destinations</h2>
            <form action="/users"method="GET">
                <div class="input-group">
                    <input type="text" class="form-control"placeholder="search..." name="search"
                        value="{{ request('search') }}">
                    <button class ="btn btn-outline-secondary"type="submit">search</button>

                </div>
            </form>
            <a class ="btn btn-primary" href="/user/create" class="btn btn success"><button>Add </button></a>
        </div>
        <div class="mt3 d-flex justify-content-center">
            {{ $user->links('pagination::bootstrap-5') }}

        </div>
        <table class ="table table-striped-columns">

            <thead>
                <tr>
                    <th>id</th>

                    <th>name</th>
                    <th>email</th>
                    <th>create_at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($user as $d)
                    <tr>
                        <td> <a href="/detaildestinasi/{{ $d->id }}">{{ $d->id }}</a> </td>

                        <td> {{ $d->name }} </td>
                        <td> {{ $d->email }} </td>
                        <td> {{ $d->created_at }} </td>

                        <td>

                            <a href = "/user/{{ $d->id }}/edit" class="btn btn-warning">Edit,</a>
                            <form action="/user/{{ $d->id }}/delete"method="post" style="display;inline;">
                                @csrf
                                @method ('DELETE')
                                <button type="submit" class="btn btn-danger"onclick="return confirm('Are you sure to delete {{ $d->name }}?')
                                            ">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach



                </form>


            </tbody>




        </table>

    </div>
@endsection


@push('scripts')
    <script>
        let alertElement = document.querySelector('.alert');
        if (alertElement) {
            setTimeout(() => {
                alertElement.style.transition = "opacity 2s ease-out";
                alertElement.style.opacity = "0";
                setTimeout(() => {
                    alertElement.remove();
                }, 3000);
            }, 3000)

        }
    </script>
@endpush
