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
    <script src="{{ asset('assets/js/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
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
        <form id="veteran-form" enctype="multipart/form-data" action="{{url('dashboard/updateveteran')}}" method="post">
        {{ csrf_field() }}
            <section id="wizard">
                <div class="page-header">
                    <h2>North County Veterans Stand Down</h2>
                    <h1>Veterans</h1>
                </div>

				@if (Session::has('success'))
					{!! session('success') !!}
				@endif

                <div id="rootwizard">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="nav-justified">
                                <li>
                                    <a href="#Personal_Information_Section" data-toggle="tab">Personal Information Section</a>
                                </li>
                                <li>
                                    <a href="#Military_Information" data-toggle="tab">Military Information</a>
                                </li>
                                <li>
                                    <a href="#Status_Information" data-toggle="tab">Status Information</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="Personal_Information_Section">
                            <h5 class="info-text">Personal Information Section</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name
                                            <small>*</small>
                                        </label>
                                        <input name="firstname" type="text" class="form-control" required value="@if(isset($data['firstname'])){{$data['firstname']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Middle Name <small>*</small></label>
                                        <input name="middlename" type="text" class="form-control" required value="@if(isset($data['middlename'])){{$data['middlename']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name
                                            <small>*</small>
                                        </label>
                                        <input name="lastname" type="text" class="form-control" required value="@if(isset($data['lastname'])){{$data['lastname']}}@endif">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Social Security Number
                                            <small>*</small>
                                        </label>
                                        <input name="ssn" type="text" class="form-control" required value="@if(isset($data['serialsecurity'])){{$data['serialsecurity']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Driver's License State & Number
                                            <small>*</small>
                                        </label>
                                        <input name="dlsn" type="text" class="form-control" required value="@if(isset($data['drivers_license'])){{$data['drivers_license']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date of Birth</label><br />
                                        @if(isset($data['dateofbirth'])){!! 'Previous Date: <span class="label label-success">'.$data['dateofbirth'].'</span>' !!}<br/><br/>@endif
                                        <select name="b_day">
                                        	@for ($i = 1; $i <= 31; $i++)
                                        	<option @if($i < 10 ) value="0{{ $i }}" @else value="{{ $i }}" @endif >{{ $i }}</option>
                                        	@endfor
                                        </select>

                                        <select name="b_month">
                                        	<option value="01">Jan</option>
                                        	<option value="02">Feb</option>
                                        	<option value="03">Mar</option>
                                        	<option value="04">Apr</option>
                                        	<option value="05">May</option>
                                        	<option value="06">Jun</option>
                                        	<option value="07">Jul</option>
                                        	<option value="08">Aug</option>
                                        	<option value="09">Sept</option>
                                        	<option value="10">Oct</option>
                                        	<option value="11">Nov</option>
                                        	<option value="12">Dec</option>
                                        </select>
                                        
                                        <select name="b_year">
										    <?php $old = date('Y',strtotime('-100 years')); ?>
										    <?php for($i = 1; $i <= 86; $i++){ ?>
										        <option <?php echo ($i == 86 ? 'selected="selected"':''); ?> ><?php echo $old+$i; ?></option>
										    <?php } ?>
                                        </select>
                                        <input type="hidden" name="dateofbirth" value="{{ $data['dateofbirth'] }}"/>
                                    </div>
                            	</div>
                            </div><!--r-->

                            <div class="row">
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Birth City
                                            <small>*</small>
                                        </label>
                                        <input name="bc" type="text" class="form-control" required value="@if(isset($data['dateofbirth'])){{$data['dateofbirth']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State of Birth
                                            <small>*</small>
                                        </label>
                                        <input name="sb" type="text" class="form-control" required value="@if(isset($data['stateofbirth'])){{$data['stateofbirth']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>What is Your Gender? <small>*</small></label>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="gender" id="genderMale" value="Male" @if(str_replace(' ','',$data['gender']) == 'Male') checked="" @endif >Male
                                            </label>
                                            <label>
                                                <input type="radio" name="gender" id="genderFemale" value="Female" @if(str_replace(' ','',$data['gender']) == 'Female') checked="" @endif >Female
                                            </label>
                                            <br />
                                            <label for="gender" class="error"></label>
                                        </div>
                                    </div>                            		
                            	</div>
                            </div><!--r-->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            Will any of your children (under the ages of 18) be attending with you?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                        <label>
                                            <input type="radio" name="underage" value="Yes" @if($data['underage_children'] == 'Yes') checked="" @endif>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="underage" value="No" @if($data['underage_children'] == 'No') checked="" @endif>No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                                    <label for="underagelegalname">If yes, please provide their full legal name(s)</label>
                            	</div>
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="underagelegalname" type="text" class="form-control" value="@if(isset($data['children_name'])){{$data['children_name']}}@endif">
                                    </div>
                            	</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            Do you plan on bringing a pet with you to the event?
                                            <small>*</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                        <label>
                                            <input type="radio" name="petanswer" value="Yes" @if($data['petanswer'] == 'Yes') checked="" @endif required>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="petanswer" value="No" @if($data['petanswer'] == 'No') checked="" @endif required>No
                                        </label>
                                        <label class="error" for="petanswer"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="">
                                            <label>If yes</label>
                                            <label>
                                                <input type="radio" name="pet" value="Dog" @if($data['pet'] == 'Dog') checked="" @endif>Dog
                                            </label>
                                            <label>
                                                <input type="radio" name="pet" value="Cat" @if($data['pet'] == 'Cat') checked="" @endif>Cat
                                            </label>
                                            <label>
                                                <input type="radio" name="pet" value="Others" @if($data['pet'] == 'Others') checked="" @endif>Others
                                            </label>
                                        </div>
                                    </div>
                            	</div>
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="petanswerother" type="text" class="form-control" value="@if(isset($data['pet_other'])){{$data['pet_other']}}@endif"">
                                    </div>
                            	</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group pull-left">
                                        <label for="inputEmail3" class="col-sm-2 control-label pull-left">How Many?</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="howmanypet" class="form-control" placeholder="Your answer" min="0" value="{{ $data['pet_quantity'] }}">
                                        </div>
                                        <label for="inputEmail3" class="col-sm-3 control-label pull-left">What Breed?</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="whatbreed" class="form-control" placeholder="Your answer" value="@if(isset($data['pet_breed'])){{$data['pet_breed']}}@endif">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            If you have any special needs such as wheelchair access, please indicate:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="wheelchair" type="text" class="form-control" placeholder="Your answer" value="@if(isset($data['wheelchair'])){{$data['wheelchair']}}@endif">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dependents Section -->
                            <h5 class="info-text" style="margin-top: 0;">Dependents</h5>
                            <div class="row">
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="dependent_fullname" type="text" class="form-control" value="@if(isset($data['dependent_fullname'])){{$data['dependent_fullname']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Relationship</label>
                                        <input name="dependent_relationship" type="text" class="form-control" value="@if(isset($data['dependent_relationship'])){{$data['dependent_relationship']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="dependent_age" type="text" class="form-control" value="@if(isset($data['dependent_age'])){{$data['dependent_age']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="">
                                            <label><input type="radio" name="dependent_gender" id="genderMale" value="Male" @if($data['dependent_gender'] == 'Male') checked @endif >Male</label>
                                            <label><input type="radio" name="dependent_gender" id="genderFemale" value="Female" @if($data['dependent_gender'] == 'Female') checked @endif >Female</label>
                                            <br />
                                            <label for="dependent_gender" class="error"></label>
                                        </div>
                                    </div>
                            	</div>
                            </div><!--row-->

                            <div class="row">
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="dependent_fullname2" type="text" class="form-control" value="@if(isset($data['dependent_fullname2'])){{$data['dependent_fullname2']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Relationship</label>
                                        <input name="dependent_relationship2" type="text" class="form-control" value="@if(isset($data['dependent_relationship2'])){{$data['dependent_relationship2']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="dependent_age2" type="text" class="form-control" value="@if(isset($data['dependent_age2'])){{$data['dependent_age2']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="">
                                            <label><input type="radio" name="dependent_gender2" id="genderMale" value="Male" @if($data['dependent_gender2'] == 'Male') checked @endif >Male</label>
                                            <label><input type="radio" name="dependent_gender2" id="genderFemale" value="Female" @if($data['dependent_gender2'] == 'Female') checked @endif >Female</label>
                                            <br />
                                            <label for="dependent_gender2" class="error"></label>
                                        </div>
                                    </div>
                            	</div>
                            </div><!--row-->

                            <div class="row">
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="dependent_fullname3" type="text" class="form-control" value="@if(isset($data['dependent_fullname3'])){{$data['dependent_fullname3']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Relationship</label>
                                        <input name="dependent_relationship3" type="text" class="form-control" value="@if(isset($data['dependent_relationship3'])){{$data['dependent_relationship3']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="dependent_age3" type="text" class="form-control" value="@if(isset($data['dependent_age3'])){{$data['dependent_age3']}}@endif">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="">
                                            <label><input type="radio" name="dependent_gender3" id="genderMale" value="Male" @if($data['dependent_gender3'] == 'Male') checked @endif >Male</label>
                                            <label><input type="radio" name="dependent_gender3" id="genderFemale" value="Female" @if($data['dependent_gender3'] == 'Female') checked @endif >Female</label>
                                            <br />
                                            <label for="dependent_gender2" class="error"></label>
                                        </div>
                                    </div>
                            	</div>
                            </div><!--row-->                            
                            <!-- Dependents Section -->
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Your Contact Information
                                            <small>*</small>
                                        </label>
                                        <br>
                                        <small><!--Please provide a phosne number or email address where we can contact you to confirm
                                            your submission and schedule any ID card or legal appointments.-->
                                        Please provide all contact information you have: phone, email, address, and message phone.    	
                                        </small>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Cell Number
                                                </label>
                                                <input name="cell" type="text" class="form-control" required value="@if(isset($data['cellnumber'])){{$data['cellnumber']}}@endif">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Email Address
                                                </label>
                                                <input name="email" type="email" class="form-control" required value="@if(isset($data['email'])){{$data['email']}}@endif">
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
													<img src="{!! asset('uploads/veterans/'.$data['vet_id'].'/'.$data['profile']) !!}" width="100" height="100" />
												</div>
												@endif
											</div>
		                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="Military_Information">
                            <h5 class="info-text">Military Information</h5>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Did you serve in a war zone?
                                            <small>*</small>
                                        </label>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="warzone" id="warzone" @if($data['warzone'] == 'Yes') checked="" @endif value="Yes" required>Yes
                                            </label>
                                            <label>
                                                <input type="radio" name="warzone" id="warzone" @if($data['warzone'] == 'No') checked="" @endif value="No" required>No
                                            </label>
                                            <label class="error" for="warzone"></label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <!--<div class="form-group">
                                        <label>Unit and or MOS
                                            <small>*</small>
                                        </label>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="unitandmos" id="unit" @if($data['mos'] == 'Unit') checked="" @endif value="Unit" required>Unit
                                            </label>
                                            <label>
                                                <input type="radio" name="unitandmos" id="mos" @if($data['mos'] == 'MOS') checked="" @endif value="MOS" required>MOS
                                            </label>
                                            <label>
                                                <input type="radio" name="unitandmos" id="Both" @if($data['mos'] == 'Both') checked="" @endif value="Both" required>Both
                                            </label>
                                            <label class="error" for="unitandmos"></label>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="col-sm-6">
                                    <label>If you answered yes, where did you serve?</label>
                                	@php 
                                		$serve = array();
	                                	if($data['serve']){
		                                	$serve = explode(',',$data['serve']); 
		                                	echo 'Previous Values: <span class="label label-success">'.$data['serve'].'</span>';
										}
                                	@endphp
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="(OEF) Afghanistan" @if(in_array('(OEF) Afghanistan',$serve)) checked="" @endif>(OEF) Afghanistan
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="(OEF/OIF) Iraq" @if(in_array('(OEF/OIF) Iraq',$serve)) checked="" @endif>(OEF/OIF) Iraq
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="(Desert Shield/Storm/Southern Watch) Persian Gulf" @if(in_array('(Desert Shield/Storm/Southern Watch) Persian Gulf',$serve)) checked="" @endif>(Desert Shield/Storm/Southern Watch) Persian Gulf
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="Vietnam" @if(in_array('Vietnam',$serve)) checked="" @endif>Vietnam
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="Korea" @if(in_array('Korea',$serve)) checked="" @endif>Korea
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="WWII" @if(in_array('WWII',$serve)) checked="" @endif>WWII
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input name="other" type="text" name="serve[]" class="form-control" placeholder="Other">
                                    </div>
                                </div>
                                </div><!--r-->
                                
                                <div class="row">
                                <div class="col-sm-3">
                                    <label>Branch of Service
                                        <small>*</small>
                                    </label>
                                	@php 
                                		$branchservice = array();
                                		if($data['branchservice'] != ''){
	                                		$branchservice = explode(',',$data['branchservice']); 
		                                	echo '<br />Previous Values: <span class="label label-success">'.$data['branchservice'].'</span>';
										}
                                	@endphp

                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Air Force" required="" @if(in_array('Air Force',$branchservice)) checked="" @endif>Air Force
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Army" required="" @if(in_array('Army',$branchservice)) checked="" @endif>Army
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Coast Guard" required="" @if(in_array('Coast Guard',$branchservice)) checked="" @endif>Coast Guard
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Marine Corps" required="" @if(in_array('Marine Corps',$branchservice)) checked="" @endif>Marine Corps
                                        </label>
                                    </div>
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Navy" required="" @if(in_array('Navy',$branchservice)) checked="" @endif>Navy
                                        </label>
                                    </div>
                                    <label class="error" for="branchservice[]"></label>
                                </div>
                                
                                
                                <div class="col-sm-6">
                                    <label>Your Military Tenure</label>
                                    @php 
                                    	if($data['dateservedfrom'] != ''){
	                                    	echo '<br />Previous Value: '.$data['dateservedfrom']; 
	                                    	if($data['dateservedto'] != '') echo ' - '.$data['dateservedto'];
										}
                                    @endphp
                                    <div class="form-group">
                                        <label>Date Served (From)</label>
                                        <input name="dsf" type="text" id="date1" class="form-control" autocomplete="off" value="">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label>Date Served (To)</label>
                                        <input name="dst" type="text" id="date2" class="form-control" autocomplete="off" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="Status_Information">
                            <h5 class="info-text">Status Information</h5>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>
                                            Are you interested in receiving more comprehensive support: employment, mentorship, and housing?
                                        </label>
                                        <br>
                                        <label>If Yes, someone from our team will contact you.</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="pull-right">
                                        <label>
                                            <input type="radio" name="emh" id="emh1" value="Yes" @if($data['emh'] == 'Yes') checked="" @endif>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="emh" id="emh2" value="No" @if($data['emh'] == 'No') checked="" @endif>No
                                        </label>
                                        <label class="error" for="emh"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>If you're participating with a group, what is the name of the group?
                                        <small>*</small>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="groupname" placeholder="Answer" value="@if(isset($data['groupname'])){{$data['groupname']}}@endif"/>
                                        <label class="error" for="groupname"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>If you are currently supported by another organization, please indicate if you have any
                                        restrictions such as a curfew and must be returned by a certain time and needing
                                        to be picked up the next day to return.
                                        <small>*</small>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <textarea class="form-control" name="answer" placeholder="Your Answer" required>@if(isset($data['organization_answer'])){{$data['organization_answer']}}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                                    <div class="">
                                        <label>
                                            <input type="checkbox" name="leaveorreturn" value="1" @if($data['situation'] == 1) checked="" @endif>This situation is one of the only exceptions to being able to leave and return
                                        </label>
                                    </div>
                            	</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Please list any current health problems
                                        <small>*</small>
                                    </label>
                                    <br>
                                    <small>(select all that apply)</small>
                                    @php 
                                    	$health_problems = array();
                                    	if($data['health_problems'] != ''){
											echo '<br/>Previous health problems: <span class="label label-success">'.$data['health_problems'].'</span><br />';
											$health_problems = explode(',',$data['health_problems']);
										}
										if($data['health_problem_answer'] != ''){
											echo 'Previous other health problems: <span class="label label-success">'.$data['health_problem_answer'].'</span>';
										}
                                    @endphp
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Dental" @if(in_array('Dental',$health_problems)) checked="" @endif required>Dental
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Hearing"@if(in_array('Hearing',$health_problems)) checked="" @endif required>Hearing
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="None of the mentioned" @if(in_array('None of the mentioned',$health_problems)) checked="" @endif required>None of the mentioned
                                                </label>
                                                <label class="error" for="healthproblems[]" ></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Alcohol" @if(in_array('Alcohol',$health_problems)) checked="" @endif required>Alcohol
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Drug" @if(in_array('Drug',$health_problems)) checked="" @endif required>Drug
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Vision" @if(in_array('Vision',$health_problems)) checked="" @endif required>Vision
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Feet" @if(in_array('Feet',$health_problems)) checked="" @endif required>Feet
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Emotional" @if(in_array('Emotional',$health_problems)) checked="" @endif required>Emotional
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Ambulatory" @if(in_array('Ambulatory',$health_problems)) checked="" @endif required>Ambulatory
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Skin" @if(in_array('Skin',$health_problems)) checked="" @endif required>Skin
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Internal" @if(in_array('Internal',$health_problems)) checked="" @endif required>Internal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="PTSD" @if(in_array('PTSD',$health_problems)) checked="" @endif required>PTSD
                                                </label>
                                            </div>
                                            <div class="">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Others" @if(in_array('Others',$health_problems)) checked="" @endif required>Others
                                                </label>
                                            </div>
                                        </div>
                                        <label class="error" for="healthproblems[]"></label>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>If selected others, please mention all health problems
                                            </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="healthproblemsanswer" placeholder="Your Answer">@if(isset($data['health_problem_answer'])){{$data['health_problem_answer']}}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>If you have any tickets, warrants, or other legal issues, please indicate so. (illegal camping citation, trespassing citation, vagrancy citation, speeding ticket, etc.) If your spouse has tickets or warrants and would like to attend Homeless Court then he/she will need to complete a separate Stand Down registration application including their date of birth and case/ticket information.<small>*</small></label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="legalissues" placeholder="Your Answer" required>@if(isset($data['legal_issues'])){{$data['legal_issues']}}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>
                                            Would you like to attend Homeless Court? Homeless Court requests must be submitted through this registration process by (fill in the deadline.) 
                                            <br>Homeless Court registration is first-come, first-served, so please register early.
                                            <small>*</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class=" pull-right">
                                        <label>
                                            <input type="radio" name="court" value="Yes" @if($data['court'] == 'Yes') checked="" @endif>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="court" value="No" @if($data['court'] == 'No') checked="" @endif>No
                                        </label>
                                        <label class="error" for="court"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>
                                            Do you have a child support case being administered by San Diego County D.C.S.S? <br />
                                            If so, Child Support representatives will meet with you to discuss options and alternatives on your child support case.
                                            <small>*</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class=" pull-right">
                                        <label>
                                            <input type="radio" name="countydcss" value="Yes" @if($data['countydcss'] == 'Yes') checked="" @endif required>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="countydcss" value="No" @if($data['countydcss'] == 'No') checked="" @endif required>No
                                        </label>
                                        <label class="error" for="countydcss"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="partner_attending">
                                            Will a spouse or partner be attending with you?
                                        </label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                        <label>
                                            <input type="radio" name="partner_attending" value="Yes" @if($data['partner_attending'] == 'Yes') checked="" @endif>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="partner_attending" value="No" @if($data['partner_attending'] == 'No') checked="" @endif>No
                                        </label>
                                        <label class="error" for="partner_attending"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                                    <label for="fulllegalname">If yes, please provide their full legal name.</label>
                            	</div>
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="fulllegalname" type="text" class="form-control" value="@if(isset($data['partner_name'])){{$data['partner_name']}}@endif">
                                    </div>
                            	</div>
                            </div><!--r-->

                            
							<!-- ////////////////////// 
							
							NEW HOMELESS COURT 
							
							//////////////////// -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="homeless_court">
                                            I incorporated this question into the first one (above)?
                                        </label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class=" pull-right">
                                        <label>
                                            <input type="radio" name="homeless_court" value="Yes" @if($data['homeless_court'] == 'Yes') checked="" @endif>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="homeless_court" value="No" @if($data['homeless_court'] == 'No') checked="" @endif>No
                                        </label>
                                        <label class="error" for="homeless_court"></label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            
                            <div class="homeless_section well hidden">
	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label>If yes, how many times?</label></div>
	                            	<div class="col-sm-6"><input type="text" class="form-control" name="spouse_ticktet_warrants" value="@if(isset($data['spouse_ticktet_warrants'])){{$data['spouse_ticktet_warrants']}}@endif"/></div>
	                            </div><!--row-->
	                            
	                            <h5 class="text-center">Criminal / Traffic / Minor Offense Court (ALL Participants)</h5>
	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label for="outstanding_warrants">Do you have any outstanding warrants?</label></div>
	                            	<div class="col-sm-6">
	                                    <div class="pull-right">
	                                        <label>
	                                            <input type="radio" name="outstanding_warrants" value="Yes" @if($data['outstanding_warrants'] == 'Yes') checked="" @endif>Yes
	                                        </label>
	                                        <label>
	                                            <input type="radio" name="outstanding_warrants" value="No" @if($data['outstanding_warrants'] == 'No') checked="" @endif>No
	                                        </label>
	                                        <label class="error" for="outstanding_warrants"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->

	                            <div class="row  space_top">
	                            	<div class="col-sm-6"><label>If yes, include case number and location of warrant</label></div>
	                            	<div class="col-sm-6"><input type="text" class="form-control" name="namelocation_warrant" value="@if(isset($data['namelocation_warrant'])){{$data['namelocation_warrant']}}@endif"/></div>
	                            </div><!--row-->

	                            <div class="row space_top">
	                            	<div class="col-sm-6">
	                            		<label for="criminalminor">Do you have any Criminal or Minor Offense / Traffic cases?</label>
	                            	</div>
	                            	<div class="col-sm-6">
	                                    <div class="pull-right">
	                                        <label>
	                                            <input type="radio" name="criminalminor" value="Yes" @if($data['criminalminor'] == 'Yes') checked="" @endif>Yes
	                                        </label>
	                                        <label>
	                                            <input type="radio" name="criminalminor" value="No" @if($data['criminalminor'] == 'No') checked="" @endif>No
	                                        </label>
	                                        <label class="error" for="criminalminor"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->


	                            <div class="row space_top">
	                            	<div class="col-sm-6">
	                            		<label for="anycriminal">If yes, what kind?</label>
	                            	</div>
	                            	<div class="col-sm-6">
	                                    <div class="pull-right">
	                                        <label><input type="radio" name="anycriminal" value="Criminal" @if($data['anycriminal'] == 'Criminal') checked="" @endif>Criminal</label>
	                                        <label><input type="radio" name="anycriminal" value="Traffic / Minor Offense" @if($data['anycriminal'] == 'Traffic / Minor Offense') checked="" @endif>Traffic / Minor Offense</label>
	                                        <label><input type="radio" name="anycriminal" value="Both" @if($data['anycriminal'] == 'Both') checked="" @endif>Both</label>
	                                        
	                                        <label class="error" for="anycriminal"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->

	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label for="brief_information">Please give brief information on each case, including type of case, city where it happened, & year. (EX: petty theft, Escondido, 2016; or Ticket #A237598; or Criminal Case #CN123456)</label></div>
	                            	<div class="col-sm-6"><textarea name="brief_information" class="form-control">@if(isset($data['brief_information'])){{$data['brief_information']}}@endif</textarea></div>
	                            </div><!--row-->
	                            
	                            <h5 class="text-center">Family Court (ALL Participants)</h5>
	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label for="homeless_child_support_dcss">Do you have a Child Support Case with DCSS?</label></div>
	                            	<div class="col-sm-6">
	                                    <div class="pull-right">
	                                        <label><input type="radio" name="homeless_child_support_dcss" value="Yes" @if($data['homeless_child_support_dcss'] == 'Yes') checked="" @endif>Yes</label>
	                                        <label><input type="radio" name="homeless_child_support_dcss" value="No" @if($data['homeless_child_support_dcss'] == 'No') checked="" @endif>No</label>
	                                        <label class="error" for="homeless_child_support_dcss"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->

	                            <div class="row">
	                            	<div class="col-sm-6"><label for="homeless_child_support_case">Do you have any other child support cases?</label></div>
	                            	<div class="col-sm-6">
	                                    <div class="pull-right">
	                                        <label><input type="radio" name="homeless_child_support_case" value="Yes" @if($data['homeless_child_support_case'] == 'Yes') checked="" @endif>Yes</label>
	                                        <label><input type="radio" name="homeless_child_support_case" value="No" @if($data['homeless_child_support_case'] == 'No') checked="" @endif>No</label>
	                                        <label class="error" for="homeless_child_support_case"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->
	                            
                            </div>

                            <!-- //////////////////// 
                            
                            NEW HOMELESS COURT 
                            
                            //////////////////// -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Please select your pick-up / drop-off location.
                                            <small>*</small>
                                        </label>
                                        <br>
                                        <label>
                                            Buses will provide transportation to the Stand Down from 8:00 AM - 4:00 PM Thursday February 7th, 2019.
                                        </label>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'La Posada - Carlsbad (2476 Impala Dr. Carlsbad 92010)') checked="" @endif value="La Posada - Carlsbad (2476 Impala Dr. Carlsbad 92010)">La Posada - Carlsbad (2476 Impala Dr. Carlsbad 92010)
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'Brother Benno - Oceanside (3260 Production Ave. Oceanside CA 92058)') checked="" @endif value="Brother Benno - Oceanside (3260 Production Ave. Oceanside CA 92058)">Brother Benno - Oceanside (3260 Production Ave. Oceanside CA 92058)
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'VANC - Oceanside (1617 Mission Ave. Oceanside CA 92058)') checked="" @endif value="VANC - Oceanside (1617 Mission Ave. Oceanside CA 92058)">VANC - Oceanside (1617 Mission Ave. Oceanside CA 92058)
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'Oceanside Transit Center (235 S Tremont St, Oceanside, CA 92054)') checked="" @endif value="Oceanside Transit Center (235 S Tremont St, Oceanside, CA 92054)">Oceanside Transit Center (235 S Tremont St, Oceanside, CA 92054)
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'Interfaith - Escondido (550 W. Washington Ave. Escondido 92025)') checked="" @endif value="Interfaith - Escondido (550 W. Washington Ave. Escondido 92025)">Interfaith - Escondido (550 W. Washington Ave. Escondido 92025)
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'Escondido Transit Center (700 W Valley Pkwy. Escondido CA 92025)') checked="" @endif value="Escondido Transit Center (700 W Valley Pkwy. Escondido CA 92025)" >Escondido Transit Center (700 W Valley Pkwy. Escondido CA 92025)
                                            </label>
                                        </div>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="pickuplocation" @if($data['pickuplocation'] == 'Other. I am unable to get to any of the locations listed. Please contact') checked="" @endif value="Other. I am unable to get to any of the locations listed. Please contact" >Other. I am unable to get to any of the locations listed. Please contact
                                                me to make arrangements.
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class=" ">
                                                <label>
                                                    <input type="radio" name="pickuplocation" value="Other" @if($data['pickuplocation'] == 'Other') checked="" @endif> Other:
                                                </label>
                                                <label class="error" for="pickuplocation"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="pickuplocation_other" class="form-control pull-right" placeholder="Your answer" value="@if(isset($data['pickuplocation_other'])){{$data['pickuplocation_other']}}@endif">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Will you be arriving by other means such as a car or bicycle? Please explain.
                                        </label>
                                        <input name="vehicle" type="text" class="form-control" placeholder="Your answer" value="@if(isset($data['vehicle'])){{$data['vehicle']}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>
                                            Emergency Contact Name
                                            <small>*</small>
                                        </label>
                                        <input name="emergencycname" type="text" class="form-control" placeholder="Your answer" required value="@if(isset($data['emergencycname'])){{$data['emergencycname']}}@endif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>
                                            Emergency Contact Phone
                                            <small>*</small>
                                        </label>
                                        <input name="emergencycphone" type="text" class="form-control" placeholder="Your answer" required value="@if(isset($data['emergencycphone'])){{$data['emergencycphone']}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small>All participants will be screened for a history of sex offense.</small>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="sexoffense" value="Yes" @if($data['sexoffense'] == 'Yes') checked="" @endif>I confirm: I have never been convicted of a sex offense.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1 class="heading-band">Terms of Acceptance and Signature</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <text-medium2>
                                        “I, (the applicant) for this Registration Form warrant the truthfulness of the information provided in this application.
                                        <br>Any false information will result in the automatic forfeiture of participation in
                                        all Stand down activities and may
                                        <br>result in immediate removal.
                                    </text-medium2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>
                                            Please type your first and last name here for electronic signature
                                            <small>*</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="electronic_signature" type="text" class="form-control" placeholder="Your answer" required value="@if(isset($data['electronic_signature'])){{$data['electronic_signature']}}@endif">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                            		<div class="form-group">
                            		<label>Validated As Veteran: </label>
                            		<select name="validated_veteran" class="form-control">
                            			<option value="Yes" @if($data['verified_registered_veteran'] == 'Yes') selected="" @endif >Yes</option>
                            			<option value="No" @if($data['verified_registered_veteran'] == 'No') selected="" @endif >No</option>
                            		</select>
                            		</div>
                            	</div>

                            	<div class="col-sm-6">
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

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            I understand that checking this box constitutes a legal signature confirming that I acknowledge and agree to the above Terms
                                            of Acceptance
                                            <small>*</small>
                                        </label>
                                        <div class="">
                                            <label>
                                                <input type="radio" name="terms" value="I understand and agree" @if($data['terms'] == 'I understand and agree') checked="" @endif required > I understand and agree
                                            </label>
                                            <label for="terms" class="error"></label>
                                            
                                            <input type="hidden" name="vet_id" value="{{ $data['vet_id'] }}"/>
                                            <input type="hidden" name="military_id" value="{{ $data['military_id'] }}"/>
                                            <input type="hidden" name="status_id" value="{{ $data['status_id'] }}"/>
                                        </div>
                                    </div>
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
        jQuery(document).ready(function () {
        	var $validator = jQuery("#veteran-form").validate({
				  rules: {
				    gender: {required: true},
				    branchservice: {required: true},
				    court: {required: true},
				    petanswer: {required: true},
				    pickuplocation: {required: true},
				    branchservice: {required: true},
				    groupname: {required: true},
				  }        		
	        	});
	            jQuery('#rootwizard').bootstrapWizard({
	            	'tabClass': 'nav nav-pills',
	            	onTabClick: function(tab, navigation, index) {return false;},
	            	onNext: function(tab, navigation, index) {
		            	var $valid = jQuery("#veteran-form").valid();
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

            jQuery('#rootwizard .finish').click(function () {
                jQuery("#veteran-form").submit();
            });
            window.prettyPrint && prettyPrint()

        });

		function homeless(){
			var radioValue = jQuery("input[name='homeless_court']:checked").val();
			if( radioValue == 'Yes' ){
				jQuery('.homeless_section').removeClass('hidden');
			}else{
				jQuery('.homeless_section').addClass('hidden');
			}
		}
		homeless();
      
		jQuery('input[name=homeless_court]').change(function(){
			homeless();
		});
		
		jQuery('select[name=b_day],select[name=b_month],select[name=b_year]').change(function(){
			var day = jQuery('select[name=b_day]').val();
			var month = jQuery('select[name=b_month]').val();
			var year = jQuery('select[name=b_year]').val();
			
			jQuery('input[name=dateofbirth]').val(day+'/'+month+'/'+year);
		});
        
	  jQuery( function() {
	  	
		var date = new Date();
		date.setDate( date.getDate() - 6 );
		date.setFullYear( date.getFullYear() - 14 );	   
	    
	    jQuery("#date1").datepicker({
	        //dateFormat: "dd-M-yy",
	        onSelect: function () {
	            var dt2 = jQuery('#date2');
	            var startDate = jQuery(this).datepicker('getDate');
	            //add 30 days to selected date
	            startDate.setDate(startDate.getDate() + 30);
	            var minDate = jQuery(this).datepicker('getDate');
	            var dt2Date = dt2.datepicker('getDate');
	            //difference in days. 86400 seconds in day, 1000 ms in second
	            var dateDiff = (dt2Date - minDate)/(86400 * 1000);

	            //dt2 not set or dt1 date is greater than dt2 date
	            if (dt2Date == null || dateDiff < 0) {
	                    dt2.datepicker('setDate', minDate);
	            }
	            //dt1 date is 30 days under dt2 date
	            else if (dateDiff > 30){
	                    dt2.datepicker('setDate', startDate);
	            }
	            //sets dt2 maxDate to the last day of 30 days window
	            dt2.datepicker('option', 'maxDate', startDate);
	            //first day which can be selected in dt2 is selected date in dt1
	            dt2.datepicker('option', 'minDate', minDate);
	        }
	    });
	    jQuery('#date2').datepicker({
	        //dateFormat: "dd-M-yy",
	        //minDate: 0
	    });
	    
	  });
	       
    </script>   

@endsection