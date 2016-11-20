@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/about.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
@endsection

@section('content')
		<section>
			<div class="container">
				<div class="about-top">
					<div class="atop-text">
						<h2 class="animated fadeInDown">
							<span class="quotation">&#8223; </span>
							<?php echo $slogan[0]['name'];?>
							<span class="quotation">&#8221;</span>
						</h2>
						<p class="animated fadeInUp delay-05s"><?php echo $slogan[0]['ps'];?></p>
					</div>
					<div class="atop-down scroll-down"><img src="img/down.svg"></div>
				</div>
			</div>
		</section>

		<section id="slider" class="sec-white sec-media">
			<div id="component" class="component component-fullwidth con1">
					<div class="atext media-title"><h2>&#8212; Media &#8212;</h2></div>
					<ul class="itemwrap atext bxslider" id="MediaSlider">
						<li >
						<?php
						foreach($about_media as $i => $row)
						{
							$i += 1;
							?>
							<div class="atext at-left">
								<p><?php echo $row['description'];?></p>
								<h4>&#8212; <?php echo $row['awardName'];?></h4>
							</div>
							<?php
							if($i % 2 == 0)
							{
								echo '</li>';
								echo '<li>';
							}
						}
						?>
						</li>
					</ul>
					<div id="bx-pager">
					    <ul>
						<?php
						$k = 0;
						foreach($about_media as $i => $row)
						{
							if($i % 2 == 0)
							{
								?>
								<li> <a data-slide-index="<?php echo $k;?>" href=""><?php echo $k + 1;?></a></li>
								<?php
								$k += 1;
							}
						}
						?>
					    </ul>
					</div>
			</div>
		</section>
		
<!-- 		<section class="sec-white" id="dance-section">
			<div class="con1">
				<div class="atext">
					<h2 id="dance-section-h2" class="" style="opacity: 0;"><span class="quotation">&#8223; </span>  Dance is the source of his passion for life. <span class="quotation">&#8221;</span></h2>
				</div>
			</div>	
		</section> -->

		<section class="sec-dark">
			<section class="sec-white">
				<div class="con2wid">
					<div class="con2">
						<div class="t-con" id="tcon-section" style="opacity: 0;" >
							<span class="t-box" >About B.DANCE</span>
						</div>
					</div>
					<div class="con2">
						<div class="atext">
							<p>&#34;B.Dance&#34; adheres to the core value of &#34;persistence for beautiful art conservation&#34;. Featuring a composite team with cross-industry links, B.Dance hopes to become an art platform that inspires creation. B.Dance has since its founding performed in Germany, Czech Republic, Spain, Israel, Denmark, China, Hong Kong, France, and Italy. </p>
						</div>
					</div>
				</div>
				<div class="conwhite"></div>
				<div class="clear"></div>
			</section>
		</section>
		<section class="sec-white underline">
			<div class="con2wid">
				<div class="con2" style="margin: 40px 0;">
					<div class="atext">
						<p>Through frequent international exchanges, every member on the team is brought closer to the pulse of the world, acknowledging self-worth and Taiwan&#39;s values. In the future, B.Dance will not only be just a modern dance troupe, but it will also be a synonym for talents from all sides.</p>
					</div>
				</div>
				<div class="con2" id="logo-section" style="opacity: 0; margin: 26px 0;">
					<img src="img/logo.svg">
				</div>
			</div>
			<div class="conwhite"></div>
			<div class="clear"></div>
		</section>
		<section class="sec-white">
			<section class="sec-pic">
				<div class="con1">
					<div class="atext">
						<h2>PO-CHENG TSAI</h2>
						<p>Artistic Director of B.DANCE / Choreographer</p>
					</div>
					<div class="tsai" id="tsai-section" style="opacity: 0;""><img src="img/Tsai.jpg"></div>
				</div>
			</section>
		</section>
		<section class="sec-white" >
			<div class="con1">
				<div class="atext at-left">
					<p>Po-Cheng Tsai&#39;s international breakthrough came with Floating Flowers. In 2013, the production won the National Creative Dance Competition in Taiwan. In 2014, Floating Flowerswon both Audience Award and the First Production Prize at the International Competition for Choreographers in Hannover ,giving Po-Cheng Tsai the opportunity to tour Floating Flowers with dancers from Gauthier Dance. This piece was invited to perform at 2014 China Dance Forward in Hong Kong and Guangdong, and later to LUCKY TRIMMER in Berlin in 2015.</p>
					<p>This year, Po-Cheng&#39;s new work, Hugin/Munin came in first and won Tanz Luzerner Theater Production Award at Copenhagen International Choreography Competition in Denmark; also ranked No.1 and won Italy Balletto Di Siena Production Award at International Contest of Choreography Burgos in Spain. Po-Cheng Tsai founded his own company B.DANCE in Taiwan. He also worked as guest choreographer with different professional companies, including Cloud Gate 2 and Kaohsiung City Ballet. Tsai dedicated himself to dance education and choreographed at Tsoying Senior High School and the Taipei Physical Education College.</p></p>
				</div>
			</div>
		</section>

		<section id="a-slider" class="sec-slide">
			<h2 class="textwhite">&#8212; Awards &#8212;</h2></div>
			    <div class="grid-item" style="display: block; width: 70px; margin: auto;">
		            <div id="loading19">
				        <div class="cube">
						    <div class="squre squre_front"></div>
						    <div class="squre squre_back"></div>
						    <div class="squre squre_left"></div>
						    <div class="squre squre_right"></div>
						    <div class="squre squre_top"></div>
						    <div class="squre squre_bottom"></div>
	   		  			</div>
	   				</div>
      			</div>
			<div class="awards">
				<ul class="bxslider textwhite" id="awardSlider">
					<?php
					foreach($about_awards as $i => $row)
					{
						?>
						<li <?php if($i == 0) echo 'class="current"';?>>
							<p><?php echo $row['title'];?></p>
							<h5><?php echo $row['description'];?></h5>
							<h6><?php echo $row['awardName'];?></h6>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</section>

		<section class="sec-white">
			<div class="proj-btm" style=" margin-top: 100px;"><a href="#" class="backToTop"><p>&#8212; Back to Top &#8212;</p></a></div>
		</section>

		<section class="onepage-foot sec-white">
			<div class="con1">
				<div style="margin-top: 100px;">
					<p class="acopyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</div>
			</div>
		</section>
@endsection

@section('custom_js')
<script type="text/javascript" src="{{ asset('js/waypoints.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script>
	$('#dance-section').waypoint(function() {
			$('#dance-section-h2').addClass('animated fadeInDown delay-1s');
		}, {
			offset: '60%'
		});
	$('#tcon-section').waypoint(function() {
			$('#tcon-section').addClass('animated fadeInLeft delay-1s');
		}, {
			offset: '60%'
		});
	$('#logo-section').waypoint(function() {
			$('#logo-section').addClass('animated fadeInRight delay-1s');
		}, {
			offset: '60%'
		});
	$('#tsai-section').waypoint(function() {
			$('#tsai-section').addClass('animated fadeInDown delay-1s');
		}, {
			offset: '60%'
		});
	$(function() {
		var awardSlider = $('#awardSlider').bxSlider({
			
		});
		var mediaSlider = $('#MediaSlider').bxSlider({
			pagerCustom: '#bx-pager',
			onSliderLoad: function () {
				$('#bx-pager').appendTo('.bx-controls-direction');
			}
		});

		$('a.pager-prev').click(function () {
	    var current = mediaSlider.getCurrentSlide();
			    mediaSlider.goToPrevSlide(current) - 1;
			});
		$('a.pager-next').click(function () {
		    var current = mediaSlider.getCurrentSlide();
		    mediaSlider.goToNextSlide(current) + 1;
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