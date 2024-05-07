<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce Website</title>
	@include('include.style')
</head>
<body>
	@include('include.hader')
    <main>

	@yield('contant')

    </main>

	@include('include.footer')

    @include('include.script')
	
	@stack('script')


	
</body>
</html>