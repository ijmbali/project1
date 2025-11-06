@extends('layouts.app')
@section('judulpage','Data Teman') 

@section('konten')
<div class="container">
    <h3>Data Teman</h3>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <a class="btn btn-primary" href="{{ route('teman.create') }}">+ Tambah Teman Baru</a>
    <hr>

    @if(empty($data))
        <p>Tidak ada Data</p>
    @else
    <table class="table table-hover">
    <thead>
    <tr>
        <th>ID Buku</th>
        <th>Nama Teman</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
    <tr>
        <td>{{ $d['idbuku'] }}</td>
        <td>{{ $d['namateman'] }}</td>
        <td>
            <a class="btn btn-warning btn-sm" href="{{ route('teman.edit',$d['idbuku']) }}"> ✏️ Edit </a><form action="{{ route('teman.destroy', $d['idbuku']) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    @endif

</div>
@endsection