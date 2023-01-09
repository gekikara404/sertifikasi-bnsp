@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Seluruh Data Peserta</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/search" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan nama peserta" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Skema</th>
                                <th>Nama Peserta</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesertas as $peserta)
                            <tr>
                                <td>{{ $peserta->kd_skema }}</td>
                                <td>{{ $peserta->nm_peserta }}</td>
                                <td>{{ $peserta->jekel }}</td>
                                <td>{{ $peserta->alamat }}</td>
                                <td>{{ $peserta->no_hp }}</td>
                               
                                <td>
                                    <a href="/peserta/{{ $peserta->id_peserta }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="/peserta/{{ $peserta->id_peserta }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                    </table>
                     <a href="/peserta/create" class="btn btn-primary btn-sm">Tambah Data</a>
                     <br><br>
                     <div class="d-flex">
                        {!! $pesertas->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection