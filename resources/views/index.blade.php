<!-- @extends('layout')-->
@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css')}}" />
@endsection

@section('content')
<section id="slider"><!--slider-->
	<div id="component" class="component component-fullwidth " >
		<ul class="itemwrap">
			<?php
			foreach($video as $i => $row)
			{
				?>
				<li class="<?php if($i == 0) echo 'current';?>">
					<video class="film" playsinline autoplay muted id="bgvid">
						<source src="<?php echo $row['iv_data'];?>" type="video/mp4">
					</video>
				</li>
				<?php
			}

			foreach($images as $i => $row)
			{
				?>
				<li class="<?php if($i == 0 && count($video) == 0) echo 'current';?>">
					<img src="<?php echo $row['iv_data'];?>" alt="img<?php echo $i;?>"/>
				</li>
				<?php
			}
			?>
		</ul>
		<nav>
			<a class="prev" href="#"><img class="prevIcn" src="{{ asset('img/prevIcn.svg')}}"></a>
			<a class="next" href="#"><img class="nextIcn" src="{{ asset('img/nextIcn.svg')}}"></a>
		</nav>
	</div>
</section>
@endsection

@section('footer')
<footer>
	<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
</footer>
@endsection

@section('custom_js')
<script src="{{ asset('js/main.js')}}"></script>
<script>		
	$('#loading-mask').delay(2000).fadeOut();
	document.getElementById('bgvid').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        $('.nextIcn').trigger('click');
    }
</script>
@endsection
