<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>North County Veteran Stand Down Volunteer Sign-Up</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.structure.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/gsdk-bootstrap-wizard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <!-- SCRIPTS -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/prettify.js') }}"></script>    
    <script src="{{ asset('assets/js/common.js') }}"></script>    
    
    <!-- FORM VALIDATION -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	
	{!! analytics() !!}
	
</head>
<!-- HEADER SECTION -->
<div class="header_bg">
    <div class="nav_main">
	<div class="logo_main">
		<a href="{{ env('WORDPRESS_URL') }}" class="logo_anc">
			<img src="{{ asset('assets/images/header-logo.png') }}">
		</a>
		<div class="menu_bar">
			<a href="#">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="main_nav">
	<!--	<ul>
			<li><a href="{{ env('WORDPRESS_URL') }}"><span>HOME</span></a></li>
			<li><a href="{{ env('WORDPRESS_URL') }}our-mission/"><span>ABOUT US</span></a>
            <li><a href="#"><span>OUR SERVICES</span></a></li>
			<li><a href="#"><span>REGISTRATION</span></a></li>
			<li><a href="{{ env('WORDPRESS_URL') }}contact/"><span>CONTACT US</span></a></li>
			
		</ul> -->
		<ul class="main_parent">
			<li><a href="{{ env('WORDPRESS_URL') }}"><span>Home</span></a></li>
			<li class="sub-parent"><a href="#"><span>Stand Down 2019</span></a>
				<span class="trigger_menu"></span>
				<ul class="sub-menu">
					<li><a href="{{ env('WORDPRESS_URL') }}the-stand-down-event/"><span>The Event</span></a></li>
					<li><a href="{{ env('WORDPRESS_URL') }}stand-down-map/"><span>Map</span></a></li>
					<li><a href="{{ url('veteran-registration') }}"><span>Attend as Guest</span></a></li>
				</ul>
			</li>
			<li class="sub-parent"><a href="{{ env('WORDPRESS_URL') }}/gallery/"><span>Gallery</span></a>
			<span class="trigger_menu"></span>
			<ul class="sub-menu">
				<li><a href="{{ env('WORDPRESS_URL') }}gallery/2018-2/"><span>2018</span></a></li>
				<li><a href="{{ env('WORDPRESS_URL') }}gallery/2017-2/"><span>2017</span></a></li>
			</ul>
			</li>
			<li class="sub-parent"><a href="#"><span>About</span></a>
			<span class="trigger_menu"></span>
			<ul class="sub-menu">
				<li><a href="{{ env('WORDPRESS_URL') }}our-story/"><span>Our Story</span></a></li>
				<li><a href="{{ env('WORDPRESS_URL') }}our-staff/"><span>Our Staff</span></a></li>
				<li><a href="{{ env('WORDPRESS_URL') }}volunteer/"><span>Volunteer</span></a></li>
			</ul>
			</li>
			<li><a href="{{ env('WORDPRESS_URL') }}sponsors/"><span>Sponsors</span></a></li>
			<li><a href="{{ env('WORDPRESS_URL') }}donations/"><span>Donate</span></a></li>
			<li><a href="{{ env('WORDPRESS_URL') }}contact/"><span>Contact</span></a></li>
		</ul>
	</div>
	<div class="clearboth"></div>
</div>
</div>
	<!-- HEADER SECTION -->
	<!--<section>
		<div class="bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 logo">
					<img src="assets/images/logo.jpg">
				</div>
				<div class="col-md-9">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="mynav">
					<div class="menu">
							<ul class="right">
								<li><a href="{{ env('WORDPRESS_URL') }}">HOME</a></li>
								<li><a href="{{ env('WORDPRESS_URL') }}our-mission/">ABOUT US</a></li>
								<li><a href="#">OUR SERVICES</a></li>
								<li><a href="#">REGISTRATION</a></li>
								<li><a href="{{ env('WORDPRESS_URL') }}contact/">CONTACT US</a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
				</div>
			</div>
			</div>
		</div>
	</section>-->
	<script>
		$(document).ready(function(){
			$('.menu_bar a').click(function(){
				$('.main_parent').slideToggle();
			}); 
			
			$('span.trigger_menu').click(function(){
				$('.sub-menu').slideUp();
				if ($(this).siblings('.sub-menu').is(':visible')){
					$(this).siblings('.sub-menu').slideUp();
				}else{
					$(this).siblings('.sub-menu').slideDown();	
				}
				
			});
		});
	</script>
<body>