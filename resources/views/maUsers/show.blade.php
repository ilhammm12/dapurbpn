@extends('adminlte::page')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Detail User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('maUsers.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>Data pengguna</h3>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $maUsers->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $maUsers->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>alamat:</strong>
                {{ $maUsers->alamat }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nohp:</strong>
                {{ $maUsers->no_hp }}
            </div>
        </div>
    </div>
    <div class="row">
        <h3>Data Toko</h3>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-info btn-sm" href="{{ route('maTokos.create',$maUsers->id) }}">Buka toko</a>
        </div>
    </div>
@endsection