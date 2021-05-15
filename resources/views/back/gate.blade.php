@extends('layouts.default',[
  'sidebarTransparent' => true,
  'sidebarSearch' => true,
  // 'footer' => true,
  'sidebarHide' => true,
])

@section('title', 'Gate')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
		<li class="breadcrumb-item active">Gate</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Monitoring Gate <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	<!-- begin panel -->
  <div class="row">
    
    <div class="col-8">
      <div class="panel panel-inverse" data-sortable-id="flot-chart-4">
        <div class="panel-heading">
          <h4 class="panel-title">List Data Pengunjung</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="panel-body">
          <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
              <tr>
                <th width="1%"></th>
                <th class="text-nowrap">Station</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Date</th>
                <th class="text-nowrap">Time</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="widget widget-stats bg-orange">
        <div class="stats-icon"><i class="fa fa-users"></i></div>
        <div class="stats-info">
          <h4>VISITORS IN</h4>
          <p>1,291,922</p>	
        </div>
        <div class="stats-link">
          <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
      <div class="widget widget-stats bg-green">
        <div class="stats-icon"><i class="fa fa-users"></i></div>
        <div class="stats-info">
          <h4>VISITORS OUT</h4>
          <p>1,291,922</p>	
        </div>
        <div class="stats-link">
          <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
	<!-- end panel -->
@endsection
@push('scripts')
  <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.time.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.resize.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.pie.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.stack.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.crosshair.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.categories.js"></script>
  <script>
    $(function() {
      var table = $('#data-table-default').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/gate',
            columns: [
                {data: 0, name: 'id'},
                {data: 1, name: 'station'},
                {data: 2, name: 'status'},
                {data: 3, name: 'date'},
                {data: 4, name: 'time'}
            ]
        });
        setInterval( function () {
            table.ajax.reload( null, false ); // user paging is not reset on reload
        }, 30000 );
    });
    $(document).ready(function() {
      Chart.init();
    });
  </script>
@endpush
@push('css')
	<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
@endpush