@extends("master")

@section("content")

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white text-center">
            <h4>Tambah Destinasi</h4>
        </div>

        <div class="card-body p-4">
            <form action="/destinations" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Destinasi</label>
                    <input type="text" class="form-control" name="name" placeholder="Contoh: Asia Heritage">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" class="form-control" name="location" placeholder="Contoh: Pekanbaru">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number" class="form-control" name="ticket_price" placeholder="Contoh: 100000">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Operasional</label>
                        <input type="text" class="form-control" name="working_hours" placeholder="08.00 - 16.00">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hari Operasional</label>
                        <input type="text" class="form-control" name="working_days" placeholder="Senin - Minggu">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/destinations" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection