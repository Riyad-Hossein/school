@extends('layouts.admin')
@section('content')
	<div class="row justify-content-center">
		<div class="col-xl-11 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg">
		        <div class="card-body p-0">
					<div class="row">
						<div class="col">
							<div class="card">
							  <div class="card-header">
							    Add User
							  </div>
							  <div class="card-body">
							    <div class="table-responsive">
								    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
								       
								        <div class="row">
								            <div class="col-sm-12">
								                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
								               
								                    <thead>
								                        <tr>
								                            <th rowspan="1" colspan="1">Full Name</th>
								                            <th rowspan="1" colspan="1">User Name</th>
								                            <th rowspan="1" colspan="1">Email</th>
								                            <th rowspan="1" colspan="1">Contact</th>
								                            <th rowspan="1" colspan="1">Role</th>
								                            <th rowspan="1" colspan="1">Image</th>
								                            <th rowspan="1" colspan="1">Action</th>
								                        </tr>
								                    </thead>
								                    <tbody>
								                    	@foreach ($allUser as $data)
									                        <tr role="row" >
									                            <td class="sorting_1">{{$data->full_name}}</td>
									                            <td class="sorting_1">{{$data->name}}</td>
									                            <td>{{$data->email}}</td>
									                            <td>{{$data->contact_num}}</td>
									                            <td>{{$data->role_name}}</td>
									                            <td>
									                            	<img src="{{asset('uploads/'.$data->user_image)}}" height="25px">
									                            </td>
									                            <td>
									                            	<a class="btn btn-primary" href="{{url('admin/user/edit/'.$data->id)}}">Edit</a>
									                            	<a id="delete" class="btn btn-danger" href="{{url('admin/user/delete/'.$data->id)}}">Delete</a>
									                            </td>
									                        </tr>
								                    	@endforeach
								                    </tbody>
								                </table>
								            </div>
								        </div>
								       
								    </div>
								</div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>       	
@endsection

