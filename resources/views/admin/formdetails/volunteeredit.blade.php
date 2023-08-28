@extends('admin.layout.master')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    
    <!-- date range picker -->
    <!-- App css -->

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
    
    <link href="{{ asset('assets/css/jquery-ui.theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/jquery-ui.structure.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/prettify.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/gsdk-bootstrap-wizard.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    
    <!-- SCRIPTS -->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('assets/js/prettify.js') }}"></script>    
    <script src="{{ asset('assets/js/common.js') }}"></script>  

    <style>
		body {background-color: #f7f7f7; }
		.container {width: auto !important;}
		.navbar{margin-bottom: 0px;}
		#rootwizard .nav-pills li a{font-size:16px;}
	</style>


    <div class="content-page">
    <div class="content">
    <div class="container">
         <form id="volunteer-form" enctype="multipart/form-data" action="{{url('dashboard/updatevolunteer')}}" method="post">
        {{ csrf_field() }}

            <section id="wizard">
                <div class="page-header">
                    <h2>North County Veteran Stand Down</h2>

					@if (Session::has('success'))
						{!! session('success') !!}
					@endif

                </div>
                
               
                <div id="rootwizard">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="nav-justified">
                                <li>
                                    <a href="#Demographic" data-toggle="tab">Demographic</a>
                                </li>
                                <li>
                                    <a href="#Volunteer_Opportunities" data-toggle="tab">Volunteer Opportunities</a>
                                </li>
                                <li>
                                    <a href="#Emergency_Medical_Info" data-toggle="tab">Emergency & Medical Info</a>
                                </li>
                                <li>
                                    <a href="#Release_of_Liability" data-toggle="tab">Release of Liability</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="Demographic">
                            <small class="sub-text">We welcome all volunteers; Volunteers must be over 12 years of age to participate and must be
                                accompanied by a guardian or parent.” Please complete this form in its entirety.</small>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name
                                            <small>*</small>
                                        </label>
                                        <input name="firstname" type="text" class="form-control" required="" value="@if(isset($data['firstname'])){{$data['firstname']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Middle Name
                                        </label>
                                        <input name="middlename" type="text" class="form-control" value="@if(isset($data['middlename'])){{$data['middlename']}}@endif"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name
                                            <small>*</small>
                                        </label>
                                        <input name="lastname" type="text" class="form-control" required="" value="@if(isset($data['lastname'])){{$data['lastname']}}@endif">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cell Number
                                            <small>*</small>
                                        </label>
                                        <input name="cellphone" type="text" class="form-control" required="" value="@if(isset($data['phone'])){{$data['phone']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email Address
                                        	<small>*</small>
                                        </label>
                                        <input name="email" type="email" class="form-control" required="" value="@if(isset($data['email'])){{$data['email']}}@endif"/>
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Occupation
                                        </label>
                                        <input name="occupation" type="text" class="form-control" value="@if(isset($data['occupation'])){{$data['occupation']}}@endif" >
                                    </div>
                            	</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Are you a veteran or active duty military?
                                            <small>*</small>
                                        </label>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Veteran" required="" @if($data['activedutymilitary'] == 'Veteran') checked @endif>Veteran
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Veteran family member" required="" @if($data['activedutymilitary'] == 'Veteran family member') checked @endif>Veteran family member
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Active duty" required="" @if($data['activedutymilitary'] == 'Active duty') checked @endif>Active duty
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Active duty family member" required="" @if($data['activedutymilitary'] == 'Active duty family member') checked @endif>Active duty family member
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="None of the above" required="" @if($data['activedutymilitary'] == 'None of the above') checked @endif>None of the above
                                            </label>
                                        </div>
                                        <label class="error" for="activedutymilitary"></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Are you participating as an individual or with a
                                            <br>group? <small>*</small>
                                        </label>
                                        <select class="form-control" name="individual_group" title="please select something">
                                            <option value="">Choose</option>
                                            <option value="Individual" @if($data['individual_group'] == 'Individual') selected="" @endif>Individual</option>
                                            <option value="Organization" @if($data['individual_group'] == 'Organization') selected="" @endif>Organization</option>
                                        </select>
                                        <label class="error" for="individual_group"></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>If you're participating with a group, what is the name of the group?</label>
                                        <input type="text" name="group_name" class="form-control" placeholder="Your Answer" value="@if(isset($data['group_name'])){{$data['group_name']}}@endif"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Please enter the names of the group participants (separate using ‘,’)</label>
                                        <textarea class="form-control" name="group_participants" placeholder="Enter the Group Member Names">@if(isset($data['group_participants'])){{$data['group_participants']}}@endif</textarea>
                                    </div>
                                </div>

                                <div class="col-sm-4">
									<div class="form-group{{ $errors->has('profile') ? ' has-error' : '' }}">
										<label for="profile" class="control-label">Profile Image</label>
										<input id="profile" type="file" class="form-control v_profile" name="profile" />

										@if ($errors->has('profile'))
											<span class="help-block">
												<strong>{{ $errors->first('profile') }}</strong>
											</span>
										@endif

										@if($data['profile'] != "")
										<div style="margin-top: 10px;">
											<img src="{!! asset('uploads/volunteers/'.$data['demo_id'].'/'.$data['profile']) !!}" width="100" height="100" />
										</div>
										@endif
									</div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="Volunteer_Opportunities">
                            <h5 class="info-text">Volunteer Opportunitues</h5>
                            <small class="sub-text">Please select ALL volunteer shifts that you intend to work. By selecting a shift, you are confirming
                                your attendance. Note: Volunteers on Wednesday (setup day) and Sunday (breakdown day) you
                                may be asked to perform physically strenuous tasks. (i.e. lifting heavy objects, moving tables,
                                etc.) Veteran Buddy’s and security volunteers are more physically active than all other positions;
                                please select a position that suits your desired level of activity.</small>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <h5>Wednesday AM (2/6/2019) 7am-12pm
                                        </h5>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="wednesdayam" @if($data['wednesdayam'] == 'This is set up day. All volunteers for this day will help stage and set up for the event. Areas needing assistance: Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security, Logistics.') checked @endif value="This is set up day. All volunteers for this day will help stage and set up for the event. Areas needing assistance: Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security, Logistics."> This is set up day. All volunteers for this day will help stage and set
                                                up for the event. Areas needing assistance:
                                                <br>Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security,
                                                Logistics.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <h5>Wednesday PM (2/6/2019) 12pm-5pm
                                        </h5>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="wednesdaypm" @if($data['wednesdaypm'] == 'This is set up day. All volunteers for this day will help stage and set up for the event. Areas needing assistance: Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security, Logistics.') checked @endif value="This is set up day. All volunteers for this day will help stage and set up for the event. Areas needing assistance: Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security, Logistics."> This is set up day. All volunteers for this day will help stage and set
                                                up for the event. Areas needing assistance:
                                                <br>Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security,
                                                Logistics.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Thursday AM (2/7/2019) 7am-12pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>

	                                	@php 
	                                		$thursdayam = array();
		                                	if($data['thursdayam']){
			                                	$thursdayam = explode('|',$data['thursdayam']); 
											}
	                                	@endphp

                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without',$thursdayam)) checked @endif value="Veteran Buddy: accompanies and helps our guests to relax. Listens without"> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('Security: observe and report to Security Team. Will be briefed by Security',$thursdayam)) checked @endif value="Security: observe and report to Security Team. Will be briefed by Security">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('I am willing to volunteer anywhere',$thursdayam)) checked @endif value="I am willing to volunteer anywhere">I am willing to volunteer anywhere
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$thursdayam)) checked @endif value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$thursdayam)) checked @endif value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$thursdayam)) checked @endif value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('Guest Registration: Help direct Guests through the check in areas to make sure they see all stations.',$thursdayam)) checked @endif value="Guest Registration: Help direct Guests through the check in areas to make sure they see all stations.">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" @if(in_array('I am willing to volunteer anywhere as needed.',$thursdayam)) checked @endif value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Thursday PM ( 2/7/2019)12pm-5pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>

	                                	@php 
	                                		$thursdaypm = array();
		                                	if($data['thursdaypm']){
			                                	$thursdaypm = explode('|',$data['thursdaypm']); 
											}
	                                	@endphp
	                                	
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without judgement." @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without judgement.',$thursdaypm)) checked @endif> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement." @if(in_array('Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement.',$thursdaypm)) checked @endif>Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="I am willing to volunteer anywhere" @if(in_array('I am willing to volunteer anywhere',$thursdaypm)) checked @endif>I am willing to volunteer anywhere
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace." @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$thursdaypm)) checked @endif>Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments." @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$thursdaypm)) checked @endif>Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Mall Tent Area: Assist with the daily activities in the Mall." @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$thursdaypm)) checked @endif>Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Guest Registration: Help direct Guests through the check in areas to make" @if(in_array('Guest Registration: Help direct Guests through the check in areas to make',$thursdaypm)) checked @endif>Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="I am willing to volunteer anywhere as needed." @if(in_array('I am willing to volunteer anywhere as needed.',$thursdaypm)) checked @endif>I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Friday AM (2/8/2019) 7am-12pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>
	                                	@php 
	                                		$fridayam = array();
		                                	if($data['fridayam']){
			                                	$fridayam = explode('|',$data['fridayam']); 
											}
	                                	@endphp

                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without judgement." @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without judgement.',$fridayam)) checked @endif> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement." @if(in_array('Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement.',$fridayam)) checked @endif>Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace." @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$fridayam)) checked @endif>Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments." @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$fridayam)) checked @endif>Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall." @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$fridayam)) checked @endif>Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Guest Registration: Help direct Guests through the check in areas to make" @if(in_array('Guest Registration: Help direct Guests through the check in areas to make',$fridayam)) checked @endif>Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="I am willing to volunteer anywhere as needed." @if(in_array('I am willing to volunteer anywhere as needed.',$fridayam)) checked @endif>I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Friday PM (2/8/2019) 12pm-5pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>
	                                	@php 
	                                		$fridaypm = array();
		                                	if($data['fridaypm']){
			                                	$fridaypm = explode('|',$data['fridaypm']); 
											}
	                                	@endphp
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without" @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without',$fridaypm)) checked @endif> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement." @if(in_array('Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement.',$fridaypm)) checked @endif>Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace." @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$fridaypm)) checked @endif>Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments." @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$fridaypm)) checked @endif>Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Mall Tent Area: Assist with the daily activities in the Mall." @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$fridaypm)) checked @endif>Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" value="Guest Registration: Help direct Guests through the check in areas to make sure they see all stations." @if(in_array('Guest Registration: Help direct Guests through the check in areas to make sure they see all stations.',$fridaypm)) checked @endif>Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="I am willing to volunteer anywhere as needed." @if(in_array('I am willing to volunteer anywhere as needed.',$fridaypm)) checked @endif>I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Saturday AM (2/9/2019) 7am-12pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>
	                                	@php 
	                                		$saturdayam = array();
		                                	if($data['saturdayam']){
			                                	$saturdayam = explode('|',$data['saturdayam']); 
											}
	                                	@endphp
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without" @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without',$saturdayam)) checked @endif> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Security: observe and report to Security Team. Will be briefed by Security" @if(in_array('Security: observe and report to Security Team. Will be briefed by Security',$saturdayam)) checked @endif>Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace." @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$saturdayam)) checked @endif>Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments." @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$saturdayam)) checked @endif>Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall." @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$saturdayam)) checked @endif>Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Guest Registration: Help direct Guests through the check in areas to make" @if(in_array('Guest Registration: Help direct Guests through the check in areas to make',$saturdayam)) checked @endif>Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="I am willing to volunteer anywhere as needed." @if(in_array('I am willing to volunteer anywhere as needed.',$saturdayam)) checked @endif>I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Saturday PM (2/9/2019) 12pm-5pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>
	                                	@php 
	                                		$saturdaypm = array();
		                                	if($data['saturdaypm']){
			                                	$saturdaypm = explode('|',$data['saturdaypm']); 
											}
	                                	@endphp
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without" @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without',$saturdaypm)) checked @endif> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Security: observe and report to Security Team. Will be briefed by Security" @if(in_array('Security: observe and report to Security Team. Will be briefed by Security',$saturdaypm)) checked @endif>Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace." @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$saturdaypm)) checked @endif>Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments." @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$saturdaypm)) checked @endif>Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Mall Tent Area: Assist with the daily activities in the Mall." @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$saturdaypm)) checked @endif>Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Guest Registration: Help direct Guests through the check in areas to make" @if(in_array('Guest Registration: Help direct Guests through the check in areas to make',$saturdaypm)) checked @endif>Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="I am willing to volunteer anywhere as needed." @if(in_array('I am willing to volunteer anywhere as needed.',$saturdaypm)) checked @endif>I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group border-bottom">
                                        <h5>Sunday AM (2/10/2019) 7am-12pm
                                            <br>
                                            <small>Please select your preferred position. </small>
                                        </h5>
	                                	@php 
	                                		$sundayam = array();
		                                	if($data['sundayam']){
			                                	$sundayam = explode('|',$data['sundayam']); 
											}
	                                	@endphp
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without" @if(in_array('Veteran Buddy: accompanies and helps our guests to relax. Listens without',$sundayam)) checked @endif> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Security: observe and report to Security Team. Will be briefed by Security" @if(in_array('Security: observe and report to Security Team. Will be briefed by Security',$sundayam)) checked @endif>Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace." @if(in_array('Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.',$sundayam)) checked @endif>Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments." @if(in_array('Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.',$sundayam)) checked @endif>Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall." @if(in_array('Mall Tent Area: Assist with the daily activities in the Mall.',$sundayam)) checked @endif>Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Guest Registration: Help direct Guests through the check in areas to make" @if(in_array('Guest Registration: Help direct Guests through the check in areas to make',$sundayam)) checked @endif>Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="I am willing to volunteer anywhere as needed." @if(in_array('I am willing to volunteer anywhere as needed.',$sundayam)) checked @endif>I am willing to volunteer anywhere as needed.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Comments or Questions?
                                            <small>(optional)</small>
                                        </label>
                                        <input name="comments" type="text" placeholder="Your Answer" class="form-control" value="@if(isset($data['comments'])){{$data['comments']}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        May we contact you next year by email with volunteer opportunities for the 2020 NCVSD?
                                        <small>*</small>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="">
                                        <label>
                                            <input type="radio" name="maywecontact" value="Yes" @if($data['maywecontact'] == 'Yes') checked @endif>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="maywecontact" value="No" @if($data['maywecontact'] == 'No') checked @endif>No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="Emergency_Medical_Info">
                            <h5 class="info-text">Emergency & Medical Info</h5>
                            <small class="sub-text">This information will only be available to the NCVSD committee and used in the event of an emergency.
                                Please provide any medical information that may be important to emergency responders (diabetic,
                                history of seizures, etc).
                            </small>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Emergency Contact Name</label>
                                        <input type="text" name="emergencycname" class="form-control" value="@if(isset($data['emergencycname'])){{$data['emergencycname']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Emergency Contact Number</label>
                                        <input type="text" name="emergencynumber" class="form-control" value="@if(isset($data['emergencycnumber'])){{$data['emergencycnumber']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Important Medical Information (optional)</label>
                                        <input type="text" name="medicalinformation" class="form-control" placeholder="Your Answer" value="@if(isset($data['medicalinformation'])){{$data['medicalinformation']}}@endif">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Release_of_Liability">
                            <h5 class="info-text">Release of Liability</h5>
                            <small class="sub-text">In exchange for participation in the North County San Diego Veterans Stand Down (NCVSD) and/or
                                use of the property, facilities and services of Green Oak Ranch, I (fill in your name and
                                address below), I agree for myself and (if applicable) for the members of my family, to the
                                following: A copy of your responses will be emailed to the address you provided.
                            </small>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name
                                            <small>*</small>
                                        </label>
                                        <input type="text" name="release_firstname" class="form-control" required="" value="@if(isset($data['release_firstname'])){{$data['release_firstname']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name
                                            <small>*</small>
                                        </label>
                                        <input type="text" name="release_lastname" class="form-control" required="" value="@if(isset($data['release_lastname'])){{$data['release_lastname']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email Address
                                            <small>*</small>
                                        </label>
                                        <input type="email" name="release_email" class="form-control" required="" value="@if(isset($data['release_email'])){{$data['release_email']}}@endif">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-4">
                            		<div class="form-group">
                            		<label>Year Attending Standown: </label>
                            		<select name="attended_year" class="form-control">
                            			<option value="2017" @if($data['attended_year'] == '2017') selected="" @endif >2017</option>
                            			<option value="2018" @if($data['attended_year'] == '2018') selected="" @endif >2018</option>
                            			<option value="2019" @if($data['attended_year'] == '2019') selected="" @endif >2019</option>
                            		</select>
                            		</div>
                            	</div>
                            </div>
                            
                            
                            <h5 class="info-text">Release of Liability Agreement</h5>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="{{ asset('assets/img/agreement.png') }}" class="img-responsive" alt="Responsive image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="border-top">
                                By checking the box below, I confirm that I have read the document and understand it. I further understand that by checking
                                the box below, I voluntarily surrender certain legal rights. *
                            </h5>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="agree" value="I understand and agree"  @if($data['agree'] == 'I understand and agree') checked @endif required="">I understand and agree
                                        </label>
                                        <label class="error" for="agree"></label>
                                        
                                        
                                        <input type="hidden" name="demo_id" value="{{ $data['demo_id'] }}"/>
                                        <input type="hidden" name="release_id" value="{{ $data['release_id'] }}"/>
                                        <input type="hidden" name="emergency_id" value="{{ $data['emergency_id'] }}"/>
                                        <input type="hidden" name="vol_id" value="{{ $data['vol_id'] }}"/>
                                    </div>
                                    <small>A copy of your responses will be emailed to the address you provided.</small>
                                </div>
                            </div>
                        </div>
                        <ul class="pager wizard">
                            <li class="previous">
                                <a href="javascript:;">Back</a>
                            </li>
                            <li class="next">
                                <a href="javascript:;">Next</a>
                            </li>
                            <li class="finish">
                                <a href="javascript:;">Finish</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

        </form>
     </div><!--container-->
  </div>
  </div>
     <script>
        $(document).ready(function () {
        	var $validator = $("#volunteer-form").validate({
        		rules:{
					individual_group:{required:true},
				}
        	});
        	
				$('#rootwizard').bootstrapWizard({

	            	'tabClass': 'nav nav-pills',
	            	onTabClick: function(tab, navigation, index) {return false;},
	            	onNext: function(tab, navigation, index) {
		            	var $valid = $("#volunteer-form").valid();
						if(!$valid) {
			  				$validator.focusInvalid();
			  				return false;
			  			}
			  			$(window).scrollTop($('#rootwizard').offset().top);
		            },
		            onPrevious: function(tab, navigation, index) {
		            	$(window).scrollTop($('#rootwizard').offset().top);
		            },
                });

                $('#rootwizard .finish').click(function () {
                    $("#volunteer-form").submit();
                });

                window.prettyPrint && prettyPrint()
            $('.back_start-btn').on('click', function () {
                $('#rootwizard').hide();
                $('#start').show();
            });


        });
    </script>

@endsection