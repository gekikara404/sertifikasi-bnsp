@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Skema</h1>
    @if (session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('sertifikasi.update', $skema->kd_skema) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="kd_skema">Kode Skema</label>
            <input type="text" name="kd_skema" id="kd_skema" class="form-control" value="{{ $skema->kd_skema }}" required>
        </div>
        <div class="form-group">
            <label for="nm_skema">Nama Skema</label>
            <input type="text" name="nm_skema" id="nm_skema" class="form-control" value="{{ $skema->nm_skema }}" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" name="jenis" id="jenis" class="form-control" value="{{ $skema->jenis }}" required>
        </div>
        <div class="form-group">
            <label for="jml_unit">Jumlah Unit</label>
            <input type="number" name="jml_unit" id="jml_unit" class="form-control" value="{{ $skema->jml_unit }}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('sertifikasi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
        </form>
</div>
@endsection