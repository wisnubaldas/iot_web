@extends('layouts.default',$tpl_option)

@section('title', 'Create User')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">User</a></li>
		<li class="breadcrumb-item active">Create</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Create User </h1>
	<!-- end page-header -->
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">Form User</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
      <form action="/user/create" method="POST" class="margin-bottom-0" id="frm-user">
        @csrf
        <label class="control-label">Name <span class="text-danger">*</span></label>
        <div class="row row-space-10">
          <div class="col-md-6 m-b-15">
            <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First name" required />
            @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
          @enderror
          </div>
          <div class="col-md-6 m-b-15">
            <input id="last_name" name="last_name" value="{{ old('last_name') }}" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" required />
            @error('last_name')
              <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <label class="control-label">Email <span class="text-danger">*</span></label>
        <div class="row m-b-15">
          <div class="col-md-12">
            <input id="email" name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required />
                @error('email')
                  <div class="invalid-tooltip">{{ $message }}</div>
                @enderror
          </div>
        </div>
        <label class="control-label">Password <span class="text-danger">*</span></label>
        <div class="row m-b-15">
          <div class="col-md-12">
            <input id="password" name="password"  type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
              @error('password')
                  <div class="invalid-tooltip">{{ $message }}</div>
              @enderror
          </div>
        </div>
        <div class="register-buttons">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
        </div>
        <div class="m-t-30 m-b-30 p-b-30">
          Already a member? Click <a href="login_v3.html">here</a> to login.
        </div>
      </form>
		</div>
	</div>
	<!-- end panel -->
@endsection

@push('scripts')
    <script>
      let user;
      @isset($user)
        user = @json($user);
      @endisset
      if(user)
      {
        const btnBack = `<a href="/user" class="btn btn-yellow btn-block btn-lg">Back</a>`;
        jQuery(function(){
            $('#name').val(user.name)
            $('#last_name').val(user.name)
            $('#email').val(user.email)
            $('#frm-user').attr('action','/user/update/'+user.id)
            $('.register-buttons').append(btnBack)
        })
      }
    </script>
@endpush