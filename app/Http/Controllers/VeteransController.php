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

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;


class VeteransController extends Controller
{
    //
	public function __construct(){
		if (Auth::check()) {
			
		}else{
			return redirect()->route('login');
		}
	}
	public function index(){
		$years = array();
		$rec = PersonalInformation::distinct()->orderBy('attended_year','asc')->get(['attended_year']);
		if(!$rec->isEmpty()){
			foreach($rec as $getYear){
				$years[] = $getYear->attended_year;
			}
		}
		return view('admin.index')->with(['years' => $years]);
		
	}
	
	public function veteranview($id=0){
		if($id > 0){
			$personainfo = PersonalInformation::find($id);
			
			$milatiryinfo = MilitaryInformation::where('information_id',$personainfo->id)->first();
			//echo '<pre>';print_r($milatiryinfo);exit;
			
			$statusinfo = StatusInformation::where('information_id',$personainfo->id)->first();
			//echo '<pre>';print_r($statusinfo);exit;
			if(!empty($personainfo)){
			$data = array(
				"firstname" 				=> $personainfo->firstname,
				"middlename" 				=> $personainfo->middlename,
				"lastname" 					=> $personainfo->lastname,
				"social_security_number" 	=> $personainfo->serialsecurity,
				"license" 					=> $personainfo->drivers_license,
				"dob" 						=> $personainfo->dateofbirth,
				"birth_city" 				=> $personainfo->birthcity,
				"birth_state" 				=> $personainfo->stateofbirth,
				"gender" 					=> $personainfo->gender,
				"dependent_fullname" 		=> $personainfo->dependent_fullname,
				"dependent_relationship"	=> $personainfo->dependent_relationship,
				"dependent_age" 			=> $personainfo->dependent_age,
				"dependent_gender" 			=> $personainfo->dependent_gender,

				"dependent_fullname2" 		=> $personainfo->dependent_fullname2,
				"dependent_relationship2"	=> $personainfo->dependent_relationship2,
				"dependent_age2" 			=> $personainfo->dependent_age2,
				"dependent_gender2" 		=> $personainfo->dependent_gender2,

				"dependent_fullname3" 		=> $personainfo->dependent_fullname3,
				"dependent_relationship3"	=> $personainfo->dependent_relationship3,
				"dependent_age3" 			=> $personainfo->dependent_age3,
				"dependent_gender3" 		=> $personainfo->dependent_gender3,

				"cell_number" 				=> $personainfo->cell,
				"email_address" 			=> $personainfo->email,
				"cell_number" 				=> $personainfo->cellnumber,
				"email_address" 			=> $personainfo->email,

				"serve_war_zone" 			=> isset($milatiryinfo->warzone) ? $milatiryinfo->warzone : '',
				/*"unit_mos" 					=> isset($milatiryinfo->mos) ? $milatiryinfo->mos : '',*/
				"serve" 					=> (isset($milatiryinfo->serve) && $milatiryinfo->serve != '') ? explode(',',$milatiryinfo->serve) : array() ,
				"branchservice" 			=> (isset($milatiryinfo->branchservice) && $milatiryinfo->branchservice != '') ? explode(',',$milatiryinfo->branchservice) : array() ,
				"datefrom" 					=> isset($milatiryinfo->dateservedfrom) ? $milatiryinfo->dateservedfrom : '',
				"dateto" 					=> isset($milatiryinfo->dateservedto) ? $milatiryinfo->dateservedto : '',

				"emh" 						=> isset($statusinfo->emh) ? $statusinfo->emh : '',
				"groupname" 				=> isset($statusinfo->groupname) ? $statusinfo->groupname : '',
				"answer" 					=> isset($statusinfo->organization_answer) ? $statusinfo->organization_answer : '',
				'reqsupport' 				=> isset($statusinfo->situation) ? $statusinfo->situation : '',
				"health_problems" 			=> (isset($statusinfo->health_problems) && $statusinfo->health_problems) ? explode(',',$statusinfo->health_problems) : array(),
				"health_problem_answer" 	=> isset($statusinfo->health_problem_answer) ? $statusinfo->health_problem_answer : '',
				"legal_issues" 				=> isset($statusinfo->legal_issues) ? $statusinfo->legal_issues : '',
				"court" 					=> isset($statusinfo->court) ? $statusinfo->court : '',
				"child_support" 			=> isset($statusinfo->countydcss) ? $statusinfo->countydcss : '' ,

				"homeless_court" 				=> isset($statusinfo->homeless_court) ? $statusinfo->homeless_court : '' ,
				"spouse_ticktet_warrants" 		=> isset($statusinfo->spouse_ticktet_warrants) ? $statusinfo->spouse_ticktet_warrants : '',
				"outstanding_warrants" 			=> isset($statusinfo->outstanding_warrants) ? $statusinfo->outstanding_warrants : '',
				"namelocation_warrant" 			=> isset($statusinfo->namelocation_warrant) ? $statusinfo->namelocation_warrant : '',
				"criminalminor" 				=> isset($statusinfo->criminalminor) ? $statusinfo->criminalminor : '',
				"anycriminal" 					=> isset($statusinfo->anycriminal) ? $statusinfo->anycriminal : '',
				"brief_information" 			=> isset($statusinfo->brief_information) ? $statusinfo->brief_information : '',
				"homeless_child_support_dcss" 	=> isset($statusinfo->homeless_child_support_dcss) ? $statusinfo->homeless_child_support_dcss : '',
				"homeless_child_support_case" 	=> isset($statusinfo->homeless_child_support_case) ? $statusinfo->homeless_child_support_case : '',

				"spouse" 					=> isset($statusinfo->partner_attending) ? $statusinfo->partner_attending : '',
				"spouse_partner" 			=> isset($statusinfo->partner_name) ? $statusinfo->partner_name : '',
				"dependants" 				=> isset($statusinfo->underage_children) ? $statusinfo->underage_children : '',
				"name" 						=> isset($statusinfo->children_name) ? $statusinfo->children_name : '',
				"petanswer" 				=> isset($statusinfo->petanswer) ? $statusinfo->petanswer : '',
				"pet" 						=> isset($statusinfo->pet) ? $statusinfo->pet : '',
				"pet_other" 				=> isset($statusinfo->pet_other) ? $statusinfo->pet_other : '',
				"pet_quantity" 				=> isset($statusinfo->pet_quantity) ? $statusinfo->pet_quantity : '',
				"pet_breed" 				=> isset($statusinfo->pet_breed) ? $statusinfo->pet_breed : '',
				"specialneeds" 				=> isset($statusinfo->wheelchair) ? $statusinfo->wheelchair : '',
				"pickuplocation" 			=> isset($statusinfo->pickuplocation) ? $statusinfo->pickuplocation : '',
				"pickuplocation_other" 		=> isset($statusinfo->pickuplocation_other) ? $statusinfo->pickuplocation_other : '',
				"transport" 				=> isset($statusinfo->vehicle) ? $statusinfo->vehicle : '',
				"emergencycname" 			=> isset($statusinfo->emergencycname) ? $statusinfo->emergencycname : '',
				"emergencycphone" 			=> isset($statusinfo->emergencycphone) ? $statusinfo->emergencycphone : '',
				"sexoffense" 				=> isset($statusinfo->sexoffense) ? $statusinfo->sexoffense : '',
				"electronic_signature" 		=> isset($statusinfo->electronic_signature) ? $statusinfo->electronic_signature : '',
	    	);
	    	
	    	//echo '<pre>';print_r($data);exit;
	    	return view('admin.formdetails.veteran',$data);
	    	}
		}
	}
	
	public function veteranlist()
	{

		return Datatables::of(
			PersonalInformation::Leftjoin('miltary_information', 'miltary_information.information_id', '=', 'personal_information.id')
			->Leftjoin('status-information','status-information.information_id','=','personal_information.id')
    		->select(['personal_information.*',DB::raw("CONCAT(personal_information.firstname,' ',personal_information.lastname) AS fullname"),
    		//miltary informaiton fields
    		'miltary_information.information_id','miltary_information.warzone',/*'miltary_information.mos',*/'miltary_information.serve','miltary_information.branchservice','miltary_information.dateservedfrom','miltary_information.dateservedto',
    		//status informaiton fields
    		'status-information.emh','status-information.groupname','status-information.organization_answer','status-information.situation','status-information.health_problems','status-information.health_problem_answer','status-information.legal_issues','status-information.court','status-information.countydcss','status-information.homeless_court','status-information.spouse_ticktet_warrants','status-information.outstanding_warrants','status-information.namelocation_warrant','status-information.criminalminor','status-information.anycriminal','status-information.brief_information','status-information.homeless_child_support_dcss','status-information.homeless_child_support_case','status-information.partner_attending','status-information.partner_name','status-information.underage_children','status-information.children_name','status-information.petanswer','status-information.pet','status-information.pet_other','status-information.pet_other_name','status-information.pet_quantity','status-information.pet_breed','status-information.wheelchair','status-information.pickuplocation','status-information.pickuplocation_other','status-information.vehicle','status-information.emergencycname','status-information.emergencycphone','status-information.sexoffense','status-information.electronic_signature','status-information.terms','status-information.verified_registered_veteran',
    		DB::raw("personal_information.id AS vet_id"),
    		])
		)
		->addColumn('action', function ($veteran) {
		        $html = '<a href="'.url('/dashboard/veteranview/'.$veteran->vet_id).'" class="btn btn-sm btn-primary waves-effect" target="_blank"><i class="fa fa-eye"></i></a>';
				$file = public_path()."/uploads/veterans/".$veteran->vet_id.".pdf";
				
				$html .= '&nbsp;<a href="'.url('/veteran/downloadpdf/'.$veteran->vet_id).'" class="btn btn-sm btn-primary waves-effect" target="_blank"><i class="fa fa-download"></i></a>';
				
				if(Auth::user()->user_type == 'Super Admin' || Auth::user()->user_type == 'Sub Admin'){
					$html .= '&nbsp;<a href="'.url('/dashboard/editveteran/'.$veteran->vet_id).'" class="btn btn-sm btn-primary waves-effect" target="_blank"><i class="fa fa-pencil"></i></a>';
				}
				if(Auth::user()->user_type == 'Super Admin'){
					$html .= '&nbsp;<a href="javascript:;" class="btn btn-sm btn-danger waves-effect" onclick="deleteveteran('.$veteran->vet_id.')"><i class="fa fa-trash"></i></a>';
				}
		        return $html;
		})
		->setRowAttr([
		    'valign' => 'middle'
		])
		->filterColumn('fullname', function($query, $keyword) {
			if(strpos($keyword, ' ') === false){
				$query->where(function ($query) use($keyword) {
					$query->where('personal_information.firstname', 'LIKE', "%{$keyword}%")
					      ->orWhere('personal_information.lastname', 'LIKE', "%{$keyword}%");
				});
			}else{
				$names = explode(" ", $keyword);
				$query->where(function ($query) use($names) {
					$query->where('personal_information.firstname', 'LIKE', "%{$names[0]}%")
					      ->where('personal_information.lastname', 'LIKE', "%{$names[1]}%");
				});
			}
		})
		->filterColumn('dateofbirth', function($query, $keyword) {
			$query->where('personal_information.dateofbirth', '=', $keyword);
		})
		->filterColumn('serialsecurity', function($query, $keyword) {
			$query->where('personal_information.serialsecurity', '=', $keyword);
		})
		->filterColumn('cellnumber', function($query, $keyword) {
			$query->where('personal_information.cellnumber', '=', $keyword);
		})
		->filterColumn('email', function($query, $keyword) {
			$query->where('personal_information.email', '=', $keyword);
		})
		->filterColumn('drivers_license', function($query, $keyword) {
			$query->where('personal_information.drivers_license', '=', $keyword);
		})
		->filterColumn('gender', function($query, $keyword) {
			$query->where('personal_information.gender', '=', $keyword);
		})
		->filterColumn('stateofbirth', function($query, $keyword) {
			$query->where('personal_information.stateofbirth', '=',$keyword);
		})
		->filterColumn('warzone', function($query, $keyword) {
			$query->where('miltary_information.warzone', '=', $keyword);
		})
		->filterColumn('serve', function($query, $keyword) {
			$query->where('miltary_information.serve', 'LIKE', "%{$keyword}%");
		})
		->filterColumn('branchservice', function($query, $keyword) {
			$query->where('miltary_information.branchservice', 'LIKE', "%{$keyword}%");
		})
		->filterColumn('legal_issues', function($query, $keyword) {
			$query->where('status-information.legal_issues', '=', $keyword);
		})
		->filterColumn('countydcss', function($query, $keyword) {
			$query->where('status-information.countydcss', '=',$keyword);
		})
		->filterColumn('partner_name', function($query, $keyword) {
			$query->where('status-information.partner_name', '=',$keyword);
		})
		->filterColumn('children_name', function($query, $keyword) {
			$query->where('status-information.children_name', '=',$keyword);
		})
		->filterColumn('pet', function($query, $keyword) {
			$query->where('status-information.pet', '=',$keyword)
			->orWhere('status-information.pet_other', '=', $keyword);
		})
		->filterColumn('wheelchair', function($query, $keyword) {
			$query->where('status-information.wheelchair', '=',$keyword);
		})
		->filterColumn('pickuplocation', function($query, $keyword) {
			$query->where('status-information.pickuplocation', '=',$keyword);
		})
		->filterColumn('sexoffense', function($query, $keyword) {
			$query->where('status-information.sexoffense', '=',$keyword);
		})
		->filterColumn('attended_year', function($query, $keyword) {
			$query->where('personal_information.attended_year', $keyword);
		})
		->make(true);
	}
	
	//Edit Registration Form 
	public function editveteran($id){
		if(Auth::user()->user_type != 'Super Admin' && Auth::user()->user_type != 'Sub Admin'){
			return redirect('dashboard/veterans');
		}
		if($id > 0 && $id != ''){

			$personalInfo = PersonalInformation::Leftjoin('miltary_information', 'miltary_information.information_id', '=', 'personal_information.id')
				->Leftjoin('status-information','status-information.information_id','=','personal_information.id')
	    		->select(['personal_information.*',DB::raw("CONCAT(personal_information.firstname,' ',personal_information.lastname) AS fullname"),
	    		//miltary informaiton fields
	    		'miltary_information.information_id','miltary_information.warzone',/*'miltary_information.mos',*/'miltary_information.serve','miltary_information.branchservice','miltary_information.dateservedfrom','miltary_information.dateservedto',
	    		//status informaiton fields
	    		'status-information.emh','status-information.groupname','status-information.organization_answer','status-information.situation','status-information.health_problems','status-information.health_problem_answer','status-information.legal_issues','status-information.court','status-information.countydcss','status-information.homeless_court','status-information.spouse_ticktet_warrants','status-information.outstanding_warrants','status-information.namelocation_warrant','status-information.criminalminor','status-information.anycriminal','status-information.brief_information','status-information.homeless_child_support_dcss','status-information.homeless_child_support_case','status-information.partner_attending','status-information.partner_name','status-information.underage_children','status-information.children_name','status-information.petanswer','status-information.pet','status-information.pet_other','status-information.pet_other_name','status-information.pet_quantity','status-information.pet_breed','status-information.wheelchair','status-information.pickuplocation','status-information.pickuplocation_other','status-information.vehicle','status-information.emergencycname','status-information.emergencycphone','status-information.sexoffense','status-information.electronic_signature','status-information.terms','status-information.verified_registered_veteran',
	    		DB::raw("personal_information.id AS vet_id"),
	    		DB::raw("miltary_information.id AS military_id"),
	    		DB::raw("`status-information`.`id` AS status_id"),
    		])->where('personal_information.id',$id)->first();
    		
    		//echo '<pre>';print_r($personalInfo);exit;
			if($personalInfo){
				
				return view('admin.formdetails.veteranedit')->with('data',$personalInfo);
				
			}else{
				return redirect('dashboard');
			}
		}
			
	}
	
	public function updateveteran(Request $request){
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
    		$veteran_info 	= PersonalInformation::find($request->vet_id);
    		$old_logo 			= $veteran_info->profile;        		
    		
    		if($old_logo)
    		{
    			$delete_path = public_path().'/uploads/veterans/'.$request->vet_id.'/'.$old_logo;
    			if(file_exists($delete_path))
    			{
					unlink($delete_path);
				}
			}

			$destinationPath 	= public_path().'/uploads/veterans/'.$request->vet_id.'/';
    		$file_name 			= $request->vet_id.'.'.$file->getClientOriginalExtension(); 
    		$file->move($destinationPath,$file_name);
    		
    		$veteran_info->profile = $file_name;
    		$veteran_info->save();
		}
		
		//PERSONAL INFORMATION
		$personainfo = PersonalInformation::find($request->vet_id);
		$personainfo->firstname 				= $request->firstname;
		$personainfo->middlename 				= $request->middlename;
		$personainfo->lastname 					= $request->lastname;
		$personainfo->serialsecurity 			= $request->ssn;
		$personainfo->drivers_license 			= $request->dlsn;
		$personainfo->dateofbirth 				= $request->dateofbirth;
		$personainfo->birthcity 				= $request->bc;
		$personainfo->stateofbirth 				= $request->sb;
		$personainfo->gender 					= $request->gender;
		$personainfo->dependent_fullname 		= $request->dependent_fullname;
		$personainfo->dependent_relationship 	= $request->dependent_relationship;
		$personainfo->dependent_age 			= $request->dependent_age;
		$personainfo->dependent_gender 			= $request->dependent_gender;

		$personainfo->dependent_fullname2 		= $request->dependent_fullname2;
		$personainfo->dependent_relationship2 	= $request->dependent_relationship2;
		$personainfo->dependent_age2 			= $request->dependent_age2;
		$personainfo->dependent_gender2 		= $request->dependent_gender2;
		$personainfo->dependent_fullname3 		= $request->dependent_fullname3;
		$personainfo->dependent_relationship3 	= $request->dependent_relationship3;
		$personainfo->dependent_age3 			= $request->dependent_age3;
		$personainfo->dependent_gender3 		= $request->dependent_gender3;

		$personainfo->cellnumber 				= $request->cell;
		$personainfo->email 					= $request->email;
		$personainfo->attended_year 			= $request->attended_year;
		$personainfo->updated_at 				= date('Y-m-d H:i:s');
		$personainfo->save();
		
		//MILITARY INFORMATION
		$milatiryinfo = MilitaryInformation::find($request->military_id);
		$milatiryinfo->warzone 			= $request->warzone;
		/*$milatiryinfo->mos 				= $request->unitandmos;*/
		$milatiryinfo->serve 			= isset($request->serve) && !empty($request->serve) ? implode(",",$request->serve) : '';
		$milatiryinfo->branchservice 	= isset($request->branchservice) && !empty($request->branchservice) ? implode(",",$request->branchservice) : '';
		if($request->dsf != ''){ $milatiryinfo->dateservedfrom = $request->dsf; }
		if($request->dst != ''){ $milatiryinfo->dateservedto = $request->dst; }
		$milatiryinfo->updated_at 		= date('Y-m-d H:i:s');
		$milatiryinfo->save();
		
		//STATUS INFORMATION
		$statusinfo = StatusInformation::find($request->status_id);
		$statusinfo->emh 					= $request->emh;
		$statusinfo->groupname 				= $request->groupname;
		$statusinfo->organization_answer 	= $request->answer;
		$statusinfo->situation 				= $request->leaveorreturn == 1 ? $request->leaveorreturn : 0;
		$statusinfo->health_problems 		= implode(',',$request->healthproblems);
		$statusinfo->health_problem_answer 	= $request->healthproblemsanswer;
		$statusinfo->legal_issues 			= $request->legalissues;
		$statusinfo->court 					= $request->court;
		$statusinfo->countydcss 			= $request->countydcss;
		
		if($request->homeless_court == 'Yes'){
			$statusinfo->homeless_court 				= $request->homeless_court;
			$statusinfo->spouse_ticktet_warrants 		= $request->spouse_ticktet_warrants;
			$statusinfo->outstanding_warrants 			= $request->outstanding_warrants;
			$statusinfo->namelocation_warrant 			= $request->namelocation_warrant;
			$statusinfo->criminalminor 					= $request->criminalminor;
			$statusinfo->anycriminal 					= $request->anycriminal;
			$statusinfo->brief_information 				= $request->brief_information;
			$statusinfo->homeless_child_support_dcss 	= $request->homeless_child_support_dcss;
			$statusinfo->homeless_child_support_case 	= $request->homeless_child_support_case;
		}else{
			$statusinfo->homeless_court 				= $request->homeless_court;
			$statusinfo->spouse_ticktet_warrants 		= '';
			$statusinfo->outstanding_warrants 			= '';
			$statusinfo->namelocation_warrant 			= '';
			$statusinfo->criminalminor 					= '';
			$statusinfo->anycriminal 					= '';
			$statusinfo->brief_information 				= '';
			$statusinfo->homeless_child_support_dcss 	= '';
			$statusinfo->homeless_child_support_case 	= '';
		}
		
		$statusinfo->partner_attending 		= $request->partner_attending;
		$statusinfo->partner_name 			= $request->fulllegalname;
		$statusinfo->underage_children 		= $request->underage;
		$statusinfo->children_name 			= $request->underagelegalname;
		$statusinfo->petanswer 				= $request->petanswer;
		$statusinfo->pet 					= $request->pet;
		$statusinfo->pet_other 				= $request->petanswerother;
		$statusinfo->pet_quantity 			= $request->howmanypet == '' ? 0 : $request->howmanypet;
		$statusinfo->pet_breed 				= $request->whatbreed;
		$statusinfo->wheelchair 			= $request->wheelchair;
		$statusinfo->pickuplocation 		= $request->pickuplocation;
		$statusinfo->pickuplocation_other 	= $request->pickuplocation_other;
		$statusinfo->vehicle 				= $request->vehicle;
		$statusinfo->emergencycname 		= $request->emergencycname;
		$statusinfo->emergencycphone 		= $request->emergencycphone;
		$statusinfo->sexoffense 			= $request->sexoffense;
		$statusinfo->electronic_signature 	= $request->electronic_signature;
		$statusinfo->terms 					= $request->terms;
		$statusinfo->verified_registered_veteran 	= $request->validated_veteran;
		$statusinfo->updated_at 				= date('Y-m-d H:i:s');
		$statusinfo->save();
		
		Session::flash('success','<div class="alert alert-success">Record Updated</div>');
		return redirect('/dashboard/veterans');
	}


	public function deleteveteran($id){
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard');
		}

		if($id){
			PersonalInformation::where("id",$id)->delete();
			MilitaryInformation::where("information_id",$id)->delete();
			StatusInformation::where("information_id",$id)->delete();
			
			Session::flash('success','<div class="alert alert-success">Record Deleted Successfully</div>');
			return redirect('dashboard/veterans');
		}
	}
}
