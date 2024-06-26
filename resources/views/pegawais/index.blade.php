@extends('layouts.index')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <h2 class="text-center mb-5">Daftar Pegawai</h2>
                <form action="{{ route('pegawais.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Masukkan kata kunci...">
                        <button type="submit" class="btn btn-outline-secondary">Cari</button>
                    </div>
                </form>
                <a href="{{ route('pegawais.create') }}" class="btn btn-success mb-3">Tambah Pegawai</a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Jabatan</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $index => $pegawai)
                                        <tr>
                                            <td>{{ $pegawai->id }}</td>
                                            <td>{{ $pegawai->name }}</td>
                                            <td>{{ $pegawai->email }}</td>
                                            <td>{{ $pegawai->phone }}</td>
                                            <td>{{ $pegawai->position }}</td>
                                            <td>
                                                @if ($pegawai->photo)
                                                    <img src="{{ asset('uploads/' . $pegawai->photo) }}" alt="Foto Pegawai"
                                                        class="img-thumbnail" width="70">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('pegawais.show', $pegawai->id) }}"
                                                    class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('pegawais.edit', $pegawai->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('pegawais.destroy', $pegawai->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {!! $pegawais->links('pagination::bootstrap-5') !!}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
