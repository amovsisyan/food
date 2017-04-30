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
    <link href="/css/my.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <script src="/js/app.js"></script>

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
			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
                                                    <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                                                    @foreach($navbars as $navbar)
                                                        <li class="nav_items"><a href="{{ url('/'.$navbar->alias) }}">{{$navbar->name}}</a></li>
                                                    @endforeach
							
<!--							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="flag"><img src="img/flag.jpg" alt="english flag"></span>ENGLISH</span><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">RUSSIAN</a></li>
									<li><a href="#">ARMENIAN</a></li>
								</ul>
							</li>-->
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div><!-- /.top-menu -->
	</header>



    @yield('content')

<footer>
	<img src="/img/footer-2.png" class="footer_backgr" alt="">
</footer>

</body>
<script src="/js/my.js"></script>
</html>
