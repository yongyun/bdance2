@extends('layout')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.bxslider/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/about.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/boom.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}" />

@endsection

@section('custom_js')
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="{{ asset('plugins/film_roll/js/jquery.film_roll.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.bxslider/jquery.bxslider.min.js')}}"></script>
<script>
	$(document).ready(function() {
    $("#content").find("[id^='tab']").hide(); // Hide all content
    $("#tabs li:first").attr("id","current"); // Activate the first tab
    $("#content #tab1").fadeIn(); // Show first tab's content
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return;       
        }
        else{             
          $("#content").find("[id^='tab']").hide(); // Hide all content
          $("#tabs li").attr("id",""); //Reset id's
          $(this).parent().attr("id","current"); // Activate this
          $('#' + $(this).attr('name')).fadeIn(); // Show content for the current tab
        }
    });
});
	$(function() {
		var awardSlider = $('#awardSlider').bxSlider({	
			captions: true
		});
	});
	$('#loading-mask').delay(0).fadeOut();
	$('.backToTop').click(function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 0}, 1000);
			return false;
		});

</script>
@endsection


@section('content')
	<section id="a-slider" class="sec-slide sec-white">
			<div class="awards">
				<ul class="bxslider textwhite" id="awardSlider">
					<li><img src="/img/10.jpg"  width="100%" title="Chronology by Joeri Dubbe"></li>	
					<li><img src="/img/11.jpg" width="100%" title="Chronology by Joeri Dubbe"></li>	
					<li><img src="/img/12.jpg" width="100%" title="Chronology by Joeri Dubbe"></li>	
					<li><img src="/img/131.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/14.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/15.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/16.jpg" width="100%" title="Grandmother by Francesca Foscarini"></li>	
					<li><img src="/img/171.jpg" width="100%" title="Your by Idan Sharabi"></li>
					<li><img src="/img/181.jpg" width="100%" title="Your by Idan Sharabi"></li>
					<li><img src="/img/191.jpg" width="100%" title="Your by Idan Sharabi"></li>	
					<li><img src="/img/20.jpg" width="100%" title="THEN, BEFORE, NOW, ONCE MORE  by Antonin Comestaz"></li>	
					<li><img src="/img/21.jpg" width="100%" title="THEN, BEFORE, NOW, ONCE MORE  by Antonin Comestaz"></li>
					<li><img src="/img/22.jpg" width="100%" title="THEN, BEFORE, NOW, ONCE MORE  by Antonin Comestaz"></li>
					<li><img src="/img/23.jpg" width="100%" title="Hugin/ Munin by Po-Cheng Tsai"></li>
					<li><img src="/img/24.jpg" width="100%" title="Hugin/ Munin by Po-Cheng Tsai"></li>
					<li><img src="/img/25.jpg" width="100%" title="Hugin/ Munin by Po-Cheng Tsai"></li>
					<li><img src="/img/26.jpg" width="100%" title="Hugin/ Munin by Po-Cheng Tsai"></li>
				</ul>
			</div>
	</section>
	<div style="background:white;    text-align: center;"><img src="/img/golddown.svg" width="30px"></div>
	<section class="sec-white" >
			<div class="con1">
				<div class="atext">
						<h2>&#8212; 2016 B.OOM &#8212;</h2>
				</div>
				<div class="atext at-left">
					<p>The first edition of B.OOM will spotlight on acclaimed choreography works of international award-winning choreographers. As initiator, B.DANCE itself received two Gold and one Silver Awards at different international choreography competitions in 2015 and 2014. During these competitions, B.DANCE met many talented choreographers from all around the world. Thus, B.DANCE cordially invites those award-winning choreographers among them to present their outstanding performances as guests-performers for the first edition of B.OOM in Taiwan in 2016. 2016 B.OOM Project has the honour to present below award-winning independent choreographers from internationally acclaimed choreography competitions:
					</p>
					<div  class="btext">
						<div class="bcon2">
							<p><i class="fa fa-map" aria-hidden="true"></i>LOCATION &#58; Concert Hall of Taipei National University of the Arts
（1 Hsueh-Yuan Rd., Peitou District, Taipei 11201, Taiwan, R.O.C）</p>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i>DURATION &#58; 60mins without intermission </p>
							<p><i class="fa fa-th-large" aria-hidden="true"></i>DATE &#58;</p>
							<p>27th-28th October 2016 PM 7:30</p>
						</div>
					</div>
				</div>
			</div>
	</section>

	<section class="sec-white" >
		<div class="con1">
			<iframe src="https://player.vimeo.com/video/179031782?title=0&byline=0&portrait=0" width="1000" height="450" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</section>

	<section class="sec-white" >
		<div class="con1">
			<div class="goldline"></div>
		</div>
	</section>

	<section class="sec-white" >
			<div class="con1">
				<div class="atext">
						<h2>&#8212; Artists &#8212;</h2>
				</div>
				<div class="boomhistory artist">
					<ul id="tabs">
						<li>
							<a href="#" name="tab1">
								<img src="/img/Tsai2.jpg">
								<p>Po-Cheng Tsai</p>
								<h1>Taiwan</h1>
							</a>
						</li>
						<li>
							<a href="#" name="tab2">
								<img src="/img/IdanSharab.jpg">
								<p>Idan Sharabi</p>
								<h1>Israel</h1>
							</a>
						</li>
						<li>
							<a href="#" name="tab3">
								<img src="/img/FURIOGANZ.jpg">
								<p>Francesca Foscarini</p>
								<h1>Italy</h1>
							</a>
						</li>
						<li>
							<a href="#" name="tab4">
								<img src="/img/AntoninComestaz.jpg">
								<p>Antonin Comestaz</p>
								<h1>France</h1>
							</a>
						</li>
						<li>
							<a href="#" name="tab5">
								<img src="/img/511803.jpg">
								<p>Joeri Alexander Dubbe</p>
								<h1>Netherlands</h1>
							</a>
						</li>
					</ul>
				</div>
				<div class="atext artist">
						<h2>&#8212; Artist Info &#8212;</h2>
				</div>
				<div id="content"> 
				    <div id="tab1" class="atext at-left" style="margin: 30px auto">
				    	<p>Po-Cheng Tsai was born in Taiwan in 1987. He graduated from

Tsoying Senior High School and further studied in Taipei

National University of the Arts. He was selected to represent

Taiwan as a choreographer in the Asian Young Choreographer

Project. In 2014, Tsai founded his own company B.DANCE in

Taiwan. He also worked as guest choreographer with different professional dance companies,

including Stuttgart Gauthier Dance in Germany, Tanz Luzerner Theater in Switzerland, Cloud Gate

2 and Kaohsiung City Ballet in Taiwan.

Between 2007 and 2014 he created several choreography works for following dance company and

dance schools:

• Kaohsiung City Ballet: Record of Memories (2006), Heaven (2007), Winter (2008), Lunar

Eclipse (2010), Heart Break (2013) and Stars (2014).

• Taipei Physical Education College (TPEC): Stream (2013);

• Tsoying Senior High School (TSHS): Pulse (2009), Eclipse of Night (2011) and Aurora

(2012);

• Zhongzheng Senior High School (ZZSH): Pulse (2009) and Split (2011).
						</p>
						<h2>Concept of work</h2>
						<p>HUGIN/MUNIN</p>
						<p>In old Norse mythology there are two ravens sitting on either shoulder of Odin: Hugin and Munin,

whose names mean "thought" and "memory", respectively. Flying out over Midgard (as their world

is called), they serve as Odin's eyes and report back to him what they have seen. In the assembly

of the Gods, Odin informs about what news the ravens have brought. The choreography is an

exploration into the realms of thought and memory, investigating what they mean to us humans

and how they shape our lives.
						</p>
						<div  class="btext">
							<div class="bcon2">
								<p>Duration &#58; 10mins</p>
								<p>Choreography &#58; Po-Cheng Tsai</p>
								<p>Performance &#58; Sheng-Ho Chang & Chien-Chih Chang</p>
								<p>Technician &#58; lighting Designer/ Ting-Chung Chang</p>
								<p>Photographer &#58; Chen, Yi-Shu</p>
								<a href="http://www.bdance.com.tw/about" target="_blank"><h6>Artist Link</h6></a>
							</div>
						</div>
				    </div>
				    <div id="tab2" class="atext at-left" style="margin: 30px auto">
				    	<p>Idan Sharabi was born in Israel, 1984. He graduated Thelma Yellin and The Juilliard School before he

danced in Netherlands Dans Theater and Batsheva Dance Company. He was chosen to create for NDT

Upcoming Choreographers 10′ and has won The Zeraspe Award 06′, Copenhagen International

Choreography Competition 2012 & 2014, The Mahol Shalem International Competition 13′, and The

Hannover International Choreography Competition 2014.

Idan received the PAIS grant for performances of existing shows in 2015 for Interviews/Makom, Minister of

Culture Prize for Best Performance of 2015, Balletmester Albert Gaubiers og Poul Waldorffs Fond

scholarship in Denmark, and received Dododotan Best Performance 2014 for "We Men" as a performer.

In 2012, Sharabi founded his group, Idan Sharabi &Dancers, in September 2012 . Since then, he has

created several works for the group which were invited to festivals in Sweden, Denmark, Canada, Italy,

Holland, Russia & Israel. Throughout the years, Sharabi has been teaching and creating with students/young

dancers in schools & companies such as Contemporary Dance School Hamburg, Gothenburg Ballet

Academy, Alvin Ailey School, The Italian Dance Alliance, Springboard Dance Montreal, The Maslool Dance

Program and more.

His 2014/15 residencies included companies such as DDT, Royal Danish Ballet, Ballet Chilleno, NDT II. In

2016 Sharabi will premiere an original work in March with Ballet Luzern and June with Artez, and in

September as a guest choreographer for the McKnight Foundation.
						</p>
						<h2>Concept of work</h2>
						<p>YOURS</p>
						<p>For the past seven years I have been exploring the concept of “Home” in my choreographic work. I interviewed people

about it, asking what home meant to them and wether they felt at home at that moment. All interviews interpreted home

as different things, creating opportunities to discuss broad concepts such as origin, identity, society, body and more. It

became clear to me that people perceived themselves as the reflection of their homes; their language, family,

occupation, possession, injuries, love, etc. Eventually, when starting my creation process, I interviewed my dancer as

well. I felt the need to create a ground on which we could build a new home for both of us, mentally. Then, I found it

within the music and the movement in the moment. The original title of the work was “Ours” referring to the work as

our opportunity to find our home together, while sharing with the audience. However, In the last year, I have gone

through a process from which I have come to learn, that this home is not only ours, and it actually didn’t matter to me

whose it was. I decided to add only one more letter to the original title, and that way to dedicate it to the spectator. Now

it's no longer ours, but it’s yours. Enjoy.
						</p>
						<div  class="btext">
							<div class="bcon2">
								<p>Duration &#58; 22mins</p>
								<p>Choreography &#58; Idan Sharabi</p>
								 <p>Performance &#58; Idan Sharabi & Eyal Dadon</p>
								<p>Technician &#58; Compose by Joni Mitchell & Recordings by I. Sharabi</p>
								<p>Photographer &#58; Tami Weiss.</p>
								<a href="http://www.idansharabi.com/" target="_blank"><h6>Artist Link</h6></a>
							</div>
						</div>
				    </div>
				    <div id="tab3" class="atext at-left" style="margin: 30px auto">
				    	<p>Versatile independent choreographer and dancer. Her personal career was marked by the encounter with

quite important masters of the national and international dance scene, with whom she had the opportunity to

research on the languages of contemporary dance and improvisation, thus enriching and internalizing her

language both in terms of expression and of performance.

She started her own professional experience with Aldes Roberto Castello (2000-2003) in the creations

Biosculture and Il migliore dei mondi possibili, Ubu Award 2003. Her training as a dancer has been enriched

by many projects promoted by CSC Casa della Danza Operaestate Festival_Bassano del Grappa (IT),

during which she studied with: Emio Greco/Accademia Mobile (NL), Yasmeen Godder and Iris Erez (IL),

Nigel Charnock (UK), Gitta Wigro (UK), Lucy Cash (UK), Robert Clark (UK) and so on. She recently won the

prize as Dancer of Year on the Contemporary Scene (43th edition Positano Premia La Danza Léonide

Massine 2015).She is the winner of the Equilibrio Award 2013 for Performer (Premio Equilibrio, Rome): the

jury, chaired by Sidi Larbi Cherkaoui. She won the jury prize of the 17th edition of the MASDANZA, The

International Contemporary Dance Festival of the Canary Islands, Spain in 2012. then selected by

Aerowaves, Dance Across Europe 2012.
						</p>
						<h2>Concept of work</h2>
						<p>GRANDMOTHER</p>
						<p>A body letting go of the past, The urgency of being present in the here and now, Never knowing what will happen next, Moving by the rhythm of breath, memories, and light conquering darkness.
						</p>
						<div  class="btext">
							<div class="bcon2">
								<p>Duration &#58; 12mins</p>
								<p>Choreography & Performance &#58; Francesca Foscarini</p>
								<p>Technician &#58; concept Sara Wiktorowicz & lighting Designer Sara Wiktorowicz & Technician Luca Serafini</p>
								<p>Photographer &#58; Sara Wiktorowicz</p>
								<a href="http://www.francescafoscarini.it/index.php" target="_blank"><h6>Artist Link</h6></a>
							</div>
						</div>
				    </div>
				    <div id="tab4" class="atext at-left" style="margin: 30px auto">
				    	<p>Antonin Comestaz graduated from the Paris Opera Ballet School in 1999 and went on to

dance with the Paris Opera Ballet, the Hamburg Ballet, Tanz Theater München, Ballet Mainz

and Scapino Ballet. He has worked with renowned choreographers, such as John Neumeier,

Marco Goecke, Rui Horta, Carolin Carlson, Ed Wubbe and Jacopo Godani, among others.

His choreographic career has been forged by a desire to explore and redefine boundaries in

dance, and his works have received numerous awards and have been showcased in festivals

around the world. He has composed music for numerous choreographic works and is also an

illustrator and film-maker. His works often revel in the absurd & darkly comic expressions of

everyday life and humanity, using his playful, quirky and highly engaging choreographic

style.
						</p>
						<h2>Concept of work</h2>
						<p>THEN, BEFORE, NOW, ONCE MORE</p>
						<p>The universe seems to play by the rule of constant change. Nothing remains. Everything transform. Life and death, day

and night, seasons... What is now isn't what it was then, nor before, but may occur again. Nature lets us witness these

patterns in everything, including feelings. How do we cope with this fact when we seek eternity?
						</p>
						<div  class="btext">
							<div class="bcon2">
								<p>Duration &#58; 11mins</p>
								<p>Choreography & Performance &#58; Antonin Comestaz</p>
								<p>Performance &#58; Carolina Mancuso, Miguel Oliveira</p>
								<p>Photographer &#58; Antonin Comestaz &

Inbal Cohen Hamo</p>
								<a href="http://www.antonincomestaz.com/" target="_blank"><h6>Artist Link</h6></a>
							</div>
						</div>
				    </div>
				    <div id="tab5" class="atext at-left" style="margin: 30px auto">
				    	<p>Joeri Alexander Dubbe was born in Haarlem, The Netherlands. Joeri danced at the Dutch National Ballet,

Nederlands Dans Theater 2 and as a freelance dancer for Kenzo Kusada and events such as Julidans and

Sensation White. In 2009 he was commissioned by Korzo and made several performances like Prospect

Future (2009), Chrono (2012), Solaris (2014) and Kitsune (2014).

In 2011 he won the prize of the Nederlandse Dansdagen and made the dance installation Point Cloud, which

is still highly sought after for festivals. In 2014 his choreography Trigger-Happy (CaDance 2013, Up &

Coming Choreographers) won the Scapino Production Award during the international choreographers

concours in Hannover, Germany. Following this award Joeri is making a new piece for the Scapino Ballet

Rotterdam which will premiere during TWOOLS 17 in June 2015.
						</p>
						<h2>Concept of work</h2>
						<p>ENFANT</p>
						<p>One of the most prominent choreographic talents from the Netherlands is Joeri Dubbe. He won the Dutch Dance Days

Prize in 2011, the prestigious BNG Bank Prize for New Theatre Makers, and the Scapino Production Prize in 2014. In

2015, Dubbe created the solo performance Enfant, specially for dancer Sarah Murphy. With this solo they won the first

prize four times at the Internationales Solo-Tanz-Theater Festival in Stuttgart: for best piece, best choreography, best

performer (Sarah Murphy) and the video dance prize. In Enfant they explore the purity of our inner child. The

uninhibited way a child is looking at the world offers an enchanting perspective on the way we have arranged our lives.

How do we recover what we lose in becoming adults? Is there still a place in our modern day pace of living to embrace

the purity of the child within us?
						</p>
						<div  class="btext">
							<div class="bcon2">
								<p>Duration &#58; 13mins</p>
								<p>Choreography &#58; Joeri Alexander Dubbe</p>
								<p>Performance  &#58; Sarah Murphy</p>
								<p>Technician &#58; Costume Carlijn Petermeijer</p>
								<p>Photographer &#58; Joris Jan Bos</p>
								<a href="http://www.joeridubbe.com" target="_blank"><h6>Artist Link</h6></a>
							</div>
						</div>
				    </div>
				</div>
				
			</div>
	</section>

	<section class="sec-white">
		<div class="con2wid">
			<div class="bpostlink">
				<div class="b-con" >
					<a href="http://www.artsticket.com.tw/CKSCC2005/cart/cart00/ShowMap.aspx?PerformanceId=8JNfZ4VZd5RtUOxQvA62L9sMP56NfMHuHdHl3VWIPt4" target="_blank" class="b-box bpost-box">Buy now</a>	
				</div>
				<div class="b-con" >
					<a href="http://www.accupass.com/event/register/1609201817241808410365#apjs-leftmenu" target="_blank" class="b-box bpost-box">Workshop</a>	
				</div>
				<div class="b-con">
					<a href="#" class="b-box backToTop bpost-box"> Back to Top </a>	
				</div>
			</div>
		</div>
	</section>

	<section class="onepage-foot">
			<div class="con1">
				<div style="margin-top: 150px;">
					<p class="copyright">Copyright &copy; 2016 B.DANCE . All rights reserved.</p>
				</div>
			</div>
	</section>
@endsection