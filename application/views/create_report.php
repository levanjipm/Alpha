<?php
	defined("BASEPATH") OR exit("No direct script access allowed");
?>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
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
	
	.ta-editor {
		min-height: 300px;
		height: auto;
		overflow: auto;
		font-family: inherit;
		font-size: 100%;
		margin: 20px 0;
	}
	
	.image_preview {
		width: 100%;
		position: relative;
		overflow: hidden;
		background-color: #ffffff;
		color: #333;
		border:2px solid #161f2e;
	}
	
	.image_preview input {
		font-size: 200px;
		position: absolute;
		opacity: 0;
		z-index: 10;
	}
	
	.image_preview label {
		position: absolute;
		z-index: 5;
		opacity: 0.8;
		cursor: pointer;
		background-color: #bdc3c7;
		font-size: 2em;
		font-family:bebasneue;
		top: 50%;
		left: 0;
		right: 0;
		bottom: 20%;
		margin: auto;
		text-align: center;
	}
</style>
	<h2 style="font-family:bebasneue">Report</h2>
	<p>Create report</p>
	<hr>
	<form id='report_form' method='POST' action='<?= site_url("Report/Input_report") ?>' novalidate>
		<label>Report date</label>
		<input type='date' class='form-control' id='report_date' name='report_date' value='<?= date('Y-m-d') ?>'>
		<label>Subject</label>
		<input type='text' class='form-control' id='report_subject' name='report_subject' required>
		<label>Images</label>
		<div class='row'>
			<div class='col-md-2 col-sm-3 col-xs-4'>
				<div class='image_preview' id="image-preview-1">
					<label for="image-upload" id="image-label-1">Choose File</label>
					<input type="file" name="image" id="image-upload-1" accept="image/x-png,image/gif,image/jpeg"/>
				</div>
			</div>
			<div class='col-md-2 col-sm-3 col-xs-4'>
				<div class='image_preview' id="image-preview-2">
					<label for="image-upload" id="image-label-2">Choose File</label>
					<input type="file" name="image[2]" id="image-upload-2" accept="image/x-png,image/gif,image/jpeg"/>
				</div>
			</div>
			<div class='col-md-2 col-sm-3 col-xs-4'>
				<div class='image_preview' id="image-preview-3">
					<label for="image-upload" id="image-label-3">Choose File</label>
					<input type="file" name="image[3]" id="image-upload-3" accept="image/x-png,image/gif,image/jpeg"/>
				</div>
			</div>
		</div>
		<br>
		<div ng-app="textAngularTest" ng-controller="wysiwygeditor" class="app">
			<div text-angular="text-angular" ng-model="htmlcontent" name="input_description"></div>
		</div>
	</form>
	<hr>
	<button type="button" class="btn btn-default" id="submit_create_event_button">Submit</button>
</div>

<script type="text/javascript">
$(document).ready(function() {
	var image_preview_width = $('#image-preview-1').width();
	$('.image_preview').each(function(){
		$(this).height(image_preview_width);
	});
	
	$.uploadPreview({
		input_field		: "#image-upload-1", 
		preview_box		: "#image-preview-1",
		label_field		: "#image-label-1",  
		label_default	: "Choose File", 
		no_label: false               
	});
	
	$.uploadPreview({
		input_field		: "#image-upload-2", 
		preview_box		: "#image-preview-2",
		label_field		: "#image-label-2",  
		label_default	: "Choose File", 
		no_label: false               
	});
	
	$.uploadPreview({
		input_field		: "#image-upload-3", 
		preview_box		: "#image-preview-3",
		label_field		: "#image-label-3",  
		label_default	: "Choose File", 
		no_label: false               
	});
});

$(window).resize(function(){
	var image_preview_width = $('#image-preview-1').width();
	$('.image_preview').each(function(){
		$(this).height('');
	});
	
	$('.image_preview').each(function(){
		$(this).height(image_preview_width);
	});
});
</script>
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
		if($('#report_date').val() == ''){
			alert('Please insert date');
			$('#report_date').focus();
			return false;
		} else if($('#report_subject').val() == '' || $('#report_subject').val().length < 5){
			alert('Please insert a valid report subject');
			$('#report_subject').focus();
			return false;
		} else if(($('#image-upload-1')[0].files.length + $('#image-upload-2')[0].files.length + $('#image-upload-3')[0].files.length) <= 1){
			alert('Insert minimum of 2 images');
			return false;
		} else {
			$("#confirm_notification").fadeIn();
		}
	});
	
	$(".btn-back").click(function(){
		$("#confirm_notification").fadeOut();
	});
	
	$("#confirm_button").click(function(){
		var original = $('#string_input').val();
		var converted = "`" + original + "`";
		$('#string_input').val(converted);
		$('#report_form').submit();
	})		
</script>
</body>
</html>