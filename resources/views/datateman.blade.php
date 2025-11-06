@extends('layouts.app')
@section('judulpage','Data Detail Teman') 

@section('konten')

<div class="container">
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $dt["namateman"] }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$dt["alamat"]}}</h6>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$dt["kota"]}}</h6>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$dt['telp']}} - {{$dt["wa"]}}</h6>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary btn-sm" href="{{route('dtteman') }}">Kembali</a>
    </div>
    </div>

</div>

@endsection