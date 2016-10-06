<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/fxfullwidth.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/head.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/common.css')}}" />
		@yield('custom_css')
		<link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
		<script src="{{ asset('js/modernizr.custom.js')}}"></script>
		<script src="{{ asset('js/responsive-nav.js')}}"></script>
	</head>
	<body>
		<div id="loading-mask">	
			<div class="box">
			   <div class="loader1"></div>
  			</div>
		</div>
		<header id="header" class="fxFade">
			<a href="/"><img class="logo" id="main-logo" src="{{ asset('img/logow.png')}}" alt="#"></a>
			<nav class="nav-collapse">
				<ul>
					<!-- <li class="menu-item active"><a href="/about">About us</a></li> -->
					<!-- <li class="menu-item"><a href="/works">Works</a></li> -->
					<li class="menu-item"><a href="/boom">boom</a></li>
					<!-- <li class="menu-item"><a href="/news">News</a></li> -->
					<!-- <li class="menu-item"><a href="/contact">Contact us</a></li> -->
					<li class="menu-item social">
							<span class="social-item-main"><a target href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
							<span class="social-item-main"><a target href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></span>
							<span class="social-item-main" aria-hidden="true"><a target href="#"><img class="icon_logo" src="{{ asset('img/axe.svg')}}" alt=""></a></span>
					</li>
				</ul>
				<!-- full screen -->
				<ul id="fv">
					<li>
					 	<ul>
					 		<li class="social-item"><a href="https://www.facebook.com/tsaipocheng/?fref=ts"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					     	<li class="social-item"><a href="https://vimeo.com/bdancetw"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					     	<li class="social-item"><a href="http://www.axearts.org" aria-hidden="true"><img src="{{ asset('img/axe.svg')}}" class="icon_logo" alt=""></a></li>
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
		<script src="{{ asset('js/fastclick.js')}}"></script>
   	 	<script src="{{ asset('js/scroll.js')}}"></script>
    	<script src="{{ asset('js/fixed-responsive-nav.js')}}"></script>
    	<script>
    		jQuery(function($){
  $("a").focus(function(){
    $(this).blur();
  });
});
    		$('#main-logo').on('click', function(){
    			window.location= '/';
    		});
    	</script>
    		@yield('custom_js')
	</body>
</html>