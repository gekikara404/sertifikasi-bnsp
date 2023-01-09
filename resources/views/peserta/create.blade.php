@extends('layouts.app')

@section('content')
    <h1>Tambah Peserta</h1>
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
    <form action="/daftar" method="POST">
        @csrf
        <div class="form-group">
            <label for="kd_skema">Kode Skema</label>
            <select name="kd_skema" class="form-control">
                @foreach ($skemas as $skema)
                    <option value="{{ $skema->kd_skema }}">{{ $skema->nm_skema }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nm_peserta">Nama Peserta</label>
            <input type="text" name="nm_peserta" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jekel">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jekel" id="laki-laki" value="L" checked>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jekel" id="perempuan" value="P">
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="number" name="no_hp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
