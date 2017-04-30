<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Food.am</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
	<link href="/css/materialize.min.css" rel="stylesheet">
	<link href="/css/font-awesome.min.css" rel="stylesheet">
	<link href="/css/my.css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <script src="/js/materialize.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<header>
	<div class='menu-top'>
			<nav class="nav-extended">
				<div class="nav-wrapper">
					<a href="{{ url('/') }}" class="brand-logo">Logo</a>
					<a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="fa fa-bars" aria-hidden="true"></i></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						@foreach($navbars as $navbar)
							<li class="nav_items"><a href="{{ url('/'.$navbar->alias) }}">{{$navbar->name}}</a></li>
						@endforeach
					</ul>
					<ul class="side-nav" id="mobile-demo">
						@foreach($navbars as $navbar)
							<li class="nav_items"><a href="{{ url('/'.$navbar->alias) }}">{{$navbar->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</nav>
	</div><!-- /.top-menu -->
</header>
    @yield('content')
<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col s12 center">
				<div class="my_box">
					<a href="">
						<i class="fa fa-facebook-official" aria-hidden="true"></i>
					</a>
				</div>
				<div class="my_box">
					<a href="">
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 center">
				<div class="nav-wrapper">
					<ul id="nav-mobile" class="center">
						@foreach($navbars as $navbar)
							<li class="nav_items"><a href="{{ url('/'.$navbar->alias) }}">{{$navbar->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			© 2017 Copyright NoCoffee Solutions
			<a class="grey-text text-lighten-4 right" href="#!">Page Owner A. Movsisyan</a>
		</div>
	</div>
</footer>
</body>
<script src="/js/my.js"></script>
</html>
