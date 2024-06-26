<a href="{{ route('pegawais.show', $pegawai->id) }}" class="btn btn-sm btn-info">Detail</a>
<a href="{{ route('pegawais.edit', $pegawai->id) }}" class="btn btn-sm btn-primary">Edit</a>
<form action="{{ route('pegawais.destroy', $pegawai->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
</form>
