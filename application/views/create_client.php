	<h2 style='font-family:bebasneue'>Client</h2>
	<hr>
	<div ng-app='myApp'>
		<form action='<?=site_url("Weather/create_weather")?>' method='POST' name='weatherName'>
			<label>Nama Klien</label>
			<input type='text' class='form-alpha' ng-minlength='5' ng-model="client_name" id='client_name' required>
			<br>
			<label>Alamat Klien</label>
			<br>
			<textarea class='form-alpha' style='resize:none;width:100%' rows='5' ng-model="client_address" id='client_address' ng-minlength='10' required></textarea>
			<br>
			<label>Kota</label>
			<input type='text' class='form-alpha' ng-model ="client_city" id='client_city'required>
			<br>
			<label>Telepon</label>
			<input type='text' class='form-alpha' ng-model ="client_phone" ng-minlength="7" id='client_phone' required>
			<br>
			<label>NPWP - opsional</label>
			<input type='text' ng-model='npwp' ui-mask="99.999.999.9-999.999" class='form-alpha' ng-model ="client_city" id='npwp'>
			<br>
			<label>PIC</label>
			<input type='text' class='form-alpha' id='pic' ng-model ="client_pic" required>
			<br>
		</form>
		<button type='button' class='btn btn-default' id='submit_client_information' ng-disabled="weatherName.$invalid">Kirim</button>
		<div class="notification_large" style="display:none" id="confirm_notification">
			<div class="notification_box">
				<h1 style="font-size:3em;color:#2bf076"><i class="fa fa-check" aria-hidden="true"></i></h1>
				<h2 style="font-family:bebasneue">Are you sure to confirm this client?</h2>
				<p>Nama perusahaan {{ client_name }}</p>
				<p>Alamat perusahaan</p>
				<p>{{ client_address }}</p>
				<br>
				<button type="button" class="btn btn-back">Back</button>
				<button type="button" class="btn btn-confirm" id="confirm_button">Confirm</button>
			</div>
		</div>
	</div>
<script>
	$('#submit_client_information').click(function(){
		$('#confirm_notification').fadeIn();
	});
	$('#confirm_button').click(function(){
		$.ajax({
			url:"<?= site_url("Client/create_client_do") ?>",
			data:{
				client_name: $("#client_name").val(),
				client_address: $("#client_address").val(),
				client_npwp: $("#npwp").val(),
				client_pic: $("#pic").val(),
				client_city: $("#client_city").val(),
				client_phone: $("#client_phone").val(),
			},
			success:function(response){
				$("#confirm_notification").fadeOut();
				$('input').val('');
				$('textarea').val('');
			},
			type:"POST",
		})
	})
	$('.btn-back').click(function(){
		$('#confirm_notification').fadeOut();
	});
</script>