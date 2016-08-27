@extends('layout')

@section('custom_css')

<link rel="stylesheet" type="text/css" href="{{asset('css/project.css')}}">
<style type="text/css">
	body {
		background-color: #000;
	}
</style>

@endsection

@section('content')
	<section style="height: 125px;"></section>

	<div class="grid">
		@foreach ($works as $work)
			<div class="grid-item">
				<div class="feature"><img src="{{ asset($work->feature_img) }}"></div>
				<p class="text-white"><a href="/works/{{$work->id}}" title="">{{ $work->name}}</a></p>
				<p class="text-white">{{ $work->perform_date}}</p>
			</div>	
		@endforeach
	</div>
	

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