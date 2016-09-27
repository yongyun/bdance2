@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/new.css')}}">
@endsection

@section('content')
	<div class="news"><h2>&#8212; News &#8212;</h2></div>

	<div class="grid">
			<div class="grid-item staffoto">
				<a href=" " title="">
					<div class="feature box-line"><img src="/img/1.jpg"></div>
					<h3>News Title</h3>
				</a>
				<h5>Admin | 9 December 2016</h5>
					<p></p>
				<p>Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec</p>
				<a href=""><div class="more">Read more</div></a>
			</div>
			<div class="grid-item staffoto">
				<a href=" " title="">
					<div class="feature box-line"><img src="/img/2.jpg"></div>
					<h3>News Title</h3>
					<h5>Admin | 9 December 2016</h5>
					<p></p>
				</a>
				<p>Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec</p>
				<a href=""><div class="more">Read more</div></a>
			</div>
			<div class="grid-item staffoto">
				<a href=" " title="">
					<div class="feature box-line"><img src="/img/3.jpg"></div>
					<h3>News Title</h3>
					<h5>Admin | 9 December 2016</h5>
					<p></p>
				</a>
				<p>Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec</p>
				<a href=""><div class="more">Read more</div></a>
			</div>
			<div class="grid-item staffoto">
				<a href=" " title="">
					<div class="feature box-line"><img src="/img/1.jpg"></div>
					<h3>News Title</h3>
					<h5>Admin | 9 December 2016</h5>
					<p></p>
				</a>
				<p>Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec</p>
				<a href=""><div class="more">Read more</div></a>
			</div>
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