@extends('layouts.default',$tpl_option)

@section('title', 'Roles Access')
@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />

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
        <span class="d-sm-none">SRC</span>
        <span class="d-sm-block d-none">Sync Roles Access</span>
      </a>
    </li>
  </ul>
  <!-- end nav-pills -->
  <!-- begin tab-content -->
  <div class="tab-content p-15 rounded bg-white mb-4">
    <!-- begin tab-pane -->
    <div class="tab-pane fade active show" id="nav-pills-tab-1">
        <!-- roles komponent -->
        <div class="row">
          <div class="col-4">
            <form action="/user/roles/create" method="POST">
              @csrf
              <x-form.input label="Create Roles" type="text" name="roles" id="roles"/>
							<button class="btn btn-green btn-block" type="submit">
                Create Roles
              </button>
            </form>
            <form action="/user/roles/create" method="POST">
              @csrf
              <x-form.input label="Create Access" type="text" name="access" id="access"/>
							<button class="btn btn-success btn-block" type="submit">
                Create Access
              </button>
            </form>
          </div>
          <div class="col-8">
            <x-roles-access :roles="$roles" idtable="role-tbl"/>
            <x-roles-access :roles="$access" idtable="access-tbl"/>
          </div>
        </div>
    </div>
    <!-- end tab-pane -->
    <!-- begin tab-pane -->
    <div class="tab-pane fade" id="nav-pills-tab-2">
      <div class="panel panel-inverse" data-sortable-id="ui-widget-1">
        <div class="panel-heading">
          <h4 class="panel-title">Sync Roles to Permission</h4>
        </div>
        <div class="panel-body">
          <x-sync-role-access :roles="$roles" :access="$access"/>
        </div>
      </div>
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
	<script src="/assets/plugins/select2/dist/js/select2.min.js"></script>

  <script>
    jQuery(function(){

      $('#role-tbl').DataTable({
          responsive: true
      });
      $('#access-tbl').DataTable({
          responsive: true
      });
      $('#data-sync').DataTable({
          // responsive: true
      });
      $(".multiple-select2").select2({ placeholder: "Select a state" });
      $('.multiple-select2').on('select2:select', function (e) {
          var data = e.params.data;
          // console.log(data);
          $.ajax({
                    url: "/user/roles/syn_permission",
                    method:"GET",
                    data:{
                      id:data.id
                    },
                    success:function(a){
                      console.log(a)
                    },
                    error:function(a){
                      console.log(a)
                    }
            })
      });
      $('.multiple-select2').on('select2:unselect',function(e){
          var data = e.params.data;
          $.ajax({
                    url: "/user/roles/revoke_permission",
                    method:"GET",
                    data:{
                      id:data.id
                    },
                    success:function(a){
                      console.log(a)
                    },
                    error:function(a){
                      console.log(a)
                    }
            })
      })

    }) // end jquery
  </script>
@endpush
