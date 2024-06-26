@extends('layouts.index')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-5">Detail Pegawai</h2>
            <a href="{{ route('pegawais.index') }}" class="btn btn-primary mb-3">Kembali</a>
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Informasi Pegawai</h5>
                </div>
                <div class="card-body">
                    @if($pegawai->photo)
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <img src="{{ asset('uploads/' . $pegawai->photo) }}" alt="Foto Pegawai" class="img-thumbnail" width="150">
                            </div>
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nama:</div>
                        <div class="col-md-8">{{ $pegawai->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Email:</div>
                        <div class="col-md-8">{{ $pegawai->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Telepon:</div>
                        <div class="col-md-8">{{ $pegawai->phone }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Jabatan:</div>
                        <div class="col-md-8">{{ $pegawai->position }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
