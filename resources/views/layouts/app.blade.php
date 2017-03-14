<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-Fortnight</title>

		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/all.css">
		@yield('css')
	</head>

	<body>

		@include('layouts.navbar')

		<div class="container">
			@yield('content')
		</div>
		
		<script>
			window.Laravel = { csrfToken: '{{ csrf_token() }}' };
		</script>
		<script src="/js/app.js"></script>
		<script src="/js/all.js"></script>
		@yield('js')
	</body>
</html>