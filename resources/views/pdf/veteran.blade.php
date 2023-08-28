<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Veteran Registration</title>

    </head>
    <body>
        <style>
        body{
        	white-space: normal; 
        	font-family: 'Varela Round', sans-serif;
        	}
		.no-break{
			page-break-inside: avoid;
		}
		.main_tab_set{
			 border-radius: 10px;
    		-moz-border-radius: 10px;
			}
		.main_tab_set tr td{
			
		    background: #eeeeee !important;
		    margin: 20px;
		    padding: 10px;
		    border-radius: 10px;
    		-moz-border-radius: 10px;
		 }
		 .main_tab_set{
			border-spacing: 12px;
			border-collapse: separate;
			page-break-inside: avoid;
		 	}
		 h2{
		 	padding-left: 0px;
		 	}
		 .main_tab_set th{
		 	text-align: left;
		 	padding-left: 10px;
		  }
		  img{
		  	text-align: center;
		  }
		  ul{
		  	padding: 15px;
		  }
		  .main_logo{
		  	text-align: center;
		  	}
		  .main_logo td{
		  	background: #000;
		  	width: 100%;
		  	text-align: center;
		  	}		
		 </style>

		<table align="center" class="main_logo">
			<tr>
				<td>
					<img src="http://ncvsd.accunity.com/assets/images/header-logo.png">
				</td>
			</tr>
			
		</table>

		<h1 align="center">Veteran Registration Form</h1>
		
		<table class="main_tab_set" width="100%" >
			<tr>
				<th><h2>Personal Information</h2></th>
			</tr>
			<tr>
				@if($firstname)
					<td><strong>First Name:</strong><br />{{$firstname}}</td>
				@endif
				@if($middlename)
					<td><strong>Middle Name:</strong><br /> {{$middlename}}</td>
				@endif
				@if($lastname)
				<td><strong>Last Name:</strong><br /> {{$lastname}}</td>
				@endif
			</tr>
		</table>
		<div class="no-break"></div>
		<table class="main_tab_set" width="100%" >
			<tr>
				@if($social_security_number)
					<td><strong>Social Security Number:</strong><br /> {{$social_security_number}}</td>
				@endif
				@if($license)
					<td><strong>Driver's License State & Number:</strong><br /> {{$license}}</td>
				@endif
				@if($dob)
					<td><strong>Date of Birth:</strong><br /> {{$dob}}</td>
				@endif
			</tr>
		</table>
		<div class="no-break"></div>
		<table class="main_tab_set" width="100%" >
			<tr>
				@if($birth_city)
					<td><strong>Birth City:</strong><br /> {{$birth_city}}</td>
				@endif
				@if($birth_state)
					<td><strong>State of Birth:</strong><br /> {{$birth_state}}</td>
				@endif
				@if($gender)
					<td><strong>Gender:</strong><br /> {{$gender}}</td>
				@endif
			</tr>
		</table>
		<div class="no-break"></div>
		@if($dependent_fullname || $dependent_fullname2 || $dependent_fullname3)
			<table class="main_tab_set" width="100%">
				<tr>
					<th colspan="4" align="center"><h3>Dependents</h3></th>
				</tr>
				<tr>
					@if($dependent_fullname)
						<td><strong>Full Name:</strong><br /> {{$dependent_fullname}}</td>
					@endif
					@if($dependent_relationship)
						<td><strong>Relationship:</strong><br /> {{$dependent_relationship}}</td>
					@endif
					@if($dependent_age)
						<td><strong>Age:</strong><br /> {{$dependent_age}}</td>
					@endif
					@if($dependent_gender)
						<td><strong>Gender:</strong><br /> {{$dependent_gender}}</td>
					@endif
				</tr>
			</table>
			<div class="no-break"></div>
			<table class="main_tab_set" width="100%">			
				<tr>
					@if($dependent_fullname2)
						<td><strong>Full Name:</strong><br /> {{$dependent_fullname2}}</td>
					@endif
					@if($dependent_relationship2)
						<td><strong>Relationship:</strong><br /> {{$dependent_relationship2}}</td>
					@endif
					@if($dependent_age2)
						<td><strong>Age:</strong><br /> {{$dependent_age2}}</td>
					@endif
					@if($dependent_gender2)
						<td><strong>Gender:</strong><br /> {{$dependent_gender2}}</td>
					@endif
				</tr>
			</table>
			<div class="no-break"></div>
			<table class="main_tab_set" width="100%">				
				<tr>
					@if($dependent_fullname3)
						<td><strong>Full Name:</strong><br /> {{$dependent_fullname3}}</td>
					@endif
					@if($dependent_relationship3)
						<td><strong>Relationship:</strong><br /> {{$dependent_relationship3}}</td>
					@endif
					@if($dependent_age3)
						<td><strong>Age:</strong><br /> {{$dependent_age3}}</td>
					@endif
					@if($dependent_gender3)
						<td><strong>Gender:</strong><br /> {{$dependent_gender3}}</td>
					@endif
				</tr>			
			</table>
		@endif

		<div class="no-break"></div>

		@if($cell_number || $email_address)
			<table class="main_tab_set" width="100%">
				<tr>
					<th colspan="2" align="left"><h3>Contact Information</h3></th>
				</tr>
				<tr>
					@if($cell_number)
					<td><strong>Cell Number:</strong><br /> {{$cell_number}}</td>
					@endif
					@if($email_address)
					<td><strong>Email Address:</strong><br /> {{$email_address}}</td>
					@endif
				</tr>
			</table>
		@endif
		<div class="no-break"></div>
		<!-- <div class="page-break"></div> -->		
		
		<table  class="main_tab_set" width="100%">
			<tr>
				<th><h2>Military Information</h2></th>
			</tr>
			<tr>
				@if($serve_war_zone)
					<td valign="top"><strong>Did you serve in a war zone? :</strong><br /> {{$serve_war_zone}}</td>
				@endif
				@if(!empty($serve))
				<td><strong>If you answered yes, where did you serve?</strong>
					<ul>
						@foreach($serve as $getserve)
							<li>{{ $getserve }}</li>
						@endforeach
					</ul>
				</td>
				@endif
				@if($branchservice)
				<td>
					<strong>Branch of Service</strong>
					<ul>
						@foreach($branchservice as $getbranchservice)
							<li>{{ $getbranchservice }}</li>
						@endforeach
					</ul>
				</td>
				@endif
			</tr>
		</table>
		
		<div class="no-break"></div>
		@if($datefrom || $dateto)
			<table class="main_tab_set" width="100%">
				<tr>
					<th colspan="2" align="left"><h3>Your Military Tenure</h3></th>
				</tr>
				<tr>
					@if($datefrom)
						<td><strong>Date Served (From): </strong> {{$datefrom}}</td>
					@endif
					@if($dateto)
					<td><strong>Date Served (To): </strong> {{$dateto}}</td>
					@endif
				</tr>
			</table>
		@endif 	
		<div class="no-break"></div>
		@if($emh)
			<table class="main_tab_set" width="100%">
				<tr>
					<th><h2>Status Information</h2></th>
				</tr>
				<tr>
					<td><strong>Are you interested in receiving more comprehensive support: employment, mentorship, and housing?<br/> 
			If Yes, someone from our team will contact you. 
			</strong><br>{{ $emh }}</td>
				</tr>
			</table>
		@endif
		<div class="no-break"></div>
		@if($groupname)
			<table class="main_tab_set" width="100%">
				<tr><td><strong>If you're participating with a group, what is the name of the group?: </strong><br>{{ $groupname }}</td></tr>
			</table>
		@endif
		<div class="no-break"></div>
		@if($answer)
			<table class="main_tab_set" width="100%">
				<tr><td><strong>If you are currently supported by another organization, please indicate if you have any restrictions such as a curfew and must be returned by a certain time and needing to be picked up the next day to return.</strong><br>{{ $answer }}</td></tr>
			</table>
		@endif
		<div class="no-break"></div>
		@if($reqsupport)
			<table class="main_tab_set" width="100%">
				<tr><td><strong>This situation is one of the only exceptions to being able to leave and return: </strong><br>{{$reqsupport}}</td></tr>
			</table>
		@endif	
		<div class="no-break"></div>
		@if($health_problems)
			<table class="main_tab_set" width="100%">
				<tr>
					<td>
						<strong> Health Issues </strong> <br />
						<ul>
							@foreach($health_problems as $gethealth_problems)
								<li>{{ $gethealth_problems }}</li>
							@endforeach
						</ul>	 
					</td>

					<td valign="center"><strong>Other Health Issues</strong><br />{{ $health_problem_answer }} </td>
			</table>
		@endif
		<div class="no-break"></div>
		@if($legal_issues)
		<table class="main_tab_set" width="100%">
			<tr>
				<td><strong>If you have any tickets, warrants, or other legal issues, please indicate so. (illegal camping citation, trespassing citation, vagrancy citation, speeding ticket, etc.) If your spouse has tickets or warrants and would like to attend Homeless Court then he/she will need to complete a separate Stand Down registration application including their date of birth and case/ticket information: </strong><br>{{$legal_issues}}</td>
			</tr>
		</table>		
		@endif

		<div class="no-break"></div>

		@if($court)
			<table class="main_tab_set" width="100%">
				<tr>
					<td><strong>Would you like to attend Homeless Court? Homeless Court requests must be submitted through this registration process by (fill in the deadline.) <br />Homeless Court registration is first-come, first-served, so please register early</strong><br>{{$court}}</td>
				</tr>
			</table>
		@endif
		<div class="no-break"></div>
		@if($child_support)
		<table class="main_tab_set" width="100%">
			<tr>
				<td><strong>Do you have a child support case being administered by San Diego County D.C.S.S:</strong><br>{{$child_support}}</td>
			</tr>
		</table>
		@endif
		<div class="no-break"></div>
		@if($homeless_court)
			<table class="main_tab_set" width="100%">
				<tr>
					<td>
						<strong>Do you or your spouse have any tickets or warrants? <br/>Please note, your spouse will need to submit their own registration form and include their ticket information on that form.</strong><br>
						{{$homeless_court}}
						@if($homeless_court == 'Yes')
						<p><strong>If yes, how many times?</strong> {{$spouse_ticktet_warrants}}</p>
						<h4>Criminal / Traffic / Minor Offense Court (ALL Participants)</h4>
						<p><strong>Do you have any outstanding warrants?</strong> {{$outstanding_warrants}}</p>
						<p><strong>If yes, include case number and location of warrant</strong> {{$namelocation_warrant}}</p>
						<p><strong>Do you have any Criminal or Minor Offense / Traffic cases?</strong> {{$criminalminor}}</p>
						<p><strong>If yes, what kind?</strong> {{$anycriminal}}</p>
						<p><strong>Please give brief information on each case, including type of case, city where it happened, & year. (EX: petty theft, Escondido, 2016; or Ticket #A237598; or Criminal Case #CN123456)<br/></strong> {{$brief_information}}</p>

						<h4>Family Court (ALL Participants)</h4>
						<p><strong>Do you have a Child Support Case with DCSS?</strong> {{$homeless_child_support_dcss}}</p>
						<p><strong>Do you have any other child support cases?</strong> {{$homeless_child_support_case}}</p>
						@endif 
					</td>
				</tr>
			</table>
		@endif 
		<div class="no-break"></div>
		@if($spouse)
			<table class="main_tab_set" width="100%">
				<tr>
					<td><strong>Will a spouse or partner be attending with you?:</strong><br> {{$spouse}}</td>
				</tr>
			</table>
			@if($spouse_partner)
			<table class="main_tab_set" width="100%">
				<tr>
					<td><strong>If yes, please provide their full legal name:</strong><br> {{$spouse_partner}}</td>
				</tr>
			</table>
			@endif
		@endif
		<div class="no-break"></div>
		@if($dependants)
		<table class="main_tab_set" width="100%">
			<tr>
				<td><strong>Will any of your children (under the ages of 18) be attending with you?:</strong><br> {{$dependants}} </td>
			</tr>
			@if($dependants || "yes")
				@if($name)
				<tr>
					<td><strong>If yes, please provide their full legal name(s):</strong><br> {{$name}}</td>
				</tr>
				@endif
			@endif
		</table>
		@endif
		<div class="no-break"></div>
		@if($petanswer)
			<table class="main_tab_set" width="100%">
				<tr>
					<td><strong> Pets</strong>
						<p>
							@if($petanswer == 'No')
								{{ $petanswer }}<br/>
							@else
								{{ $petanswer }} - @if($pet == 'Others') {{ $pet_other }} @else {{@$pet}}  @endif<br/>
								Quantity: {{ $pet_quantity }}<br/>
								Breed: {{$pet_breed}}
							@endif
						</p>
					</td> 
				</tr>
			</table>
		@endif
		<div class="no-break"></div>
		@if($specialneeds)
		<table class="main_tab_set">
			<tr>
				<td><strong>If you have any special needs such as wheelchair access, please indicate:</strong><br> {{ $specialneeds }} </td>
			</tr>
		</table>
		@endif
		<div class="no-break"></div>
		@if($pickuplocation)
			<table class="main_tab_set" width="100%">
				<tr>
					<td><strong>Your Pick-up/Drop Off Site:</strong><br> @if($pickuplocation == "Other") {{$pickuplocation_other}} @else {{$pickuplocation}} @endif</td>
				</tr>
			</table>		
		@endif
		<div class="no-break"></div>
		@if($transport)
			<table class="main_tab_set" width="100%">
				<tr><td><strong>Will you be arriving by other means such as a car or bicycle?: </strong><br>{{ $transport }}</td></tr>
			</table>
		@endif
		<div class="no-break"></div>
		@if($emergencycname || $emergencycphone)
		<table class="main_tab_set" width="100%">
			<tr>
				@if($emergencycname)
					<td><strong>Emergency Contact Name: </strong><br>{{ $emergencycname }}</td>
				@endif
				@if($emergencycphone)	
					<td><strong>Emergency Contact Phone:</strong><br> {{ $emergencycphone }}</td>
				@endif
			</tr>
		</table>
		@endif
		<div class="no-break"></div>
		@if($sexoffense || $attended_year)
			<table class="main_tab_set" width="100%">
				<tr>
					@if($sexoffense)
						<td><strong>I confirm: I have never been convicted of a sex offense: </strong><br />{{ $sexoffense }}</td>
					@endif
					@if($attended_year)
						<td><strong>Year Attending Standown : </strong>{{$attended_year}}</td>
					@endif
				</tr>
			</table>
		@endif
		<div class="no-break"></div>
			<table class="main_tab_set" width="100%">
				@if($electronic_signature)
				<tr>
					<td><strong>Please type your first and last name here for electronic signature: </strong><br>{{ $electronic_signature }}</td>
				</tr>
				@endif	
				<tr>
					<td><strong>Terms of Acceptance: </strong><br>I understand and agree</td>
				</tr>
			</table>
			
		<!--
			<div class="page-break"></div>
			<h1>Page 2</h1>
		-->
    </body>
</html>
