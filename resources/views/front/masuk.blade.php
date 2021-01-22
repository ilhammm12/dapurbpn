@extends('front.template')

@section('main')
	<section>
		@if ($message = Session::get('success'))
	    <div class="alert alert-success">
	        <p>{{ $message }}</p>
	    </div>
	    @endif
		<div class="columns is-centered is-desktop is-tablet is-mobile">
			<div class="column is-4-desktop is-6-tablet is-8-mobile is-12-mobile-xs">
				<p class="has-text-weight-normal is-size-5"><span class="has-text-primary">Halo</span>, lorem ipsum dolor sit amet.</p>
				<br>
				<h3 class="is-size-3 has-text-weight-semibold">Masuk</h3>
				<br>

				<form action="{{ route('front.validateLogin') }}" method="POST">
   					{{ csrf_field() }}
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

					<div class="field is-fullwidth">
						<p class="control is-fullwidth">
							<button type="submit" class="button is-primary is-fullwidth">masuk</button >
						</p>
					</div>
				</form>
				<br>
				<div class="has-text-centered">
					<p>belum memiliki akun ? <a href="{{ route('front.daftar') }}" class="has-text-primary">daftar</a></p>
				</div>
			</div>
		</div>
	</section>
@endsection
