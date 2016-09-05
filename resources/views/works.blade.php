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
			<div class="grid-item staffoto">
				<a href="/works/{{$work->id}}" title="">
					<div class="feature box-line"><img src="{{ asset($work->feature_img) }}"></div>
					<br>
					<p class="text-white" style="letter-spacing: 1px;">{{ $work->name}}</p>
				</a>
				<p class="text-white" style="font-size: 12px;">{{ $work->perform_date}}</p>
				<br>
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
      columnWidth: 350,
      gutter: 10
});
</script>
@endsection