<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="_token" content="{{csrf_token()}}" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Volunteer</title>

        <!-- date range picker -->
        <!-- App css -->
        <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/custom.css') !!}" rel="stylesheet" type="text/css" />

    </head>
    <style type="text/css">
    	body {
    		background-color: #f7f7f7;
		}
    </style>
    <body>
		<div class="container">
		<h1 class="pageHeading">Volunteer Registration Form</h1>
		<div class="row">
		<div class="col-md-4">
			<h2 class="headingStyle">Personal Information</h2>
			
			<p><strong>First Name:</strong> {{$firstname}}</p>
			<p><strong>Middle Name:</strong> {{$middlename}}</p>
			<p><strong>Last Name:</strong> {{$lastname}}</p>
			<p><strong>Cell Number:</strong> {{$phone}}</p>
			<p><strong>Email Address:</strong> {{$email}}</p>
			<p><strong>Occupation:</strong> {{$occupation}}</p>
			<p><strong>Are you a veteran or active duty military?:</strong> <br> {{$activedutymilitary}}</p>
			<p><strong>Are you participating as an individual or with a group?:</strong> <br> {{$individual_group}}</p>
			@if($individual_group != 'Individual')
			<p><strong>If you're participating with a group, what is the name of the group? :</strong> <br> {{$group_name}}</p>
			<p><strong>Please enter the names of the group participants:</strong> <br> {{$group_participants}}</p>
			@endif
		</div>
		<div class="page-break"></div>
		
		<div class="page-break"></div>

		<div class="col-md-4">
			<h2 class="headingStyle">Emergency & Medical Info</h2>
			<p><strong>Emergency Contact Name: </strong> <br> {{$emergencycname}}</p>
			
			<p><strong>Emergency Contact Number: </strong> <br> {{$emergencycname}}</p>
			
			<p><strong>Important Medical Information: </strong> <br> {{$medicalinformation}}</p>
		</div>
		<div class="page-break"></div>
		<div class="col-md-4">
			<h2 class="headingStyle">Release of Liability</h2>
			<p><strong>First Name: </strong>{{$release_firstname}}</p>
			<p><strong>Last Name: </strong>{{$release_lastname}}</p>
			<p><strong>Email Address: </strong>{{$release_email}}</p>
			
			<p><strong>By checking the box below, I confirm that I have read the document and understand it.  I further understand that by checking the box below, I voluntarily surrender certain legal rights.: </strong> <br> {{$agree}}</p>
		</div>
		<div class="col-md-12">
			<h2 class="headingStyle">Volunteer Opportunities</h2>
			<p><strong>Wednesday AM (2/6/2019) 7am-12pm: </strong>{{ $wednesdayam }}</p>
			<p><strong>Wednesday PM (2/6/2019) 12pm-5pm: </strong>{{ $wednesdaypm }}</p>
			
			<p><strong>Thursday AM (2/7/2019) 7am-12pm: <br/></strong>
			@if(@!empty($thursdayam))
				<ul class="ulStyle">
				@foreach($thursdayam as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>

			<p><strong>Thursday PM ( 2/7/2019)12pm-5pm: <br/></strong>
			@if(@!empty($thursdaypm))
				<ul class="ulStyle">
				@foreach($thursdaypm as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>

			<p><strong>Friday AM (2/8/2019) 7am-12pm: <br/></strong>
			@if(@!empty($fridayam))
				<ul class="ulStyle">
				@foreach($fridayam as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>

			<p><strong>Friday PM (2/8/2019) 12pm-5pm: <br/></strong>
			@if(@!empty($fridaypm))
				<ul class="ulStyle">
				@foreach($fridaypm as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>

			<p><strong>Saturday AM (2/9/2019) 7am-12pm: <br/></strong>
			@if(@!empty($saturdayam))
				<ul class="ulStyle">
				@foreach($saturdayam as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>

			<p><strong>Saturday PM (2/9/2019) 12pm-5pm: <br/></strong>
			@if(@!empty($saturdaypm))
				<ul class="ulStyle">
				@foreach($saturdaypm as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>

			<p><strong>Sunday AM (2/10/2019) 7am-12pm: <br/></strong>
			@if(@!empty($sundayam))
				<ul class="ulStyle">
				@foreach($sundayam as $getday)
					<li>{{ $getday }}</li>
				@endforeach
				</ul>
			@endif
			</p>
			
			<p><strong>Comments or Questions?: </strong><br />{{$comments}}</p>
			
			<p><strong>May we contact you next year by email with volunteer opportunities for the 2019 NCVSD?: </strong>{{$maywecontact}}</p>
		</div>
		</div>
		</div>
		
		<!--
			<div class="page-break"></div>
			<h1>Page 2</h1>
		-->
    </body>
</html>
