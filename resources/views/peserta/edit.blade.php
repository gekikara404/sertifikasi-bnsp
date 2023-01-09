@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Peserta</h1>
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
    <form action="{{ route('peserta.update', $peserta->id_peserta) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="kd_skema">Kode Skema</label>
            <select name="kd_skema" id="kd_skema" class="form-control">
                @foreach ($skemas as $skema)
                    <option value="{{ $skema->kd_skema }}" {{ $skema->kd_skema == $peserta->kd_skema ? 'selected' : '' }}>{{ $skema->kd_skema }} - {{ $skema->nm_skema }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nm_peserta">Nama Peserta</label>
            <input type="text" name="nm_peserta" id="nm_peserta" class="form-control" value="{{ $peserta->nm_peserta }}" required>
        </div>
        <div class="form-group">
            <label for="jekel">Jenis Kelamin</label>
            <select name="jekel" id="jekel" class="form-control">
                <option value="Laki-laki" {{ $peserta->jekel == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $peserta->jekel == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ $peserta->alamat }}</textarea>
            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ $peserta->no_hp }}" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
    @endsection