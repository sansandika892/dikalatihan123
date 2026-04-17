@extends('master')

@section('content')

<div class="container mt-4">

<h2>Tambah Hotel</h2>

<form action="/hotels/store" method="post">
@csrf

<input type="text" name="name" class="form-control mb-2" placeholder="Nama Hotel">

<input type="text" name="location" class="form-control mb-2" placeholder="Lokasi">

<input type="number" name="price" class="form-control mb-2" placeholder="Harga">

<input type="text" name="rating" class="form-control mb-2" placeholder="Rating">

<textarea name="description" class="form-control mb-2" placeholder="Deskripsi"></textarea>

<button class="btn btn-success">Simpan</button>

</form>

</div>

@endsection