@extends('layout')

@section('custom_css')
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/about.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/boom.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}" />

@endsection

@section('custom_js')
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins/film_roll/js/jquery.film_roll.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script>
	$(function() {
		var awardSlider = $('#awardSlider').bxSlider({	
			captions: true
		});
	});
	$('#loading-mask').delay(0).fadeOut();
	$('.backToTop').click(function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 0}, 1000);
			return false;
		});
</script>
@endsection


@section('content')
	<section id="a-slider" class="sec-slide sec-white">
			<div class="awards">
				<ul class="bxslider textwhite" id="awardSlider">
					<li><img src="/img/Chrono-logy_Joeri Dubbe_fotoJoris-JanBosk1052_6836.jpg"  width="100%" title="Chronology by Joeri Dubbe"></li>	
					<li><img src="/img/Chrono-logy_Joeri Dubbe_fotoJoris-JanBosk1052_6842.jpg" width="100%" title="Chronology by Joeri Dubbe"></li>	
					<li><img src="/img/Chrono-logy_Joeri Dubbe_fotoJoris-JanBosk1052_7198.jpg" width="100%" title="Chronology by Joeri Dubbe"></li>	

					<li><img src="/img/Francesca FoscariniLena Meyer.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/Francesca Foscarini_Sara Wiktorowicz.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/Francesca Foscarini@ Lena Meyer.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/Idan Sharabi _Your2Tami Weiss Photography.jpg" width="100%" title="Your Name by Idan Sharabi"></li>
					<li><img src="/img/Idan Sharabi _Your3Tami Weiss Photography.jpg" width="100%" title="Your Name by Idan Sharabi"></li>
					<li><img src="/img/Idan Sharabi _YourTami Weiss Photography.jpg" width="100%" title="Your Name by Idan Sharabi"></li>	
					<li><img src="/img/Then, Before, Now, Once moreAntonin Comestaz.jpg" width="100%" title="THEN, BEFORE, NOW, ONCE MORE  by Antonin Comestaz"></li>	
					<li><img src="/img/Then, Before, Now, Once moreAntonin Comestaz2.jpg" width="100%" title="THEN, BEFORE, NOW, ONCE MORE  by Antonin Comestaz"></li>
					<li><img src="/img/Then, Before, Now, Once moreInbal Cohen Hamo.jpg" width="100%" title="THEN, BEFORE, NOW, ONCE MORE  by Antonin Comestaz"></li>
				</ul>
			</div>
	</section>
	<div style="background:white;    text-align: center;"><img src="/img/golddown.svg" width="30px"></div>
	<section class="sec-white" >
			<div class="con1">
				<div class="atext">
						<h2>&#8212; 2016 B.OOM &#8212;</h2>
				</div>
				<div class="atext at-left">
					<p>The first edition of B.OOM will spotlight on acclaimed choreography works of international award-winning choreographers. As initiator, B.DANCE itself received two Gold and one Silver Awards at different international choreography competitions in 2015 and 2014. During these competitions, B.DANCE met many talented choreographers from all around the world. Thus, B.DANCE cordially invites those award-winning choreographers among them to present their outstanding performances as guests-performers for the first edition of B.OOM in Taiwan in 2016. 2016 B.OOM Project has the honour to present below award-winning independent choreographers from internationally acclaimed choreography competitions:
					</p>
					<div  class="btext">
						<div class="bcon2">
							<p><i class="fa fa-map" aria-hidden="true"></i>LOCATION &#58; (Concert Hall of Taipei National University of the Arts) 1 Hsueh-Yuan Rd., Peitou District, Taipei 11201, Taiwan, R.O.C</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>DURATION &#58; 60mins without intermission </p>
							<p><i class="fa fa-th-large" aria-hidden="true"></i>DATE &#58;</p>
							<p>27th-28th Sep 2016 PM730</p>
						</div>
					</div>
				</div>
			</div>
	</section>

	<section class="sec-white" >
		<div class="con1">
			<iframe src="https://player.vimeo.com/video/179031782?title=0&byline=0&portrait=0" width="1000" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</section>

	<section class="sec-white" >
		<div class="con1">
			<div class="goldline"></div>
		</div>
	</section>

	<section class="sec-white" >
			<div class="con1">
				<div class="atext">
						<h2>&#8212; Artist &#8212;</h2>
				</div>
				<div class="boomhistory artist">
					<ul>
						<li>
							<a href="">
								<img src="/img/Tsai2.jpg">
								<p>Po-Cheng Tsai</p>
								<h1>Taiwan</h1>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/IdanSharab.jpg">
								<p>Idan Sharab</p>
								<h1>Israel</h1>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/FURIOGANZ.jpg">
								<p>Francesca Foscarini</p>
								<h1>Italiy</h1>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/AntoninComestaz.jpg">
								<p>Antonin Comestaz</p>
								<h1>France</h1>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/511803.jpg">
								<p>Joeri Alexander Dubbe</p>
								<h1>Haarlem</h1>
							</a>
						</li>
					</ul>
				</div>
				<div class="atext artist">
						<h2>&#8212; Artist Info &#8212;</h2>
				</div>
				<div class="atext at-left" style="margin: 30px auto">
					<p>Versatile independent choreographer and dancer. Her personal career was marked by the encounter with quite important masters of the national and international dance scene, with whom she had the opportunity to research on the languages of contemporary dance and improvisation, thus enriching and internalizing her language both in terms of expression and of performance. She started her own professional experience from 2000. Also Francesca is a winner of the Equilibrio Award for Performer in 2013. As well as she won the jury prize of the 17th edition of the MASDANZA in 2012. She has been selected as the young performer in 2012.	
					</p>
					<h3>Concept of work</h3>
					<p>GRANDMOTHER</p>
					<p>A body letting go of the past, The urgency of being present in the here and now, Never knowing what will happen next, Moving by the rhythm of breath, memories, and light conquering darkness.
					</p>
					<div  class="btext">
						<div class="bcon2">
							<p>Duration &#58; 10mins</p>
							<p>Choreography & Performance &#58; Francesca Foscarini</p>
							<p>Technician &#58; Luca Serafini</p>
							<p>Photographer &#58; Luca Serafini</p>
							<a href=""><h6>Artist Link</h6></a>
						</div>
					</div>
				</div>
			</div>
	</section>

	<section class="sec-white">
		<div class="con2wid">
			<div class="bpostlink">
				<div class="b-con" >
					<a href="http://www.artsticket.com.tw/CKSCC2005/cart/cart00/ShowMap.aspx?PerformanceId=8JNfZ4VZd5RtUOxQvA62L9sMP56NfMHuHdHl3VWIPt4" target="_blank" class="b-box bpost-box">Buy now</a>	
				</div>
				<div class="b-con" >
					<a href="#" class="b-box backToTop bpost-box"> Back to Top </a>	
				</div>
			</div>
		</div>
	</section>

	<section class="onepage-foot">
			<div class="con1">
				<div style="margin-top: 150px;">
					<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</div>
			</div>
	</section>
@endsection