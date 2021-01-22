@extends('front.template')

@section('main')
	<section id="main-section">	
		<div class="columns is-multiline is-centered is-desktop is-tablet is-mobile search-umkm">
			<div class="column is-4-desktop is-7-tablet is-8-mobile is-10-mobile-xs">
				<div class="field has-addons">
				  	<div class="control" style="width: 100%;">
				    	<input class="input is-medium" type="text" placeholder="Cari yang kamu mau">
				  	</div>
				  	<div class="control">
				    	<a class="button is-medium is-primary">
				      		<span class="icon is-light">
				      			<i class="fas fa-search"></i>
				      		</span>
				    	</a>
				  	</div>
				</div>
			</div>
		</div>
		@if ($message = Session::get('success'))
	    <div class="notification is-success">
	        <p>{{ $message }}</p>
		</div>
	    @endif
		<div class="columns wrap-umkm is-multiline is-desktop is-tablet is-mobile is-centered">
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
		<div class="columns is-desktop is-tablet is-mobile is-centered mt-6">
			<div class="column is-5-desktop is-7-tablet is-8-mobile is-10-mobile-xs">
				<nav class="pagination" role="navigation" aria-label="pagination">
				  	<a class="pagination-previous" title="This is the first page" disabled>Previous</a>
				  	<a class="pagination-next">Next page</a>
				  	<ul class="pagination-list">
				    	<li>
					      	<a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
				    	</li>
				    	<li>
				      		<a class="pagination-link" aria-label="Goto page 2">2</a>
				    	</li>
				    	<li>
				      		<a class="pagination-link" aria-label="Goto page 3">3</a>
				    	</li>
				  	</ul>
				</nav>
			</div>
		</div>
	</section>
@endsection