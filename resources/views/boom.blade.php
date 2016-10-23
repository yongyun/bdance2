@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/about.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/boom.css')}}" />
@endsection

@section('custom_js')
<script type="text/javascript">
	$('#loading-mask').delay(0).fadeOut();
</script>
@endsection

@section('content')
	<section>
			<div class="container">
				<div class="about-top">
					<div class="atop-text">
						<h2 class="animated fadeInDown">
							<div><img src="img/boomlogo.png" width="300px"></div>
						</h2>
						<p class="animated fadeInUp delay-05s">B.OOM by B.DANCE - a pioneer dance project transcends borders</p>
						<div class="con2wid">
							<div class="boomlink">
								<div class="t-con" >
									<a href="http://www.artsticket.com.tw/CKSCC2005/cart/cart00/ShowMap.aspx?PerformanceId=8JNfZ4VZd5RtUOxQvA62L9sMP56NfMHuHdHl3VWIPt4" target="_blank" class="b-box">Buy now</a>
								</div>
							</div>

							<div class="boomlink">
								<div class="t-con">
									<a href="/boom/1" class="b-box">More info</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="atop-down scroll-down"><img src="img/down.svg"></div>
					<div class="clear"></div>
				</div>
			</div>
	</section>

	<section class="sec-white" >
		<section class="sec-pic">
			<div class="con1">
				<div class="atext">
						<h2>&#8212; Concept of B.OOM &#8212;</h2>
				</div>
				<div class="atext at-left">
					<p>B.OOM by B.DANCE - a pioneer dance project transcends borders
					Initiated by B.DANCE in 2016, B.OOM is an international dance project across borders. B.DANCE aims at creating a dance platform for strengthening cultural exchange in the international dance scene. Nowadays, artists can easily travel around in the world, where they can meet other artists from different disciplines, share with each other and learn from others as well. B.OOM not only creates a transparent platform for cross-cultural exchange but also provides opportunities for international dance performers to increase their visibility in the Eastern dance scene. This is the main concept of B.OOM.</p>
				</div>
			</div>
		</section>
	</section>

	<section>
		<div class="triangle-box">
  			<div class="line">
    			<div class="triangle"></div>
    		</div>
  		</div>
	</section>

	<section class="sec-white" >
			<div class="con1">
				<div class="atext">
						<h2>&#8212; Previous &#8212;</h2>
				</div>
				<div class="boomhistory">
					<ul>
						<li>
							<a href="/boom/1">
								<img src="/img/kv1.jpg"><p>2016 BOOM</p>
							</a>
						</li>		
					</ul>
				</div>
			</div>
		</section>


	<section class="onepage-foot">
			<div class="con1">
				<div>
					<p class="acopyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</div>
			</div>
	</section>
@endsection
