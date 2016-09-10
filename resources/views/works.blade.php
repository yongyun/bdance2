

@extends('layout')

@section('custom_css')

<link rel="stylesheet" type="text/css" href="{{asset('css/project.css')}}">
<style type="text/css">
	body {
		background-color: #111;
	}
</style>

@endsection

@section('content')
	<section style="height: 125px;"></section>

	<div class="grid">
		@foreach ($works as $work)
		<?php
			$date=date_create($work->perform_date);
			$date_year = date_format($date,"Y");
		?>
			<div class="grid-item staffoto">
				<a href="/works/{{$work->id}}" title="">
					<div class="feature box-line"><img src="{{ asset($work->feature_img) }}"></div>
					<p class="text-white work_name" style="letter-spacing: 1px;">{{ $work->name}}</p>
				</a>
				<p class="text-white" style="font-size: 12px;">{{ $date_year}}</p>
			</div>	
		@endforeach
	</div>
	
	<section class="onepage-foot">
			<div class="con1">
				<footer>
					<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</footer>
			</div>
	</section>

@endsection

@section('custom_js')
<script src="{{ asset('plugins/masonry/masonry.pkgd.min.js')}}"></script>
<script>
	$('.grid').masonry({
      itemSelector: '.grid-item',
});
</script>
@endsection