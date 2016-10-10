@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/new.css')}}">
@endsection

@section('content')
<section>
	<div>
		<h2>Weiwuying Arts Festival</h2>
	</div>
	
</section>
	
@endsection

@section('custom_js')
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript">
	$('#loading-mask').delay(0).fadeOut();
</script>
@endsection