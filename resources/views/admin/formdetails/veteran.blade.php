<!doctype html>
<html lang="en">
    <head>
        <meta name="_token" content="{{csrf_token()}}" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Veteran Registration</title>

        <!-- date range picker -->
        <!-- App css -->
        <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/custom.css') !!}" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <style>
		.page-break {
		    page-break-after: always;
		}
		body {
    		background-color: #f7f7f7;
		}
		</style>
		<div class="container">

			<h1 class="pageHeading">Veteran Registration Form</h1>
			<div class="row">
				<div class="col-md-6">
					<h2 class="headingStyle">Personal Information</h2>
					
					<p><strong>First Name:</strong> {{$firstname}}</p>
					<p><strong>Middle Name:</strong> {{$middlename}}</p>
					<p><strong>Last Name:</strong> {{$lastname}}</p>
					<p><strong>Social Security Number:</strong> {{$social_security_number}}</p>
					<p><strong>Driver's License State & Number:</strong> {{$license}}</p>
					<p><strong>Date of Birth:</strong> {{$dob}}</p>
					<p><strong>Birth City:</strong> {{$birth_city}}</p>
					<p><strong>State of Birth:</strong> {{$birth_state}}</p>
					<p><strong>Gender:</strong> {{$gender}}</p>

					<h4 class="headingStyle">Dependents</h4>
					<p><strong>Full Name:</strong> {{$dependent_fullname}}</p>
					<p><strong>Relationship:</strong> {{$dependent_relationship}}</p>
					<p><strong>Age:</strong> {{$dependent_age}}</p>
					<p><strong>Gender:</strong> {{$dependent_gender}}</p>

					<br/>
					<p><strong>Full Name:</strong> {{$dependent_fullname2}}</p>
					<p><strong>Relationship:</strong> {{$dependent_relationship2}}</p>
					<p><strong>Age:</strong> {{$dependent_age2}}</p>
					<p><strong>Gender:</strong> {{$dependent_gender2}}</p>

					<br/>
					<p><strong>Full Name:</strong> {{$dependent_fullname3}}</p>
					<p><strong>Relationship:</strong> {{$dependent_relationship3}}</p>
					<p><strong>Age:</strong> {{$dependent_age3}}</p>
					<p><strong>Gender:</strong> {{$dependent_gender3}}</p>
					
					<br />
					<h4 class="headingStyle">Contact Information</h4>
					<p><strong>Cell Number:</strong> {{$cell_number}}</p>
					<p><strong>Email Address:</strong> {{$email_address}}</p>
				</div>
				
				<div class="col-md-6">
					<h2 class="headingStyle">Military Information</h2>
					<p><strong>Did you serve in a war zone? :</strong> {{$serve_war_zone}}</p>
					
					<h4 class="headingStyle">If you answered yes, where did you serve?</h4>
					@if(!empty($serve))
					<ul>
						@foreach($serve as $getserve)
							<li>{{ $getserve }}</li>
						@endforeach
					</ul>
					@endif	
					
					<h4 class="headingStyle">Branch of Service</h4>
					<ul>
						@foreach($branchservice as $getbranchservice)
							<li>{{ $getbranchservice }}</li>
						@endforeach
					</ul>
					
					<h4 class="headingStyle">Your Military Tenure</h4>
					<p><strong>Date Served (From): </strong> {{$datefrom}}</p>
					<p><strong>Date Served (To): </strong> {{$dateto}}</p>
				</div>
			</div>	
			
			<div class="row">
			<div class="col-md-12">
				<h2 class="headingStyle">Status Information</h2>		
				
					<p><strong>Are you interested in receiving more comprehensive support: employment, mentorship, and housing?<br/> 
					If Yes, someone from our team will contact you. 
					</strong>{{ $emh }}</p>
					
					<p><strong>If you're participating with a group, what is the name of the group?: </strong> {{ $groupname }}</p>
					
					<p><strong>If you are currently supported by another organization, please indicate if you have any restrictions such as a curfew and must be returned by a certain time and needing to be picked up the next day to return.  <br />
					Answer:<br/>
					</strong>
					{{ $answer }}
					</p>
					
					<p><strong>Request Support: </strong> @if($reqsupport == 1) {{ 'Yes' }} @endif </p>
				</div>
				
			<div class="col-md-12">
					<div class="healthOne">
					<h4 class="headingStyle">Health Issues</h4>
					<ul class="healtIshuUlStyle">
						@foreach($health_problems as $gethealth_problems)
							<li>{{ $gethealth_problems }}</li>
						@endforeach
					</ul>
					</div>
					<div class="healthOne">
						<p><strong>Other Health Issues: <br/></strong>{{ $health_problem_answer }}</p>
						
						<p><strong>Legal Issues:</strong><br/>{{$legal_issues}}</p>
						
						<p><strong>Would you like to attend Homeless Court? Homeless Court requests must be submitted through this registration process by (fill in the deadline.) :</strong><br/> {{$court}}</p>
						
						<p><strong>Child Support:</strong> {{$child_support}}</p>

						<p><strong>Do you or your spouse have any tickets or warrants? <br/>Please note, your spouse will need to submit their own registration form and include their ticket information on that form.:<br/></strong> {{$homeless_court}}</p>

						@if($homeless_court == 'Yes')
						<p><strong>If yes, how many times?:<br/></strong> {{$spouse_ticktet_warrants}}</p>
						<h4>Criminal / Traffic / Minor Offense Court (ALL Participants)</h4>
						<p><strong>Do you have any outstanding warrants?:<br/></strong> {{$outstanding_warrants}}</p>
						<p><strong>If yes, include case number and location of warrant<br/></strong> {{$namelocation_warrant}}</p>
						<p><strong>Do you have any Criminal or Minor Offense / Traffic cases?<br/></strong> {{$criminalminor}}</p>
						<p><strong>If yes, what kind?<br/></strong> {{$anycriminal}}</p>
						<p><strong>Please give brief information on each case, including type of case, city where it happened, & year. (EX: petty theft, Escondido, 2016; or Ticket #A237598; or Criminal Case #CN123456)<br/></strong> {{$brief_information}}</p>

						<h4>Family Court (ALL Participants)</h4>
						<p><strong>Do you have a Child Support Case with DCSS?<br/></strong> {{$homeless_child_support_dcss}}</p>
						<p><strong>Do you have any other child support cases?<br/></strong> {{$homeless_child_support_case}}</p>
						@endif


						<p><strong>Will a spouse or partner be attending with you?</strong> {{$spouse}}<br />
						
						<strong>If yes, please provide their full legal name:</strong> {{$spouse_partner}}</p>
						
						<p><strong>Will any of your children (under the ages of 18) be attending with you?</strong> {{$dependants}}<br />
						<strong>If yes, please provide their full legal name(s):</strong> {{$name}}</p>
					</div>
					<div class="healthTwo">
						
						
						<p><strong>Pets: <br/></strong> 
						@if($petanswer == 'No')
							{{ $petanswer }}<br/>
						@else
							{{ $petanswer }} - @if($pet == 'Others') {{ $pet_other }} @else {{@$pet}}  @endif<br/>
							Quantity: {{ $pet_quantity }}<br/>
							Breed: {{$pet_breed}}
						@endif
						</p>
						
						<p><strong>Special Needs:</strong> {{ $specialneeds }}</p>
						
						<p><strong>Your Pick-up/Drop Off Site:</strong> @if($pickuplocation == "Other") {{$pickuplocation_other}} @else {{$pickuplocation}} @endif</p>
						
						<p><strong>Will you be arriving by other means such as a car or bicycle?: </strong><br /> {{ $transport }} </p>
						
						<p><strong>Emergency Contact Name: </strong>{{ $emergencycname }}</p>
						
						<p><strong>Emergency Contact Phone:</strong> {{ $emergencycphone }}</p>
						
						<p><strong>I confirm: I have never been convicted of a sex offense: </strong>{{ $sexoffense }}</p>
						
						<p><strong>Please type your first and last name here for electronic signature: </strong>{{ $electronic_signature }}</p>
						
						<p><strong>Terms of Acceptance: </strong>I understand and agree</p>
					</div>
				</div>
			</div>
		</div>
		<!--
			<div class="page-break"></div>
			<h1>Page 2</h1>
		-->
    </body>
</html>
