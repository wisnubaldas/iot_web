@extends('layouts.default', array_merge($tpl_option,['contentFullWidth' => true]))

@section('title', 'Profile Page')

@push('css')
	<link href="/assets/plugins/superbox/superbox.min.css" rel="stylesheet" />
	<link href="/assets/plugins/lity/dist/lity.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin profile -->
	<div class="profile">
		<div class="profile-header">
			<!-- BEGIN profile-header-cover -->
			<div class="profile-header-cover"></div>
			<!-- END profile-header-cover -->
			<!-- BEGIN profile-header-content -->
			<div class="profile-header-content">
				<!-- BEGIN profile-header-img -->
				<div class="profile-header-img">
					<img src="/assets/img/user/no_image.png" alt="">
				</div>
				<!-- END profile-header-img -->
				<!-- BEGIN profile-header-info -->
				<div class="profile-header-info">
					<h4 class="mt-0 mb-1">{{$user->name}}</h4>
					<p class="mb-2">dasdasd</p>
					<a href="/user/profile/edit/{{$user->id}}" class="btn btn-xs btn-purple">Edit Profile</a>
					<a href="/user" class="btn btn-xs btn-yellow">Back to Users</a>
				</div>
				<!-- END profile-header-info -->
			</div>
			<!-- END profile-header-content -->
			<!-- BEGIN profile-header-tab -->
			<ul class="profile-header-tab nav nav-tabs">
				<li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">POSTS</a></li>
				<li class="nav-item"><a href="#profile-about active" class="nav-link" data-toggle="tab">ABOUT</a></li>
				<li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
				<li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
				{{-- <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li> --}}
			</ul>
			<!-- END profile-header-tab -->
		</div>
	</div>
	<!-- end profile -->
	<!-- begin profile-content -->
	<div class="profile-content">
		<!-- begin tab-content -->
		<div class="tab-content p-0">
			<!-- begin #profile-post tab -->
			<x-profile.post />
			<!-- end #profile-post tab -->
			<!-- begin #profile-about tab -->
			<x-profile.about :profile="$user->profile"/>
			<!-- end #profile-about tab -->
			<!-- begin #profile-photos tab -->
			<x-profile.photos />
			<!-- end #profile-photos tab -->
			<!-- begin #profile-videos tab -->
			<x-profile.videos />
			<!-- end #profile-videos tab -->
			<!-- begin #profile-friends tab -->
			{{-- <x-profile.friends /> --}}
			<!-- end #profile-friends tab -->
		</div>
		<!-- end tab-content -->
	</div>
	<!-- end profile-content -->
@endsection

@push('scripts')
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script src="/assets/plugins/superbox/jquery.superbox.min.js"></script>
	<script src="/assets/plugins/lity/dist/lity.min.js"></script>
	<script src="/assets/js/demo/profile.demo.js"></script>
  <script>
    const user_id = "{{request()->segment(3)}}";
    console.log(user_id)
  </script>
@endpush
