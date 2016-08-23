@extends('layout')

@section('custom_css')

<link rel="stylesheet" type="text/css" href="{{asset('css/project.css')}}">

@endsection

@section('content')
	@foreach ($works as $work)
	<div class="feature">
		<div><img src="img/project1.jpg"></div>
		<p><a href="/works/{{$work->id}}" title="">{{ $work->name}}</a></p>
		<p>{{ $work->intro}}</p>
		<p>{{ $work->perform_date}}</p>
	</div>	
	@endforeach
@endsection