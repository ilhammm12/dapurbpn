@extends('front.template')

@section('main')
	<section>
		<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile">
			<div class="column is-12">
				<p class="has-text-link is-size-4 has-text-centered has-text-weight-semibold">Data Toko</p>
			</div>
			<div class="column is-6">
				<figure style="position: relative;">
					<img src="{{ asset('img/'. $maTokos->foto) }}" style="border-radius: 8px">
					<figcaption style="position: absolute;z-index: 2; padding-bottom: 10px; padding-left: 10px; filter: grayscale(0); background: rgba(0,0,0,0.65); width: 100%; bottom: 5px; left: 0; border-radius: 8px">
						<p class="has-text-light is-size-3 has-text-weight-bold has-text-weight-semibold">{{ $maTokos -> namaToko}}</p>
						<p class="has-text-light is-size-5 has-text-weight-semibold">{{ $maTokos -> alamat}}</p>
						<p class="has-text-light is-size-5 has-text-weight-semibold">{{ $maTokos->jam_buka .' - '. $maTokos->jam_tutup }}</p>
					</figcaption>
				</figure>
			</div>
		</div>

		<div class="columns wrap-umkm is-multiline is-desktop is-tablet is-mobile is-centered">
			<div class="column is-12">
				<p class="has-text-link is-size-4 has-text-centered has-text-weight-semibold">Daftar Menu</p>
			</div>
			@foreach ($maMenus as $maMenu)
			<div class="column is-3-desktop is-4-tablet is-5-mobile is-10-mobile-xs">
				<div class="card">
					<div class="card-image">
						<figure class="image is-4by3">
							<a href="{{ route('front.show',$maMenu->idToko) }}">
								<img src="{{ asset('img/'. $maMenu->fotoMenu) }}">
							</a>
						</figure>
					</div>
					<div class="card-content px-4 py-3">
						<a href="{{ route('front.show',$maMenu->idToko) }}">
							<p class="has-text-grey-dark has-text-weight-semibold is-size-5">{{ $maMenu->namaMenu }}</p>
							<p class="has-text-grey is-size-6">{{ $maMenu->namaToko }}</p>
						</a>
						<hr class="divider my-4">
						<div>
							<div class="is-flex is-spaced-between">
								<p class="is-size-5 has-text-grey-dark has-text-weight-semibold">{{ $maMenu->stok }} <span class="has-text-grey has-text-weight-normal">pcs</span></p>
								<p class="is-size-5 has-text-grey-dark has-text-weight-semibold"><span class="has-text-grey has-text-weight-normal">Rp.</span> {{ $maMenu->hargaMenu }}</p>
							</div>
						</div>
						<br>
						@if (!Auth::guard('pengguna')->check())
          					<a href="{{ route('front.masuk') }}" class="button is-info is-block act-button">
								<span class="icon has-text-light has-text-weight-semibold">
									Pesan Sekarang
								</span>
							</a>
						@else
							<a href="{{ route('front.transaksi',$maMenu->idMenu) }}" class="button is-info is-block act-button">
								<span class="icon has-text-light has-text-weight-semibold">
									Pesan Sekarang
								</span>
							</a>
						@endif
					</div>
				</div>
			</div>
        	@endforeach
		</div>
	</section>
@endsection
