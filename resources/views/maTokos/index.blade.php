@extends('adminlte::page')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Toko</h2>
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
            <th width="20px" class="text-center">No</th>
            <th>nama</th>
            <th>alamat</th>
            <th>pemilik</th>
            <th>jam buka-tutup</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($maTokos as $maToko)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $maToko->namaToko }}</td>
            <td>{{ $maToko->alamat }}</td>
            <td>{{ $maToko->nama }}</td>
            <td>{{ $maToko->jam_buka .' - '. $maToko->jam_tutup }}</td>
            <td class="text-center">
                <form action="{{ route('maTokos.destroy',$maToko->idToko) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('maTokos.show',$maToko->idToko) }}">Show</a>

                    <a class="btn btn-warning btn-sm" href="{{ route('maTokos.edit',$maToko->idToko) }}">Ubah</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $maTokos->links() !!}

@endsection