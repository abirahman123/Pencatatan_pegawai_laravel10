@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-5">Edit Pegawai</h2>
                <a href="{{ route('pegawais.index') }}" class="btn btn-primary mb-3">Kembali</a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow mb-5">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Edit Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pegawais.update', $pegawai->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $pegawai->name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $pegawai->email }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $pegawai->phone }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="position" class="form-label">Jabatan</label>
                                <select class="form-control" id="position" name="position" required>
                                    <option value="" disabled>Pilih Jabatan</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position }}"
                                            {{ $pegawai->position == $position ? 'selected' : '' }}>{{ $position }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            @if ($pegawai->photo)
                                <div class="mb-3">
                                    <img src="{{ asset('uploads/' . $pegawai->photo) }}" alt="Foto Pegawai"
                                        class="img-thumbnail" width="150">
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
