@extends('front.template')

@section('main')
	<section>
		<div class="columns is-centered is-desktop is-tablet is-mobile">
			<div class="column is-4-desktop is-6-tablet is-8-mobile is-12-mobile-xs">
				<h3 class="is-size-3 has-text-weight-semibold">Buat Toko</h3>
				<br>
				<form action="{{ route('front.storeToko', $id) }}" method="POST" enctype="multipart/form-data">
				 	@csrf
					<div class="field">
						<label>Nama toko</label>
						<div class="control">
							<input class="input" type="text" required name="namaToko">
						</div>
					</div>
					<div class="field">
						<label>Alamat</label>
						<div class="control">
							<input class="input" type="text" required name="alamat">
						</div>
					</div>

					<div class="field">
						<label>Foto</label>
						<div class="control">
							<input class="input" type="file" required name="foto">
						</div>
					</div>

					<div class="field">
						<label>jam buka</label>
						<div class="control">
							<input class="input" type="time" required name="jam_buka">
						</div>
					</div>

					<div class="field">
						<label>jam tutup</label>
						<div class="control">
							<input class="input" type="time"required name="jam_tutup">
						</div>
					</div>
       			 	<input type="hidden" name="idUser" value="{{$id}}">

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
