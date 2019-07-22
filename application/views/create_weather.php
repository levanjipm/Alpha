	<h2 style='font-family:bebasneue'>Cuaca</h2>
	<hr>
	<form action='<?=site_url("Weather/create_weather")?>' method='POST' name='weatherName'>
		<label>Nama Cuaca</label>
		<input type='text' class='form-control' ng-minlength='5' ng-model='weather_name' id='weather_name' name='weather_name'>
		<br>
		<button type='button' class='btn btn-default' id='submit_weather_form_button'>Kirim</button>
	</form>
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
	$('#submit_weather_form_button').click(function(){
		$('#confirm_notification').fadeIn();
	});
	$('#confirm_button').click(function(){
		$.ajax({
			url:"<?= site_url("Weather/create_weather_do") ?>",
			data:{
				weather_name: $("#weather_name").val(),
			},
			success:function(response){
				$("#confirm_notification").fadeOut();
				$('input').val('');
			},
			type:"POST",
		})
	})
	$('.btn-back').click(function(){
		$('#confirm_notification').fadeOut();
	});
</script>