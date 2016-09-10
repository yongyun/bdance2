<!-- @extends('layout')
 -->
@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css')}}" />
@endsection

@section('content')
<section id="slider"><!--slider-->
	<div id="component" class="component component-fullwidth " >
			<ul class="itemwrap">
				@if (!$isMobile) 
				<li class="current">
					<video  class="film" playsinline autoplay muted loop id="bgvid">
					    <source src="{{ asset('img/film.mp4')}}" type="video/mp4">
					</video>
				</li>
				@endif
				<li class="{{ $isMobile ? 'current': ''}}"><img src="{{ asset('img/1.jpg')}}" alt="img01"/></li>
				<li class=""><img src="{{ asset('img/2.jpg')}}" alt="img02"/></li>
			</ul>
			<nav>
				<a class="prev" href="#"><img class="prevIcn" src="{{ asset('img/prevIcn.svg')}}"></a>
				<a class="next" href="#"><img class="nextIcn" src="{{ asset('img/nextIcn.svg')}}"></a>
			</nav>
	</div>
</section>
@endsection

@section('footer')
<footer>
	<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
</footer>
@endsection

@section('custom_js')
<script src="{{ asset('js/main.js')}}"></script>
<script>
	$('#loading-mask').delay(2000).fadeOut();
</script>
@endsection
