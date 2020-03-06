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
							    Add User
							  </div>
							  <div class="card-body">
							    <form method="post" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
							    	@csrf
								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Full Name</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Type Name">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">User Name</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="user_name" name="user_name"  placeholder="Type Username">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Email</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Type Email">
								    </div>
								  </div>
								  
								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Contact No</label>
								    <div class="col-sm-8 ">
								      <input type="text" class="form-control" id="contact_num" name="contact_num" placeholder="Type Contact No">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">User Role</label>
								    <div class="col-sm-8 ">
								      <select class="form-control" name="role_id">
								      	 <option>Select Role</option>
								      	@foreach($allRole as $role)
										  <option value="{{$role->role_id}}">{{$role->role_name}}</option>
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
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Password</label>
								    <div class="col-sm-8 ">
								      <input type="password" class="form-control" id="password" name="password" placeholder="Type Password">
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label">Confirm Password</label>
								    <div class="col-sm-8 ">
								      <input type="password" class="form-control" id="confirm_pass" name="password_confirmation" placeholder="Confirm Password">
								    </div>
								  </div>

								  <div class="form-group row">
								  	<label for="inputEmail3" class="col-sm-2 offset-sm-1 col-form-label"></label>
								    <div class="col-sm-8 ">
								      <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
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

