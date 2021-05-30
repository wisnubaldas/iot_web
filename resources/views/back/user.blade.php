@extends('layouts.default',[
'sidebarTransparent' => true,
'sidebarSearch' => true,
'footer' => true,
])

@section('title', 'User Config')
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
						<th class="text-nowrap">Name</th>
						<th class="text-nowrap">Email</th>
						<th class="text-nowrap">Verify Date</th>
						<th width="30%" data-orderable="false"></th>
						<th width="1%" data-orderable="false"></th>
					</tr>
				</thead>
				<tbody>
					
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
	<script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		jQuery(function(){
			let datatables = $('#data-table-default').DataTable({
					// responsive: true,
					processing: true,
					serverSide: true,
					ajax: '/user',
					columns: [
							{data: 'id', name: 'id'},
							{data: 'name', name: 'name'},
							{data: 'email', name: 'email'},
							{data: 'email_verified_at', name: 'email_verified_at'},
							{data: 'roles', name: 'roles', orderable: false, searchable: false},
							{data: 'action', name: 'action',orderable: false, searchable: false}
					],
					"drawCallback": function( settings ) {
							$(".multiple-select2").select2({ placeholder: "Select a Roles" });
							$('.multiple-select2').on('select2:select', function (e) {
										var data = e.params.data.id.split('/');
													// console.log(data);
													$.ajax({
																		url: "/user/roles/asyn/"+data[0],
																		method:"POST",
																		data:{
																			id:data[0],
																			role:data[1]
																		},
																		success:function(a){
																			console.log(a)
																		},
																		error:function(a){
																			console.log(a)
																		}
														}) // ajax
											}); //endselect

							$('.multiple-select2').on('select2:unselect',function(e){
										var data = e.params.data.id.split('/');
										$.ajax({
															url: "/user/roles/remove/"+data[0],
															method:"POST",
															data:{
																id:data[0],
																role:data[1]
															},
															success:function(a){
																console.log(a)
															},
															error:function(a){
																console.log(a)
															}
											}) // ajax
								}) // end select
								$('.delete-data').on('click',function(a){
										const link = $(this).data('destroy');
										swal({
														title: 'Are you sure?',
														text: 'You will not be able to recover this imaginary data!',
														icon: 'error',
														buttons: {
															cancel: {
																text: 'Cancel',
																value: null,
																visible: true,
																className: 'btn btn-success',
																closeModal: true,
															},
															confirm: {
																text: 'Delete',
																value: true,
																visible: true,
																className: 'btn btn-danger',
																closeModal: true
															}
														}
											}).then(function(isConfirm) {
														if(isConfirm)
															{
																$.ajax({
																		url: link,
																		method:"POST",
																		success:function(a){
																			console.log(a)
																			datatables.ajax.reload();
																		},
																		error:function(a){
																			console.log(a)
																		}
																}) // ajax
															}
												}); // end swal
								}) // end delete
					} // end drawcallback
			})// end datatables
			
		}) // end jquery 

		
	</script>
@endpush