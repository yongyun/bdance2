@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/about.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/new.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/lightbox.min.css')}}">
@endsection

@section('content')
<section>
	<div class="new-con new-first-con">
		<div class="new-info">
			<h2><?php echo $news_list[0]['nw_title'];?></h2>
			<h6><?php echo date('M d, Y',strtotime($news_list[0]['nw_date']));?></h6>
		</div>
	    <p><?php echo $news_list[0]['nw_top_content'];?></p>
	</div>
</section>
<!-- Slieshow -->

<section id="a-slider">
	<div class="awards sec-white new-con2">
		<ul class="bxslider textwhite" id="awardSlider">
			@foreach ($news_ad as $row)
				<li><img src="/upload/news/{{$row->na_image}}"  width="100%" title="{{$row->na_description}}"></li>					
			@endforeach
		</ul>
	</div>
</section>
<!-- Slieshow End-->
</br></br>
<section>
	<div class="new-con">
		<div>
	      <a class="example-image-link" href="/img/1.jpg" data-lightbox="example-1"><img class="example-image" src="/img/1.jpg" alt="image-1" /></a>
	    </div>
		<?php echo $news_list[0]['nw_content'];?>
		<?php
		foreach ($news_video as $row)
		{
			if($row['nv_type'] == 2)
			{
				$array_str = explode('/',$row['nv_link']);
				?>
				 <iframe src="https://player.vimeo.com/video/<?php echo $array_str[count($array_str) - 1];?>?title=0&byline=0&portrait=0" width="1000" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<?php
			}
			else
			{
			}
		}
		?>
			 
			 
		<p> <?php echo $news_list[0]['nw_link'];?></p>
	</div>

</section>
		
<section class="sec-white">
	<div class="proj-btm"><a href="/news"><p>&#8212; News List &#8212;</p></a></div>
	<div class="proj-btm" style=" margin-top: 100px;"><a href="#" class="backToTop"><p>&#8212; Back to Top &#8212;</p></a></div>
	<div class="proj-btm"><a href="/news/<?php if($news_nt[0]['nw_id'] == ''){ echo $news_pr[0]['nw_id'];}else{ echo $news_nt[0]['nw_id'];}?>"><p>&#8212; Next News &#8212;</p></a></div>
</section>

<section class="onepage-foot">
	<div class="con1">
		<div style="margin-top: 150px;">
			<p class="acopyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
		</div>
	</div>
</section>

@endsection

@section('custom_js')
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('plugins/lightbox2-master/js/lightbox-plus-jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript">
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