<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserRole;
use Image;
use Carbon\Carbon;
use Session;
use DB;

class UserController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }
    // 
    public function create(){
    	$allRole=UserRole::get();
    	return view('admin.user.add',compact('allRole'));
    }
    //create
    public function store(Request $request){
    	

    	if($request->password == $request->password_confirmation){
	    	$insert=User::insertGetId([
	    		'name' => $request['user_name'],
	    		'full_name' => $request['full_name'],
	    		'email' => $request['user_email'],
	    		'contact_num' => $request['contact_num'],
	    		'role_id' => $request['role_id'],
	    		'password'=>Hash::make($request['password']),
	    		'user_image' => '',
	    		'created_at'=>Carbon::now()->toDatetimeString()

	    	]);	

	    	if($request->has('user_image')){
	    		$image=$request->file('user_image');

	            $imageName='img_'.$insert.time().'.'.$image->getClientOriginalExtension();
	            Image::make($image)->resize(640,400)->save('uploads/'.$imageName);

	            User::where('id',$insert)->update([
	                'user_image'=>$imageName,
	            ]);

	    	}
	    	if($insert){
	            $notification=array(
	                'messege'=>'User created successfully',
	                'alert-type'=>'success'
	            );
	            return Redirect()->route('admin.user.all')->with($notification);
	         }else{
	            $notification=array(
		            'messege'=>'User creation failed',
		            'alert-type'=>'error'
	            );
	            return Redirect()->back()->with($notification);
	         }
    	}else{
    		$notification=array(
		            'messege'=>'Password does not match. ',
		            'alert-type'=>'warning'
	            );
	            return Redirect()->back()->with($notification);
    	}

    	
    }


    public function allUser(){
    	$allUser = DB::table('users')
            ->join('user_roles', 'users.role_id', '=', 'user_roles.role_id')
            ->select('users.*', 'user_roles.role_name')
            ->OrderBy('users.id','DESC')
            ->where('users.is_delete',0)
            ->get();
    	// $allUser=User::OrderBy('id','DESC')->get();
    	return view('admin.user.all',compact('allUser'));
    }

    public function delete($id){
    	//$delete = User::where('id',$id)->delete();
    	$delete = User::where('id',$id)->update([
    		'is_delete' => '1',
    		'updated_at'=> Carbon::now()->toDatetimeString(),

    	]);
    	
    	if($delete){
            $notification=array(
                'messege'=>'User deleted successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
         }else{
            $notification=array(
	            'messege'=>'Delete failed',
	            'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }

    public function edit($id){
    	//$delete = User::where('id',$id)->delete();
    	$allRole=UserRole::get();
    	$data = User::where('id',$id)->first();
    	return view('admin.user.edit',compact('data','allRole'));
    }

    public function update(Request $request){
    	$id = $request['id'];
    	$update = User::where('id',$id)->update([
    		'name' => $request['user_name'],
    		'full_name' => $request['full_name'],
    		'email' => $request['user_email'],
    		'contact_num' => $request['contact_num'],
    		'role_id' => $request['role_id'],
    		'updated_at'=>Carbon::now()->toDatetimeString()

    	]);

    	if($request->has('user_image')){
    		$image=$request->file('user_image');

            $imageName='img_'.$update.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(640,400)->save('uploads/'.$imageName);

            User::where('id',$id)->update([
                'user_image'=>$imageName,
            ]);

    	}
    	
    	if($update){
            $notification=array(
                'messege'=>'User updated successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
         }else{
            $notification=array(
	            'messege'=>'User update failed',
	            'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }
}

