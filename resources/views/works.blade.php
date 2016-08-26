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

	<section class="grid">
	@foreach ($works as $work)
	<div class="feature">
		<div class="grid-item grid-item--width2"><img src="{{ asset($work->feature_img) }}"></div>
		<p class="text-white"><a href="/works/{{$work->id}}" title="">{{ $work->name}}</a></p>
		<p class="text-white">{{ $work->perform_date}}</p>
	</div>	
	</section>
	@endforeach

@endsection