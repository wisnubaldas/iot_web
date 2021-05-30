@extends('layouts.default',
    array_merge($tpl_option,['sidebarSearch' => 'false','sidebarHide' => true,])
)

@section('title', 'User Profile')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="/home">Home</a></li>
		<li class="breadcrumb-item"><a href="/user">User</a></li>
		<li class="breadcrumb-item active">Profile</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Create User Profile</h1>
	<!-- end page-header -->
	<!-- begin panel -->
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4 class="panel-title">User Profile</h4>
      <div class="btn-group">
        <a href="/user" class="btn btn-yellow btn-xs"><i class="fas fa-users"></i> Back</a>
      </div>
		</div>
		<div class="panel-body">
      @dump($profile)
		</div>
    <!-- end panel body -->
	</div>
	<!-- end panel -->
@endsection

@push('scripts')
    
@endpush