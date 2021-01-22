@extends('front.template')

@section('main')
	<section>
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		@error('title')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		
		<div class="columns is-centered is-desktop is-tablet is-mobile">
			<div class="column is-4-desktop is-6-tablet is-8-mobile is-12-mobile-xs">
				<h3 class="is-size-3 has-text-weight-semibold">Buat Menu</h3>
				<br>
				<form action="{{ route('front.storeMenu', $id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="field">
						<label>Nama menu</label>
						<div class="control">
							<input class="input" type="text" required name="namaMenu">
						</div>
					</div>
					<div class="field">
						<label>Foto</label>
						<div class="control">
							<input class="input" type="file" required name="fotoMenu">
						</div>
					</div>

					<div class="field">
						<label>harga</label>
						<div class="control">
							<input class="input" type="number" required name="hargaMenu">
						</div>
					</div>

					<div class="field">
						<label>stok</label>
						<div class="control">
							<input class="input" type="number" required name="stok">
						</div>
					</div>
       			 	<input type="hidden" name="idToko" value="{{$id}}">

					<div class="field is-fullwidth">
						<p class="control is-fullwidth">
							<button type="submit" class="button is-primary is-fullwidth">buat</button >
						</p>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
