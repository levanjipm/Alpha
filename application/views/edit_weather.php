	<h2 style='font-family:bebasneue'>Weather</h2>
	<hr>
	<form action="<?= site_url("Weather/Edit_weather_do/" . $model->id) ?>" method='POST'>
		<label>Nama cuaca</label>
		<input type='text' class='form-control' value='<?= $model->name ?>' name='weather_name'>
		<br>
		<button type='submit' class='btn btn-success'>Ubah</button>
	</form>