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
							We believe focus and sincerity define beauty
							<span class="quotation">&#8221;</span>
						</h2>
						<p class="animated fadeInUp delay-05s">while stunning beauty is bigoted focus with a human touch,
						coupled with the test of time, to create the value of &#34;creation&#34;. </p>
					</div>
					<div class="atop-down scroll-down"><img src="img/down.svg"></div>
				</div>
			</div>
		</section>
		<section class="sec-white">
			<div class="con1">
				<div class="atext">
					<h2 class="animated fadeInDown delay-05s"><span class="quotation">&#8223; </span>  Dance is the source of his passion for life. <span class="quotation">&#8221;</span></h2>
					<p>&#34;B.Dance&#34; adheres to the core value of &#34;persistence for beautiful art conservation&#34;. Featuring a composite team with cross-industry links, B.Dance hopes to become an art platform that inspires creation.</p>
					<!-- <p>Taiwanese choreographer Tsai Po-Cheng endeavors to interpret Taiwanese native works in foreign countries through body aesthetics taken to extremes and a blend of oriental fantasy. </p>
					<p>Dance is the source of Po-Cheng&#39;s passion for life. He believes that dance is a taste worth savoring, </p>
					<p>every moment in life is a moving experience, through which multi-directional insights can be gained, </p>
					<p>leading to the delicate mood flow experience and brewed extraordinary works.</p> -->
				</div>
			</div>	
		</section>
		<section class="sec-dark">
			<section class="sec-white">
				<div class="con2wid">
					<div class="con2">
						<div class="t-con">
							<span class="t-box">About B.DANCE</span>
						</div>
					</div>
					<div class="con2">
						<div class="atext">
							<p>Through frequent international exchanges, every member on the team is brought closer to the pulse of the world, acknowledging self-worth and Taiwan&#39;s values. In the future, B.Dance will not only be just a modern dance troupe, but it will also be a synonym for talents from all sides.</p>
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
						<p>B.Dance has since its founding performed in Germany, Czech Republic, Spain, Israel, Denmark, China, Hong Kong, France, and Italy.</p>
					</div>
				</div>
				<div class="con2">
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
					<div class="tsai"><img src="img/Tsai.jpg"></div>
				</div>
			</section>
		</section>
		<section class="sec-white">
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
					<li class="current">
						<p>Hugin/Munin</p>
						<h5>Copenhagen International Choreography Competition</h5>
						<h6>First prize &#38; Tanz Luzerner Theater Production Award</h6>
					</li>
					<li>
						<p>Hugin/Munin</p>
						<h5>International Contest of Choreography Burgos and New York</h5>
						<h6>First prize &#38; Italy Balletto Di Siena production award</h6>
					</li>
					<li>
						<p>Hugin/Munin</p>
						<h5>International Choreography Competition in Jerusalem</h5>
						<h6>Sliver prize</h6>
					</li>
					<li>
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

		<section id="slider" class="sec-white sec-media">
			<div id="component" class="component component-fullwidth con1">
					<div class="atext media-title"><h2>&#8212; Media &#8212;</h2></div>
					<ul class="itemwrap atext bxslider" id="MediaSlider">
						<li >
							<div class="atext at-left">
								<p>Featuring unpredictability, Tsai Po-Cheng puts everyday objects to good uses and creates new ideas out of them.</p>
								<p>In a nut shell, he is a magician that unveils the mystery of the gift cordially presented to the audience.</p>
								<h4>&#8212; October 2015  Issue, La vie</h4>
							</div>
							<div class="atext at-left">
								<p>Artistic director Kathleen McNurney&#58; &#34;Hugin/Munin&#34; is full of suprises. The choreographer&#39;s talents are undeniable. Dancers Change Shen-Ho and Change Chien-Chih&#39;s unique body performance is displayed. It is undoubtedly the best heartwarming work among this year&#39;works. </p>
								<h4>&#8212; Taipei Representative Office in Denmark (Resident News)</h4>
							</div>
							<div class="atext at-left">
								<p>&#34;Floating Flower&#34; comes from a 27-year-old choreographer. A heavy pull on life and death transcends to a new realm for  affectionate farewell.</p>
								<h4>&#8212; PAR Performance Arts Reviews &#47; No. 274 &#47; 2015. July &#47; page15</h4>
							</div>
						</li>
						<li>
							<div class="atext at-left">
								<p>Germany&#39;s Stuttgart dance troupe founder and artistic director Dric Gauthier: “Floatign flower” is an eye-catching materpiece.  </p>
								<h4>&#8212; Report of the Central News Agency</h4>
							</div>
							<div class="atext at-left">
								<p>Tsao Cheng-Yuan: “Tsai Po-Cheng’s “Floating Flower” emphasizes interpersonal relationships. From this work you will discover that instead of performing in a certain mood, they use stage language devices to perform through clothing and action”. </p>
								<h4>—nddaily</h4>
							</div>
							<div class="atext at-left">
								<p>The audience’s favorite piece “Floating Flower” is a pas de deux filled with surprises created by Tsai Po-Cheng from Taiwan.  As the dance starts, the male partner readily hiding under the puffy skirt lets the female dancer sit on his shoulder. Suddenly the peitite female dancer grows like a tree, briing the first surprise to the audicence, folllowed by an interesting mix of rhthymic and lively dance.  </p>
								<h4>&#8212; HAZ Anmeldung  newspaper’</h4>
							</div>
						</li>
						<li>
							<div class="atext at-left">
								<p>It is precise to say the work is a clever balance of body and poetry. The choreographer’s arrangement of two dancers sitting on each other’s shoulders makes them appear like a giant dancer’s perfect skirt. Floating Flower is indeed a clever masterpiece.  </p>
								<h4>&#8212; Germany kreiszeitung newspaper </h4>
							</div>
							<div class="atext at-left">
								<p>Tsai Po-Cheng is young and gifted. He defines complexity through the simple concept of  “less is more”.  </p>
								<h4>&#8212; critical dance commentary</h4>
							</div>
							<div class="atext at-left">
								<p>Floating Fower created by young Taiwanese choreographer Tsai Po-Cheng is definitely the most popular program for the night.</p>
								<h4>&#8212; tanznetz.de</h4>
							</div>
						</li>
					</ul>
					<div id="bx-pager">
					    <ul>
					        <li> <a data-slide-index="0" href="">1</a>
							</li>
					        <li> <a data-slide-index="1" href="">2</a>
					        </li>
					        <li> <a data-slide-index="2" href="">3</a>
					        </li>
					    </ul>
					</div>
			</div>
		</section>


		<section class="sec-white">
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

@section('custom_js')
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script>
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
</script>
@endsection