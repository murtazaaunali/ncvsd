<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Input;
use RedirectResponse;

use App\DemoGraphic;
use App\EmergencyMedicalInfo;
use App\ReleaseLiability;
use App\VolunteerOpportunities;

use App\PersonalInformation;
use App\MilitaryInformation;
use App\StatusInformation;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->current_month = date ( 'm' );
        $this->current_year = date ( 'Y' );
        //$this->total_days = cal_days_in_month(CAL_GREGORIAN,$this->current_month,$this->current_year);
        $this->total_days = date('t', mktime(0, 0, 0, $this->current_month, 1, $this->current_year));
        $this->data['total_days'] = $this->total_days;
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $this->data['result'] = array();
        $i = $this->total_days;
        $this->from = $this->current_year."-".$this->current_month."-01";
        $this->to = $this->current_year."-".$this->current_month."-01";

        while ( $i >= 1 ){

            $timeFrom = " 00:00:00";
            $timeTo   = " 23:59:59";
            $finalFrom = $this->from . $timeFrom;
            $finalTo = $this->to . $timeTo; 
            $this->information = DemoGraphic::whereBetween('created_at', array($finalFrom, $finalTo))->get();
            $results = $this->information;
            $num_rows = count($results);
			
			$finalFrom = explode(' ',$finalFrom);
			
            $this->data['result'][] = array(
                                            'y' => $finalFrom[0],
                                            'a' => $num_rows 
                                            ); 
            $i--;
            $this->from++;
            $this->to++;
        }
        
        $this->data['result'] = $this->data['result'];   
        //return view('admin.dashboard', $this->data);
        

		$this->data['result2'] = array();
        $i = $this->total_days;
        $this->from = $this->current_year."-".$this->current_month."-01";
        $this->to = $this->current_year."-".$this->current_month."-01";

        while ( $i >= 1 ){

            $timeFrom = " 00:00:00";
            $timeTo   = " 23:59:59";
            $finalFrom = $this->from . $timeFrom;
            $finalTo = $this->to . $timeTo; 
            $this->information = MilitaryInformation::whereBetween('created_at', array($finalFrom, $finalTo))->get();
            $results = $this->information;
            $num_rows = count($results);
            
            $finalFrom = explode(' ',$finalFrom);

            $this->data['result2'][] = array(
                                            'y' => $finalFrom[0],
                                            'a' => $num_rows 
                                            ); 
            $i--;
            $this->from++;
            $this->to++;
        }
        
        $this->data['result2'] = $this->data['result2'];
        $this->healthStatistisc();
        $this->branchServicesStatistisc();
        $this->genderStatistisc();
        $this->getUsersAgeAndGender();
        $this->militaryStatistisc();
        return view('admin.dashboard', $this->data);  
    }


    public function healthStatistisc(){
        $health = DB::table('status-information')->get()->pluck('health_problems');
        $compute = array();
        $a = 0;
        foreach ($health as $checkStatic)
        {
            $healthArray =  explode(",",$checkStatic);
            foreach ($healthArray as $key => $value) {
                $compute[$a] = $value;
                $a++;
            }

        }  
        function branchPercentage($array, $round=1){
            $num = count($array);

            return array_map(
                function($val) use ($num,$round){
                    return array('count'=>$val,'avg'=>round($val/$num*100, $round));
                },
                array_count_values($array));
        }
        
        $avgs = branchPercentage($compute);
        foreach ($avgs as $key => $value) {
            $this->data['result4'][]=  array(
                'Health' => $key,
                'Percantage' => $value['avg'] 
            );
        }

       return $this->data['result4'];
    }

    public function branchServicesStatistisc(){
        $health = DB::table('miltary_information')->get()->pluck('branchservice');
        $compute = array();
        $a = 0;
        foreach ($health as $checkStatic)
        {
            $healthArray =  explode(",",$checkStatic);
            foreach ($healthArray as $key => $value) {
                $compute[$a] = $value;
                $a++;
            }

        }  
        function array_avg($array, $round=1){
            $num = count($array);
            return array_map(
                function($val) use ($num,$round){
                    return array('count'=>$val,'avg'=>round($val/$num*100, $round));
                },
                array_count_values($array));
        }
        
        $avgs = array_avg($compute);
        foreach ($avgs as $key => $value) {
            $this->data['result5'][]=  array(
                'Services' => $key,
                'Percantage' => $value['avg'] 
            );
        }
       return $this->data['result5'];
    }    


    public function getUsersAgeAndGender(){
		
		$twfr_male1 = PersonalInformation::where(function ($query) {
				$start_date1 	= date("Y",strtotime("-20 years"));
				$end_date1 		= date("Y",strtotime("-40 years"));
				
                $query->where('dateofbirth','like',"%".$start_date1)
                      ->orWhere('dateofbirth','like','%'.$end_date1);
            	})
			->where(function ($query) {
                $query->where('gender','=',"'Male'")
                      ->orWhere('gender','=','Male')
					  ->orWhere('gender','=','m');
            	})
			->count();
			
		$twfr_female1 = PersonalInformation::where(function ($query) {
				$start_date1 	= date("Y",strtotime("-20 years"));
				$end_date1 		= date("Y",strtotime("-40 years"));
				
                $query->where('dateofbirth','like',"%".$start_date1)
                      ->orWhere('dateofbirth','like','%'.$end_date1);
            	})
			->where('gender','=',"Female")
			->count();
			
		$twfr_male2 = PersonalInformation::where(function ($query) {
				$start_date2 	= date("Y",strtotime("-41 years"));
				$end_date2 		= date("Y",strtotime("-60 years"));
				
                $query->where('dateofbirth','like',"%".$start_date2)
                      ->orWhere('dateofbirth','like','%'.$end_date2);
            	})
			->where(function ($query) {
                $query->where('gender','=',"'Male'")
                      ->orWhere('gender','=','Male')
					  ->orWhere('gender','=','m');
            	})
			->count();
			
		$twfr_female2 = PersonalInformation::where(function ($query) {
				$start_date2 	= date("Y",strtotime("-41 years"));
				$end_date2 		= date("Y",strtotime("-60 years"));
				
                $query->where('dateofbirth','like',"%".$start_date2)
                      ->orWhere('dateofbirth','like','%'.$end_date2);
            	})
			->where('gender','=',"Female")
			->count();
			
		$twfr_male3 = PersonalInformation::where(function ($query) {
				$start_date3 	= date("Y",strtotime("-61 years"));
				$end_date3 		= date("Y",strtotime("-80 years"));
				
                $query->where('dateofbirth','like',"%".$start_date3)
                      ->orWhere('dateofbirth','like','%'.$end_date3);
            	})
			->where(function ($query) {
                $query->where('gender','=',"'Male'")
                      ->orWhere('gender','=','Male')
					  ->orWhere('gender','=','m');
            	})
			->count();
			
		$twfr_female3 = PersonalInformation::where(function ($query) {
				$start_date3 	= date("Y",strtotime("-61 years"));
				$end_date3 		= date("Y",strtotime("-80 years"));
				
                $query->where('dateofbirth','like',"%".$start_date3)
                      ->orWhere('dateofbirth','like','%'.$end_date3);
            	})
			->where('gender','=',"Female")
			->count();
			
		$twfr_male4 = PersonalInformation::where(function ($query) {
				$start_date4 	= date("Y",strtotime("-81 years"));
				$end_date4 		= date("Y",strtotime("-100 years"));
				
                $query->where('dateofbirth','like',"%".$start_date4)
                      ->orWhere('dateofbirth','like','%'.$end_date4);
            	})
			->where(function ($query) {
                $query->where('gender','=',"'Male'")
                      ->orWhere('gender','=','Male')
					  ->orWhere('gender','=','m');
            	})
			->count();
					
		$twfr_female4 = PersonalInformation::where(function ($query) {
				$start_date4 	= date("Y",strtotime("-81 years"));
				$end_date4 		= date("Y",strtotime("-100 years"));
				
                $query->where('dateofbirth','like',"%".$start_date4)
                      ->orWhere('dateofbirth','like','%'.$end_date4);
            	})
			->where('gender','=',"Female")
			->count();
		
		$arrayUsers[] = array(
		 '20-40 years', 
		 $twfr_male1,
		 $twfr_male1, 
		 $twfr_female1, 
		 $twfr_female1, 
		);
		
		$arrayUsers[] = array(
		 '41-60 years', 
		 $twfr_male2,
		 $twfr_male2, 
		 $twfr_female2, 
		 $twfr_female2, 
		);
		
		$arrayUsers[] = array(
		 '61-80 years', 
		 $twfr_male3,
		 $twfr_male3, 
		 $twfr_female3, 
		 $twfr_female3, 
		);
		
		$arrayUsers[] = array(
		 '81-100 years', 
		 $twfr_male4,
		 $twfr_male4, 
		 $twfr_female4, 
		 $twfr_female4, 
		);
		
		return $this->data['result7'] = $arrayUsers;
    }


    public function militaryStatistisc(){       
       $totalUsers = MilitaryInformation::get()->count();
       $warzone = MilitaryInformation::where('warzone' ,'=','Yes')->get()->count();
       $warZonePercent = $warzone * 100 / $totalUsers;
	   
	   
	   $warzone1 = MilitaryInformation::where('warzone' ,'=','No')->get()->count();
       $warZonePercent1 = $warzone1 * 100 / $totalUsers;

       /*$warzoneMosUnit = MilitaryInformation::where('mos' ,'=','Unit')->get()->count();
       $warZoneMosUnit = $warzoneMosUnit * 100 / $totalUsers;

       $warzoneMosMos = MilitaryInformation::where('mos' ,'=','Mos')->get()->count();
       $warZoneMosMosPercent = $warzoneMosMos * 100 / $totalUsers;

       $warzoneMosBoth = MilitaryInformation::where('mos' ,'=','Both')->get()->count();
       $warZoneMosBothPercent = $warzoneMosBoth * 100 / $totalUsers;  */     
    


       $warStatistics = array(
        array(
            "warzone" => "Yes",
            "value" => floor($warZonePercent)
        ),
		 array(
            "warzone" => "No",
            "value" => floor($warZonePercent1)
        ),
       // array(
//            "warzone"=> "MOS",
//            "value"=> floor($warZoneMosMosPercent)
//        ),
//        array(
//            "warzone"=> "Both",
//            "value"=> floor($warZoneMosBothPercent)
//        ),
//        array(
//            "warzone"=> "Units",
//            "value"=> floor($warZoneMosUnit)
//        ),
       );

       $this->data['result8'] = $warStatistics;

       return  $this->data['result8'];

    }


     public function genderStatistisc(){
        $male = PersonalInformation::where('gender', '=', 'male')->get();
        $female = PersonalInformation::where('gender', '=', 'female')->get();
        $femaleCount = $female->count();
        $male = $male->count();
        $total = $male+$femaleCount;
        $totalPercentofMale = $male * 100/$total;
        $totalPercentofFemale = $femaleCount * 100/$total;
        $this->data['result6']=  array(
           array( 
            'Gender' => 'Male',
            'Percentage' => floor($totalPercentofMale)),
           array( 
            'Gender' => 'Female',
            'Percentage' => floor($totalPercentofFemale)
            )
        );
        return $this->data['result6'];
    }    




    public function generate(){
       $final = array();
       $demoRecords = DemoGraphic::get();
       foreach ( $demoRecords as $demoRecord ) {
            $emergencyRecords = EmergencyMedicalInfo::where("demographic_id",$demoRecord->id)->first();
            $liabilityRecords = ReleaseLiability::where("demographic_id",$demoRecord->id)->first();
            $volunteerRecords = VolunteerOpportunities::where("demographic_id",$demoRecord->id)->first();

            $final[] = array(
                            'firstname'                                 => (isset($demoRecord->firstname)) ? $demoRecord->firstname : "",
                            'middlename'                                => (isset($demoRecord->middlename)) ? $demoRecord->middlename : "",
                            'lastname'                                  => (isset($demoRecord->lastname)) ? $demoRecord->lastname : "",
                            'phone'                                     => (isset($demoRecord->phone)) ? $demoRecord->phone : "",
                            'email'                                     => (isset($demoRecord->email)) ? $demoRecord->email : "",
                            'occupation'                                => (isset($demoRecord->occupation)) ? $demoRecord->occupation : "",
                            'activedutymilitary'                        => (isset($demoRecord->activedutymilitary)) ? $demoRecord->activedutymilitary : "",
                            'individual_group'                          => (isset($demoRecord->individual_group)) ? $demoRecord->individual_group : "",
                            'group_name'                                => (isset($demoRecord->group_name)) ? $demoRecord->group_name : "",
                            'group_participants'                        => (isset($demoRecord->group_participants)) ? $demoRecord->group_participants : "",

                            'wednesdayam'                               => (isset($volunteerRecords->wednesdayam)) ? $volunteerRecords->wednesdayam : "",
                            'wednesdaypm'                               => (isset($volunteerRecords->wednesdaypm)) ? $volunteerRecords->wednesdaypm : "",
                            'thursdayam'                                => (isset($volunteerRecords->thursdayam)) ? $volunteerRecords->thursdayam : "",
                            'thursdaypm'                                => (isset($volunteerRecords->thursdaypm)) ? $volunteerRecords->thursdaypm : "",
                            'fridayam'                                  => (isset($volunteerRecords->fridayam)) ? $volunteerRecords->fridayam : "",
                            'fridaypm'                                  => (isset($volunteerRecords->fridaypm)) ? $volunteerRecords->fridaypm : "",
                            'saturdayam'                                => (isset($volunteerRecords->saturdayam)) ? $volunteerRecords->saturdayam : "",
                            'saturdaypm'                                => (isset($volunteerRecords->saturdaypm)) ? $volunteerRecords->saturdaypm : "",
                            'sundayam'                                  => (isset($volunteerRecords->sundayam)) ? $volunteerRecords->sundayam : "",
                            'comments'                                  => (isset($volunteerRecords->comments)) ? $volunteerRecords->comments : "",
                            'maywecontact'                              => (isset($volunteerRecords->maywecontact)) ? $volunteerRecords->maywecontact : "",

                            'emergencycname'                            => (isset($emergencyRecords->emergencycname)) ? $emergencyRecords->emergencycname : "",
                            'emergencycnumber'                          => (isset($emergencyRecords->emergencycnumber)) ? $emergencyRecords->emergencycnumber : "",
                            'medicalinformation'                        => (isset($emergencyRecords->medicalinformation)) ? $emergencyRecords->medicalinformation : "",

                            'release_firstname'                         => (isset($liabilityRecords->release_firstname)) ? $liabilityRecords->release_firstname : "",
                            'release_lastname'                        => (isset($liabilityRecords->release_lastname)) ? $liabilityRecords->release_lastname : "",
                            'release_email'                        => (isset($liabilityRecords->release_email)) ? $liabilityRecords->release_email : "",
                            'agree'                                     => (isset($liabilityRecords->agree)) ? $liabilityRecords->agree : "",

                            );
       }

	    $filename = "volunteer.csv";
	    $handle = fopen($filename, 'w+');
	    fputcsv($handle, array(
	    'First Name',
	    'Middle Name',
	    'Last Name',
	    'Cell Number',
	    'Email Address',
	    'Occupation',
	    'Are you a veteran or active duty military?',
	    'Are you participating as an individual or with a group?',
	    "If you're participating with a group, what is the name of the group?",
	    'Please enter the names of the group participants',

	    'Wednesday AM (2/6/2019) 7am-12pm',
	    'Wednesday PM (2/6/2019) 12pm-5pm',
	    'Thursday AM (2/7/2019) 7am-12pm ',
	    'Thursday PM ( 2/7/2019)12pm-5pm',
	    'Friday AM (2/8/2019) 7am-12pm',
	    'Friday PM (2/8/2019) 12pm-5pm',
	    'Saturday AM (2/9/2019) 7am-12pm',
	    'Saturday PM (2/9/2019) 12pm-5pm',
	    'Sunday AM (2/10/2019) 7am-12pm',
	    'Comments or Questions?',
	    'May we contact you next year by email with volunteer opportunities for the 2020 NCVSD?',


	    'Emergency Contact Name',
	    'Emergency Contact Number',
	    'Important Medical Information',
	    
	    'First Name',
	    'Last Name',
	    'Email Address',
	    'By checking the box below, I confirm that I have read the document and understand it. I further understand that by checking the box below, I voluntarily surrender certain legal rights'
	    ), ",",'"');
	    
	    foreach($final as $row){
	        fputcsv($handle, $row, ",",'"');
	    }
	    fclose($handle);
		
		/*Change graph CSV accroding to Health and Percentage*/
		/*$final = array();
		$health = DB::table('status-information')->get()->pluck('health_problems');
        $compute = array();
        $a = 0;
        foreach ($health as $checkStatic)
        {
            $healthArray =  explode(",",$checkStatic);
            foreach ($healthArray as $key => $value) {
                $compute[$a] = $value;
                $a++;
            }

        }  
		function branchPercentage($array, $round=1){
            $num = count($array);

            return array_map(
                function($val) use ($num,$round){
                    return array('count'=>$val,'avg'=>round($val/$num*100, $round));
                },
                array_count_values($array));
        }
		$avgs = branchPercentage($compute);
        foreach ($avgs as $key => $value) {
            $final[] =  array(
                'Health' => $key,
                'Percantage' => $value['avg'] 
            );
        }
		
		$filename = "volunteer.csv";
	    $handle = fopen($filename, 'w+');
		fputcsv($handle, array(
	    'Health Problems',
	    'Percentage'
	    ), ",",'"');
	    
	    foreach($final as $row){
	        fputcsv($handle, $row, ",",'"');
	    }
	    fclose($handle);*/
		
	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );
	    return response()->download($filename, 'volunteer '.date("d-m-Y H:i").'.csv', $headers);
	}
	
	public function health(){
		/*Change graph CSV accroding to Health and Percentage*/
		$final = array();
		$health = DB::table('status-information')->get()->pluck('health_problems');
        $compute = array();
        $a = 0;
        foreach ($health as $checkStatic)
        {
            $healthArray =  explode(",",$checkStatic);
            foreach ($healthArray as $key => $value) {
                $compute[$a] = $value;
                $a++;
            }

        }  
		function branchPercentage($array, $round=1){
            $num = count($array);

            return array_map(
                function($val) use ($num,$round){
                    return array('count'=>$val,'avg'=>round($val/$num*100, $round));
                },
                array_count_values($array));
        }
		$avgs = branchPercentage($compute);
        foreach ($avgs as $key => $value) {
            $final[] =  array(
                'Health' => $key,
                'Percantage' => $value['avg'] 
            );
        }
		
		$filename = "volunteer.csv";
	    $handle = fopen($filename, 'w+');
		fputcsv($handle, array(
	    'Health Problems',
	    'Percentage'
	    ), ",",'"');
	    
	    foreach($final as $row){
	        fputcsv($handle, $row, ",",'"');
	    }
	    fclose($handle);
		
	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );
	    return response()->download($filename, 'Health '.date("d-m-Y H:i").'.csv', $headers);		
	}
   
   
	public function generate2(){
        
        $final = array();
        $militaryRecords = MilitaryInformation::get();
        foreach ( $militaryRecords as $militaryRecord ) {
            $personalRecords = PersonalInformation::where("id",$militaryRecord->information_id)->first();
            $statusRecords = StatusInformation::where("information_id",$militaryRecord->information_id)->first();
            //echo '<pre>';print_r($statusRecords);exit;
            
            $pet = '';
            if(isset($statusRecords->petanswer) && $statusRecords->petanswer == 'No'){
				$pet = $statusRecords->pet;
			}else{
	            if(isset($statusRecords->pet)){
					$pet = $statusRecords->petanswer.', '.$statusRecords->pet;
				}elseif(isset($statusRecords->pet_other)){
					$pet = isset($statusRecords->petanswer) ? $statusRecords->petanswer : ''.', '.isset($statusRecords->pet_other_name) ? $statusRecords->pet_other_name : '';
				}
			}
			
			$pickupLocation = '';
			if( isset($statusRecords->pickuplocation) && $statusRecords->pickuplocation != '' ){
				$pickupLocation = $statusRecords->pickuplocation;
			}else{
				$pickupLocation = isset($statusRecords->pickuplocation_other) ? $statusRecords->pickuplocation_other : '';
			}
            
            $final[] = array(
                            'firstname'             => (isset($personalRecords->firstname)) ? $personalRecords->firstname : "",
                            'middlename'            => (isset($personalRecords->middlename)) ? $personalRecords->middlename : "",
                            'lastname'              => (isset($personalRecords->lastname)) ? $personalRecords->lastname : "",
                            'serialsecurity'        => (isset($personalRecords->serialsecurit)) ? $personalRecords->serialsecurit : "",
                            'drivers_license'       => (isset($personalRecords->drivers_license)) ? $personalRecords->drivers_license : "",
                            'dateofbirth'           => (isset($personalRecords->dateofbirth)) ? $personalRecords->dateofbirth : "",
                            'birthcity'             => (isset($personalRecords->birthcity)) ? $personalRecords->birthcity : "",
                            'stateofbirth'          => (isset($personalRecords->stateofbirth)) ? $personalRecords->stateofbirth : "",
                            'gender'                => (isset($personalRecords->gender)) ? $personalRecords->gender : "",
                            'cellnumber'            => (isset($personalRecords->cellnumber)) ? $personalRecords->cellnumber : "",
                            'email'                 => (isset($personalRecords->email)) ? $personalRecords->email : "",
                            'warzone'               => (isset($militaryRecord->warzone)) ? $militaryRecord->warzone : "",
                            'mos'                   => (isset($militaryRecord->mos)) ? $militaryRecord->mos : "",
                            'serve'                 => (isset($militaryRecord->serve)) ? $militaryRecord->serve : "",
                            'branchservice'         => (isset($militaryRecord->branchservice)) ? $militaryRecord->branchservice : "",
                            'dateservedfrom'        => (isset($militaryRecord->dateservedfrom)) ? $militaryRecord->dateservedfrom : "",
                            'dateservedto'          => (isset($militaryRecord->dateservedto)) ? $militaryRecord->dateservedto : "",
                            'emh'                   => (isset($statusRecords->emh)) ? $statusRecords->emh : "",
                            'groupname'             => (isset($statusRecords->groupname)) ? $statusRecords->groupname : "",
                            'organization_answer'   => (isset($statusRecords->organization_answer)) ? $statusRecords->organization_answer : "",
                            'situation'             => (isset($statusRecords->situation)) ? $statusRecords->situation : "",
                            'health_problems'       => (isset($statusRecords->health_problems)) ? $statusRecords->health_problems : "",
                            'health_problem_answer' => (isset($statusRecords->health_problem_answer)) ? $statusRecords->health_problem_answer : "",
                            'legal_issues'          => (isset($statusRecords->legal_issues)) ? $statusRecords->legal_issues : "",
                            'court'                 => (isset($statusRecords->court)) ? $statusRecords->court : "",
                            'countydcss'            => (isset($statusRecords->countydcss)) ? $statusRecords->countydcss : "",
                            
                            'partner_attending'     => (isset($statusRecords->partner_attending)) ? $statusRecords->partner_attending : "",
                            
                            'partner_name'          => (isset($statusRecords->partner_name)) ? $statusRecords->partner_name : "",
                            'underage_children'     => (isset($statusRecords->underage_children)) ? $statusRecords->underage_children : "",
                            'children_name'         => (isset($statusRecords->children_name)) ? $statusRecords->children_name : "",
                            
                            'petanswer'             => $pet,
                            'pet_quantity'          => (isset($statusRecords->pet_quantity)) ? $statusRecords->pet_quantity : "",
                            'pet_breed'             => (isset($statusRecords->pet_breed)) ? $statusRecords->pet_breed : "",
                            
                            'wheelchair'            => (isset($statusRecords->wheelchair)) ? $statusRecords->wheelchair : "",
                            'pickuplocation'        => $pickupLocation,
                            'vehicle'               => (isset($statusRecords->vehicle)) ? $statusRecords->vehicle : "",
                            'emergencycname'        => (isset($statusRecords->emergencycname)) ? $statusRecords->emergencycname : "",
                            'emergencycphone'       => (isset($statusRecords->emergencycphone)) ? $statusRecords->emergencycphone : "",
                            'sexoffense'            => (isset($statusRecords->sexoffense)) ? $statusRecords->sexoffense : "",
                            'electronic_signature'  => (isset($statusRecords->electronic_signature)) ? $statusRecords->electronic_signature : "",
                            'agree'  => "I understand and agree",
                        );
        }

        $filename = "veteren.csv";
        $handle = fopen($filename, 'w+');
        
        fputcsv($handle, array(
        'First Name',
        'Middle Name',
        'Last Name',
        'Social Security Number',
        "Driver's License State & Number",
        'Date of Birth (dd-mm-yyyy)',
        'Birth City ',
        'State of Birth',
        'What is Your Gender?',
        'Cell Number',
        'Email Address',
        
        'Did you serve in a war zone?',
        'Unit and or MOS',
        'If you answered yes, where did you serve?',
        'Branch of Service',
        'Date Served (From)',
        'Date Served (To)',
        
        'Are you interested in receiving more comprehensive support: employment, mentorship, and housing?',
        "If you're participating with a group, what is the name of the group?",
        'If you are currently supported by another organization',
        'This situation is one of the only exceptions to being able to leave and return',
        'Please list any current health problems',
        'If selected others, please mention all health problems',
        'If you have any legal issues, please indicate',
        'Would you like to attend Veterans Court?',
        'Do you have a child support case being administered by San Diego County D.C.S.S?',
        'Will a spouse or partner be attending with you?  ',
        'If yes, please provide their full legal name.',
        'Will any of your children (under the ages of 18) be attending with you?',
        'If yes, please provide their full legal name(s)',

        'Do you plan on bringing a pet with you to the event?',
        'pet_quantity',
        'pet_breed',
        
        'If you have any special needs such as wheelchair access, please indicate:',
        'Please select your pick-up / drop-off location',
        'Will you be arriving by other means such as a car or bicycle? Please explain.',
        
        'Emergency Contact Name ',
        'Emergency Contact Phone',
        
        'I confirm: I have never been convicted of a sex offense.',
        'Please type your first and last name here for electronic signature',
        'I understand that checking this box constitutes a legal signature confirming that I acknowledge and agree to the above Terms of Acceptance.',
        
        ), ",",'"');
        foreach($final as $row){
                fputcsv($handle, $row, ",",'"');
            }
        fclose($handle);
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return response()->download($filename, 'veteren '.date("d-m-Y H:i").'.csv', $headers);
        }    
    
}
