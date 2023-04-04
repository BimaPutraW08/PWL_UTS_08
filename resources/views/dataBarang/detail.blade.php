@extends('dataBarang.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Barang
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>kode_barang: </b>{{$dataBarang->kode_barang}}</li>
                    <li class="list-group-item"><b>nama_barang: </b>{{$dataBarang->nama_barang}}</li>
                    <li class="list-group-item"><b>kategori_barang: </b>{{$dataBarang->kategori_barang}}</li>
                    <li class="list-group-item"><b>harga: </b>{{$dataBarang->harga}}</li>
                    <li class="list-group-item"><b>qty: </b>{{$dataBarang->qty}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ route('dataBarang.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection