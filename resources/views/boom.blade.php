@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="css/boom.css">
@endsection

@section('custom_js')
<script type="text/javascript">
	$('#loading-mask').delay(0).fadeOut();
</script>
@endsection

@section('content')

@endsection

@section('footer')
<footer>
	<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
</footer>
@endsection
