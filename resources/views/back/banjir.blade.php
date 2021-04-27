@extends('layouts.default',[
  'sidebarTransparent' => true,
  'sidebarSearch' => true,
  'footer' => true,
])

@section('title', 'Banjir')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
		<li class="breadcrumb-item active">Banjir</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Monitoring Banjir <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	<!-- begin panel -->
  <div class="row">
    <div class="col-8">
      <div class="panel panel-inverse" data-sortable-id="flot-chart-4">
        <div class="panel-heading">
          <h4 class="panel-title">Grafik Debit Air</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="panel-body">
          <div id="live-updated-chart" class="height-sm"></div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="panel panel-success" data-sortable-id="flot-chart-5">
        <div class="panel-heading">
          <h4 class="panel-title">Indikator Bahaya Banjir</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="panel-body">
          <div class="indikator">
              
          </div>
        </div>
      </div>
    </div>
  </div>
	<!-- end panel -->
@endsection
@push('scripts')
	<script src="/assets/plugins/flot/jquery.flot.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.time.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.resize.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.pie.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.stack.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.crosshair.js"></script>
	<script src="/assets/plugins/flot/jquery.flot.categories.js"></script>
  <script>
    $(document).ready(function() {
      Chart.init();
    });
  </script>
@endpush