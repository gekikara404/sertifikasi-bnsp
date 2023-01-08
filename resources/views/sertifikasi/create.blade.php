@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Skema</h1>
    <form action="{{ route('sertifikasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kd_skema">Kode Skema</label>
            <input type="text" name="kd_skema" id="kd_skema" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nm_skema">Nama Skema</label>
            <input type="text" name="nm_skema" id="nm_skema" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" name="jenis" id="jenis" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jml_unit">Jumlah Unit</label>
            <input type="number" name="jml_unit" id="jml_unit" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('sertifikasi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
