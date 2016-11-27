@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/about.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/boom.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}" />

@endsection

@section('custom_js')
<script src="{{ asset('plugins/film_roll/js/jquery.film_roll.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script>
	$(document).ready(function() {
    $("#content").find("[id^='tab']").hide(); // Hide all content
    $("#tabs li:first").attr("id","current"); // Activate the first tab
    $("#content #tab1").fadeIn(); // Show first tab's content
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $("#content").find("[id^='tab']").hide(); // Hide all content
          $("#tabs li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
    });
});

	$(function() {
		var awardSlider = $('#awardSlider').bxSlider({	
			captions: true
		});
	});
	$('#loading-mask').delay(1500).fadeOut();
	$('.backToTop').click(function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 0}, 1000);
			return false;
		});
	$('.gotoinfo').click(function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 2300}, 1000);
			return false;
		});

</script>
@endsection


@section('content')
	<section id="a-slider" class="sec-slide sec-white">
			<div class="awards">
				<ul class="bxslider textwhite" id="awardSlider">
					<?php
					foreach ($boom_ad as $row)
					{
						?>
						<li>
							<img src="/upload/boom/<?php echo $row['ba_work'].'/'.$row['ba_image'];?>"  width="100%" title="<?php echo $row['ba_title'];?>">
						</li>	
						<?php
					}
					?>
				</ul>
			</div>
	</section>
	<div style="background:white;    text-align: center;"><img src="/img/golddown.svg" width="30px"></div>
	<section class="sec-white" >
			<div class="con1">
				<div class="atext">
						<h2>&#8212; <?php echo $boom_list[0]['bl_title'];?> &#8212;</h2>
				</div>
				<div class="atext at-left">
					<p><?php echo $boom_list[0]['bl_content'];?>
					</p>
					<div  class="btext">
						<div class="bcon2">
							<p><i class="fa fa-map" aria-hidden="true"></i>LOCATION &#58; <?php echo $boom_list[0]['bl_location'];?></p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>DURATION &#58; <?php echo $boom_list[0]['bl_duration'];?></p>
							<p><i class="fa fa-th-large" aria-hidden="true"></i>DATE &#58;</p>
							<p><?php echo $boom_list[0]['bl_show'];?></p>
						</div>
					</div>
				</div>
			</div>
	</section>

	<section class="sec-white" >
		<div class="con1">
			<?php
			if($boom_list[0]['bl_video'] != '')
			{
				if(preg_match("/vimeo/i", $boom_list[0]['bl_video']))
				{
					$array_str = explode('/',$boom_list[0]['bl_video']);
					?>
					<iframe src="https://player.vimeo.com/video/<?php echo $array_str[count($array_str) - 1];?>?title=0&byline=0&portrait=0" width="70%" height="450px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php
				}
				if(preg_match("/youtube/i", $boom_list[0]['bl_video']))
				{
					$array_str = explode('v=',$boom_list[0]['bl_video']);
					?>
					<iframe width="70%" height="450px" src="https://www.youtube.com/embed/<?php echo $array_str[count($array_str) - 1];?>?rel=0&amp;controls=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php
				}
			}
			?>
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
						<h2>&#8212; Artists &#8212;</h2>
				</div>
				<div class="boomhistory artist">
					<ul id="tabs">
						<?php
						foreach ($boom_user as $i => $row)
						{
							?>
							<li>
								<a href="#" name="tab<?php echo ($i + 1);?>" class="gotoinfo">
									<img src="/<?php echo $row['bu_image'];?>">
									<p><?php echo $row['bu_uname'];?></p>
									<h1><?php echo $row['bu_country'];?></h1>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
				<div class="atext artist">
						<h2>&#8212; Artist Info &#8212;</h2>
				</div>
				<div id="content"> 
					<?php
					foreach ($boom_user_info as $i => $row)
					{
						?>
						<div id="tab<?php echo ($i + 1);?>" class="atext at-left" style="margin: 30px auto;">
							<p><?php echo nl2br($row['bu_info']);?></p>
							<h2>Concept of work</h2>
							<p><?php echo nl2br($row['bu_concept']);?></p>
							<div  class="btext">
								<div class="bcon2">
									<?php if($row['bu_duration'] != ''){?>
									<p>Duration &#58; <?php echo $row['bu_duration'];?></p>
									<?php }?>
									<?php if($row['bu_choreography'] != ''){?>
									<p>Choreography &#58; <?php echo $row['bu_choreography'];?></p>
									<?php }?>
									<?php if($row['bu_performance'] != ''){?>
									<p>Performance &#58; <?php echo $row['bu_performance'];?></p>
									<?php }?>
									<?php if($row['bu_technician'] != ''){?>
									<p>Technician &#58; <?php echo $row['bu_technician'];?></p>
									<?php }?>
									<?php if($row['bu_photographer'] != ''){?>
									<p>Photographer &#58; <?php echo $row['bu_photographer'];?></p>
									<?php }?>
									<a href="<?php echo $row['bu_artist_link'];?>" target="_blank"><h6>Artist Link</h6></a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
	</section>

	<section class="sec-white">
		<div class="con3wid">
			<div class="bpostlink">
					<div class="b-con" >
						<div class="nov12test">
						<a href="<?php echo $boom_list[0]['bl_buy_now'];?>" target="_blank" class="b-box bpost-box">Buy now</a>	
					</div>
				</div>
				<div class="b-con" >
					<div class="nov12test">
						<a href="<?php echo $boom_list[0]['bl_workshop'];?>" target="_blank" class=" b-box bpost-box">Workshop</a>	
					</div>
				</div>
				<div class="b-con">
					<div class="nov12test">
						<a href="#" class="b-box backToTop bpost-box"> Back to Top </a>	
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="onepage-foot">
			<div class="con1 sec-white">
				<div style="margin-top: 100px;">
					<p class="acopyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</div>
			</div>
	</section>
@endsection