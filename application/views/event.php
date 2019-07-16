<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Alpha Nusantara</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<style>
	.btn-event{
		border:none;
		padding:10px 30px;
		background-color:white;
		border-radius:3px;
		box-shadow:3px 3px 3px 3px #888888;
		font-size:1.3em;
		cursor:pointer;
		outline:none;
		background-color:rgba(51,51,51,0.8);
		color:white;
		transition:0.3s all ease;
	}
	
	.btn-event:hover{
		background-color:#eee;
		color:#333;
		transition:0.3s all ease;
	}
</style>
<body>
	<div class='row'>
<?php
	foreach($result_events as $event){
		echo $event->id;
		echo $event->description;
		echo '<br>';
	}
?>
	<a href="<?=site_url('Event/create_event')?>">
		<button type='button' class='btn-event'>Redirect</button>
	</a>
	</div>
</body>