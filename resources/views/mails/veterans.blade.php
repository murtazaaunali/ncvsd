<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

		Hello <i>{{ $mymail->receiver }}</i>,
		<p>New Veteran Form Submited</p>
		 
		Thank You,
		<br/>
		<i>{{ $mymail->sender }}</i>

	</body>
	</html>