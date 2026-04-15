@extends("master")

@section("content")

<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-success text-white text-center">
            <h4>Tambah User</h4>
        </div>

        <div class="card-body p-4">
            <form action="{{route('user.store')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Masukkan nama">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi password">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/users" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection