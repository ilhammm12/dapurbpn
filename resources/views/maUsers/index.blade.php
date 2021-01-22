@extends('adminlte::page')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('maUsers.create') }}">Tambah User</a>
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
            <th>email</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($maUsers as $maUser)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $maUser->nama }}</td>
            <td>{{ $maUser->email }}</td>
            <td class="text-center">
                <form action="{{ route('maUsers.destroy',$maUser->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('maTokos.create',$maUser->id) }}">Buka Toko</a>
                    
                    <a class="btn btn-primary btn-sm" href="{{ route('maUsers.show',$maUser->id) }}">Detail</a>

                    <a class="btn btn-warning btn-sm" href="{{ route('maUsers.edit',$maUser->id) }}">Ubah</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $maUsers->links() !!}

@endsection