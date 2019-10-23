<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css\styles.css">
	<title>Billing</title>
</head>
<body>
	<form action="" autocomplete="off">
		<label for="numberoftickets">Please enter the number of tickets you wish to purchase.</label>
		<input id="numberoftickets" type="text" name="numberoftickets">
		<input id="numtick" type="button" value="continue" onclick="render()">
	</form>

	<div id="dynamic" style>
		<form id="cust">

		</form>
	</div>	
			
	
<script src="index.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
</body>
</html>