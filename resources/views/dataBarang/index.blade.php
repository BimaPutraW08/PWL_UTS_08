@extends('dataBarang.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>KASIR BIMA08</h2>
        </div>
        <div class="float-right my-2">
                <form class="d-flex" action="{{ url('dataBarang') }}" method="get">
                    <input class="form-control me-1" type="search" name="search" value="{{ Request::get('search') }}" placeholder="search" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            <a class="btn btnsuccess" href="{{ route('dataBarang.create') }}"> Input Barang</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>kode_barang</th>
        <th>nama_barang</th>
        <th>kategori_barang</th>
        <th>harga</th>
        <th>qty</th>
        <th width="280px">Action</th>
    </tr>
 
    @foreach ($dataBarang as $dataBarang)
    <tr>
        <td>{{ $dataBarang->kode_barang }}</td>
        <td>{{ $dataBarang->nama_barang }}</td>
        <td>{{ $dataBarang->kategori_barang }}</td>
        <td>{{ $dataBarang->harga }}</td>
        <td>{{ $dataBarang->qty }}</td>

        <td>

            <form action="{{ route('dataBarang.destroy',$dataBarang->kode_barang) }}" method="POST">
                <a class="btn btninfo" href="{{ route('dataBarang.show',$dataBarang->kode_barang) }}">Read</a>
                <a class="btn btnprimary" href="{{ route('dataBarang.edit',$dataBarang->kode_barang) }}">Edit</a>
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


@endsection