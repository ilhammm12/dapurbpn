@extends('front.template')

@section('main')
	<section>
		<div class="columns is-centered">
			<div class="column is-8">
				<div class="columns is-multiline">
					<div class="column is-12">
						<p class="is-size-2 has-text-weight-bold mb-2">{{ $maUsers->nama}}</p>
						<div class="tags are-medium">
							<p class="tag is-link has-text-weight-semibold">{{ $maUsers->email}}</p>
							<p class="tag is-link has-text-weight-semibold">{{ '0'.$maUsers->no_hp}}</p>
						</div>
	      				@if (count($maTokos)==0)
							<a href="{{ route('front.buatToko',$maUsers->id) }}" class="button">
							    <span class="has-text-weight-semibold">Buat Toko</span>
							</a>
						@endif
					</div>

        		@foreach ($maTokos as $maToko)
	        		
					<div class="column is-4">
						<img src="{{ asset('img/'. $maToko->foto) }}" alt="" height="120px" style="border-radius: 5px;">
					</div>
					<div class="column is-4">
						<span>
							<p class="has-text-dark-grey is-size-6">Toko</p>
							<p class="has-text-dark-grey is-size-5 has-text-weight-semibold">{{ $maToko->namaToko }}</p>
						</span>
						<br>
						<span>
							<p class="has-text-dark-grey is-size-6">Alamat</p>
							<p class="has-text-dark-grey is-size-5 has-text-weight-semibold">{{ $maToko->alamat }}</p>
						</span>
					</div>
					<div class="column is-4">
						<span>
							<p class="has-text-dark-grey is-size-6">jam_buka</p>
							<p class="has-text-dark-grey is-size-5 has-text-weight-semibold">{{ $maToko->jam_buka }}</p>
						</span>
						<br>
						<span>
							<p class="has-text-dark-grey is-size-6">jam_tutup</p>
							<p class="has-text-dark-grey is-size-5 has-text-weight-semibold">{{ $maToko->jam_tutup }}</p>
						</span>
					</div>
					<div class="column is-12">

						<a href="{{ route('front.buatMenu',$maToko->idToko) }}" class="button is-green">	
						    <span class="has-text-weight-semibold">Tambah Menu</span>
						</a>
					</div>
					@php
						$get_id = $maToko->idToko;
						$get_detail = $maMenus->where('idToko',$get_id)->paginate(5);
					@endphp
					@foreach ($get_detail as $maMenu)
						<div class="column is-4-desktop is-4-tablet is-5-mobile is-10-mobile-xs">
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
								</div>
							</div>
						</div>
					@endforeach
				@endforeach
				</div>
			</div>
		</div>

	</section>
@endsection
