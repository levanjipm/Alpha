<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Alpha Nusantara</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
	<div class='row'>
<?php
	foreach($result_user as $user){
		echo $user->id;
		echo $user->first_name;
	}
?>
	</div>
</body>