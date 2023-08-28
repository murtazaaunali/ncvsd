<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use URL;
use Auth;
use Hash;
use Session;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

use App\PersonalInformation;
use App\MilitaryInformation;
use App\StatusInformation;
use PDF;
use Illuminate\Filesystem;
use Illuminate\Support\Facades\Storage;

use App\Mail\PdfEmail;
use Illuminate\Support\Facades\Mail;

class Veteran extends Controller
{
    public function __construct(){
		
	}
	
    public function index()
    {
    	/*$personainfo = PersonalInformation::all();
    	//echo '<pre>';print_r($personainfo);exit;
    	foreach($personainfo as $getrec){
			PersonalInformation::where('id',$getrec->id)->update(['attended_year'=>date('Y',strtotime($getrec->updated_at))]);
		}*/
		//echo 'updated';exit;
        return $this->frontview('forms.veteran-registration');
    }
    
    public function submitvetaran(Request $request){
		/**
		* To add the data
		*/
		
		//PERSONAL INFORMATION
		$personainfo = new PersonalInformation();
		$personainfo->firstname 				= $request->firstname;
		$personainfo->middlename 				= $request->middlename;
		$personainfo->lastname 					= $request->lastname;
		$personainfo->serialsecurity 			= $request->ssn;
		$personainfo->drivers_license 			= $request->dlsn;
		$personainfo->dateofbirth 				= $request->b_day.'/'.$request->b_month.'/'.$request->b_year;
		$personainfo->birthcity 				= $request->bc;
		$personainfo->stateofbirth 				= $request->sb;
		$personainfo->gender 					= $request->gender;
		$personainfo->dependent_fullname 		= $request->dependent_fullname;
		$personainfo->dependent_relationship 	= $request->dependent_relationship;
		$personainfo->dependent_age 			= $request->dependent_age;
		$personainfo->dependent_gender 			= $request->dependent_gender;

		//dependent_2
		$personainfo->dependent_fullname2 		= $request->dependent_fullname2;
		$personainfo->dependent_relationship2 	= $request->dependent_relationship2;
		$personainfo->dependent_age2 			= $request->dependent_age2;
		$personainfo->dependent_gender2 		= $request->dependent_gender2;

		//dependent_3
		$personainfo->dependent_fullname3 		= $request->dependent_fullname3;
		$personainfo->dependent_relationship3 	= $request->dependent_relationship3;
		$personainfo->dependent_age3 			= $request->dependent_age3;
		$personainfo->dependent_gender3 		= $request->dependent_gender3;


		$personainfo->cellnumber 				= $request->cell;
		$personainfo->email 					= $request->email;
		$personainfo->attended_year 			= date('Y');
		$personainfo->created_at 				= date('Y-m-d H:i:s');
		$personainfo->save();
		
		//MILITARY INFORMATION
		$milatiryinfo = new MilitaryInformation();
		$milatiryinfo->information_id 	= $personainfo->id;
		$milatiryinfo->warzone 			= $request->warzone;
		/*$milatiryinfo->mos 				= $request->unitandmos;*/
		$milatiryinfo->serve 			= isset($request->serve) && !empty($request->serve) ? implode(",",$request->serve) : '';
		$milatiryinfo->branchservice 	= isset($request->branchservice) && !empty($request->branchservice) ? implode(",",$request->branchservice) : '';
		$milatiryinfo->dateservedfrom 	= $request->dsf;
		$milatiryinfo->dateservedto 	= $request->dst;
		$milatiryinfo->created_at 		= date('Y-m-d H:i:s');
		$milatiryinfo->save();
		
		//STATUS INFORMATION
		$statusinfo = new StatusInformation();
		$statusinfo->information_id 		= $personainfo->id;
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
		$statusinfo->verified_registered_veteran 	= 'No';
		$statusinfo->created_at 				= date('Y-m-d H:i:s');
		$statusinfo->save();
		
		if($statusinfo->id){
			$data = array(
				"firstname" 				=> $request->firstname,
				"middlename" 				=> $request->middlename,
				"lastname" 					=> $request->lastname,
				"social_security_number" 	=> $request->ssn,
				"license" 					=> $request->dlsn,
				"dob" 						=> $request->dateofbirth,
				"birth_city" 				=> $request->bc,
				"birth_state" 				=> $request->sb,
				"gender" 					=> $request->gender,
				"dependent_fullname" 		=> $request->dependent_fullname,
				"dependent_relationship"	=> $request->dependent_relationship,
				"dependent_age" 			=> $request->dependent_age,
				"dependent_gender" 			=> $request->dependent_gender,
				//dependent 2
				"dependent_fullname2" 		=> $request->dependent_fullname2,
				"dependent_relationship2"	=> $request->dependent_relationship2,
				"dependent_age2" 			=> $request->dependent_age2,
				"dependent_gender2" 			=> $request->dependent_gender2,
				//dependent 3
				"dependent_fullname3" 		=> $request->dependent_fullname3,
				"dependent_relationship3"	=> $request->dependent_relationship3,
				"dependent_age3" 			=> $request->dependent_age3,
				"dependent_gender3" 		=> $request->dependent_gender3,
				"attended_year" 			=> date('Y'),


				"cell_number" 				=> $request->cell,
				"email_address" 			=> $request->email,

				"serve_war_zone" 			=> $request->warzone,
				/*"unit_mos" 					=> $request->unitandmos,*/
				"serve" 					=> (!empty($request->serve)) ? $request->serve : array() ,
				"branchservice" 			=> (!empty($request->branchservice)) ? $request->branchservice : array() ,
				"datefrom" 					=> $request->dsf,
				"dateto" 					=> $request->dst,

				"emh" 						=> $request->emh,
				"groupname" 				=> $request->groupname,
				"answer" 					=> $request->answer,
				'reqsupport' 				=> $request->leaveorreturn == 1 ? "Yes" : "No",
				"health_problems" 			=> (!empty($request->healthproblems)) ? $request->healthproblems : array(),
				"health_problem_answer" 	=> $request->healthproblemsanswer,
				"legal_issues" 				=> $request->legalissues,
				"court" 					=> $request->court,
				"child_support" 			=> $request->countydcss,

				"homeless_court" 				=> $request->homeless_court,
				"spouse_ticktet_warrants" 		=> $request->spouse_ticktet_warrants,
				"outstanding_warrants" 			=> $request->outstanding_warrants,
				"namelocation_warrant" 			=> $request->namelocation_warrant,
				"criminalminor" 				=> $request->criminalminor,
				"anycriminal" 					=> $request->anycriminal,
				"brief_information" 			=> $request->brief_information,
				"homeless_child_support_dcss" 	=> $request->homeless_child_support_dcss,
				"homeless_child_support_case" 	=> $request->homeless_child_support_case,

				"spouse" 					=> $request->partner_attending,
				"spouse_partner" 			=> $request->fulllegalname,
				"dependants" 				=> $request->underage,
				"name" 						=> $request->underagelegalname,
				"petanswer" 				=> $request->petanswer,
				"pet" 						=> $request->pet,
				"pet_other" 				=> $request->petanswerother,
				"pet_quantity" 				=> $request->howmanypet == '' ? 0 : $request->howmanypet,
				"pet_breed" 				=> $request->whatbreed,
				"specialneeds" 				=> $request->wheelchair,
				"pickuplocation" 			=> $request->pickuplocation,
				"pickuplocation_other" 		=> $request->pickuplocation_other,
				"transport" 				=> $request->vehicle,
				"emergencycname" 			=> $request->emergencycname,
				"emergencycphone" 			=> $request->emergencycphone,
				"sexoffense" 				=> $request->sexoffense,
				"electronic_signature" 		=> $request->electronic_signature,
	    	);
	    	
	    	$pdf = PDF::loadView('pdf.veteran', $data);
	    	//return $pdf->stream();//to preview the pdf
	    	$pdf->save(public_path().'/uploads/veterans/'.$personainfo->id.'.pdf')->stream(); 

	        //EMAIL
	        $objDemo = new \stdClass();
	        $objDemo->sender = $request->firstname . ' ' . $request->lastname;
	        $objDemo->receiver = 'Admin';
	        $objDemo->type = 'veterans';
	        $objDemo->id = $personainfo->id;
	        $objDemo->fromemail = veteran_email_sender();
	        $objDemo->sendername = system_email_sender_name();
	        $objDemo->formsubject = veteran_email_subject();
	        
	        $emails = explode(',',recept_veterans_emails());
	        Mail::to($emails)->send(new PdfEmail($objDemo));
			//EMAIL
	        
	        //Email to veteran
	        $objDemo = new \stdClass();
	        $objDemo->sender = 'NCVSD';
	        $objDemo->receiver = $request->firstname . ' ' . $request->lastname;
	        $objDemo->type = 'veterans';
	        $objDemo->id = $personainfo->id;
	        $objDemo->fromemail = veteran_email_sender();
	        $objDemo->sendername = system_email_sender_name();
	        $objDemo->formsubject = veteran_email_subject();
	        Mail::to($request->email)->send(new PdfEmail($objDemo));			
			
			Session::flash('success','<div class="alert alert-success"><h1 class="text-center">Thank You! Your request has been submited</h1></div>');
		}
		//return redirect('/veteran-registration');
		return redirect('/veteran-registration/thanks');

	}
	
	public function thanksvetaran()
    {
        return $this->frontview('forms.veteran-registration-thanks');
    }
	
	public function downloadpdf($id = 0){

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
					"attended_year" 			=> $personainfo->attended_year,

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

		    	$pdf = PDF::loadView('pdf.veteran', $data);
		    	//return $pdf->stream();//to preview the pdf
		    	//$pdf->save(public_path().'/uploads/veterans/'.$personainfo->id.'.pdf')->stream(); 
				$file = public_path()."/uploads/veterans/".$id.".pdf";
		        $headers = array('Content-Type: application/pdf',);
		        return Response::download($file, 'veterans.pdf',$headers);

	    	}
		}

		/*if($id > 0){
			$file = public_path()."/uploads/veterans/".$id.".pdf";
	        if(file_exists($file)){
		        $headers = array('Content-Type: application/pdf',);
		        return Response::download($file, 'veterans.pdf',$headers);
			}else{
				echo "File doesn't exists'";
			}
		}*/
	}
}
