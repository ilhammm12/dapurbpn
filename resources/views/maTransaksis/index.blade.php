@extends('adminlte::page')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Transaksi</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>alamat tujuan</th>
            <th>jumlah</th>
            <th>total harga</th>
        </tr>
        @foreach ($maTransaksis as $maTransaksi)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $maTransaksi->tglTransaksi }}</td>
            <td>{{ $maTransaksi->namaMenu }}</td>
            <td>{{ $maTransaksi->alamat }}</td>
            <td>{{ $maTransaksi->jumlah }}</td>
            <td>{{ $maTransaksi->totalharga }}</td>
        </tr>
        @endforeach
    </table>

@endsection