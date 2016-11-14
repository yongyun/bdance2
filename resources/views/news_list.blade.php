@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/new.css')}}">
@endsection

@section('content')
	<div class="news"><h2>&#8212; News &#8212;</h2></div>

	<div class="grid">
		@foreach ($news_list as $n_list)
			<div class="grid-item staffoto">
				<a href="/news/{{ $n_list->nw_id}}" title="{{$n_list->nw_title}}">
					<div class="feature box-line"><img src="{{ $n_list->nw_synopsis_image}}"></div>
					<h3>{{$n_list->nw_title}}</h3>
					<h5>
						{{$n_list->nw_user}} | 
						<?php
							echo date('d M Y',strtotime($n_list->nw_date));
						?>
					</h5>
					<p></p>
				</a>
				<p>{{$n_list->nw_synopsis}}</p>
				<a href="/news/{{ $n_list->nw_id}}"><div class="more">Read more</div></a>
			</div>
		@endforeach
	</div>

@endsection

@section('custom_js')
<script src="{{ asset('plugins/masonry/masonry.pkgd.min.js')}}"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script>
	var $grid = $('.grid').masonry({
      itemSelector: '.grid-item',
	});
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry('layout');
	  $('#loading-mask').fadeOut();
	});
</script>
@endsection