<?php
	defined("BASEPATH") OR exit("No direct script access allowed");
	$client_list_encoded = json_encode($client_list);
?>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
<h2 style='font-family:bebasneue'>Project</h2>
<p>Create project</p>
<hr>
<div ng-app="select_client_application" ng-controller="select_client_controller">
	<form name="project_form" action='<?= site_url("Project/Create_detail") ?>' method='POST' novalidate>
		<label>Pilih klien</label>
		<select class='form-control' name='client' id='client' ng-model="SelectedClient" required>
			<option value="">-- Pilih klien --</option>
			<option ng-repeat="client in clients" value="{{ client.id }}">{{ client.name }}</option>
		</select>
		<label>Nomor SPK</label>
		<input type='text' class='form-control' ng-model="ProjectDocument" name='ProjectDocument' required>
		<label>Alamat proyek</label>
		<textarea class='form-control' style='resize:none' rows='3' required ng-model="ProjectAddress" name='ProjectAddress'></textarea>
		<label>Kota proyek</label>
		<input type='text' class='form-control' ng-model="ProjectCity" name='ProjectCity' required>
		<label>Tanggal proyek dimulai</label>
		<input type='date' class='form-control' ng-model="ProjectStartDate" name='Projectdate' required>
		<br>
		<input type='submit' class='btn btn-secondary' ng-disabled="project_form.$invalid">
	</form>
</div>
<script>
	var application = angular.module('select_client_application', []);
	application.controller('select_client_controller', function($scope) {
		$scope.clients =<?= $client_list_encoded ?>;
	});
</script>