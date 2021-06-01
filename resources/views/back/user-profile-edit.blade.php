@extends('layouts.default',$tpl_option)

@section('title', 'Create User')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">User</a></li>
		<li class="breadcrumb-item active">Profile</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Create User Profile</h1>
	<!-- end page-header -->
	@dump($user)
  <div class="panel-body">
    <form>
      <div class="row form-group m-b-10">
        <label class="col-md-3 col-form-label">Valid Input</label>
        <div class="col-md-9">
          <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">@</span></div>
            <input type="text" class="form-control is-valid" />
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
      </div>
      <div class="row form-group m-b-10">
        <label class="col-md-3 col-form-label">Invalid Input</label>
        <div class="col-md-9">
          <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">@</span></div>
            <input type="text" class="form-control is-invalid" />
            <div class="invalid-feedback">Please choose a unique and valid username.</div>
          </div>
        </div>
      </div>
      <div class="row form-group m-b-30">
        <label class="col-md-3 col-form-label">Tooltip Message</label>
        <div class="col-md-9">
          <div class="row row-space-10">
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                <input type="text" class="form-control is-invalid" />
                <div class="invalid-tooltip">Please choose a unique and valid username.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                <input type="text" class="form-control is-valid" />
                <div class="valid-tooltip">Looks good!</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
    <script>
      
    </script>
@endpush