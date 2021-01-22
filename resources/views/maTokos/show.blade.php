@extends('adminlte::page')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Detail Toko</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('maTokos.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>Data Toko</h3>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nama:</strong>
                {{ $maTokos->namaToko }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>alamat:</strong>
                {{ $maTokos->alamat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <img src="{{ asset('img/'. $maTokos->foto) }}" alt="" height="120px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>jam buka - tutup:</strong>
                {{ $maTokos->jam_buka .' - '. $maTokos->jam_tutup }}
            </div>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
              <h3>Data Menu</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-info btn-lg" href="{{ route('maMenus.create',$maTokos->idToko) }}">Tambah Menu</a>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Foto</th>
                <th>Menu</th>
                <th>harga</th>
                <th>stok</th>
                <th width="280px"class="text-center">Action</th>
            </tr>
            @foreach ($maMenus as $maMenu)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td><img src="{{ asset('img/'. $maMenu->fotoMenu) }}" alt="" height="120px"></td>
                <td>{{ $maMenu->namaMenu }}</td>
                <td>{{ $maMenu->hargaMenu }}</td>
                <td>{{ $maMenu->stok }}</td>
                <td class="text-center">
                <form action="{{ route('maMenus.destroy',$maMenu->idMenu) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection