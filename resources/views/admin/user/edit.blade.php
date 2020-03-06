@extends('layouts.admin')
@section('content')
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg">
		        <div class="card-body p-0">
					<div class="row">
						<div class="col">
							<div class="card">
							  <div class="card-header">
							    Update User
							  </div>
							  <div class="card-body">
							    <form method="post" action="{{route('admin.user.update')}}" enctype="multipart/form-data">
							    	@csrf
							    	<input type="hidden" name="id" value="{{$data->id}}">
								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Full Name</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="full_name" name="full_name" value="{{$data->full_name}}">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">User Name</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="user_name" name="user_name" value="{{$data->name}}">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Email</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="user_email" name="user_email" value="{{$data->email}}">
								    </div>
								  </div>
								  
								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Contact No</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="contact_num" name="contact_num" value="{{$data->contact_num}}">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">User Role</label>
								    <div class="col-sm-8 ">
								      <select class="form-control" name="role_id">
								      	 <option>Select Role</option>
								      	@foreach($allRole as $role)
										  <option value="{{$role->role_id}}" @if($data->role_id == $role->role_id) selected @endif>{{$role->role_name}}</option>
										  @endforeach
										</select>

								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Profile Picture</label>
								    <div class="col-sm-8 ">
								      <input type="file" id="user_image" name="user_image">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label"></label>
								    <div class="col-sm-8 ">
								      	<img src="{{asset('uploads/'.$data->user_image)}}" height="50px;">
								    </div>
								  </div>

								  

								  <div class="form-group row">
								  	<label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label"></label>
								    <div class="col-sm-8 ">
								      <button type="submit" name="add_user" class="btn btn-primary">Update User</button>
								    </div>
								  </div>
								</form>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>       	
@endsection

