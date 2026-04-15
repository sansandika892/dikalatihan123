<form action="/attractions/store" method="POST">
    @csrf
    <label>Nama Kategori</label>
    <input type="text" name="name" required>
    
    <button type="submit">Simpan</button>
</form>