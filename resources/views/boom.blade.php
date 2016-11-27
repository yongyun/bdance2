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
									<?php
									if($boom_buy[0]['bl_buy_now'] != '')
									{
										?>
										<a href="<?php echo $boom_buy[0]['bl_buy_now'];?>" target="_blank" class="b-box">Buy now</a>
										<?php
									}
									?>
								</div>
							</div>

							<div class="boomlink">
								<div class="t-con">
									<a href="/boom/<?php echo $boom_buy[0]['bl_id'];?>" class="b-box">More info</a>
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
					<p><?php echo $boom_info[0]['bi_info'];?></p>
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
						<?php
						foreach($boom_list as $row)
						{
							?>
							<li>
								<a href="/boom/<?php echo $row['bl_id'];?>">
									<img src="<?php echo $row['bl_image'];?>"><p><?php echo $row['bl_title'];?></p>
								</a>
							</li>
							<?php
						}
						?>
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
