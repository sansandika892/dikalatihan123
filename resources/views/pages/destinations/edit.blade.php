<form action="/attractions/{{ $attractions->id }}/update" method="POST">
    @csrf
    @method('PUT')
    
    <label>Nama Kategori</label>
    <input type="text" name="name" value="{{ $attractions->name }}" required>
    
    <button type="submit">Update</button>
</form>