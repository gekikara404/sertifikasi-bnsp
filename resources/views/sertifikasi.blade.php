@extends('layouts.app')

@section('content')
    <h1>Sertifikasi</h1>
    <a href="/sertifikasi/tambah" class="btn btn-primary mb-3">Tambah Skema</a>
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Skema</th>
                <th>Nama Skema</th>
                <th>Jenis</th>
                <th>Jumlah Unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skemas as $skema)
                <tr>
                    <td>{{ $skema->kd_skema }}</td>
                    <td>{{ $skema->nm_skema }}</td>
                    <td>{{ $skema->jenis }}</td>
                    <td>{{ $skema->jml_unit }}</td>
                    <td>
                        <a href="/sertifikasi/edit/{{ $skema->kd_skema }}" class="btn btn-warning">Edit</a>
                        <form action="/sertifikasi/hapus/{{ $skema->kd_skema }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
