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
			<h2>Weiwuying Arts Festival</h2>
			<h6>November 15, 2016</h6>
		</div>
	    <p>Chemistry invites award-winning choreographers around the world

			come to show-off in Taiwan! Their works promise to reshape our

			conceptions of contemporary dance.
		</p>
	</div>
</section>
<!-- Slieshow -->

<section id="a-slider">
	<div class="awards sec-white new-con2">
		<ul class="bxslider textwhite" id="awardSlider">
			<li><img src="/img/10.jpg"  width="100%" title="ENFANT by Joeri Alexander Dubbe"></li>					
		</ul>
	</div>
</section>
<!-- Slieshow End-->
<section>
	<div class="new-con">
		<div>
	      <a class="example-image-link" href="/img/1.jpg" data-lightbox="example-1"><img class="example-image" src="/img/1.jpg" alt="image-1" /></a>
	    </div>

	    <p>Taiwan Dance Platform will be held at Weiwuying between November

		11-13th this year. Choreographers, professionals, educators and dance

		lovers from around the world will gather together to talk about the

		developments of dance in Asia. Taiwan Dance Platform's program will

		include performances, open talks, and workshops etc. Please check for

		updates on our website.
		</p>
		<p>link <a href="http://waf.org.tw/en/programs/program_5/">http://waf.org.tw/en/programs/program_5/</a></p>
		<p>台北市藝術創作者工會在靜慮 2.0 進行了第一次國際專題藝術工作者採訪 。 表演藝術類邀請到屢獲國際大獎的 B.DANCE 丞舞製作團隊 : 青年編舞家蔡博丞 Benson Tsai 與舞團經理 Kelly Hsu 分享他們近期的國際創作表與工作經驗以下分享這個傑出舞團的資歷與 10 月的購票資訊 ~ 歡迎愛好藝文展演的朋友們多多支持超越國界的潮流驅動者。</p>
		 <iframe src="https://player.vimeo.com/video/179031782?title=0&byline=0&portrait=0" width="1000" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

		<p> 10 月關渡藝術節 B.OOM by B.DANCE ( 票券 )<a href="http://www.artsticket.com.tw/CKSCC2005/cart/cart00/ShowMap.aspx?performanceid=8JNfZ4VZd5RtUOxQvA62L9sMP56NfMHuHdHl3VWIPt4"> 售票連結</a></p>
		<p>11 月衛武營藝術祭台灣舞蹈平台 ( 已售罄 )</p>
		<a href=""><h6># BOOMbyBDANCE</h6></a>
	</div>

</section>
		
<section class="sec-white">
	<div class="proj-btm"><a href="/news"><p>&#8212; News List &#8212;</p></a></div>
	<div class="proj-btm" style=" margin-top: 100px;"><a href="#" class="backToTop"><p>&#8212; Back to Top &#8212;</p></a></div>
	<div class="proj-btm"><a href="#"><p>&#8212; Next News &#8212;</p></a></div>
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