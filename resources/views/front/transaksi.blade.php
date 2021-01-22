@extends('front.template')

@section('main')
	<section>
		@if ($message = Session::get('success'))
	    <div class="notification is-danger">
	        <p>{{ $message }}</p>
		</div>
	    @endif
		<div class="columns is-centered is-desktop is-tablet is-mobile">
			<div class="column is-4-desktop is-6-tablet is-8-mobile is-12-mobile-xs">
				<!-- <p class="has-text-weight-normal is-size-5"><span class="has-text-primary">Halo</span>, lorem ipsum dolor sit amet.</p> -->
				<br>
				<h3 class="is-size-3 has-text-weight-semibold">Transaksi</h3>
				<br>

				<form action="{{ route('front.storeTransaksi')}}" method="POST">
					@csrf
					<div class="field">
						<label>Tanggal Transaksi</label>
						<div class="control">
							<input class="input" type="date" placeholder="you@example.com" required name="tglTransaksi" value="<?php echo date("Y-m-d");?>" readonly>
						</div>
					</div>

					<input class="input" type="hidden" required name="idUser" value="{{Auth::guard('pengguna')->user()->id}}" readonly>

					<div class="field">
						<label>Pembeli</label>
						<div class="control">
							<input class="input" type="text" value="{{Auth::guard('pengguna')->user()->nama}}" readonly>
						</div>
					</div>


					<div class="field">
						<label>Alamat tujuan</label>
						<div class="control">
							<input class="input" type="text" placeholder="tujuan" required name="alamat">
						</div>
					</div>

					<div class="field-body mb-3">
						<div class="field">
							<label>Menu</label>
							<div class="control">
								<input class="input" type="text" value="{{ $maMenus->namaMenu}}" required name="namaMenu" readonly>
								<input class="input" type="hidden" value="{{ $maMenus->idMenu}}" name="idMenu">
							</div>
						</div>
						<div class="field">
							<label>Harga</label>
							<div class="control is-expanded">
								<input id="priceT" class="input" type="number" value="{{ $maMenus->hargaMenu}}"required name="hargaMenu" readonly="">
							</div>
						</div>
					</div>

					<div class="field">
						<label>Jumlah</label>
						<div class="control">
							<input id="qtyT" class="input" type="number" value="" required name="jumlah">
						</div>
					</div>

					<div class="field">
						<label>Total harga</label>
						<div class="control">
							<input id="totalT" class="input" type="number" value="" required name="totalharga">
						</div>
					</div>

					<div class="field is-fullwidth">
						<p class="control is-fullwidth">
							<button type="submit" class="button is-primary is-fullwidth">Checkout</button >
						</p>
					</div>
					<div class="has-text-centered">
						<p class="is-size-6 has-text-grey">*Pembayaran melalui COD</p>
					</div>
				</form>
			</div>
		</div>		
	</section>
@endsection