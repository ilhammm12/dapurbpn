<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dapur Balikpapan - Kuliner balikpapan</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bulma.min.css') }}">
	<!-- Custom Design -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/design.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/responsive.css') }}">

</head>
<body>
	<div id="wrapLayout">
		<header>
			<nav class="navbar" role="navigation" aria-label="main navigation">
				<div class="container">
					<div class="navbar-brand">
						<a class="navbar-item" href="{{ route('front.homepage') }}">
					    	<p class="is-size-4 has-text-weight-semibold">Dapur Balikpapan</p>
					    </a>

					    <a role="button" class="navbar-burger burger has-text-white" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
					      	<span aria-hidden="true"></span>
					      	<span aria-hidden="true"></span>
					      	<span aria-hidden="true"></span>
					    </a>
					</div>
				  	<div id="navbarBasicExample" class="navbar-menu">
				    	<div class="navbar-end">
		      				@if (Auth::guard('pengguna')->check())
								<a href="{{ route('front.profile', Auth::guard('pengguna')->user()->id) }}" class="navbar-item">Hai, {{Auth::guard('pengguna')->user()->nama}}</a>
							@endif
				      		<div class="navbar-item">
			      				@if (!Auth::guard('pengguna')->check())
								    <a href="{{ route('front.masuk') }}" class='button is-primary'>
		            					<strong>Masuk</strong>
		          					</a>
								@else
								    <a href="{{ route('front.keluar') }}" class='button is-danger'>
		            					<strong>Keluar</strong>
		          					</a>
								@endif
				      		</div>
				    	</div>
				  	</div>
				</div>
			</nav>
			<section class="hero is-link is-medium header-bg">
			  	<div class="hero-body">
			    	<div class="container">
			    		<div class="has-text-centered">
				      		<h1 class="title is-size-2-desktop is-size-3-tablet is-size-4-mobile">
				        		Jajanan Kuliner Balikpapan
				      		</h1>
				      		<h2 class="subtitle is-size-5-desktop is-size-5-tablet is-size-6-mobile" style="line-height: 1.8; width: 50%">
				        		Jelajah berbagai macam jenis kuliner makanan dan minuman di kota balikpapan!
				      		</h2>
			    		</div>
			    	</div>
			  	</div>
			</section>
		</header>
		<main>
			<div class="container">