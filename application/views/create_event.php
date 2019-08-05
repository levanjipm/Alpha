<?php
	defined("BASEPATH") OR exit("No direct script access allowed");
?>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
<script>
angular.module("textAngularTest", ['textAngular']);
function wysiwygeditor($scope) {
	$scope.orightml = '';
	$scope.htmlcontent = $scope.orightml;
};
</script>
<style>
	.box_upload{
		width:100px;
		height:100px;
		border:1px solid #ccc;
	}
	.box_upload_wrapper{
		padding:10px;
	}
</style>
	<!--<div class="alert_wrapper">
		<div class="alert success_alert" id="record_success">
			Successfully add record.
		</div>
		<div class="alert danger_alert" id="record_failed">
			Operation failed.
		</div>
	</div>-->
	<h2 style="font-family:bebasneue">Report</h2>
	<p>Create report</p>
	<hr>
	<div class='row'>
		<div class='box_upload_wrapper'>
			<input type="file" id="image_upload_1" style="display:none"/>
			<div class='box_upload' id='box_upload_1'></div>
		</div>
		<div class='box_upload_wrapper'>
			<input type="file" id="image_upload_2" style="display:none"/>
			<div class='box_upload' id='box_upload_2'></div>
		</div>
		<div class='box_upload_wrapper'>
			<input type="file" id="image_upload_3" style="display:none"/>
			<div class='box_upload' id='box_upload_3'></div>
		</div>
	</div>
	<script>
		$('#box_upload_1').click(function(){ $('#image_upload_1').trigger('click'); });
	</script>
	<br>
	<div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="app">
		<div text-angular="text-angular" name="htmlcontent" ng-model="htmlcontent"></div>
	</div>
	<br>
	<hr>
	<button type="button" class="btn btn-default" id="submit_create_event_button" ng-disabled="create_event_form.report.date">Submit</button>
</div>
<div class="notification_large" style="display:none" id="confirm_notification">
	<div class="notification_box">
		<h1 style="font-size:3em;color:#2bf076"><i class="fa fa-check" aria-hidden="true"></i></h1>
		<h2 style="font-family:bebasneue">Are you sure to confirm this report</h2>
		<br>
		<button type="button" class="btn btn-back">Back</button>
		<button type="button" class="btn btn-confirm" id="confirm_button">Confirm</button>
	</div>
</div>
<script>
	$("#submit_create_event_button").click(function(){
		$("#confirm_notification").fadeIn();
	});
	$(".btn-back").click(function(){
		$("#confirm_notification").fadeOut();
	});
	$("#confirm_button").click(function(){
		$.ajax({
			url:"<?= site_url("Event/create_event_do") ?>",
			data:{
				event_date: $("#report_date").val(),
				event_name: $("#report_name").val(),
				event_description: $("#report_description").val(),
			},
			success:function(response){
				$("#confirm_notification").fadeOut();
				if(response == 1){
					$("#record_success").fadeIn(300);
					setTimeout(function(){
						$("#record_success").fadeOut(200);
					},1000)
				}
			},
			type:"POST",
		})
	})		
</script>
</body>
</html>