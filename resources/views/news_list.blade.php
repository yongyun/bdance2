@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/new.css')}}">
@endsection

@section('content')
	<div class="news"><h2>&#8212; News &#8212;</h2></div>

	<div class="grid">
		@foreach ($news_list as $n_list)
			<div class="grid-item staffoto">
				<a href="/news/{{ $n_list->nw_id}}" title="">
					<div class="feature box-line">
						<?php
						//600 * 600
						echo $date = $n_list->nw_synopsis_image;
						?>
					</div>
					<h3>{{$n_list->nw_title}}</h3>
				</a>
				<h5>
					{{$n_list->nw_user}} | 
					<?php
						echo date('d M Y',strtotime($n_list->nw_date));
					?>
				</h5>
					<p></p>
				<p>{{$n_list->nw_synopsis}}</p>
				<div class="more"><a href="/news/{{ $n_list->nw_id}}">Read more</a></div>
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