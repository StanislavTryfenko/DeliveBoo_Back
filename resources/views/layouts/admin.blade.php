<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'DeliveBoo') }}</title>


	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Usando Vite -->
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="app">


		<main class="">
			<div class="container-fluid">
				{{-- header navbar --}}
				@include('layouts.partials.header')
				{{-- wrapper --}}
				<div class="row">
					<div class="col-3">
						@include('layouts.partials.side')
					</div>
					<div class="col-9">

						@yield('content')
					</div>
				</div>
			</div>

		</main>
	</div>
</body>

</html>
