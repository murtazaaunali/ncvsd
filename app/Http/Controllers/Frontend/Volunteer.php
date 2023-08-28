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

use App\DemoGraphic;
use App\EmergencyMedicalInfo;
use App\VolunteerOpportunities;
use App\ReleaseLiability;
use PDF;

use App\Mail\PdfEmail;
use Illuminate\Support\Facades\Mail;

class Volunteer extends Controller
{
    public function __construct(){
		
	}
	
    public function index()
    {
    	/*$volunteerinfo = DemoGraphic::all();
    	//echo '<pre>';print_r($volunteerinfo);exit;
    	foreach($volunteerinfo as $getrec){
			DemoGraphic::where('id',$getrec->id)->where('created_at','>=','2019-01-01 00:00:00')->update(['attended_year'=>'2019']);
		}
		//DemoGraphic::where('created_at','>=','2019-01-01 00:00:00')->update(['attended_year'=>'2019']);
		echo 'updated';exit;*/
		return $this->frontview('forms.volunteer-registration');
    }
    
    public function submitvolunteer(Request $request){
		$fields = Input::all();
		
		//DEMOGRAPHIC
		$demographic = new DemoGraphic();
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
		$demographic->attended_year 		= date('Y');
		$demographic->created_at 			= date('Y-m-d H:i:s');
		$demographic->save();
		
		//VOLUNTEER OPPORTUNITIES
		$volunteer = new VolunteerOpportunities();
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
		$volunteer->created_at 		= date('Y-m-d H:i:s');
		$volunteer->save();

		//EMERGENCY MEDICAL INFO
		$emergency = new EmergencyMedicalInfo();
		$emergency->demographic_id 		= $demographic->id;
		$emergency->emergencycname 		= $request->emergencycname;
		$emergency->emergencycnumber 	= $request->emergencynumber;
		$emergency->medicalinformation 	= $request->medicalinformation;
		$emergency->created_at 			= date('Y-m-d H:i:s');
		$emergency->save();

		//RELEASE RELIABILITY
		$release = new ReleaseLiability();
		$release->demographic_id 		= $demographic->id;
		$release->release_firstname 	= $request->release_firstname;
		$release->release_lastname 		= $request->release_lastname;
		$release->release_email 		= $request->release_email;
		$release->agree 				= $request->agree;
		$release->created_at 			= date('Y-m-d H:i:s');
		$release->save();

		if($demographic->id){
			$data = array(
				"firstname" 			=> $request->firstname,
				"middlename" 			=> $request->middlename,
				"lastname" 				=> $request->lastname,
				"phone" 				=> $request->cellphone,
				"email" 				=> $request->email,
				"occupation" 			=> $request->occupation,
				"activedutymilitary" 	=> $request->activedutymilitary,
				"individual_group" 		=> $request->individual_group,
				"group_name" 			=> $request->group_name,
				"group_participants" 	=> $request->group_participants,
				"attended_year" 		=> $demographic->attended_year,

				"wednesdayam" 		=> $request->wednesdayam,
				"wednesdaypm" 		=> $request->wednesdaypm,
				"thursdayam" 		=> (!empty($request->thursdayam)) ? $request->thursdayam : array(),
				"thursdaypm" 		=> (!empty($request->thursdayam)) ? $request->thursdayam : array(),
				"fridayam" 			=> (!empty($request->fridayam)) ? $request->fridayam : array(),
				"fridaypm" 			=> (!empty($request->fridaypm)) ? $request->fridaypm : array(),
				"saturdayam" 		=> (!empty($request->saturdaypm)) ? $request->saturdaypm : array(),
				"saturdaypm" 		=> (!empty($request->saturdaypm)) ? $request->saturdaypm : array(),
				"sundayam" 			=> (!empty($request->sundayam)) ? $request->sundayam : array(),
				"comments" 			=> $request->comments,
				"maywecontact" 		=> $request->maywecontact,

				"emergencycname" 		=> $request->emergencycname,
				"emergencycnumber" 		=> $request->emergencynumber,
				"medicalinformation" 	=> $request->medicalinformation,

				"release_firstname" 	=> $request->release_firstname,
				"release_lastname" 		=> $request->release_lastname,
				"release_email" 		=> $request->release_email,
				"agree" 				=> $request->agree,

			);	
		
	    	$pdf = PDF::loadView('pdf.volunteer', $data);
	    	//return $pdf->stream();//to preview the pdf
	    	$pdf->save(public_path().'/uploads/volunteers/'.$demographic->id.'.pdf')->stream(); //to save the pdf

	        //EMAIL
	        $objDemo = new \stdClass();
	        $objDemo->sender = $request->firstname . ' ' . $request->lastname;
	        $objDemo->receiver = 'Admin';
	        $objDemo->type = 'volunteers';
	        $objDemo->id = $demographic->id;
	        $objDemo->fromemail = volunteer_email_sender();
	        $objDemo->sendername = system_email_sender_name();
	        //$objDemo->formsubject = 'NCVSD - New Form Submision "Volunteer registration"';
	        $objDemo->formsubject = volunteer_email_subject();
	        
	        $emails = explode(',',recept_volunteers_emails());
	        Mail::to($emails)->send(new PdfEmail($objDemo));

	        //Email to volunteer
	        $objDemo = new \stdClass();
	        $objDemo->sender = 'NCVSD';
	        $objDemo->receiver = $request->firstname . ' ' . $request->lastname;
	        $objDemo->type = 'volunteers';
	        $objDemo->id = $demographic->id;
	        $objDemo->fromemail = volunteer_email_sender();
	        $objDemo->sendername = system_email_sender_name();
	        $objDemo->formsubject = volunteer_email_subject();
	        Mail::to($request->email)->send(new PdfEmail($objDemo));			
	        //EMAIL

			Session::flash('success','<div class="alert alert-success"><h1 class="text-center">Thank You! Your request has been submited</h1></div>');
		}
		
		//return redirect('volunteer-registration');
		return redirect('/volunteer-registration/thanks');
    }
    
    public function thanksvolunteer()
    {
        return $this->frontview('forms.volunteer-registration-thanks');
    }

	public function checkemail(Request $request){
		//echo $request->email;
		$validation = Validator::make($request->all(),[
		   'email'   => 'required|email|max:255',
		  ]);
		  
		if ($validation->fails()) {
			return response()->json([ 'error' => $validation->errors()->all() ]);
		}else{
			return response()->json([ 'succress' => 'done' ]);
		}

	}

	public function downloadpdf($id = 0){
		/*if($id > 0){
			$file = public_path()."/uploads/volunteers/".$id.".pdf";
	        if(file_exists($file)){
		        $headers = array('Content-Type: application/pdf',);
		        return Response::download($file, 'volunteer.pdf',$headers);
			}else{
				echo "File doesn't exists'";
			}
		}*/

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
					"attended_year" 		=> $demographic->attended_year,

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
				//return view('admin.formdetails.volunteer',$data);

		    	$pdf = PDF::loadView('pdf.volunteer', $data);
		    	//return $pdf->stream();//to preview the pdf
		    	$pdf->save(public_path().'/uploads/volunteers/'.$demographic->id.'.pdf')->stream(); //to save the pdf
		    	$file = public_path()."/uploads/volunteers/".$id.".pdf";
		        $headers = array('Content-Type: application/pdf',);
		     	return Response::download($file, 'volunteer.pdf',$headers);
			}
		}
	}
	
	public function importdata()
	{
		
		$data = $this->formatcsv();
		//$data[113]['cellphone'] = '+1 (619) 348-7751';
		//$data[150]['emergencynumber'] = '(805) 794-7852';
		//$data[188]['cellphone'] = '6155162737)';
		//$data[194]['cellphone'] = '(619) 253-7797';
		
		//$data[194]['emergencynumber'] = '(619) 253-7797';
		//$data[269]['emergencynumber'] = '+1 (909) 519-4594';
	
		//echo "<pre>"; print_r($data); echo "</pre>"; 
		
		//Code for update state of birthdate
		/*foreach($data as $getdata){
			 $getdata['BOS'] = preg_replace('/[^A-Za-z0-9\-]/', '', $getdata['BOS']);
			PersonalInformation::where('serialsecurity',$getdata['SSN'])->update(['stateofbirth' => $getdata['BOS'], 'updated_at' => date('Y-m-d H:i:s')]);
			//echo '<pre>';print_r($rec);exit;
		}echo 'updated';*/
		
		//code for deleting duplicate records
		/*foreach($data as $getData){
			$donotDelete = PersonalInformation::where('serialsecurity',$getData['SSN'])->first();
			$delete_rec = PersonalInformation::where('serialsecurity',$getData['SSN'])->where('id','!=',$donotDelete->id)->get();
			if(!$delete_rec->isEmpty()){
				foreach($delete_rec as $rec){
					PersonalInformation::where('id',$rec->id)->where('id','!=',$donotDelete->id)->delete();
					MilitaryInformation::where('information_id',$rec->id)->where('information_id','!=',$donotDelete->id)->delete();
					StatusInformation::where('information_id',$rec->id)->where('information_id','!=',$donotDelete->id)->delete();
				}
			}
		}
		echo 'Deleted duplicate records';*/

		//updating old records
		/*foreach($data as $datas){
			$datas['nok'] = preg_replace('/[^A-Za-z0-9\-]/', '', $datas['nok']);
			$pets = 'No';
			//$datas['pets'] = 'Yes?  Dog';
			if(strpos($datas['pets'],',') !== false){ $pets = explode(',',$datas['pets']); }
			if(strpos($datas['pets'],'-') !== false){ $pets = explode('-',$datas['pets']); }
			if(strpos($datas['pets'],'?') !== false){ $pets = explode('?',$datas['pets']); }
			
			$update = array(
				'theater'				=> $datas['theater'],
				'req_support'			=> $datas['req_support'],
				'gpd'					=> $datas['gpd'],
				'nok'					=> $datas['nok'],
				'dependants'			=> $datas['dependants'],
				'dependent_fullname'	=> $datas['name'],
				'convicted_sex_felon'	=> $datas['convicted_sex_felon'],
			);
			
			$updateStatus = array(
				'petanswer' 			=> is_array($pets) ? $pets[0] : $pets,
				'pet'					=> is_array($pets) ? $pets[1] : '',
			);

			
			
			$getPer = PersonalInformation::where('serialsecurity',$datas['SSN'])->get();
			if(!$getPer->isEmpty()){
				foreach($getPer as $rec){
					PersonalInformation::where('id',$rec->id)->update($update);
					StatusInformation::where('information_id',$rec->id)->update($updateStatus);
				}
			}

		}
		echo 'Updated';
		exit;*/
		foreach($data as $datas){

			/*$pets = 'No';
			//$datas['pets'] = 'Yes?  Dog';
			if(strpos($datas['petanswer'],',') !== false){ $pets = explode(',',$datas['petanswer']); }
			if(strpos($datas['petanswer'],'-') !== false){ $pets = explode('-',$datas['petanswer']); }
			if(strpos($datas['petanswer'],'?') !== false){ $pets = explode('?',$datas['petanswer']); }

			
			$personalinformation= new PersonalInformation();
			$personalinformation->firstname   			= $datas['firstname'];
			$personalinformation->middlename  			= isset($datas['middlename']) ? $datas['middlename'] : '';
			$personalinformation->lastname    			= isset($datas['lastname']) ? $datas['lastname'] : '';
			$personalinformation->serialsecurity		= isset($datas['serialsecurity']) ? $datas['serialsecurity'] : '';
			$personalinformation->drivers_license		= isset($datas['drivers_license']) ? $datas['drivers_license'] : '';
			$personalinformation->dateofbirth          	= isset($datas['dateofbirth']) ? $datas['dateofbirth'] : '';
			$personalinformation->birthcity				= '';
			$personalinformation->stateofbirth			= isset($datas['stateofbirth']) ? $datas['stateofbirth'] : '';
			$personalinformation->gender				= isset($datas['gender']) ? $datas['gender'] : ''; 
			$personalinformation->cellnumber 			= isset($datas['cellnumber']) ? $datas['cellnumber'] : ''; 
			$personalinformation->email					= '';
			$personalinformation->emailphone			= isset($datas['emailphone']) ? $datas['emailphone'] : '';	
			$personalinformation->attended_year 	 	= '2017';	
			$personalinformation->created_at 	 		= isset($datas['Timestamp']) ? date("Y-m-d H:i:s", strtotime($datas['Timestamp'])) : '';	
			$personalinformation->updated_at 	 		= date("Y-m-d H:i:s");	
			$personalinformation->save();
			$personalinformation_id = $personalinformation->id;
			
			$militaryinformation= new MilitaryInformation();
			$militaryinformation->information_id   			= $personalinformation_id;
			$militaryinformation->warzone  					= isset($datas['warzone']) ? $datas['warzone'] : '';
			$militaryinformation->mos    					= '';
			$militaryinformation->serve						= isset($datas['serve']) ? $datas['serve'] : '';
			$militaryinformation->branchservice				= isset($datas['branchservice']) ? $datas['branchservice'] : '';
			$militaryinformation->dateservedfrom          	= isset($datas['dateservedfrom']) ? $datas['dateservedfrom'] : '';
			$militaryinformation->dateservedto				= '';
			$militaryinformation->created_at 	 			= isset($datas['Timestamp']) ? date("Y-m-d H:i:s", strtotime($datas['Timestamp'])) : '';;
			$militaryinformation->save();	
		    
			$StatusInformation= new StatusInformation();
			$StatusInformation->information_id   					= $personalinformation_id;
			$StatusInformation->emh   								= (isset($datas['emh']) && ($datas['emh'] != "")) ? $datas['emh'] : '';
			$StatusInformation->groupname  							= '';
			$StatusInformation->organization_answer    				= (isset($datas['organization_answer']) && ($datas['organization_answer'] != "")) ? $datas['organization_answer'] : '';
			$StatusInformation->situation							= 0;
			$StatusInformation->health_problems						= (isset($datas['health_problems']) && ($datas['health_problems'] != "")) ? $datas['health_problems'] : '';
			$StatusInformation->health_problem_answer          		= '';
			$StatusInformation->legal_issues						= (isset($datas['legal_issues']) && ($datas['legal_issues'] != "")) ? $datas['legal_issues'] : '';
			$StatusInformation->countydcss 	 						= (isset($datas['countydcss']) && ($datas['countydcss'] != "")) ? $datas['countydcss'] : '';
			$StatusInformation->partner_attending 	 				= (isset($datas['partner_attending']) && ($datas['partner_attending'] != "")) ? $datas['partner_attending'] : '';
			$StatusInformation->partner_name 	 					= (isset($datas['partner_name']) && ($datas['partner_name'] != "")) ? $datas['partner_name'] : '';
			$StatusInformation->underage_children 	 				= (isset($datas['underage_children']) && ($datas['underage_children'] != "")) ? $datas['underage_children'] : '';
			$StatusInformation->children_name 	 					= (isset($datas['children_name']) && ($datas['children_name'] != "")) ? $datas['children_name'] : '';
			$StatusInformation->petanswer 	 						= is_array($pets) ? $pets[0] : $pets;
			$StatusInformation->pet 	 							= is_array($pets) ? $pets[1] : '';
			$StatusInformation->pet_other 	 						= '';
			$StatusInformation->pet_other_name 	 					= '';
			$StatusInformation->pet_quantity 	 					= 0;
			$StatusInformation->pet_breed 	 						= (isset($datas['pet_breed']) && ($datas['pet_breed'] != "")) ? $datas['pet_breed'] : '';;
			$StatusInformation->wheelchair 	 						= (isset($datas['wheelchair']) && ($datas['wheelchair'] != "")) ? $datas['wheelchair'] : '';
			$StatusInformation->pickuplocation 	 					= (isset($datas['pickuplocation']) && ($datas['pickuplocation'] != "")) ? $datas['pickuplocation'] : '';
			$StatusInformation->pickuplocation_other 	 			= '';
			$StatusInformation->vehicle 	 						= '';
			$StatusInformation->court 	 							= (isset($datas['court']) && ($datas['court'] != "")) ? $datas['court'] : '';
			$StatusInformation->emergencycname 	 					= (isset($datas['emergencycname']) && ($datas['emergencycname'] != "")) ? $datas['emergencycname'] : '';
			$StatusInformation->emergencycphone 	 				= (isset($datas['emergencycphone']) && ($datas['emergencycphone'] != "")) ? $datas['emergencycphone'] : '';
			$StatusInformation->sexoffense 	 						= (isset($datas['sexoffense']) && ($datas['sexoffense'] != "")) ? $datas['sexoffense'] : '';
			$StatusInformation->electronic_signature 	 			= (isset($datas['electronic_signature']) && isset($datas['electronic_signature'])) ? $datas['electronic_signature'] : '';
			$StatusInformation->terms 	 							= (isset($datas['terms']) && isset($datas['terms'])) ? $datas['terms'] : '';
			$StatusInformation->verified_registered_veteran 	 	= 0;
			
			$StatusInformation->religious_preference 	 			= (isset($datas['religious_preference']) && isset($datas['religious_preference'])) ? $datas['religious_preference'] : '';
			$StatusInformation->how_may_we_reach 	 				= (isset($datas['how_may_we_reach']) && isset($datas['how_may_we_reach'])) ? $datas['how_may_we_reach'] : '';
			$StatusInformation->message_phone 	 					= (isset($datas['message_phone']) && isset($datas['message_phone'])) ? $datas['message_phone'] : '';
			$StatusInformation->weight 	 							= (isset($datas['weight']) && isset($datas['weight'])) ? $datas['weight'] : '';
			$StatusInformation->height 	 							= (isset($datas['height']) && isset($datas['height'])) ? $datas['height'] : '';
			$StatusInformation->hair_color 	 						= (isset($datas['hair_color']) && isset($datas['hair_color'])) ? $datas['hair_color'] : '';
			$StatusInformation->eye_color 	 						= (isset($datas['eye_color']) && isset($datas['eye_color'])) ? $datas['eye_color'] : '';
			$StatusInformation->your_ethnicity 	 					= (isset($datas['your_ethnicity']) && isset($datas['your_ethnicity'])) ? $datas['your_ethnicity'] : '';
			$StatusInformation->usual_occupation 	 				= (isset($datas['usual_occupation']) && isset($datas['usual_occupation'])) ? $datas['usual_occupation'] : '';
			$StatusInformation->last_wage 	 						= (isset($datas['last_wage']) && isset($datas['last_wage'])) ? $datas['last_wage'] : '';
			$StatusInformation->date_last_employed 	 				= (isset($datas['date_last_employed']) && isset($datas['date_last_employed'])) ? $datas['date_last_employed'] : '';
			
			$StatusInformation->created_at 	 						= isset($datas['Timestamp']) ? date("Y-m-d H:i:s", strtotime($datas['Timestamp'])) : '';; 	
			$StatusInformation->updated_at 	 						= date("Y-m-d H:i:s"); 	 	
			$StatusInformation->save();	*/
			
		}
		echo "Status Csv File Data Uploded";
		
	/*
		foreach($data as $datas){
		$res = explode(' ', $datas['Name']);
		
		$demographic 						= new DemoGraphic;
		
		$demographic->firstname 			= ($datas['firstname'] != "") ? $datas['firstname'] : "";
		$demographic->middlename 			= "";
		$demographic->lastname 				= $datas['lastname'];
		$demographic->phone 				= $datas['cellphone'];
		$demographic->email 				= $datas['email'];
		$demographic->occupation 			= "";
		$demographic->activedutymilitary 	= $datas['activedutymilitary'];
		$demographic->individual_group 		= $datas['individual_group'];
		$demographic->group_name 			= $datas['group_name'];
		$demographic->group_participants 	= "";
		$demographic->created_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$demographic->updated_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$demographic->save();
		
		$demographic_id = $demographic->id;
		
		$emergency = new EmergencyMedicalInfo();
		$emergency->demographic_id 		= $demographic_id;
		$emergency->emergencycname 		= $datas['emergencycname'];
		$emergency->emergencycnumber 	= $datas['emergencynumber'];
		$emergency->medicalinformation 	= $datas['medicalinformation'];
		$emergency->created_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$emergency->updated_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$emergency->save();
		
		$release = new ReleaseLiability();
		$release->demographic_id 		= $demographic_id;
		$release->release_firstname 	= isset($res[0]) ? $res[0] : "";
		$release->release_lastname 		= isset($res[1]) ? $res[1] : "";
		$release->release_email 		= $datas['email'];
		$release->agree 				= $datas['agree'];
		$release->address 				= $datas['Address'];
		$release->created_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$release->updated_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$release->save();
		
		//VOLUNTEER OPPORTUNITIES
		$volunteer = new VolunteerOpportunities();
		$volunteer->demographic_id 	= $demographic_id;
		$volunteer->wednesdayam 	= '';
		$volunteer->wednesdaypm 	= '';
		$volunteer->thursdayam 		= $datas['thursdayam'];
		$volunteer->thursdaypm 		= $datas['thursdaypm'];
		$volunteer->fridayam 		= $datas['fridayam'];
		$volunteer->fridaypm 		= $datas['fridaypm'];
		$volunteer->saturdayam 		= $datas['saturdayam'];
		$volunteer->saturdaypm 		= $datas['saturdaypm'];
		$volunteer->sundayam 		= $datas['sundayam'];
		$volunteer->comments 		= $datas['comments'];
		$volunteer->maywecontact 	= $datas['maywecontact'];
		$volunteer->Wednesday 		= $datas['Wednesday (1/24/18) 12pm-4pm'];
		$volunteer->created_at 		= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$volunteer->updated_at 			= date("Y-m-d H:i:s",strtotime($datas['created_at']));
		$volunteer->save();
		}
		*/
		
		/*
		
		$demographic->save();
		/*
		echo $demographic->id;
		/*
		//$demographic = DemoGraphic::find(10);
		$demographic = DemoGraphic::where("email","testing@gmaila.com")->get();
		
		//echo "<pre>"; print_r($demographic); echo "</pre>";
		
		if($demographic->count() != 0)
		{
			foreach($demographic as $demo)
			{
				echo $demo->id . "<hr />";
				echo $demo->email . "<hr />";
			}
		}
		else
		{
			echo "no record found";
		}
		*/
		
		
	}
	
	public function formatcsv()
	{
		/*$data = array();
		
		//$file_path = public_path('uploads/enrty.csv');
		$file_path = public_path('uploads/entry3.csv');
		
		$file_content = fopen($file_path,"r");
		$headers = fgetcsv($file_content, 1000, ",");
		$i = 0;
		
		//$file_content = fopen($file_path,"r");
		//echo '<pre>';print_r(fgetcsv($file_content, 1000, ","));exit;
		
		while($csvdata = fgetcsv($file_content, 1000, ","))
		{
		
			foreach($csvdata as $key=>$value)
			{
				
				$data[$i][$headers[$key]] = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $value);	
				
				if (strpos($headers[$key], 'created_at') !== false) {
				    $data[$i]['created_at'] = $value;
				}
				else
				{
					$data[$i][$headers[$key]] = $value;	
				}
				
			}
			
			$i++;
		}
			
		return $data;*/
	}
}
