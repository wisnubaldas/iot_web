@extends('layouts.default',[
'sidebarTransparent' => true,
'sidebarSearch' => true,
'footer' => true,
])

@section('title', 'User Config')
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
	<h1 class="page-header">User Config <small>header small text goes here...</small></h1>
	<!-- end page-header -->
	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">Grid User</h4>
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
						<th width="1%" data-orderable="false"></th>
						<th class="text-nowrap">Name</th>
						<th class="text-nowrap">Email</th>
						<th class="text-nowrap">Verify Date</th>
						<th width="1%" data-orderable="false"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $item)
						<tr class="{{$loop->index%2 == 0?'odd':'even'}}">
							<td width="1%" class="f-s-600 text-inverse">{{$item->id}}</td>
							<td width="1%" class="with-img"><img src="/assets/img/user/user-1.jpg" class="img-rounded height-30" /></td>
							<td>{{$item->name}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->email_verified_at}}</td>
							<td>
								<div class="btn-group ">
									<button class="btn btn-xs btn-pink">Delete</button>
									<button class="btn btn-xs btn-purple">Edit</button>
								</div>
							</td>
						</tr>
					@endforeach
        </tbody>
      </table>
		</div>
	</div>
	<!-- end panel -->
@endsection

@push('scripts')
	<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="/assets/js/demo/table-manage-default.demo.js"></script>
@endpush