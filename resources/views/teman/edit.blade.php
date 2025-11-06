@extends('layouts.app')
@section('judulpage','Data Teman') 

@section('konten')
<div class="container">       
    <h3>✏️ Edit Data Teman</h3>

    <form action="{{ route('teman.update', $dt['idbuku']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class=form-group>
        <label class="form-label">Nama:</label>
        <input class="form-control" type="text" name="namateman" value="{{ $dt['namateman'] }}" required></p>
        <div class=form-group>
        <label class="form-label">Alamat:</label>
        <input class="form-control" type="text" name="alamat" value="{{ $dt['alamat'] }}" required></p>
        <div class=form-group>
        <label class="form-label">Kota:</label>
        <input class="form-control" type="text" name="kota" value="{{ $dt['kota'] }}" required></p>
        <div class=form-group>
        <label class="form-label">Telepon:</label>
        <input class="form-control" type="text" name="telp" value="{{ $dt['telp'] }}" required></p>
        <div class=form-group>
        <label class="form-label">WhatsApp:</label>
        <input class="form-control" type="text" name="wa" value="{{ $dt['wa'] }}" required></p>

        <button type="submit">💾 Simpan Perubahan</button>
    </form>

    <br>
    <a href="{{ route('teman.index') }}">⬅ Kembali ke daftar</a>
</div>
@endsection