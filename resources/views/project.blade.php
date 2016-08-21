@extends('layout')

@section('content')
	<section style="height: auto;">
		<div style="margin-bottom: 60px;">
			<h2 style="font-weight: bold; margin-bottom: 30px;">Basic Information</h2>
			<p>{{ $project->name}}</p>
			<p>{{ $project->intro}}</p>
			<p>{{ $project->description}}</p>
			<p>{{ $project->video_url}}</p>
			<p>{{ $project->perform_date}}</p>
		</div>
		
	</section>

	<section style="height: auto;">
		<div>
			<h2 style="font-weight: bold; margin-bottom: 30px;">Reviews</h2>
			@foreach ($reviews as $review)
				<div style="margin-bottom: 30px;">
					<p>{{ $review->content}}</p>
					<p>{{ $review->reviewer}}</p>
				</div>
			@endforeach
		</div>	
	</section>

	<section style="height: auto; margin-bottom: 50px">
		<div>
			<h2 style="font-weight: bold; margin-bottom: 30px;">Project Photos</h2>
			@foreach ($images as $image)
				<img src="{{ asset($image->url)}}" alt="" style="width: 250px; display: inline-block">
			@endforeach
		</div>	
	</section>

	<section style="height: auto; margin-bottom: 50px">
		<div>
			<h2 style="font-weight: bold; margin-bottom: 30px;">Main Stuff</h2>
			@foreach ($main_stuff as $stuff)
				<div style="width: 250px; display: inline-block">
					<div>
						<img src="{{ asset($stuff->photo)}}" alt="" style="width: 250px;">
					</div>
					<p>{{$stuff->name}}</p>
					<p>{{$stuff->role}}</p>
				</div>
				
			@endforeach
		</div>	
	</section>

	<section style="height: auto;">
		<div>
			<h2 style="font-weight: bold; margin-bottom: 30px;">Stuff</h2>
			@foreach ($other_stuff as $stuff)
				<p>{{ $stuff->name}} - {{$stuff->role}}</p>
			@endforeach
		</div>	
	</section>
	
@endsection