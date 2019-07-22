	<h2 style='font-family:bebasneue'>Weather</h2>
	<hr>
	<table class='table table_master'>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
<?php
	foreach($result_weather as $weather){
?>
		<tr>
			<td><?= $weather->name ?></td>
			<td>
				<a href='<?= site_url("Weather/edit_weather/" . $weather->id)?>' class='btn btn-default'><i class="fa fa-pencil" aria-hidden="true"></i></a>
			</td>
		</tr>
<?php
	}
?>
	</table>
	<a href='<?= site_url("Weather/create_weather") ?>'>
		<button type='button' class='btn btn-success'>+</button>
	</a>