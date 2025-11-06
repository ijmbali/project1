@extends('layouts.app')
@section('judulpage','Data Teman') 

@section('konten')
<div class="container">    
    <h3>+ Tambah Teman Baru</h3>

    <form action="{{ route('teman.store') }}" method="POST">
        @csrf
        <div class=form-group>
        <label class="form-label">Nama:</label>
        <input class="form-control" type="text" name="namateman" required></p>
        </div>
        <div class=form-group>
        <label class="form-label">Alamat:</label>
        <input class="form-control" type="text" name="alamat" required></p>
        <div class=form-group>
        <label class="form-label">Kota:</label>
        <input class="form-control" type="text" name="kota" required></p>
        <div class=form-group>
        <label class="form-label">Telepon:</label>
        <input class="form-control" type="text" name="telp" required></p>
        <div class=form-group>
        <label class="form-label">WhatsApp:</label>
        <input class="form-control" type="text" name="wa" required></p>

        <button class="btn btn-primary" type="submit">💾 Simpan</button>
    </form>

    <br>
    <a href="{{ route('teman.index') }}">⬅ Kembali ke daftar</a>
</div>
@endsection