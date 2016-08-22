<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/fxfullwidth.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/head.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/common.css')}}" />
		@yield('custom_css')
		<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="{{ asset('js/modernizr.custom.js')}}"></script>
		<script src="{{ asset('js/responsive-nav.js')}}"></script>
	</head>
	<body>
		<a  href="/"><img class="logo" src="{{ asset('img/logow.png')}}" alt="#"></a>
		<header id="header" class="fxFade">
			<a href="/"><img class="logo" src="{{ asset('img/logow.png')}}" alt="#"></a>
			<nav class="nav-collapse">
				<ul>
					<li class="menu-item active"><a href="/about">About us</a></li>
					<li class="menu-item"><a href="/works">Works</a></li>
					<!-- <li class="menu-item"><a href="#">News</a></li> -->
					<li class="menu-item"><a href="/contact">Contact us</a></li>
					<li class="menu-item social">
							<span class="social-item-main"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
							<span class="social-item-main"><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></span>
							<span class="social-item-main" aria-hidden="true"><a href="#">AxE</a></span>
					</li>
					<!-- <li class="menu-item social">
						<a class= "language" aria-hidden="true" href="#">En</a>
						<Span>/</Span>
						<a class= "language" aria-hidden="true" href="#">Fr</a>
					</li> -->
				</ul>
				<!-- full screen -->
				<ul id="fv">
					<li>
					 	<ul>
					 		<li class="social-item"><a href="https://www.facebook.com/tsaipocheng/?fref=ts"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					     	<li class="social-item"><a href="https://vimeo.com/bdancetw"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					     	<li class="social-item"><a href="http://www.axearts.org" aria-hidden="true">AxE</a></li>
					    </ul>
					</li>
					<!-- <li class="menu-item">
						<ul>
							<li><a class= "language" href="#">En</a></li>
							<li>/</li>
						 	<li><a class= "language" href="#">Fr</a></li>
						</ul>
					</li> -->
				</ul>
				<!-- full screen -->
			</nav>
		</header>
			@yield('content')
			@yield('footer')
		<script src="{{ asset('js/classie.js')}}"></script>
		<script src="{{ asset('js/main.js')}}"></script>
		<script src="{{ asset('js/fastclick.js')}}"></script>
   	 	<script src="{{ asset('js/scroll.js')}}"></script>
    	<script src="{{ asset('js/fixed-responsive-nav.js')}}"></script>
    		@yield('custom_js')
	</body>
</html>