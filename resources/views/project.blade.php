@extends('layout')

@section('custom_css')

<link rel="stylesheet" type="text/css" href="{{asset('css/project.css')}}">

@endsection

@section('content')
	<section style="height: 125px; background-color:#dcdcdc;"></section>

	<section class="sec-norm">
		<div class="conwidth">
			<h1>{{ $project->name}}</h1>
			<p>{{ $project->intro}}</p>
			<p>&#8212; 2014 &#8212;</p>
		</div>
	</section>

	<section class="sec-img">
		<div>
			@foreach ($images as $image)
				<img src="{{ asset($image->url)}}" alt="">
			@endforeach
		</div>	
	</section>

	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Information &#8212;</h2>
			<p class="text-lft">{{ $project->description}}</p>
		</div>
	</section>

	<section>
		<div>
			<iframe width="70%" height="450px" src="//{{ $project->video_url}}?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</section>

	<section class="sec-norm underline">
			<h2>&#8212; Reviews &#8212;</h2>
			@foreach ($reviews as $review)
				<div class="conwidth" style="margin-bottom: 70px;">
					<p class="text-lft">{{ $review->content}}</p>
					<h4>&#8212; {{ $project->perform_date}} {{ $review->reviewer}}</h4>
				</div>
			@endforeach
	</section>

	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Main Staff &#8212;</h2>
			@foreach ($main_stuff as $stuff)
				<div style="width: 200px; display: inline-block">
					<div class="staffoto">
						<img src="{{ asset($stuff->photo)}}" alt="">
					</div>
					<h3>{{$stuff->name}}</h3>
					<p>{{$stuff->role}}</p>
				</div>
			@endforeach
		</div>	
	</section>

	<section class="sec-norm">
		<div class="conwidth">
			<h2>&#8212; Staff &#8212;</h2>
			@foreach ($other_stuff as $stuff)
				<p>{{ $stuff->name}} - {{$stuff->role}}</p>
			@endforeach
			<p>Tommy Lin - Assistant / Tommy Lin - Assistant / Tommy Lin - Assistant</p>
		</div>	
	</section>

	<section class="sec-norm">
		<div class="proj-btm"><a href="/works"><p>&#8212; All Works &#8212;</p></a></div>
		<div class="proj-btm"><a href=""><p>&#8212; Back to Top &#8212;</p></a></div>
	</section>

	<section class="onepage-foot">
			<div class="con1">
				<footer>
					<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</footer>
			</div>
	</section>
@endsection
@section('footer')

@endsection