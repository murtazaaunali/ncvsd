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

use App\PersonalInformation;
use App\MilitaryInformation;
use App\StatusInformation;

use App\DemoGraphic;
use App\EmergencyMedicalInfo;
use App\VolunteerOpportunities;
use App\ReleaseLiability;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class VolunteersController extends Controller
{
    //
	public function __construct(){
		if (Auth::check()) {
			
		}else{
			return redirect()->route('login');
		}
	}

	public function index(){
		/*$cols = DB::getSchemaBuilder()->getColumnListing('releaseofliability');
		foreach($cols as $col){
			echo "'releaseofliability.".$col."',";
		}exit;*/
		$years = array();
		$rec = DemoGraphic::distinct()->orderBy('attended_year','asc')->get(['attended_year']);
		if(!$rec->isEmpty()){
			foreach($rec as $getYear){
				$years[] = $getYear->attended_year;
			}
		}
		//$years = array('2010','2011','2012','2013','2014','2015','2016','2017','2018','2019');
		return view('admin.volunteers')->with(['years' => $years]);
	}
	
	public function volunteerview($id=0){
		if($id > 0){
			
			$demographic = DemoGraphic::find($id);
			$volunteer = VolunteerOpportunities::where('demographic_id',$demographic->id)->first();
			$emergency = EmergencyMedicalInfo::where('demographic_id',$demographic->id)->first();
			$release = ReleaseLiability::where('demographic_id',$demographic->id)->first();
			if(!empty($demographic)){
			$data = array(
				"firstname" 			=> $demographic->firstname,
				"middlename" 			=> $demographic->middlename,
				"lastname" 				=> $demographic->lastname,
				"phone" 				=> $demographic->phone,
				"email" 				=> $demographic->email,
				"occupation" 			=> $demographic->occupation,
				"activedutymilitary" 	=> $demographic->activedutymilitary,
				"individual_group" 		=> $demographic->individual_group,
				"group_name" 			=> $demographic->group_name,
				"group_participants" 	=> $demographic->group_participants,

				"wednesdayam" 		=> (isset($volunteer->wednesdayam) && $volunteer->wednesdayam != '' ) ? $volunteer->wednesdayam : '',
				"wednesdaypm" 		=> (isset($volunteer->wednesdaypm) && $volunteer->wednesdaypm != '' ) ? $volunteer->wednesdaypm : '',
				"thursdayam" 		=> (isset($volunteer->thursdayam) &&  $volunteer->thursdayam != '')  ? explode(',',$volunteer->thursdayam) : array(),
				"thursdaypm" 		=> (isset($volunteer->thursdaypm) &&  $volunteer->thursdaypm != '') ? explode(',',$volunteer->thursdaypm) : array(),
				"fridayam" 			=> (isset($volunteer->fridayam) &&  $volunteer->fridayam != '') ? explode(',',$volunteer->fridayam) : array(),
				"fridaypm" 			=> (isset($volunteer->fridaypm) &&  $volunteer->fridaypm != '') ? explode(',',$volunteer->fridaypm) : array(),
				"saturdayam" 		=> (isset($volunteer->saturdayam) &&  $volunteer->saturdayam != '') ? explode(',',$volunteer->saturdayam) : array(),
				"saturdaypm" 		=> (isset($volunteer->saturdaypm) &&  $volunteer->saturdaypm != '') ? explode(',',$volunteer->saturdaypm) : array(),
				"sundayam" 			=> (isset($volunteer->sundayam) &&  $volunteer->sundayam != '') ? explode(',',$volunteer->sundayam) : array(),
				"comments" 			=> (isset($volunteer->comments) &&  $volunteer->comments != '') ? $volunteer->comments : '',
				"maywecontact" 		=> isset($volunteer->maywecontact) ? $volunteer->maywecontact : '',

				"emergencycname" 		=> isset($emergency->emergencycname) ? $emergency->emergencycname : '',
				"emergencycnumber" 		=> isset($emergency->emergencycnumber) ? $emergency->emergencycnumber : '',
				"medicalinformation" 	=> isset($emergency->medicalinformation) ? $emergency->medicalinformation : '',

				"release_firstname" 	=> isset($release->release_firstname) ? $release->release_firstname : '',
				"release_lastname" 		=> isset($release->release_lastname) ? $release->release_lastname : '',
				"release_email" 		=> isset($release->release_email) ? $release->release_email : '',
				"agree" 				=> isset($release->agree) ? $release->agree : '',			
			);
			return view('admin.formdetails.volunteer',$data);
			}
		}
	}
	
	public function volunteerlist()
	{
		return Datatables::of(
			DemoGraphic::join('releaseofliability', 'releaseofliability.demographic_id', '=', 'demographic.id')
			   ->Leftjoin('volunteer_opportunities', 'volunteer_opportunities.demographic_id', '=', 'demographic.id')
			   ->Leftjoin('emergency_medicalinfo', 'emergency_medicalinfo.demographic_id', '=', 'demographic.id')
				->select(['demographic.*',DB::raw("CONCAT(demographic.firstname,' ',demographic.lastname)  AS fullname"),
				//volunteer fields
				'volunteer_opportunities.demographic_id','volunteer_opportunities.wednesdayam','volunteer_opportunities.wednesdaypm','volunteer_opportunities.thursdayam','volunteer_opportunities.thursdaypm','volunteer_opportunities.fridayam','volunteer_opportunities.fridaypm','volunteer_opportunities.saturdayam','volunteer_opportunities.saturdaypm','volunteer_opportunities.sundayam','volunteer_opportunities.sundaypm','volunteer_opportunities.comments','volunteer_opportunities.maywecontact','volunteer_opportunities.wednesday',
				'emergency_medicalinfo.emergencycname','emergency_medicalinfo.emergencycnumber','emergency_medicalinfo.medicalinformation',
				'releaseofliability.release_firstname','releaseofliability.release_lastname','releaseofliability.release_email','releaseofliability.agree','releaseofliability.address',
				])
		)
		->addColumn('action', function ($volunteer) {
		        $html = '<a href="'.url('/dashboard/volunteerview/'.$volunteer->id).'" class="btn btn-sm btn-primary waves-effect" target="_blank"><i class="fa fa-eye"></i></a>';
				$file = public_path()."/uploads/volunteers/".$volunteer->id.".pdf";
				$html .= '&nbsp;<a href="'.url('/volunteer/downloadpdf/'.$volunteer->id).'" class="btn btn-sm btn-primary waves-effect" target="_blank"><i class="fa fa-download"></i></a>';
				if(Auth::user()->user_type == 'Super Admin' || Auth::user()->user_type == 'Sub Admin'){
					$html .= '&nbsp;<a href="'.url('/dashboard/editvolunteer/'.$volunteer->id).'" class="btn btn-sm btn-primary waves-effect" target="_blank"><i class="fa fa-pencil"></i></a>';
				}
				if(Auth::user()->user_type == 'Super Admin'){
					$html .= '&nbsp;<a href="javascript:;" class="btn btn-sm btn-danger waves-effect" onclick="deletevolunteer('.$volunteer->id.')"><i class="fa fa-trash"></i></a>';
				}
		        return $html;
		})
		->addColumn('timeslot', function ($volunteer) {
		        return '';
		})
		->filterColumn('fullname', function($query, $keyword) {
			if(strpos($keyword, ' ') === false){
				$query->where(function ($query) use($keyword) {
					$query->where('demographic.firstname', 'LIKE', "%{$keyword}%")
					      ->orWhere('demographic.lastname', 'LIKE', "%{$keyword}%");
				});
			}else{
				$names = explode(" ", $keyword);
				$query->where(function ($query) use($names) {
					$query->where('demographic.firstname', 'LIKE', "%{$names[0]}%")
					      ->where('demographic.lastname', 'LIKE', "%{$names[1]}%");
				});
			}
		})
		->filterColumn('timeslot', function($query, $keyword) {
			if($keyword == 'wednesdayam'){
				$query->where('volunteer_opportunities.wednesdayam', '!=', "");
			}
			if($keyword == 'wednesdaypm'){
				$query->where('volunteer_opportunities.wednesdaypm', '!=', "");				
			}
			if($keyword == 'thursdayam'){
				$query->where('volunteer_opportunities.thursdayam', '!=', "");
			}
			if($keyword == 'thursdaypm'){
				$query->where('volunteer_opportunities.thursdaypm', '!=', "");
			}
			if($keyword == 'fridayam'){
				$query->where('volunteer_opportunities.fridayam', '!=', "");
			}
			if($keyword == 'fridaypm'){
				$query->where('volunteer_opportunities.fridaypm', '!=', "");
			}
			if($keyword == 'saturdayam'){
				$query->where('volunteer_opportunities.saturdayam', '!=', "");
			}
			if($keyword == 'saturdaypm'){
				$query->where('volunteer_opportunities.saturdaypm', '!=', "");
			}
			if($keyword == 'sundayam'){
				$query->where('volunteer_opportunities.sundayam', '!=', "");
			}
		})
		->filterColumn('activedutymilitary', function($query, $keyword) {
			$query->where('demographic.activedutymilitary', $keyword);
		})
		->filterColumn('attended_year', function($query, $keyword) {
			$query->where('demographic.attended_year', $keyword);
		})
		->make(true);
	}
	
	public function editvolunteer($id){
		if(Auth::user()->user_type != 'Super Admin' && Auth::user()->user_type != 'Sub Admin'){
			return redirect('dashboard/volunteers');
		}
		
		if($id > 0 && $id != ''){

			$volInfo = DemoGraphic::join('releaseofliability', 'releaseofliability.demographic_id', '=', 'demographic.id')
			   ->Leftjoin('volunteer_opportunities', 'volunteer_opportunities.demographic_id', '=', 'demographic.id')
			   ->Leftjoin('emergency_medicalinfo', 'emergency_medicalinfo.demographic_id', '=', 'demographic.id')
				->select(['demographic.*',DB::raw("CONCAT(demographic.firstname,' ',demographic.lastname)  AS fullname"),
				//volunteer fields
				'volunteer_opportunities.demographic_id','volunteer_opportunities.wednesdayam','volunteer_opportunities.wednesdaypm','volunteer_opportunities.thursdayam','volunteer_opportunities.thursdaypm','volunteer_opportunities.fridayam','volunteer_opportunities.fridaypm','volunteer_opportunities.saturdayam','volunteer_opportunities.saturdaypm','volunteer_opportunities.sundayam','volunteer_opportunities.sundaypm','volunteer_opportunities.comments','volunteer_opportunities.maywecontact','volunteer_opportunities.wednesday',
				'emergency_medicalinfo.emergencycname','emergency_medicalinfo.emergencycnumber','emergency_medicalinfo.medicalinformation',
				'releaseofliability.release_firstname','releaseofliability.release_lastname','releaseofliability.release_email','releaseofliability.agree','releaseofliability.address',
	    		DB::raw("demographic.id AS demo_id"),
	    		DB::raw("releaseofliability.id AS release_id"),
	    		DB::raw("`emergency_medicalinfo`.`id` AS emergency_id"),
	    		DB::raw("`volunteer_opportunities`.`id` AS vol_id"),

				])->where('demographic.id',$id)->first();

    		//echo '<pre>';print_r($volInfo);exit;
			if($volInfo){
				
				return view('admin.formdetails.volunteeredit')->with('data',$volInfo);
				
			}else{
				return redirect('dashboard');
			}
		}
			
	}
	
	public function updatevolunteer(Request $request){

        $validations = array(
        	 'profile'		=> 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100'
        );

		$validator = Validator::make($request->all(), $validations);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //Profile Update Code
        $file 		= $request->file('profile');
    	$file_name 	= "";
    	
    	if($file)
    	{
    		$volunteer_info 	= DemoGraphic::find($request->demo_id);
    		$old_logo 			= $volunteer_info->profile;        		
    		
    		if($old_logo)
    		{
    			$delete_path = public_path().'/uploads/volunteers/'.$request->demo_id.'/'.$old_logo;
    			if(file_exists($delete_path))
    			{
					unlink($delete_path);
				}
			}

			$destinationPath 	= public_path().'/uploads/volunteers/'.$request->demo_id.'/';
    		$file_name 			= $request->demo_id.'.'.$file->getClientOriginalExtension(); 
    		$file->move($destinationPath,$file_name);
    		
    		$volunteer_info->profile = $file_name;
    		$volunteer_info->save();
		}
		
		//DEMOGRAPHIC
		$demographic = DemoGraphic::find($request->demo_id);
		$demographic->firstname 			= $request->firstname;
		$demographic->middlename 			= $request->middlename;
		$demographic->lastname 				= $request->lastname;
		$demographic->phone 				= $request->cellphone;
		$demographic->email 				= $request->email;
		$demographic->occupation 			= $request->occupation;
		$demographic->activedutymilitary 	= $request->activedutymilitary;
		$demographic->individual_group 		= $request->individual_group;
		$demographic->group_name 			= $request->group_name;
		$demographic->group_participants 	= $request->group_participants;
		$demographic->attended_year 		= $request->attended_year;
		$demographic->updated_at 			= date('Y-m-d H:i:s');
		$demographic->save();
		
		//VOLUNTEER OPPORTUNITIES
		$volunteer = VolunteerOpportunities::find($request->vol_id);
		$volunteer->demographic_id 	= $demographic->id;
		$volunteer->wednesdayam 	= $request->wednesdayam;
		$volunteer->wednesdaypm 	= $request->wednesdaypm;
		$volunteer->thursdayam 		= !empty($request->thursdayam) ? implode('|',$request->thursdayam) : '';
		$volunteer->thursdaypm 		= !empty($request->thursdaypm) ? implode('|',$request->thursdaypm) : '';
		$volunteer->fridayam 		= !empty($request->fridayam) ? implode('|',$request->fridayam) : '';
		$volunteer->fridaypm 		= !empty($request->fridaypm) ? implode('|',$request->fridaypm) : '';
		$volunteer->saturdayam 		= !empty($request->saturdayam) ? implode('|',$request->saturdayam) : '';
		$volunteer->saturdaypm 		= !empty($request->saturdaypm) ? implode('|',$request->saturdaypm) : '';
		$volunteer->sundayam 		= !empty($request->sundayam) ? implode('|',$request->sundayam) : '';
		$volunteer->comments 		= $request->comments;
		$volunteer->maywecontact 	= $request->maywecontact;
		$volunteer->updated_at 		= date('Y-m-d H:i:s');
		$volunteer->save();

		//EMERGENCY MEDICAL INFO
		$emergency = EmergencyMedicalInfo::find($request->emergency_id);
		$emergency->demographic_id 		= $demographic->id;
		$emergency->emergencycname 		= $request->emergencycname;
		$emergency->emergencycnumber 	= $request->emergencynumber;
		$emergency->medicalinformation 	= $request->medicalinformation;
		$emergency->updated_at 			= date('Y-m-d H:i:s');
		$emergency->save();

		//RELEASE RELIABILITY
		$release = ReleaseLiability::find($request->release_id);
		$release->demographic_id 		= $demographic->id;
		$release->release_firstname 	= $request->release_firstname;
		$release->release_lastname 		= $request->release_lastname;
		$release->release_email 		= $request->release_email;
		$release->agree 				= $request->agree;
		$release->updated_at 			= date('Y-m-d H:i:s');
		$release->save();		

		Session::flash('success','<div class="alert alert-success">Record Updated</div>');
		return redirect('/dashboard/volunteers');

	}

	public function deletevolunteer($id){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard');
		}

		if($id){
			DemoGraphic::where("id",$id)->delete();
			VolunteerOpportunities::where("demographic_id",$id)->delete();
			EmergencyMedicalInfo::where("demographic_id",$id)->delete();
			ReleaseLiability::where("demographic_id",$id)->delete();
			
			Session::flash('success','<div class="alert alert-success">Record Deleted Successfully</div>');
			return redirect('dashboard/volunteers');
		}
	}
	
}
