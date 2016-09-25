@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/about.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/boom.css')}}" />
@endsection

@section('custom_js')
<script type="text/javascript">
	$('.backToTop').click(function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 0}, 1000);
			return false;
		});

	$('#loading-mask').delay(0).fadeOut();
</script>
@endsection

@section('content')
	<section>
		<div style="width:100%; height:800px; background-color: #000; line-height: 800px ">
			<h2>Gallery slideshow</h2>
		</div>
	</section>

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
							<p>LOCATION &#58; Birmingham Hippodrome Theatre Birmingham, GB</p>
							<p>DATE &#58; June 28th, 2014 at Theater am Aegi, Hannover, Germany</p>
							<p>DURATION &#58; 10 minutes without intermission </p>
						</div>
					</div>
					<div class="t-con" >
						<a href="#" class="b-box">Buy now</a>	
					</div>
				</div>
			</div>
	</section>

	<section class="sec-white" >
		<div class="con1">
			<iframe width="70%" height="450px" src="https://www.youtube.com/embed/tqdt0fceBNo?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
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
								<h3>Po-Cheng Tsai</h3>
								<p>Taiwan</p>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/IdanSharab.jpg">
								<h3>Idan Sharab</h3>
								<p>Israel</p>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/FURIOGANZ.jpg">
								<h3>Francesca Foscarini</h3>
								<p>Italiy</p>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/AntoninComestaz.jpg">
								<h3>Antonin Comestaz</h3>
								<p>France</p>
							</a>
						</li>
						<li>
							<a href="">
								<img src="/img/511803.jpg">
								<h3>JOERI ALEXANDER DUBBE</h3>
								<p>Haarlem</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
	</section>

	<section class="sec-white">
		<div class="proj-btm"><a href="/boom"><p>&#8212; B.OOM &#8212;</p></a></div>
		<div class="proj-btm"><a href="#" class="backToTop"><p>&#8212; Back to Top &#8212;</p></a></div>
	</section>

	<section class="onepage-foot">
			<div class="con1">
				<div style="margin-top: 150px;">
					<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</div>
			</div>
	</section>
@endsection

