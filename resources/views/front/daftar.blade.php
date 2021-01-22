@extends('front.template')

@section('main')
	<section>
		<div class="columns is-centered is-desktop is-tablet is-mobile">
			<div class="column is-4-desktop is-6-tablet is-8-mobile is-12-mobile-xs">
				<p class="has-text-weight-normal is-size-5"><span class="has-text-primary">Halo</span>, lorem ipsum dolor sit amet.</p>
				<br>
				<h3 class="is-size-3 has-text-weight-semibold">Daftar</h3>
				<br>
				<form action="{{ route('front.storeUser') }}" method="POST">
					 @csrf
					<div class="field">
						<label>Nama</label>
						<div class="control">
							<input class="input" type="text" placeholder="nama lengkap" required name="nama">
						</div>
					</div>
					<div class="field">
						<label>Email</label>
						<div class="control">
							<input class="input" type="email" placeholder="you@example.com" required name="email">
						</div>
					</div>

					<div class="field">
						<label>Password</label>
						<div class="control">
							<input class="input" type="password" placeholder="Enter your password" required name="password">
						</div>
					</div>

					<div class="field">
						<label>Alamat</label>
						<div class="control">
							<input class="input" type="text" placeholder="alamat" required name="alamat">
						</div>
					</div>

					<div class="field">
						<label>No Hp</label>
						<div class="control">
							<input class="input" type="text" placeholder="no hp" required name="no_hp">
						</div>
					</div>
					<div class="field is-fullwidth">
						<p class="control is-fullwidth">
							<button type="submit" class="button is-primary is-fullwidth">daftar</button >
						</p>
					</div>
				</form>
				<br>
				<div class="has-text-centered">
					<p>Sudah Memiliki Akun ? <a href="{{ route('front.masuk') }}" class="has-text-primary">Masuk</a></p>
				</div>
			</div>
		</div>
	</section>
@endsection
