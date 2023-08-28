<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Redirect;
use URL;
use Auth;
use Hash;
use Session;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use RedirectResponse;

use App\User;


use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class UsersConrtoller extends Controller
{
    //
	public function __construct(){
		if (Auth::check()) {
			
		}else{
			return redirect()->route('login');
		}
	}
	public function index(){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard');
		}
		return view('admin.users');
	}
	
	public function userslist()
	{
		return Datatables::of(
			User::select(['users.*','users.name as fullname', DB::raw("DATE_FORMAT(created_at, '%d %b %Y') as signup_on")  ])
		)
		->addColumn('action', function ($user) {
		         $btns = '<a href="'.route('edituser',['id' => $user->id]).'" class="btn btn-sm btn-primary waves-effect"><i class="fa fa-pencil"></i></a> ';
		         $btns .= '<a href="javascript:;" class="btn btn-sm btn-danger waves-effect" onclick="deleteuser('.$user->id.')"><i class="fa fa-trash"></i></a>';
		         return $btns;
		})
		->addColumn('singup_from', function ($user) {
		         return $user->created_at;
		})
		->addColumn('singup_to', function ($user) {
		         return $user->created_at;
		})
		->addColumn('user_type', function ($user) {
		         return $user->user_type;
		})
		->filterColumn('fullname', function($query, $keyword) {
			$query->where(function ($query) use($keyword) {
				$query->where('users.name', 'LIKE', "%{$keyword}%");
			});
		})
		->filterColumn('singup_from', function($query, $keyword) {
			$query->where('users.created_at', '>=', date("Y-m-d 00:00:01",strtotime($keyword)));
		})
		->filterColumn('singup_to', function($query, $keyword) {
			$query->where('users.created_at', '<=', date("Y-m-d 23:59:59",strtotime($keyword)));
		})
		->make(true);
	}
	
	public function adduser(){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard');
		}
		return view('admin.userform');
	}
	
	public function edituser($id){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard/userslist');
		}
		$user = User::find($id);
		if($user != "")
		{
			return view('admin.userformedit',['user'=>$user]);
		}
		else
		{
			return redirect('dashboard/userslist')->with('errormessage', 'Something went wrong!');
		}
	}
	
	public function createuser(Request $request){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard/userslist');
		}

        $messages = [
            "name.required" => "Full Name is required",
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 6 characters"
        ];

        $validator = Validator::make($request->all(), [
            'name' 			=> 'required|string|max:255',
            'email' 		=> 'required|string|email|max:255|unique:users',
            'password' 		=> 'required|string|min:6|confirmed',
			'usertype' 			=> 'required',
            'profile'		=> 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100'
        ], $messages);

		if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user = new User(); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
		$user->user_type = $request->usertype;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
		//echo "<pre>";print_r($request->all()); echo "</pre>";
        //exit;
		$user->save();
        
        $file 		= $request->file('profile');
    	$file_name 	= "";
    	
    	if($file)
    	{
    		
    		$company_info 		= User::find($user->id);
    		$old_logo 			= $company_info->profile;        		
    		
    		if($old_logo)
    		{
    			$delete_path = public_path().'/uploads/users/'.$user->id.'/'.$old_logo;
    			if(file_exists($delete_path))
    			{
					unlink($delete_path);
				}
			}

			$destinationPath 	= public_path().'/uploads/users/'.$user->id.'/';
    		$file_name 			= $user->id.'.'.$file->getClientOriginalExtension(); 
    		$file->move($destinationPath,$file_name);
    		
    		$company_info->profile = $file_name;
    		$company_info->save();
		}
        
        return redirect('dashboard/userslist')->with('message', 'User Added Successfully!');
	}
	
	public function updateuser(Request $request){

        $messages = [
            "name.required" => "Full Name is required",
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
            "password.required" => "New Password is required",
            "password.min" => "New Password must be at least 6 characters"
        ];
        
        $user = User::find($request->user_id);
        
        $validations = array(
        	 'name' 			=> 'required|string|max:255',
			 'usertype' 			=> 'required',
        	 'profile'		=> 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100'
        );
        
        if($user->email != $request->email)
        {
        	$validations['email'] = 'required|string|email|max:255|unique:users';
		}
		
		if($request->password != "" || $request->password_confirmation != "")
        {
        	$validations['password'] = 'string|min:6|confirmed';
		}
		
		
		$validator = Validator::make($request->all(), $validations, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user->name = $request->name;
        
        $user->email = $request->email;
        
        if($request->password)$user->password = bcrypt($request->password);
        $user->user_type = $request->usertype;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        
        $file 		= $request->file('profile');
    	$file_name 	= "";
    	
    	if($file)
    	{
    		
    		$company_info 		= User::find($user->id);
    		$old_logo 			= $company_info->profile;        		
    		
    		if($old_logo)
    		{
    			$delete_path = public_path().'/uploads/users/'.$user->id.'/'.$old_logo;
    			if(file_exists($delete_path))
    			{
					unlink($delete_path);
				}
			}

			$destinationPath 	= public_path().'/uploads/users/'.$user->id.'/';
    		$file_name 			= $user->id.'.'.$file->getClientOriginalExtension(); 
    		$file->move($destinationPath,$file_name);
    		
    		$company_info->profile = $file_name;
    		$company_info->save();
		}
        
        return redirect('dashboard/userslist')->with('message', 'User Updated Succssfully!');
	}
	
	public function deleteuser($id){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard');
		}

		if($id){
			User::where("id",$id)->delete();
			Session::flash('success','<div class="alert alert-success">User Deleted Successfully</div>');
			return redirect('dashboard/userslist');
		}
	}
}
