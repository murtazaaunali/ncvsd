	<!-- BANNER SECTION -->
	<section>
		<div class="bg-banner banner2">
			<h2>Volunteer Sign-Up Form</h2>
		</div>
	</section>
    <div class="container">
            <section id="wizard">
                <div class="page-header">
                    <h2>North County Veteran Stand Down</h2>
                    <h2>Volunteer Sign-Up</h2>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <p class="sub-text">
                                Thank you for volunteering to serve our community's homeless and transitioning Veterans at the 3rd Annual North County Veteran
                                Stand Down! Our life-changing 4-day event will take place at Green Oak Ranch from 7:00 AM
                                Thursday February 7th through 12:00 noon Sunday February 10, 2019
                            </p>
                            <p class="sub-text">
                                After your submission is received and reviewed, you will be contacted by a member of our team with further instructions (i.e.
                                volunteer training, parking, etc). For immediate assistance, please contact us at (866) 535-2038
                                Ext 0.
                            </p>
                        </div>
                        <div class="col-md-2"></div>
                    </div>


				@if (Session::has('success'))
					{!! session('success') !!}
				@endif

                </div>
                <div class="row" id="start">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="label-center">Enter Your Email Address
                            </label>
                            <input name="newsletter_email" id="email_address" type="email" class="form-control" placeholder="Your Email Address">
                        </div>
                        <div class="form-group text-center">
                            <button type="button" class="start-btn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Checking Email" >Lets Start</button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                
         <form id="volunteer-form" action="{{url('volunteer-registration/submitvolunteer')}}" method="post">
        {{ csrf_field() }}
               
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
                                        <input name="firstname" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Middle Name
                                        </label>
                                        <input name="middlename" type="text" class="form-control" />
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
                                        <label>Cell Number
                                            <small>*</small>
                                        </label>
                                        <input name="cellphone" type="text" class="form-control" required>
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email Address
                                        </label>
                                        <input name="email" type="email" class="form-control" required />
                                    </div>
                            	</div>
                            	<div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Occupation
                                        </label>
                                        <input name="occupation" type="text" class="form-control">
                                    </div>
                            	</div>
                            </div><!--r-->
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Are you a veteran or active duty military?
                                            <small>*</small>
                                        </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Veteran" required>Veteran
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Veteran family member" required>Veteran family member
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Active duty" required>Active duty
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="Active duty family member" required>Active duty family member
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="activedutymilitary" value="None of the above" required>None of the above
                                            </label>
                                        </div>
                                        <label class="error" for="activedutymilitary"></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Are you participating as an individual or with a
                                            <br>group?
                                            <small>*</small>

                                        </label>
                                        <select class="form-control" name="individual_group" title="please select something">
                                            <option value="">Choose</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Organization">Organization</option>
                                        </select>
                                        <label class="error" for="individual_group"></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>If you're participating with a group, what is the name of the group?</label>
                                        <input type="text" name="group_name" class="form-control" placeholder="Your Answer"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-4">
                                    <div class="form-group">
                                        <label>Please enter the names of the group participants (separate using ‘,’)</label>
                                        <textarea class="form-control" name="group_participants" placeholder="Enter the Group Member Names"></textarea>
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="wednesdayam" value="This is set up day. All volunteers for this day will help stage and set up for the event. Areas needing assistance: Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security, Logistics."> This is set up day. All volunteers for this day will help stage and set
                                                up for the event. Areas needing assistance:
                                                <br>Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security,
                                                Logistics.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group border-bottom">
                                        <h5>Wednesday PM (2/6/2019) 12pm-5pm
                                        </h5>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="wednesdaypm" value="This is set up day. All volunteers for this day will help stage and set up for the event. Areas needing assistance: Shower Tent, Clothing Tent, Mall, Registration, Cow Palace, Legal, Security, Logistics."> This is set up day. All volunteers for this day will help stage and set
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without"> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="Security: observe and report to Security Team. Will be briefed by Security">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="I am willing to volunteer anywhere">I am willing to volunteer anywhere
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="Guest Registration: Help direct Guests through the check in areas to make sure they see all stations.">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdayam[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without judgement."> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement.">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="I am willing to volunteer anywhere">I am willing to volunteer anywhere
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="Guest Registration: Help direct Guests through the check in areas to make">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="thursdaypm[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without judgement."> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement.">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="Guest Registration: Help direct Guests through the check in areas to make">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridayam[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without"> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Security: observe and report to Security Team. Will be briefed by Security upon posting for duty. judgement.">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="Guest Registration: Help direct Guests through the check in areas to make sure they see all stations.">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fridaypm[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value=""> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="Guest Registration: Help direct Guests through the check in areas to make">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdayam[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Veteran Buddy: accompanies and helps our guests to relax. Listens without"> Veteran Buddy: accompanies and helps our guests to relax. Listens without
                                                judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Security: observe and report to Security Team. Will be briefed by Security">Security: observe and report to Security Team. Will be briefed by Security
                                                upon posting for duty. judgement.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="Guest Registration: Help direct Guests through the check in areas to make">Guest Registration: Help direct Guests through the check in areas to make
                                                sure they see all stations.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="saturdaypm[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Veteran Buddy : Accompanies and helps our guest navigate through areas as"> Veteran Buddy : Accompanies and helps our guest navigate through areas as
                                                needed.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Security: Observe and report to Security Team. Will be briefed by Security upon reporting for duty.">Security: Observe and report to Security Team. Will be briefed by Security
                                                upon reporting for duty.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Shower Tent Area: Assist Guests with selecting from several items they may need for their stay, oversee the shower trailer as needed and help direct our guests towards their next check in point which would be the Cow Palace.">Shower Tent Area: Assist Guests with selecting from several items they may
                                                need for their stay, oversee the shower trailer as needed and help direct
                                                our guests towards their next check in point which would be the Cow Palace.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Clothing Area: Assist Guests in selecting a complete change of clothes then escort them to the check out location before being transported to the Cow Palace for cabin assignments.">Clothing Area: Assist Guests in selecting a complete change of clothes then
                                                escort them to the check out location before being transported to the Cow
                                                Palace for cabin assignments.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="Mall Tent Area: Assist with the daily activities in the Mall.">Mall Tent Area: Assist with the daily activities in the Mall.
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="sundayam[]" value="I am willing to volunteer anywhere as needed.">I am willing to volunteer anywhere as needed.
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
                                        <input name="comments" type="text" placeholder="Your Answer" class="form-control">
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
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="maywecontact" value="Yes" checked>Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="maywecontact" value="No">No
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
                                        <input type="text" name="emergencycname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Emergency Contact Number</label>
                                        <input type="text" name="emergencynumber" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Important Medical Information (optional)</label>
                                        <input type="text" name="medicalinformation" class="form-control" placeholder="Your Answer">
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
                                        <input type="text" name="release_firstname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name
                                            <small>*</small>
                                        </label>
                                        <input type="text" name="release_lastname" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email Address
                                            <small>*</small>
                                        </label>
                                        <input type="email" name="release_email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <h5 class="info-text">Release of Liability Agreement</h5>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="assets/img/agreement.png" class="img-responsive" alt="Responsive image">
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
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="agree" value="I understand and agree" required>I understand and agree
                                        </label>
                                        <label class="error" for="agree"></label>
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
                </form>
            </section>
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

            $('#rootwizard').hide();
            $('.start-btn').on('click', function (e) {
            	$(".start-btn").button("loading");
            	var email = $('#email_address').val();
				 $.ajax({
				    url:"{{ route('checkemail')}}",
				    method:"get",
				    async: false,
				    data:{'email':email},
				    success:function(data){
				     if(data.error){
					 	alert(data.error);
					 }else{
		                $('#start').hide();
		                $('#rootwizard').show();
					 }
				     $(".start-btn").button("reset");
				     return false;
				    }
				   });
            	
                
            });
            $('.back_start-btn').on('click', function () {
                $('#rootwizard').hide();
                $('#start').show();
            });


        });
    </script>