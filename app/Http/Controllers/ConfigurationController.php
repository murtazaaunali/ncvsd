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

use App\Configuration;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Helpers;

class ConfigurationController extends Controller
{
    //
	public function __construct(){
		
	}
	public function index(){
		//echo recept_veterans_emails();exit;
		if(Auth::user()->user_type != 'Super Admin'){
			return redirect('dashboard');
		}

		$this->data['volemails'] 			= '';
		$this->data['vetemails'] 			= '';
		$this->data['volemailsender'] 		= '';
		$this->data['vetemailsender'] 		= '';
		$this->data['volemailsubject'] 		= '';
		$this->data['vetemailsubject'] 		= '';
		$this->data['systemesendername'] 	= '';
		$this->data['systemesenderemail'] 	= '';
		$this->data['analytics'] 			= '';
		
		$configuration = Configuration::first();
		
		if(!empty($configuration)){
			$this->data['volemails'] 			= $configuration->volunteer_emails;
			$this->data['vetemails'] 			= $configuration->veteran_emails;
			$this->data['volemailsender'] 		= $configuration->volunteer_email_sender;
			$this->data['vetemailsender'] 		= $configuration->veteran_email_sender;
			$this->data['volemailsubject'] 		= $configuration->volunteer_email_subject;
			$this->data['vetemailsubject'] 		= $configuration->veteran_email_subject;
			$this->data['systemesendername'] 	= $configuration->system_email_sender_name;
			$this->data['systemesenderemail'] 	= $configuration->system_email_sender;
			$this->data['analytics'] 			= $configuration->analytics;
		}

		return view('admin.configuration',$this->data);
	}
	
	public function updateconfiguration(Request $request){
		
		$configuration = Configuration::find(1);
		$configuration->volunteer_emails 			= $request->volemails;
		$configuration->veteran_emails 				= $request->vetemails;
		$configuration->volunteer_email_sender 		= $request->volemailsender;
		$configuration->veteran_email_sender 		= $request->vetemailsender;
		$configuration->volunteer_email_subject 	= $request->volemailsubject;
		$configuration->veteran_email_subject 		= $request->vetemailsubject;
		$configuration->system_email_sender_name 	= $request->systemesendername;
		$configuration->system_email_sender 		= $request->systemesenderemail;
		$configuration->analytics 					= $request->analytics;
		$configuration->updated_at 					= date('Y-m-d H:i:s');
		$configuration->save();
		
		Session::flash('updateConfiguration','<div class="alert alert-success">Configuration Updated</div>');
		return redirect('dashboard/configuration');
		
	}
	
}
