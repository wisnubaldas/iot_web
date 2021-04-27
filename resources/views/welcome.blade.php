<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>IoT Web Apps | Portal Seputar Project IoT </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/css/one-page-parallax/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body data-spy="scroll" data-target="#header" data-offset="51">
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		@include('front.paralax.header')
		@include('front.paralax.home')
		@include('front.paralax.about')
		@include('front.paralax.milestone')
		@include('front.paralax.team')
		@include('front.paralax.quote')
		@include('front.paralax.service')
		@include('front.paralax.action-box')
		@include('front.paralax.work')
		@include('front.paralax.client')
		@include('front.paralax.pricing')
		@include('front.paralax.contact')
		@include('front.paralax.footer')
		@include('front.paralax.panel')
	</div>
	<!-- end #page-container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="/js/one-page-parallax/app.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>