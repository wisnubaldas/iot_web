<div>
    <!-- begin panel -->
	<div class="panel panel-danger">
		<div class="panel-body">
			<table id="{{$id_table}}" class="table table-striped table-bordered table-td-valign-middle">
				<thead>
					<tr>
						<th width="1%"></th>
						<th class="text-nowrap">Name</th>
						<th class="text-nowrap">Guard</th>
						<th class="text-nowrap">Create</th>
						<th width="1%"></th>
					</tr>
				</thead>
					<tbody>
							@foreach ($roles as $item)
									<tr>
										<td>{{$item->id}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->guard_name}}</td>
										<td>{{$item->created_at}}</td>
										<td><a href="/user/roles/delete/{{$id_table}}/{{$item->id}}" class="btn btn-sm btn-danger">Delete</a></td>
									</tr>
							@endforeach
					</tbody>
        </table>
		</div>
	</div>
	<!-- end panel -->
</div>