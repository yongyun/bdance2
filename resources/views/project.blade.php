<?php
	$reviewLimit = 3;
	$date=date_create($project->perform_date);
	$date_year = date_format($date,"Y");
?>

@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/project.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
@endsection

@section('content')
	<section style="height: 125px; background-color:#000;"></section>

	<section class="sec-dark">
		<div class="conwidth text-white">
			<h1 class="animated fadeInDown">{{ $project->name}}</h1>
			<p class="animated fadeInUp delay-05s">{{ $project->intro}}</p>
			<p class="animated fadeInUp delay-05s">&#8212; {{ $date_year }} &#8212;</p>
		</div>
	</section>

	<section class="sec-img" >
		<div id="film_roll">
			@foreach ($images as $image)
			  <div>
			    <img src="{{ asset($image->url)}}" height: 500px; />
			  </div>
			@endforeach
		</div>
	</section>



	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Information &#8212;</h2>
			<p style="margin-bottom: 20px;">Date: {{ $project->perform_date }}</p>
			<p class="text-lft">{{ $project->description}}</p>
		</div>
	</section>

	<section id="a-slider" class="sec-slide">
			<h2 class="textwhite">&#8212; Awards &#8212;</h2></div>
			<div class="awards">
				<ul class="bxslider textwhite" id="awardSlider">
					<li class="current">
						<p>Floating Flowers</p>
						<h5>20th MASDANZA International choreography competition</h5>
						<h6>Best choreography of Audience</h6>
					</li>
					<li>
						<p>Floating Flowers</p>
						<h5>29th International Choreography Competition Hanover in 2014</h5>
						<h6>Gauthier Dance//Dance company Theaterhaus Stuttgart Production Award. &#38; Audience award</h6>
					</li>
				</ul>
			</div>
		</section>

	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Details &#8212;</h2>
				<p class="text-lft"><span>DURATION&#58; </span> 10 minutes without intermission &#124; <span>PREMIERE&#58; </span> June 28th, 2014 at Theater am Aegi, Hannover, Germany</p>
				<p class="text-lft">TOUR DATE&#58;</p>
				<p class="text-lft">2016 June 10-11 FLOATING FLOWERS & HUGIN/MUNIN, CÁDIZ EN DANZA (ES)</p>
				<p class="text-lft">June 26 FLOATING FLOWERS & HUGIN/MUNIN, Zaragoza Trayecto (ES)</p>
				<p class="text-lft">July 16 FLOATING FLOWERS, LUCKY TRIMMER DOES WALES (UK)</p>
				<p class="text-lft">Oct 19-23 FLOATING FLOWERS & INNERMOST & ALMOST HUMAN(world premiere) - Festival Danse Péi, La Réunion (FR)</p>
				<p class="text-lft">Nov 26B.DANCE GALA - Bilbao Dance Festival, Fundición Bilbao (ES)</p>
				<p class="text-lft">Dec 2-3 Jerusalem International Choreography Competition (IL)</p>
			</div>
	</section>

	<section>
		<div>
			<iframe width="70%" height="450px" src="//{{ $project->video_url}}?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</section>

	<section class="sec-norm underline">
			<h2>&#8212; Reviews &#8212;</h2>
			<ul class="bxslider">

			<?php
				$c_reviews = count($reviews);
				foreach ($reviews as $key => $value) {
					if ($key % $reviewLimit == 0) {
			?>
				<li class="{{ $c_reviews}}">
			<?php
					} ?>
					<div class="conwidth {{ $key == count($reviews) -1 }}" style="margin-bottom: 70px;">
						<p class="text-lft">{{ $value->content}}</p>
						<h4>&#8212; {{ $project->perform_date}} {{ $value->reviewer}}</h4>
					</div>
			<?php
					if ($key % $reviewLimit == $reviewLimit -1 || $key == $c_reviews - 1 ) {
			?>
				</li>
			<?php
					}
				}
			?>
			</ul>
			<div id="bx-pager">
			    <ul>
			    	<?php 
			    		$pages = ceil( count($reviews) / $reviewLimit); 
			    		for ($i = 1; $i <= $pages; $i ++) { 
	    			?>
	    				<li> <a data-slide-index="{{ $i - 1 }}" href="">{{ $i}}</a></li>
	    			<?php
	    				}
		    		?>
			    </ul>
			</div>
	</section>

	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Main Staff &#8212;</h2>
			@foreach ($main_stuff as $stuff)
				<div style="width: 200px; display: inline-block">
					<div class="staffoto">
						<img src="{{ asset($stuff->photo)}}" alt="">
					</div>
					<h3>{{$stuff->name}}</h3>
					<p>{{$stuff->role}}</p>
				</div>
			@endforeach
		</div>
	</section>

	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Staff &#8212;</h2>
			<p>{!! $other_stuff->rest_stuffs !!}</p>
			
		</div>
	</section>

	<section class="sec-norm">
		<div class="proj-btm"><a href="/works"><p>&#8212; All Works &#8212;</p></a></div>
		<div class="proj-btm"><a href="#" class="backToTop"><p>&#8212; Back to Top &#8212;</p></a></div>
	</section>

	<section class="onepage-foot">
			<div class="con1">
				<footer>
					<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</footer>
			</div>
	</section>
@endsection

@section('custom_js')
<script src="{{ asset('plugins/film_roll/js/jquery.film_roll.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script>
	$(function() {
		var fr = new FilmRoll({
		    container: '#film_roll',
		    height: 500,
		    no_css: true,
		    configure_load: true,
		  });
		var reviewSlider = $('.bxslider').bxSlider({
			pagerCustom: '#bx-pager',
			onSliderLoad: function () {
				$('#bx-pager').appendTo('.bx-controls-direction');
			}
		});
		$('.backToTop').click(function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 0}, 1000);
			return false;
		});
		var awardSlider = $('#awardSlider').bxSlider({
			
		});
		var mediaSlider = $('#MediaSlider').bxSlider({
			pagerCustom: '#bx-pager',
			onSliderLoad: function () {
				$('#bx-pager').appendTo('.bx-controls-direction');
			}
		});
		$('a.pager-prev').click(function () {
	    var current = reviewSlider.getCurrentSlide();
			    reviewSlider.goToPrevSlide(current) - 1;
			});
		$('a.pager-next').click(function () {
		    var current = reviewSlider.getCurrentSlide();
		    reviewSlider.goToNextSlide(current) + 1;
		});
	});
	$('#loading-mask').delay(0).fadeOut();
</script>
@endsection
