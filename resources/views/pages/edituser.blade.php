@extends("master")

@section("content")

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-warning text-dark text-center">
            <h4>Edit User</h4>
        </div>

        <div class="card-body p-4">

            <form action="/user/{{$user->id}}/update" method="post">
                @csrf
                @method("PUT")

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{$user->name}}" placeholder="Nama">
                    <label for="name">Nama</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{$user->email}}" placeholder="Email">
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password"
                        name="password" placeholder="Password Baru">
                    <label for="password">Password Baru (opsional)</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation"
                        name="password_confirmation" placeholder="Konfirmasi Password">
                    <label for="password_confirmation">Konfirmasi Password</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/user" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Update Data</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection