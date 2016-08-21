@extends('layout')

@section('content')
	@foreach ($works as $work)
	<div style="margin-top:150px;">
		<p> <a href="/works/{{$work->id}}" title="">{{ $work->name}}</a></p>
		<p>{{ $work->intro}}</p>
		<p>{{ $work->description}}</p>
		<p>{{ $work->video_url}}</p>
		<p>{{ $work->perform_date}}</p>
	</div>	
	@endforeach
@endsection