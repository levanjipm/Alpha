<?php
	defined("BASEPATH") OR exit("No direct script access allowed");
?>
	<div class="alert_wrapper" ng-app="ngAnimate">
		<div class="alert success_alert" id="record_success">
			Successfully add record.
		</div>
		<div class="alert danger_alert" id="record_failed">
			Operation failed.
		</div>
	</div>
	<h2 style="font-family:bebasneue">Report</h2>
	<p>Create report</p>
	<hr>
	<form name="eventForm" novalidate>
		<label>Event date</label>
		<input type='date' class='form-control' name='event_date'>
		<label>Event name</label>
		<input type="text" name="eventName" ng-model="eventName" class='form-control' ng-minlength="5" required>
		<span ng-show="eventForm.eventName.$touched && eventForm.eventName.$invalid">Event name is not valid</span>
		<br>
		<label>Event description</label>
		<div class='text_area_wrapper'>
			<textarea name="report_description" ng-model="report_description"  ng-minlength="50" rows='20' cols='100' ng-trim="false" required></textarea>
			<span class='letter_counter' id='letters'>{{ report_description.length }}</span>
		</div>
		<span ng-show="eventForm.report_description.$touched && eventForm.report_description.$invalid">Event description is not valid.</span>
	</form>
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
			url:"<?= base_url("index.php/Event/create_event_do") ?>",
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