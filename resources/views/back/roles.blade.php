@extends('layouts.default',[
'sidebarTransparent' => true,
'sidebarSearch' => true,
'footer' => true,
])

@section('title', 'Roles Access')
@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">User</a></li>
		<li class="breadcrumb-item active">Config</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">RA <small>Roles and Access Configuration</small></h1>
	<!-- end page-header -->
  <!-- begin nav-pills -->
  <ul class="nav nav-pills mb-2">
    <li class="nav-item">
      <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">
        <span class="d-sm-none">RA</span>
        <span class="d-sm-block d-none">Roles Access</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
        <span class="d-sm-none">CR</span>
        <span class="d-sm-block d-none">Create Roles</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#nav-pills-tab-3" data-toggle="tab" class="nav-link">
        <span class="d-sm-none">CA</span>
        <span class="d-sm-block d-none">Create Access</span>
      </a>
    </li>
  </ul>
  <!-- end nav-pills -->
  <!-- begin tab-content -->
  <div class="tab-content p-15 rounded bg-white mb-4">
    <!-- begin tab-pane -->
    <div class="tab-pane fade active show" id="nav-pills-tab-1">
      <h3 class="m-t-10">Roles Access</h3>
      <x-roles-access />
    </div>
    <!-- end tab-pane -->
    <!-- begin tab-pane -->
    <div class="tab-pane fade" id="nav-pills-tab-2">
      <h3 class="m-t-10">Created Roles</h3>
      <x-create-roles />
    </div>
    <!-- end tab-pane -->
    <!-- begin tab-pane -->
    <div class="tab-pane fade" id="nav-pills-tab-3">
      <h3 class="m-t-10">Create Access</h3>
      <x-create-access />
    </div>
    <!-- end tab-pane -->
  </div>
  <!-- end tab-content -->
	
@endsection

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/js/demo/table-manage-default.demo.js"></script>
@endpush