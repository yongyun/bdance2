@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="css/contact.css">
@endsection

@section('custom_js')
<script type="text/javascript">
	$("#conslide > div:gt(0)").hide();

	setInterval(function() { 
	  $('#conslide > div:first')
	    .fadeOut(5000)
	    .next()
	    .fadeIn(5000)
	    .end()
	    .appendTo('#conslide');
	},  6000);

	$('#loading-mask').delay(0).fadeOut();
</script>
@endsection

@section('content')
<div class="container">
				<div class="panel panel-default" style="margin:0 auto;width:500px">
					<div class="panel-heading">
					</div>
					<div class="panel-body">
						<form name="contactform" method="post" action="/sendMail" class="form-horizontal" role="form">
							<div class="form-group">
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputName" name="name" placeholder="Your Name">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputEmail" name="email" placeholder="Your Email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-10">
									<textarea class="form-control" rows="4" id="inputMessage" name="message" placeholder="Your message..."></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="submit" class="btn btn-default">
										Send Message
									</button>
								</div>
							</div>
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						</form>
						<div class="or"><p>or</p></div>
						
						<div class="admin-info">
							<p><i class="fa fa-user" aria-hidden="true"></i>Manager - Administration : Tzu-Yin Hsu</p>
							<p><i class="fa fa-phone" aria-hidden="true"></i>Tel. : +886972-353-955</p>
							<p><a href="mailto:bdance20143@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>Mail : bdance20143&#64;gmail.com</a></p>
						</div>
						<div class="admin-info">
							<p>International Developments</p>
							<p><i class="fa fa-user" aria-hidden="true"></i>AxE Arts Management/ Hsin-Yi Chang</p>
							<p><i class="fa fa-phone" aria-hidden="true"></i>Tel. : +49(0)176 3921 3041</p>
							<p><i class="fa fa-phone" aria-hidden="true"></i>Tel. : +33 6 59 95 15 40</p>
							<p><a href="mailto:axe.artco@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>Mail : axe.artco&#64;gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
	<!-- conslide -->
	<div id="conslide">
	   <div class="imgfit">
	     <img  src="img/3.jpg" alt="img03"/>
	   </div>
	   <div class="imgfit">
	     <img src="img/4.jpg" alt="img04"/>
	   </div>
	   <div class="imgfit">
	     <img src="img/5.jpg" alt="img05"/>
	   </div>
	</div>
@endsection

@section('footer')
<footer>
	<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
</footer>
@endsection
