	<!-- BANNER SECTION -->
	<section>
		<div class="bg-banner">
			<h2>Veteran Sign-Up Form</h2>
		</div>
	</section>
    <div class="container">
        <form id="veteran-form" action="{{url('veteran-registration/submitvetaran')}}" method="post">
        {{ csrf_field() }}
            <section id="wizard">
                <div class="page-header">
                    <h2>North County Veterans Stand Down</h2>
                    <h1>Veterans</h1>
                    <h2>Registration Form</h2>
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
                            <text-medium>***NOTE: THIS IS A 4-DAY EVENT. IF YOU ARE AN OVERNIGHT GUEST WITH US, THERE WILL BE NO IN-AND-OUT
                                PRIVILEGES. IF YOU NEED TO LEAVE FOR
                                <br>ANY REASON, YOU WILL NOT BE ABLE TO RETURN***
                            </text-medium>
                            <text-italic>
                                The North County Veterans Stand Down will occur at Green Oak Ranch in Vista from 8:00 AM Thursday February 7 through 12:00
                                noon Sunday February 10, 2019.
                                <br>We strongly request you pre-register to ensure your admittance. You will have a confirmation
                                by phone or email. Please help us serve you by
                                <br>answering the questions below and submitting your registration form. If you have additional
                                questions, please feel free to call us at (866)535-2038 Ext. 1
                            </text-italic>
                            <text-bold>
                                ***For legal and security reasons, we are unable to serve Veterans who are registered sex offenders***
                            </text-bold>
                            <h5 class="info-text">Personal Information Section</h5>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name
                                            <small>*</small>
                                        </label>
                                        <input name="firstname" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Middle Name <small>*</small></label>
                                        <input name="middlename" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name
                                            <small>*</small>
                                        </label>
                                        <input name="lastname" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div><!--r-->
                            
                            <div class="row">
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Social Security Number
                                            <small>*</small>
                                        </label>
                                        <input name="ssn" type="text" class="form-control" required>
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Driver's License State & Number
                                            <small>*</small>
                                        </label>
                                        <input name="dlsn" type="text" class="form-control" required>
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Date of Birth</label><br />
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
                                    </div>
                            	</div>
                            </div><!--r-->

                            <div class="row">
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Birth City
                                            <small>*</small>
                                        </label>
                                        <input name="bc" type="text" class="form-control" required>
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>State of Birth
                                            <small>*</small>
                                        </label>
                                        <input name="sb" type="text" class="form-control" required>
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>What is Your Gender? <small>*</small></label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" id="genderMale" value="Male" >Male
                                            </label>
                                            <label>
                                                <input type="radio" name="gender" id="genderFemale" value="Female" >Female
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
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="underage" value="Yes">Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="underage" value="No">No
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
                                        <input name="underagelegalname" type="text" class="form-control">
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
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="petanswer" value="Yes" required>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="petanswer" value="No" required>No
                                        </label>
                                        <label class="error" for="petanswer"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="radio pet_radio">
                                            <label>If yes</label>
                                            <label>
                                                <input type="radio" name="pet" value="Dog">Dog
                                            </label>
                                            <label>
                                                <input type="radio" name="pet" value="Cat">Cat
                                            </label>
                                            <label>
                                                <input type="radio" name="pet" value="Others">Others
                                            </label>
                                        </div>
                                    </div>
                            	</div>
                            	<div class="col-sm-6">
                                    <div class="form-group">
                                        <input name="petanswerother" type="text" class="form-control">
                                    </div>
                            	</div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group pull-left">
                                        <label for="inputEmail3" class="col-sm-3 control-label">How Many?</label>
                                        <div class="col-sm-3">
                                            <input type="number" name="howmanypet" class="form-control" placeholder="Your answer" min="0" value="0">
                                        </div>
                                        <label for="inputEmail3" class="col-sm-3 control-label">What Breed?</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="whatbreed" class="form-control" placeholder="Your answer">
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
                                        <input name="wheelchair" type="text" class="form-control" placeholder="Your answer">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dependents Section -->
                            <h5 class="info-text" style="margin-top: 0;">Dependents</h5>
                            <div class="row">
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input name="dependent_fullname" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Relationship</label>
                                        <input name="dependent_relationship" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="dependent_age" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="radio">
                                            <label><input type="radio" name="dependent_gender" id="genderMale" value="Male">Male</label>
                                            <label><input type="radio" name="dependent_gender" id="genderFemale" value="Female">Female</label>
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
                                        <input name="dependent_fullname2" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Relationship</label>
                                        <input name="dependent_relationship2" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="dependent_age2" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="radio">
                                            <label><input type="radio" name="dependent_gender2" id="genderMale" value="Male">Male</label>
                                            <label><input type="radio" name="dependent_gender2" id="genderFemale" value="Female">Female</label>
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
                                        <input name="dependent_fullname3" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Relationship</label>
                                        <input name="dependent_relationship3" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input name="dependent_age3" type="text" class="form-control">
                                    </div>
                            	</div>
                            	<div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="radio">
                                            <label><input type="radio" name="dependent_gender3" id="genderMale" value="Male">Male</label>
                                            <label><input type="radio" name="dependent_gender3" id="genderFemale" value="Female">Female</label>
                                            <br />
                                            <label for="dependent_gender2" class="error"></label>
                                        </div>
                                    </div>
                            	</div>
                            </div><!--row-->
                            
                            <!-- Dependents Section -->
                            
                            
                            <div class="row">
                                <div class="col-sm-8">
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cell Number
                                                </label>
                                                <input name="cell" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email Address
                                                </label>
                                                <input name="email" type="email" class="form-control" required>
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="warzone" id="warzone" value="Yes" required>Yes
                                            </label>
                                            <label>
                                                <input type="radio" name="warzone" id="warzone" value="No" required>No
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="unitandmos" id="unit" value="Unit" required>Unit
                                            </label>
                                            <label>
                                                <input type="radio" name="unitandmos" id="mos" value="MOS" required>MOS
                                            </label>
                                            <label>
                                                <input type="radio" name="unitandmos" id="Both" value="Both" required>Both
                                            </label>
                                            <label class="error" for="unitandmos"></label>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="col-sm-4">
                                    <label>If you answered yes, where did you serve?</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="(OEF) Afghanistan">(OEF) Afghanistan
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="(OEF/OIF) Iraq">(OEF/OIF) Iraq
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="(Desert Shield/Storm/Southern Watch) Persian Gulf">(Desert Shield/Storm/Southern Watch) Persian Gulf
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="Vietnam">Vietnam
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="Korea">Korea
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="serve[]" value="WWII">WWII
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input name="other" type="text" name="serve[]" class="form-control" placeholder="Other">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label>Branch of Service
                                        <small>*</small>
                                    </label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Air Force" required>Air Force
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Army" required>Army
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Coast Guard" required>Coast Guard
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Marine Corps" required>Marine Corps
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="branchservice[]" value="Navy" required>Navy
                                        </label>
                                    </div>
                                    <label class="error" for="branchservice[]"></label>
                                </div>
                                <div class="col-sm-3">
                                    <label>Your Military Tenure</label>
                                    <div class="form-group">
                                        <label>Date Served (From)
                                        </label>
                                        <input name="dsf" type="text" id="date1" class="form-control" autocomplete="off">
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <label>Date Served (To)
                                        </label>
                                        <input name="dst" type="text" id="date2" class="form-control" autocomplete="off">
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
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="emh" id="emh1" value="Yes" checked="">Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="emh" id="emh2" value="No">No
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
                                        <input class="form-control" name="groupname" placeholder="Answer"/>
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
                                        <textarea class="form-control" name="answer" placeholder="Your Answer" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            	<div class="col-sm-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="leaveorreturn" value="1">This situation is one of the only exceptions to being able to leave and return
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
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Dental" required>Dental
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Hearing" required>Hearing
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="None of the mentioned" required>None of the mentioned
                                                </label>
                                                <label class="error" for="healthproblems[]" ></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Alcohol" required>Alcohol
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Drug" required>Drug
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Vision" required>Vision
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Feet" required>Feet
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Emotional" required>Emotional
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Ambulatory" required>Ambulatory
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Skin" required>Skin
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Internal" required>Internal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="PTSD" required>PTSD
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="healthproblems[]" value="Others" required>Others
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
                                            <textarea class="form-control" name="healthproblemsanswer" placeholder="Your Answer"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>If you have any tickets, warrants, or other legal issues, please indicate so. (illegal camping citation, trespassing citation, vagrancy citation, speeding ticket, etc.) If your spouse has tickets or warrants and would like to attend Homeless Court then he/she will need to complete a separate Stand Down registration application including their date of birth and case/ticket information.<small>*</small></label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="legalissues" placeholder="Your Answer" required></textarea>
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
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="court" value="Yes">Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="court" value="No">No
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
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="countydcss" value="Yes" required>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="countydcss" value="No" required>No
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
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="partner_attending" value="Yes">Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="partner_attending" value="No">No
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
                                        <input name="fulllegalname" type="text" class="form-control">
                                    </div>
                            	</div>
                            </div>

                            
							<!-- ////////////////////// 
							
							NEW HOMELESS COURT 
							
							//////////////////// -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="homeless_court">
                                            I incorporated this question into the first one (above)
                                        </label>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio pull-right">
                                        <label>
                                            <input type="radio" name="homeless_court" value="Yes">Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="homeless_court" value="No">No
                                        </label>
                                        <label class="error" for="homeless_court"></label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            
                            <div class="homeless_section well hidden">
	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label>If yes, how many times?</label></div>
	                            	<div class="col-sm-6"><input type="text" class="form-control" name="spouse_ticktet_warrants"/></div>
	                            </div><!--row-->
	                            
	                            <h5 class="text-center">Criminal / Traffic / Minor Offense Court (ALL Participants)</h5>
	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label for="outstanding_warrants">Do you have any outstanding warrants?</label></div>
	                            	<div class="col-sm-6">
	                                    <div class="radio pull-right">
	                                        <label>
	                                            <input type="radio" name="outstanding_warrants" value="Yes">Yes
	                                        </label>
	                                        <label>
	                                            <input type="radio" name="outstanding_warrants" value="No">No
	                                        </label>
	                                        <label class="error" for="outstanding_warrants"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->

	                            <div class="row  space_top">
	                            	<div class="col-sm-6"><label>If yes, include case number and location of warrant</label></div>
	                            	<div class="col-sm-6"><input type="text" class="form-control" name="namelocation_warrant"/></div>
	                            </div><!--row-->

	                            <div class="row space_top">
	                            	<div class="col-sm-6">
	                            		<label for="criminalminor">Do you have any Criminal or Minor Offense / Traffic cases?</label>
	                            	</div>
	                            	<div class="col-sm-6">
	                                    <div class="radio pull-right">
	                                        <label>
	                                            <input type="radio" name="criminalminor" value="Yes">Yes
	                                        </label>
	                                        <label>
	                                            <input type="radio" name="criminalminor" value="No">No
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
	                                    <div class="radio pull-right">
	                                        <label><input type="radio" name="anycriminal" value="Criminal">Criminal</label>
	                                        <label><input type="radio" name="anycriminal" value="Traffic / Minor Offense">Traffic / Minor Offense</label>
	                                        <label><input type="radio" name="anycriminal" value="Both">Both</label>
	                                        
	                                        <label class="error" for="anycriminal"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->

	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label for="brief_information">Please give brief information on each case, including type of case, city where it happened, & year. (EX: petty theft, Escondido, 2016; or Ticket #A237598; or Criminal Case #CN123456)</label></div>
	                            	<div class="col-sm-6"><textarea name="brief_information" class="form-control"></textarea></div>
	                            </div><!--row-->
	                            
	                            <h5 class="text-center">Family Court (ALL Participants)</h5>
	                            <div class="row space_top">
	                            	<div class="col-sm-6"><label for="homeless_child_support_dcss">Do you have a Child Support Case with DCSS?</label></div>
	                            	<div class="col-sm-6">
	                                    <div class="radio pull-right">
	                                        <label><input type="radio" name="homeless_child_support_dcss" value="Yes">Yes</label>
	                                        <label><input type="radio" name="homeless_child_support_dcss" value="No">No</label>
	                                        <label class="error" for="homeless_child_support_dcss"></label>
	                                    </div>
	                                    <div class="clearfix"></div>
	                            	</div><!--6-->
	                            </div><!--row-->

	                            <div class="row">
	                            	<div class="col-sm-6"><label for="homeless_child_support_case">Do you have any other child support cases?</label></div>
	                            	<div class="col-sm-6">
	                                    <div class="radio pull-right">
	                                        <label><input type="radio" name="homeless_child_support_case" value="Yes">Yes</label>
	                                        <label><input type="radio" name="homeless_child_support_case" value="No">No</label>
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="La Posada - Carlsbad (2476 Impala Dr. Carlsbad 92010)">La Posada - Carlsbad (2476 Impala Dr. Carlsbad 92010)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="Brother Benno - Oceanside (3260 Production Ave. Oceanside CA 92058)">Brother Benno - Oceanside (3260 Production Ave. Oceanside CA 92058)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="VANC - Oceanside (1617 Mission Ave. Oceanside CA 92058)">VANC - Oceanside (1617 Mission Ave. Oceanside CA 92058)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="Oceanside Transit Center (235 S Tremont St, Oceanside, CA 92054)">Oceanside Transit Center (235 S Tremont St, Oceanside, CA 92054)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="Interfaith - Escondido (550 W. Washington Ave. Escondido 92025)">Interfaith - Escondido (550 W. Washington Ave. Escondido 92025)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="Escondido Transit Center (700 W Valley Pkwy. Escondido CA 92025)" >Escondido Transit Center (700 W Valley Pkwy. Escondido CA 92025)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="pickuplocation" value="Other. I am unable to get to any of the locations listed. Please contact" >Other. I am unable to get to any of the locations listed. Please contact
                                                me to make arrangements.
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="radio ">
                                                <label>
                                                    <input type="radio" name="pickuplocation" value="Other"> Other:
                                                </label>
                                                <label class="error" for="pickuplocation"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" name="pickuplocation_other" class="form-control pull-right" placeholder="Your answer">
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
                                        <input name="vehicle" type="text" class="form-control" placeholder="Your answer">
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
                                        <input name="emergencycname" type="text" class="form-control" placeholder="Your answer" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>
                                            Emergency Contact Phone
                                            <small>*</small>
                                        </label>
                                        <input name="emergencycphone" type="text" class="form-control" placeholder="Your answer" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <small>All participants will be screened for a history of sex offense.</small>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="sexoffense" value="Yes">I confirm: I have never been convicted of a sex offense.
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
                                        <input name="electronic_signature" type="text" class="form-control" placeholder="Your answer" required>
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
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="terms" value="I understand and agree" required> I understand and agree
                                            </label>
                                            <label for="terms" class="error"></label>
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
    </div>
    
    <script>
        $(document).ready(function () {
        	var $validator = $("#veteran-form").validate({
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
	            $('#rootwizard').bootstrapWizard({
	            	'tabClass': 'nav nav-pills',
	            	onTabClick: function(tab, navigation, index) {return false;},
	            	onNext: function(tab, navigation, index) {
		            	var $valid = $("#veteran-form").valid();
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
                $("#veteran-form").submit();
            });
            window.prettyPrint && prettyPrint()

        });
      
      $('input[name=homeless_court]').change(function(){
      	var radioValue = $("input[name='homeless_court']:checked").val();
      	if( radioValue == 'Yes' ){
			$('.homeless_section').removeClass('hidden');
		}else{
			$('.homeless_section').addClass('hidden');
		}
      });
      /*$('.homeless_section'){
	  	
	  }*/
        
	  $( function() {
	  	
		var date = new Date();
		date.setDate( date.getDate() - 6 );
		date.setFullYear( date.getFullYear() - 14 );	   
	   /* $( "#birthday" ).datepicker({
	    	maxDate:(date.getMonth()) + '/' + (date.getDate()) + '/' + (date.getFullYear()),
	    	dateFormat:'dd/mm/yy'
	    });*/
	    
	    $("#date1").datepicker({
	        //dateFormat: "dd-M-yy",
	        onSelect: function () {
	            var dt2 = $('#date2');
	            var startDate = $(this).datepicker('getDate');
	            //add 30 days to selected date
	            startDate.setDate(startDate.getDate() + 30);
	            var minDate = $(this).datepicker('getDate');
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
	    $('#date2').datepicker({
	        //dateFormat: "dd-M-yy",
	        //minDate: 0
	    });
	    
	  });
	       
    </script>    