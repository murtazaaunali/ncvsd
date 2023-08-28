@extends('admin.layout.master')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container">
                <div class="row">
                	<div class="col-sm-12">
                    <div class="alert alert-success" style="display:none;margin-top:10px;" >Records Added Successfully</div>
                    
                    <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box inner-page">
                            <h4 class="page-title">Veterans Submitted Forms</h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    </div>
                    
                    <form class="search-form formspace">
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Name" />
                        </div>

	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="dob" class="form-control dateofbirth" id="datepicker" placeholder="Age (and DOB)" autocomplete="off">
	                            <span class="input-group-addon bg-white b-0"><i class="fa fa-calendar"></i></span>
	                        </div>
	                    </div>

                        <div class="col-md-2 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="securitynumber" class="form-control securitynumber" placeholder="Social Security Number">
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control" placeholder="Cell">
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="driverslicence" class="form-control" placeholder="Drivers Licence">
	                        </div>
	                    </div>

	                </div><!--row-->

					<div class="row">
	                    <div class="col-md-2 col-sm-6">
	                            <!--<input type="text" name="warzone" class="form-control" placeholder="War Zone">-->
	                            <select name="warzone" class="form-control">
	                            	<option value="">Warzone</option>
	                            	<option value="Yes">Yes</option>
	                            	<option value="No">No</option>
	                            </select>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="served" class="form-control" placeholder="Where Served">
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
                            <!--<input type="text" name="military" class="form-control" placeholder="Branch of military">-->
                            <select name="military" class="form-control">
                            	<option value="">Branch of Service</option>
                            	<option value="Air Force">Air Force</option>
                            	<option value="Army">Army</option>
                            	<option value="Coast Guard">Coast Guard</option>
                            	<option value="Marine Corps">Marine Corps</option>
                            	<option value="Navy">Navy</option>
                            </select>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="state" class="form-control" placeholder="State">
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="homeless_court" class="form-control" placeholder="Homeless Court">
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="legal_issue" class="form-control" placeholder="Legal Issue">
	                        </div>
	                    </div>

					</div><!--row-->
					
					<div class="row">
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <!--<input type="text" name="child_support" class="form-control" placeholder="Child Support">-->
	                            <select name="child_support" class="form-control">
	                            	<option value="">Child Support</option>
	                            	<option value="Yes">Yes</option>
	                            	<option value="No">No</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <!--<input type="text" name="spouse_attending" class="form-control" placeholder="Spouse Attending">-->
	                            <select name="spouse_attending" class="form-control">
	                            	<option value="">Spouse Attending</option>
	                            	<option value="Yes">Yes</option>
	                            	<option value="No">No</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <!--<input type="text" name="children_attending" class="form-control" placeholder="Children Attending">-->
	                            <select name="children_attending" class="form-control">
	                            	<option value="">Children Attending</option>
	                            	<option value="Yes">Yes</option>
	                            	<option value="No">No</option>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="pet" class="form-control" placeholder="Pets">
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="specialneed" class="form-control" placeholder="Special Needs">
	                        </div>
	                    </div>
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="pickup" class="form-control" placeholder="Pickup / Dropoff">
	                        </div>
	                    </div>
					</div><!--row-->
					
					<div class="row">
	                    <div class="col-md-2 col-sm-6">
	                        <div class="input-group">
	                            <input type="text" name="sexoffender" class="form-control" placeholder="Sex Offender">
	                        </div>
	                    </div>

	                    <div class="col-md-2 col-sm-6">
							<div class="input-group space-bottom">
								<select class="form-control" name="attend_year">
									<option value="">Year Attending Standown</option>
									@foreach($years as $year)
										<option value="{{ $year }}">{{ $year }}</option>
									@endforeach
								</select> 
							</div>
						</div>

                        <div class="col-md-2 col-sm-6">
                            <div class="input-group radio_group">
                            	Gender: <br>
                            	<input type="radio" name="gender" class="genderfilter" value="Male" /> <label> Male </label>
                            	<input type="radio" name="gender" class="genderfilter" value="Female" /><label>  Female </label>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6">
                            <div class="input-group pull-right text-right">
                                <span class="input-group-btn">
                                    <button type="button" id="clear_search" class="btn waves-effect waves-light btn-custom" style="margin-right: 10px;">Clear Filter</button>
                                    <button type="button" id="searchbtn" class="btn waves-effect waves-light btn-custom"><i class="fa fa-search m-r-5"></i> Search</button>
                                </span>
                            </div>
                        </div>
						
					</div><!--row-->

                    </form>
                    </div>
                </div>
                
                @if(Session::has('success'))
                	{!! Session('success') !!}
                @endif
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <!--<button type="button" class="btn btn-success waves-effect w-md waves-light pull-right add-employee-btn" data-toggle="modal" data-target="#con-close-modal">Add Employer</button>-->

                            <table id="veteranlist" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="4%" valign="middle">ID</th>
                                        <th width="7%" valign="middle">Full name</th>
                                        <th width="7%">Email</th>
                                        <th width="7%">Phone</th>
                                        <th width="9%" valign="middle">Homeless Court</th>
                                        <th width="15%" valign="middle">Year Registerd for Standdown</th>
                                        
                                        
                                        <!-- Export fields -->
                                        <th style="display:none;">Date of Birth</th>
                                        <th style="display:none;"></th>
                                        <th style="display:none;">Driver's License State & Number</th>
                                        <th style="display:none;">Did you serve in a war zone?</th>
                                        <th style="display:none;">If you answered yes, where did you serve?</th>
                                        <th style="display:none;">Branch of Service</th>
                                        <th style="display:none;">State of Birth</th>
                                        <th style="display:none;">If you have any legal issues, please indicate</th>
                                        <th style="display:none;">Do you have a child support case being administered by San Diego County D.C.S.S?</th>
                                        <th style="display:none;">If yes, please provide their full legal name.</th>
                                        <th style="display:none;">If yes, please provide their full legal name(s)</th>
                                        <th style="display:none;">If yes</th>
                                        <th style="display:none;">If you have any special needs such as wheelchair access, please indicate</th>
                                        <th style="display:none;">Please select your pick-up / drop-off location. Buses will provide transportation to the Stand Down from 8:00 AM - 4:00 PM Thursday February 7th, 2019.</th>
                                        <th style="display:none;">I confirm: I have never been convicted of a sex offense.</th>
                                        <th style="display:none;">Gender</th>
                                        <!-- Export fields -->
                                        
                                        <th style="display:none;">First Name</th> <!-- 23  -->
                                        <th style="display:none;">Middle Name</th> <!-- 24  -->
                                        <th style="display:none;">Last Name</th><!-- 25  -->
                                        <!--<th style="display:none;">Driver's License State & Number</th>--><!-- 26  --> <!-- 9 -->
                                        <!--<th style="display:none;">Date of Birth</th>--><!-- 27  --> <!-- 5 -->
                                        <th style="display:none;">Birth City</th><!-- 28  -->
                                        <!--<th style="display:none;">State of Birth</th>--><!-- 29  --> <!-- 13 -->
                                        <!-- <th style="display:none;">Gender</th>--><!-- 30  --> <!-- 22 -->
                                        <th style="display:none;">Dependent Full Name</th> <!-- 31  -->
                                        <th style="display:none;">Dependent Relationship</th> <!-- 32  -->
                                        <th style="display:none;">Dependent Age</th> <!-- 33  -->
                                        <th style="display:none;">Dependent Gender</th> <!-- 34  -->
                                        <!--<th style="display:none;">Contact Cell Number</th>--> <!-- 35  --> <!-- 7 -->
                                        <!--<th style="display:none;">Contact Email Address</th>--> <!-- 36  --> <!-- 8 -->
                                        <!--<th style="display:none;">Did you serve in a war zone?</th>--><!-- 37  --> <!-- 10 -->
                                        <!--<th style="display:none;">If you answered yes, where did you serve?</th>--><!-- 38  --> <!-- 11 -->
                                        <th style="display:none;">Your Military Tenure Date Served (From)</th><!-- 39  -->
                                        <th style="display:none;">Your Military Tenure Date Served (To)</th><!-- 40  -->
                                        <!--<th style="display:none;">Unit and or MOS</th>--><!-- 41  -->
                                        <th style="display:none;">Are you interested in receiving more comprehensive support: employment, mentorship, and housing?</th><!-- 42  -->
                                        <th style="display:none;">Group Name</th><!-- 43  -->
                                        <th style="display:none;">If you are currently supported by another organization please answer</th><!-- 44  -->
                                        <th style="display:none;">This situation is one of the only exceptions to being able to leave and return</th><!-- 45  -->
                                        <th style="display:none;">Please list any current health problems</th><!-- 46  -->
                                        <th style="display:none;">If selected others, please mention all health problems</th><!-- 47  -->
                                        <!--<th style="display:none;">If you have any legal issues, please indicate</th>--><!-- 48  --> <!-- 14 -->
                                        <th style="display:none;">Would you like to attend Veterans Court?</th><!-- 49  -->
                                        <!--<th style="display:none;">Do you have a child support case being administered by San Diego County D.C.S.S?</th>--><!-- 50  --> <!-- 15 -->
                                        <th style="display:none;">Will a spouse or partner be attending with you? </th><!-- 51  -->
                                        <!--<th style="display:none;">If yes, please provide their full legal name.</th>--><!-- 52  --> <!-- 16 -->
                                        <th style="display:none;">Do you or your spouse have any tickets or warrants?</th><!-- 53  -->
                                        <th style="display:none;">Will any of your children (under the ages of 18) be attending with you?</th><!-- 54  -->
                                        <!--<th style="display:none;">If yes, please provide their full legal name(s)</th>--><!-- 55  --> <!-- 17 -->
                                        <th style="display:none;">Do you plan on bringing a pet with you to the event?</th><!-- 56  -->
                                        <!--<th style="display:none;">If yes</th>--><!-- 57  --> <!-- 18 -->
                                        <th style="display:none;">If Other</th><!-- 58  -->
                                        <th style="display:none;">How Many?</th><!-- 59  -->
                                        <th style="display:none;">What Breed?</th><!-- 60  -->
                                        <!--<th style="display:none;">If you have any special needs such as wheelchair access, please indicate</th>--><!-- 61  --> <!-- 19 -->
                                        <!--<th style="display:none;">Please select your pick-up / drop-off location. Buses will provide transportation to the Stand Down from 8:00 AM - 4:00 PM Thursday February 7th, 2019.</th>--><!-- 62  --> <!-- 20 -->
                                        <th style="display:none;">Other</th><!-- 63  -->
                                        <th style="display:none;">Will you be arriving by other means such as a car or bicycle? Please explain.</th><!-- 64  -->
                                        <th style="display:none;">Emergency Contact Name</th><!-- 65  -->
                                        <th style="display:none;">Emergency Contact Phone</th><!-- 66  -->
                                        <!--<th style="display:none;">I confirm: I have never been convicted of a sex offense.</th>--><!-- 67  --> <!-- 21 -->
                                        <th style="display:none;">Please type your first and last name here for electronic signature</th><!-- 68  -->
                                        <th style="display:none;">I understand and agree</th><!-- 69  -->
                                        
                                        <th width="10%" valign="middle">Validated as Veteran</th>
                                        <th>Sign Up Date</th><!-- 69  -->
                                        <th width="20%" valign="middle" class="text-center">View Details / Download PDF</th>
										<th style="display:none;"></th>
                                        <th style="display:none;">Dependent Full Name 2</th> <!-- 31  -->
                                        <th style="display:none;">Dependent Relationship 2</th> <!-- 32  -->
                                        <th style="display:none;">Dependent Age 2</th> <!-- 33  -->
                                        <th style="display:none;">Dependent Gender 2</th> <!-- 34  -->
                                        <th style="display:none;">Dependent Full Name 3</th> <!-- 31  -->
                                        <th style="display:none;">Dependent Relationship 3</th> <!-- 32  -->
                                        <th style="display:none;">Dependent Age 3</th> <!-- 33  -->
                                        <th style="display:none;">Dependent Gender 3</th> <!-- 34  -->

                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript" src='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js'></script>
<script>
	$('.formspace input[type=text], .formspace input[type=email]').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	        //alert('You pressed a "enter" key in textbox'); 
	        $('#searchbtn').click();
	    }
	});

    var table = $('#veteranlist').DataTable({
        processing: true,
        serverSide: true,
        "aaSorting": [ [0,"desc" ]],
        ajax: '{!! route('veteranlist') !!}',
        columns: [
        	{ data: 'id', name: 'id', searchable: true },
        	{ data: 'fullname', name: 'fullname', searchable: true },
        	{ data: 'email', name: 'email', searchable: true },
        	{ data: 'cellnumber', name: 'cellnumber', searchable: true, visible:false },
        	{ data: 'homeless_court', name: 'homeless_court', searchable: true },
        	{ data: 'attended_year', name: 'attended_year', searchable: true },
			/*{ data : function(data){
				var d = new Date(data.created_at);
                return d.getFullYear();
            }, "searchable":false, "name":"year" },  */      	
        	
        	{ data: 'dateofbirth', name: 'dateofbirth', searchable: true, visible: false },
        	{ data: 'serialsecurity', name: 'serialsecurity', searchable: true, visible: false},
        	{ data: 'drivers_license', name: 'drivers_license', searchable: true, visible:false },
        	{ data: 'warzone', name: 'warzone', searchable: true, visible:false },
        	{ data: 'serve', name: 'serve', searchable: true, visible:false },
        	{ data: 'branchservice', name: 'branchservice', searchable: true, visible:false },
        	{ data: 'stateofbirth', name: 'stateofbirth', searchable: true, visible:false },
        	{ data: 'legal_issues', name: 'legal_issues', searchable: true, visible:false },
        	{ data: 'countydcss', name: 'countydcss', searchable: true, visible:false },
        	{ data: 'partner_name', name: 'partner_name', searchable: true, visible:false },
        	{ data: 'children_name', name: 'children_name', searchable: true, visible:false },
        	{ data: 'pet', name: 'pet', searchable: true, visible:false },
        	{ data: 'wheelchair', name: 'wheelchair', searchable: true, visible:false },
        	{ data: 'pickuplocation', name: 'pickuplocation', searchable: true, visible:false },
        	{ data: 'sexoffense', name: 'sexoffense', searchable: true, visible:false },
        	{ data: 'gender', name: 'gender', searchable: true, visible:false },
        	
        	//Export columns
        	{ data: 'firstname', name: 'firstname', searchable: true, visible:false },
        	{ data: 'middlename', name: 'middlename', searchable: true, visible:false },
        	{ data: 'lastname', name: 'lastname', searchable: true, visible:false },
        	//{ data: 'drivers_license', name: 'drivers_license', searchable: true, visible:false },
        	//{ data: 'dateofbirth', name: 'dateofbirth', searchable: true, visible:false },
        	{ data: 'birthcity', name: 'birthcity', searchable: true, visible:false },
        	//{ data: 'stateofbirth', name: 'stateofbirth', searchable: true, visible:false },
        	//{ data: 'gender', name: 'gender', searchable: true, visible:false },
        	{ data: 'dependent_fullname', name: 'dependent_fullname', searchable: true, visible:false },
        	{ data: 'dependent_relationship', name: 'dependent_relationship', searchable: true, visible:false },
        	{ data: 'dependent_age', name: 'dependent_age', searchable: true, visible:false },
        	{ data: 'dependent_gender', name: 'dependent_gender', searchable: true, visible:false },
        	//{ data: 'cellnumber', name: 'cellnumber', searchable: true, visible:false },
        	//{ data: 'email', name: 'email', searchable: true, visible:false },
        	//{ data: 'warzone', name: 'warzone', searchable: true, visible:false },
        	//{ data: 'serve', name: 'serve', searchable: true, visible:false },
        	{ data: 'dateservedfrom', name: 'dateservedfrom', searchable: true, visible:false },
        	{ data: 'dateservedto', name: 'dateservedto', searchable: true, visible:false },
        	/*{ data: 'mos', name: 'mos', searchable: true, visible:false },*/
        	{ data: 'emh', name: 'emh', searchable: true, visible:false },
        	{ data: 'groupname', name: 'groupname', searchable: true, visible:false },
        	{ data: 'organization_answer', name: 'organization_answer', searchable: true, visible:false },
        	{ data: 'situation', name: 'situation', searchable: true, visible:false },
        	{ data: 'health_problems', name: 'health_problems', searchable: true, visible:false },
        	{ data: 'health_problem_answer', name: 'health_problem_answer', searchable: true, visible:false },
        	//{ data: 'legal_issues', name: 'legal_issues', searchable: true, visible:false },
        	{ data: 'court', name: 'court', searchable: true, visible:false },
        	//{ data: 'countydcss', name: 'countydcss', searchable: true, visible:false },
        	{ data: 'partner_attending', name: 'partner_attending', searchable: true, visible:false },
        	//{ data: 'partner_name', name: 'partner_name', searchable: true, visible:false },
        	{ data: 'spouse_ticktet_warrants', name: 'spouse_ticktet_warrants', searchable: true, visible:false },
        	{ data: 'underage_children', name: 'underage_children', searchable: true, visible:false },
        	//{ data: 'children_name', name: 'children_name', searchable: true, visible:false },
        	{ data: 'petanswer', name: 'petanswer', searchable: true, visible:false },
        	//{ data: 'pet', name: 'pet', searchable: true, visible:false },
        	{ data: 'pet_other_name', name: 'pet_other_name', searchable: true, visible:false },
        	{ data: 'pet_quantity', name: 'pet_quantity', searchable: true, visible:false },
        	{ data: 'pet_breed', name: 'pet_breed', searchable: true, visible:false },
        	//{ data: 'wheelchair', name: 'wheelchair', searchable: true, visible:false },
        	//{ data: 'pickuplocation', name: 'pickuplocation', searchable: true, visible:false },
        	{ data: 'pickuplocation_other', name: 'pickuplocation_other', searchable: true, visible:false },
        	{ data: 'vehicle', name: 'vehicle', searchable: true, visible:false },
        	{ data: 'emergencycname', name: 'emergencycname', searchable: true, visible:false },
        	{ data: 'emergencycphone', name: 'emergencycphone', searchable: true, visible:false },
        	//{ data: 'sexoffense', name: 'sexoffense', searchable: true, visible:false },
        	{ data: 'electronic_signature', name: 'electronic_signature', searchable: true, visible:false },
        	{ data: 'terms', name: 'terms', searchable: true, visible:false },
        	/*{ data: function(data){
				const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
        		var d = new Date(data.created_at);
        		return d.getUTCDate()+'/'+monthNames[d.getMonth()]+'/'+d.getFullYear();
        	}, name: 'day', searchable: true, orderable: false },*/
        	{ data: 'verified_registered_veteran', name: 'verified_registered_veteran', searchable: true, orderable: true },
        	{ data: 'created_at', name: 'created_at', searchable: true, visible:true },
        	{ data: 'action', name: 'action', searchable: true, orderable: false },
        	{ data: 'information_id', name: 'information_id', searchable: true, visible:false },
        	//dependent 2
        	{ data: 'dependent_fullname2', name: 'dependent_fullname2', searchable: true, visible:false },
        	{ data: 'dependent_relationship2', name: 'dependent_relationship2', searchable: true, visible:false },
        	{ data: 'dependent_age2', name: 'dependent_age2', searchable: true, visible:false },
        	{ data: 'dependent_gender2', name: 'dependent_gender2', searchable: true, visible:false },
        	//dependent 3
        	{ data: 'dependent_fullname3', name: 'dependent_fullname3', searchable: true, visible:false },
        	{ data: 'dependent_relationship3', name: 'dependent_relationship3', searchable: true, visible:false },
        	{ data: 'dependent_age3', name: 'dependent_age3', searchable: true, visible:false },
        	{ data: 'dependent_gender3', name: 'dependent_gender3', searchable: true, visible:false },
        	
        ],
		"createdRow": function ( row, data, index ) {
            $('td', row).eq(7).addClass('text-center');
        },
        "order": [[ 55, 'desc' ]],
        'columnDefs': [
                 {
                    'targets': 0,
                    'checkboxes': {
                       'selectRow': true
                    }
                 }
              ],
              'select': {
                 'style': 'multi',
                 selector: 'td:first-child'
              },
        dom: 'Blfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
        	{
	            extend: 'csv',
	            text: 'Export All',
	            exportOptions: { 
	            	columns: [55,22,23,24,2,3,25,9,26,13,27,28,29,56,57,58,59,60,61,62,63,30,8,10,11,31,32,33,34,35,36,37,38,39,14,40,15,41,16,42,43,17,44,18,45,46,47,19,20,48,49,50,51,21,52] //Your Colume value those you want
	            }
	        },
        	{
				extend: 'csv',
				text: 'Export Selected',
				exportOptions: {
					rows: { selected: true },
            		columns: [55,22,23,24,2,3,25,9,26,13,27,28,29,56,57,58,59,60,61,62,63,30,8,10,11,31,32,33,34,35,36,37,38,39,14,40,15,41,16,42,43,17,44,18,45,46,47,19,20,48,49,50,51,21,52] //Your Colume value those you want
	            }
	        }

        ]
    });
    
    $('#searchbtn').on( 'click', function () {
        table.columns(1).search( $('#firstname').val() ).draw();
        table.columns(2).search( $('input[name=email]').val() ).draw();
        table.columns(3).search( $('input[name=phone]').val() ).draw();
        table.columns(5).search( $('select[name=attend_year]').val() ).draw();
        table.columns(6).search( $('.dateofbirth').val() ).draw();
        table.columns(7).search( $('input[name="securitynumber"]').val() ).draw();
        table.columns(8).search( $('input[name=driverslicence]').val() ).draw();
        table.columns(9).search( $('select[name=warzone]').val() ).draw();
        table.columns(10).search( $('input[name=served]').val() ).draw();
        table.columns(11).search( $('select[name=military]').val() ).draw();
        table.columns(12).search( $('input[name=state]').val() ).draw();
        table.columns(13).search( $('input[name=legal_issue]').val() ).draw();
        table.columns(14).search( $('select[name=child_support]').val() ).draw();
        table.columns(15).search( $('select[name=spouse_attending]').val() ).draw();
        table.columns(16).search( $('select[name=children_attending]').val() ).draw();
        table.columns(17).search( $('input[name=pet]').val() ).draw();
        table.columns(18).search( $('input[name=specialneed]').val() ).draw();
        table.columns(19).search( $('input[name=pickup]').val() ).draw();
        table.columns(20).search( $('input[name=sexoffender]').val() ).draw();
        
        var radioValue = $("input[name='gender']:checked").val();
        console.log(radioValue);
        table.columns(21).search( radioValue ).draw();
        
    });

    $('#clear_search').on('click',function(){
        $('#firstname').val("");
        $('.dateofbirth').val("");
        $('input[name=securitynumber]').val("");
        $('input[name=phone]').val("");
        $('input[name=email]').val("");
        $('input[name=driverslicence]').val("");
        $('select[name=warzone]').val("");
        $('select[name=attend_year]').val("");
        $('input[name=served]').val("");
        $('select[name=military]').val("");
        $('input[name=state]').val("");
        $('input[name=legal_issue]').val("");
        $('select[name=child_support]').val("");
        $('select[name=spouse_attending]').val("");
        $('select[name=children_attending]').val("");
        $('input[name=pet]').val("");
        $('input[name=specialneed]').val("");
        $('input[name=pickup]').val("");
        $('input[name=sexoffender]').val("");
        $("input[name='gender']").prop('checked', false);
        
        table.columns(1).search( $('#firstname').val() ).draw();
        table.columns(2).search( $('input[name=email]').val() ).draw();
        table.columns(3).search( $('input[name=phone]').val() ).draw();
        table.columns(5).search( $('select[name=attend_year]').val() ).draw();
        table.columns(6).search( $('.dateofbirth').val() ).draw();
        table.columns(7).search( $('input[name="securitynumber"]').val() ).draw();
        table.columns(8).search( $('input[name=driverslicence]').val() ).draw();
        table.columns(9).search( $('select[name=warzone]').val() ).draw();
        table.columns(10).search( $('input[name=served]').val() ).draw();
        table.columns(11).search( $('select[name=military]').val() ).draw();
        table.columns(12).search( $('input[name=state]').val() ).draw();
        table.columns(13).search( $('input[name=legal_issue]').val() ).draw();
        table.columns(14).search( $('select[name=child_support]').val() ).draw();
        table.columns(15).search( $('select[name=spouse_attending]').val() ).draw();
        table.columns(16).search( $('select[name=children_attending]').val() ).draw();
        table.columns(17).search( $('input[name=pet]').val() ).draw();
        table.columns(18).search( $('input[name=specialneed]').val() ).draw();
        table.columns(19).search( $('input[name=pickup]').val() ).draw();
        table.columns(20).search( $('input[name=sexoffender]').val() ).draw();

        var radioValue = "";//$("input[name='gender']:checked").val();
        table.columns(21).search( radioValue ).draw();
		
    });
 	function deleteveteran(id){
		if(confirm('Are you sure to want delete this record ?')){
			document.location.href = 'deleteveteran/'+id;
		}
	}   
    </script>
@endsection