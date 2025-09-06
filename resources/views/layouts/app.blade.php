
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<!-- Material Design Iconic Font -->
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">

<!-- Linearicons -->
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">

<!-- Animate -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">

<!-- Hamburgers -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">

<!-- Animsition -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">

<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">

<!-- Daterangepicker -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">

<!-- Magnific Popup -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">

<!-- Perfect Scrollbar -->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">

<!-- Util & Main CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    @yield('styles')
</head>
<body>

@include('partials.header')

    <main class="py-5 px-3 top-10">
        <div class="container m-5">
            @yield('content')
        </div>
    </main>


@include('partials.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
