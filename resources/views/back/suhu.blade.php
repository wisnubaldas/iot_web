@extends('layouts.default',[
  'sidebarTransparent' => true,
  'sidebarSearch' => true,
  'footer' => true,
])

@section('title', 'Suhu')
@push('css')
	<link href="/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
@endpush
@section('content')
<!-- begin row -->
<div class="row row-space-10 m-b-20">
	<!-- begin col-4 -->
	<div class="col-lg-3 col-sm-4">
		<div class="widget widget-stats bg-gradient-teal m-b-10">
			<div class="stats-icon stats-icon-lg"><i class="fas fa-tachometer-alt fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">TODAY'S VISITS</div>
				<div class="stats-number">7,842,900</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 70.1%;"></div>
				</div>
				<div class="stats-desc">Better than last week (70.1%)</div>
			</div>
		</div>
	</div>
	<!-- end col-4 -->
	<!-- begin col-4 -->
	<div class="col-lg-3 col-sm-4">
		<div class="widget widget-stats bg-gradient-blue m-b-10">
			<div class="stats-icon stats-icon-lg"><i class="fas fa-tachometer-alt fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">TODAY'S PROFIT</div>
				<div class="stats-number">180,200</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 40.5%;"></div>
				</div>
				<div class="stats-desc">Better than last week (40.5%)</div>
			</div>
		</div>
	</div>
	<!-- end col-4 -->
	<!-- begin col-4 -->
	<div class="col-lg-3 col-sm-4">
		<div class="widget widget-stats bg-gradient-purple m-b-10">
			<div class="stats-icon stats-icon-lg"><i class="fas fa-tachometer-alt fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">NEW ORDERS</div>
				<div class="stats-number">38,900</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 76.3%;"></div>
				</div>
				<div class="stats-desc">Better than last week (76.3%)</div>
			</div>
		</div>
	</div>
	<!-- end col-4 -->
	<!-- begin col-4 -->
	<div class="col-lg-3 col-sm-4">
		<div class="widget widget-stats bg-gradient-black m-b-10">
			<div class="stats-icon stats-icon-lg"><i class="fas fa-tachometer-alt fa-fw"></i></div>
			<div class="stats-content">
				<div class="stats-title">NEW COMMENTS</div>
				<div class="stats-number">3,988</div>
				<div class="stats-progress progress">
					<div class="progress-bar" style="width: 54.9%;"></div>
				</div>
				<div class="stats-desc">Better than last week (54.9%)</div>
			</div>
		</div>
	</div>
	<!-- end col-4 -->
</div>
<!-- end row -->	
    <!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Bar Chart</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<div id="nv-bar-chart" class="height-sm"></div>
				</div>
			</div>
			<!-- end panel -->
@endsection
@push('scripts')
	<script src="/assets/plugins/d3/d3.min.js"></script>
	<script src="/assets/plugins/nvd3/build/nv.d3.js"></script>
	<script>
		$(document).ready(function() {
			ChartNvd3.init();
		});
	</script>
@endpush