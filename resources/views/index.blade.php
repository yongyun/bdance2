@extends('layout')

@section('content')
<section id="slider"><!--slider-->
	<div id="component" class="component component-fullwidth " >
			<ul class="itemwrap">
				<li class="current">
					<video  class="film" playsinline autoplay muted loop id="bgvid">
					    <source src="{{ asset('img/film.mp4')}}" type="video/mp4">
					</video>
				</li>
				<li class=""><img src="{{ asset('img/1.jpg')}}" alt="img01"/></li>
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

