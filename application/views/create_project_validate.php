<h2 style='font-family:bebasneue'>Project</h2>
<p>Create project</p>
<div class='row'>
	<div class='col-sm-6 col-xs-12' id='client_information' style='line-height:0.8;border-right:2px solid #333'>
		<h3 style='font-family:bebasneue'>Informasi Klien</h3>
		<p><strong><?= $client_profile_information->name ?></strong></p>
		<p><?= $client_profile_information->address ?></p>
		<p><?= $client_profile_information->city ?></p>
		<p><?= $client_profile_information->phone ?></p>
	</div>
	<div class='col-sm-6 col-xs-12' id='project_information' style='line-height:0.8;border-right:2px solid #333'>
		<h3 style='font-family:bebasneue'>Informasi Proyek</h3>
		<label>Dokumen Proyek</label>
		<p><?= $data_general['ProjectDocument'] ?></p>
		<label>Alamat Proyek</label>
		<p><?= $data_general['ProjectAddress'] ?></p>
		<p><?= $data_general['ProjectCity'] ?></p>
	</div>
</div>
<?php
	if(count($prelimiary_task_array) > 0 &&	!empty($prelimiary_task_array)){
?>
<div class='row'>
	<div class='col-xs-12'>
		<h4 style='font-family:bebasneue'>Pekerjaan <i>preliminary</i></h4>
		<table class='table table-bordered'>
			<tr>
				<th style='width:60%'>Pekerjaan</th>
				<th style='width:40%'>Kuantum</th>
			</tr>
			<tbody id='Tasks'>
<?php
	foreach($prelimiary_task_array as $pre_task){
		$key 		= key($prelimiary_task_array);
		$quantity	= $preliminary_task_quantity[$key];
		$unit		= $preliminary_unit[$key];
?>
				<tr>
					<td><?= $pre_task ?></td>
					<td><?= $quantity . " " . $unit?></td>
				</tr>
<?php
	}
?>
			</tbody>
		</table>
	</div>
</div>
<?php
	}
	
	if(count($bored_pile_array) > 0){
?>
<div class='row'>
	<div class='col-xs-12'>
		<h4 style='font-family:bebasneue'>Pekerjaan utama</h4>
		<p>Pengeboran</p>
		<table class='table table-bordered'>
			<tr>
				<th style='width:20%' rowspan='2'>Nama titik pengeboran</th>
				<th style='width:20%' rowspan='2'>Diameter dalam sentimeter</th>
				<th style='width:30%' colspan='2'>Koordinat</th>
				<th style='width:20%' rowspan='2'>Kedalaman dalam meter</th>
			</tr>
			<tr>
				<th>X</th>
				<th>Y</th>
			</tr>
			<tbody id='Tasks'>
<?php
	foreach($bored_pile_array as $bored_pile){
		$key 					= key($bored_pile_array);
		$main_diameter			= $main_diameter[$key];
		$main_coordinate_x		= $main_coordinate_x[$key];
		$main_coordinate_y		= $main_coordinate_y[$key];
		$main_depth				= $main_depth[$key];
?>
				<tr>
					<td><?= $bored_pile ?></td>
					<td><?= $main_diameter . " sentimeter"?></td>
					<td><?= $main_coordinate_x ?></td>
					<td><?= $main_coordinate_y ?></td>
					<td><?= $main_depth . " meter" ?></td>
				</tr>
<?php
	}
?>
			</tbody>
		</table>
	</div>
</div>
<?php
	}
	
	if(count($other_task_array) > 0){
?>
<div class='row'>
	<div class='col-xs-12'>
		<h4 style='font-family:bebasneue'>Pekerjaan utama</h4>
		<p>Pengeboran</p>
		<table class='table table-bordered'>
			<tr>
				<th style='width:60%'>Pekerjaan</th>
				<th style='width:40%'>Kuantum</th>
			</tr>
			<tbody id='Tasks'>
<?php
	foreach($other_task_array as $other_task){
		$key 		= key($other_task_array);
		$quantity	= $other_task_quantity[$key];
		$unit		= $other_unit[$key];
?>
				<tr>
					<td><?= $other_task ?></td>
					<td><?= $quantity . " " . $unit?></td>
				</tr>
<?php
	}
?>
			</tbody>
		</table>
	</div>
</div>
<?php
	}
?>