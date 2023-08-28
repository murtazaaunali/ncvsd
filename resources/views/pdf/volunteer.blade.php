<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <style>
		body{
        	white-space: normal; 
        	font-family: 'Varela Round', sans-serif;
        	}
		.no-break{ 
			page-break-inside: avoid;
			page-break-after:avoid;
		}
		.no-break-in{
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
			//page-break-inside: avoid;
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
		  .break-in{
			 page-break-after:always; 
			}
		</style>
		<table align="center" class="main_logo">
			<tr style="page-break-after: avoid">
				<td>
					<img src="http://ncvsd.accunity.com/assets/images/header-logo.png">
				</td>
			</tr>
		</table>
		<h1 align="center">Volunteer Registration Form</h1>
		
		<table class="main_tab_set" width="100%" >
			<tr>
				<th><h2>Demographic</h2></th>
			</tr>
			<tr style="page-break-after: avoid">
				@if($firstname)
					<td><strong>First Name:</strong><br />{{$firstname}}</td>
				@endif
				@if($middlename)
					<td><strong>Middle Name:</strong><br /> {{$middlename}}</td>
				@endif
				@if($lastname)
				<td><strong>Last Name:</strong><br /> {{$lastname}}</td>
				@endif
				@if($phone)
				<td><strong>Cell Number:</strong><br /> {{$phone}}</td>
				@endif
				@if($email)
				<td><strong>Email Address:</strong><br /> {{$email}}</td>
				@endif
			</tr>
		</table>
	
		<table class="main_tab_set" width="100%" >
			<tr>
				@if($occupation)
					<td><strong>Occupation:</strong><br />{{$occupation}}</td>
				@endif
				@if($activedutymilitary)
					<td><strong>Are you a veteran or active duty military?:</strong><br /> {{$activedutymilitary}}</td>
				@endif
				@if($individual_group)
					<td><strong>Are you participating as an individual or with a group?:</strong><br /> {{$individual_group}}</td>
				@endif
			</tr>
			<tr>
				@if($group_name)
					<td><strong>If you're participating with a group, what is the name of the group? :</strong><br />{{$group_name}}</td>
				@endif
				@if($group_participants)
					<td><strong>If you're participating with a group, what is the name of the group?</strong><br /> {{$group_participants}}</td>
				@endif
			</tr>
		</table>
		<div class="break-in"></div>
		<table class="main_tab_set" width="100%">
			<tr>
				<th>
					<h2>Volunteer Opportunities</h2>
				</th>
			</tr>
			@if($wednesdayam)
				<tr style="page-break-after: avoid">
					<td><strong>Wednesday AM (2/6/2019) 7am-12pm: </strong>{{ $wednesdayam }}</td>
				</tr>
			@endif
			@if($wednesdaypm)
				<tr style="page-break-after: avoid">
					<td><strong>Wednesday PM (2/6/2019) 12pm-5pm: </strong>{{ $wednesdaypm }}</td>
				</tr style="page-break-after: avoid">
			@endif
			@if($thursdayam)
				<tr style="page-break-after: avoid">
					<td><strong>Thursday AM (2/7/2019) 7am-12pm: <br/></strong>
						@if(@!empty($thursdayam))
							<ul>
							@foreach($thursdayam as $getday)
								<li>{{ $getday }}</li>
							@endforeach
							</ul>
						@endif
					</td>
				</tr>
			@endif
			@if($thursdaypm)
				<tr>
					<td style="page-break-after: avoid"><strong>Thursday PM ( 2/7/2019)12pm-5pm: <br/></strong>
					@if(@!empty($thursdaypm))
						<ul>
						@foreach($thursdaypm as $getday)
							<li>{{ $getday }}</li>
						@endforeach
						</ul>
					@endif
					</td>
				</tr>
			@endif
			@if($fridayam)
				<tr>
					<td style="page-break-after: avoid"><strong>Friday AM (2/8/2019) 7am-12pm: <br/></strong>
					@if(@!empty($fridayam))
						<ul>
						@foreach($fridayam as $getday)
							<li>{{ $getday }}</li>
						@endforeach
						</ul>
					@endif
					</td>
				</tr>
			@endif
			@if($fridaypm)
				<tr>
					<td><strong>Friday PM (2/8/2019) 12pm-5pm: <br/></strong>
					@if(@!empty($fridaypm))
						<ul>
						@foreach($fridaypm as $getday)
							<li>{{ $getday }}</li>
						@endforeach
						</ul>
					@endif
					</td>
				</tr>
			@endif
			@if($saturdayam)
				<tr>
					<td><strong>Saturday AM (2/9/2019) 7am-12pm: <br/></strong>
					@if(@!empty($saturdayam))
						<ul>
						@foreach($saturdayam as $getday)
							<li>{{ $getday }}</li>
						@endforeach
						</ul>
					@endif
					</td>
				</tr>
			@endif
			@if($saturdaypm)
				<tr style="page-break-after: avoid">
					<td><strong>Saturday PM (2/9/2019) 12pm-5pm: <br/></strong>
					@if(@!empty($saturdaypm))
						<ul>
						@foreach($saturdaypm as $getday)
							<li>{{ $getday }}</li>
						@endforeach
						</ul>
					@endif
					</td>
				</tr>
			@endif
			@if($sundayam)
				<tr style="page-break-after: avoid">
					<td><strong>Sunday AM (2/10/2019) 7am-12pm: <br/></strong>
					@if(@!empty($sundayam))
						<ul>
						@foreach($sundayam as $getday)
							<li>{{ $getday }}</li>
						@endforeach
						</ul>
					@endif
					</td>
				</tr>
			@endif
			@if($comments)
				<tr style="page-break-after: avoid">
					<td><strong>Comments or Questions?: </strong><br/>{{$comments}}</td>
				</tr>
			@endif
			@if($maywecontact)
				<tr style="page-break-after: avoid">
					<td><strong>May we contact you next year by email with volunteer opportunities for the 2019 NCVSD?: </strong><br/>{{$maywecontact}}</td>
				</tr>
			@endif
		</table>	
			<table class="main_tab_set" width="100%">
				<tr style="page-break-after: avoid">
					<th>
						<h2>Emergency & Medical Info</h2>
					</th>
				</tr>
				@if($emergencycname)
					<tr style="page-break-after: avoid">
						<td><strong>Emergency Contact Name: </strong>{{$emergencycname}}</td>
					</tr>
				@endif
				@if($emergencycnumber)
					<tr style="page-break-after: avoid">
						<td><strong>Emergency Contact Number: </strong>{{$emergencycnumber}}</td>
					</tr>
				@endif
				@if($medicalinformation)
					<tr style="page-break-after: avoid">
						<td><strong>Important Medical Information: </strong>{{$medicalinformation}}</td>
					</tr>
				@endif
			</table>

			<table class="main_tab_set" width="100%">
				<tr style="page-break-after: avoid">
					<th>
						<h2>Release of Liability</h2>
					</th>
				</tr>
				@if($release_firstname)
					<tr style="page-break-after: avoid">
						<td><strong>First Name: </strong>{{$release_firstname}}</td>
					</tr>
				@endif
				@if($release_lastname)
					<tr style="page-break-after: avoid">
						<td><strong>Last Name: </strong>{{$release_lastname}}</td>
					</tr>
				@endif
				@if($release_email)
					<tr style="page-break-after: avoid">
						<td><strong>Email Address: </strong>{{$release_email}}</td>
					</tr>
				@endif
				@if($attended_year)
					<tr style="page-break-after: avoid">
						<td><strong>Year Attending Standown : </strong>{{$attended_year}}</td>
					</tr>
				@endif
				@if($agree)
					<tr style="page-break-after: avoid">
						<td><strong>By checking the box below, I confirm that I have read the document and understand it.  I further understand that by checking the box below, I voluntarily surrender certain legal rights.: </strong><br> {{$agree}}</td>
					</tr>
				@endif
			</table>
    </body>
</html>
