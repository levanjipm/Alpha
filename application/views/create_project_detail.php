<?php
	defined("BASEPATH") OR exit("No direct script access allowed");
	if($_POST['client'] == ""){
		redirect('', 'refresh');
	}
?>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
<h2 style='font-family:bebasneue'>Project</h2>
<p>Create project</p>
<hr>
<style>
	.form_rectangular{
		width:100%;
		padding:5px;
		outline:none;
	}
</style>
<!-- Client profile information -->
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
		<p><?= $_POST['ProjectDocument'] ?></p>
		<label>Alamat Proyek</label>
		<p><?= $_POST['ProjectAddress'] ?></p>
		<p><?= $_POST['ProjectCity'] ?></p>
	</div>
</div>
<div class='row'>
	<div class='col-xs-12'>
		<h3 style='font-family:bebasneue'>Tambah detil pekerjaan</h3>
	</div>
</div>
<form action='<?= site_url('Project/validate_project') ?>' id='detailed_project' method='POST'>
	<div id='Preliminary_task_row'>
		<div class='row'>
			<div class='col-md-3 col-sm-6 col-xs-6'>
				<h4 style='font-family:bebasneue'>Pekerjaan <i>preliminary</i></h4>
			</div>
			<div class='col-md-3 col-sm-6 col-xs-6'>
				<button type='button' class='btn btn-success' id='add_item_button'>Tambah</button>
			</div>
		</div>
		<br>
		<table class='table table-bordered'>
			<tr>
				<th style='width:40%'>Pekerjaan</th>
				<th style='width:30%'>Kuantum</th>
				<th style='width:20%' colspan='2'>Satuan</th>
			</tr>
			<tbody id='Tasks'>
			</tbody>
		</table>
	</div>
	<div id='Main_task_row'>
		<div class='row'>
			<div class='col-md-3 col-sm-6 col-xs-6'>
				<h4 style='font-family:bebasneue'>Pekerjaan utama</h4>
				<p>Pengeboran</p>
			</div>
			<div class='col-md-3 col-sm-6 col-xs-6'>
				<button type='button' class='btn btn-success' id='add_item_button_main'>Tambah</button>
			</div>
		</div>
		<br>
		<table class='table table-bordered'>
			<tr>
				<th style='width:20%' rowspan='2'>Nama titik pengeboran</th>
				<th style='width:20%' rowspan='2'>Diameter dalam sentimeter</th>
				<th style='width:30%' colspan='2'>Koordinat</th>
				<th style='width:20%' rowspan='2'>Kedalaman dalam meter</th>
				<th style='width:10%' rowspan='2'></th>
			</tr>
			<tr>
				<th>X</th>
				<th>Y</th>
			</tr>
			<tbody id='Main_tasks'>
			</tbody>
		</table>
	</div>
	<div id='Preliminary_task_row'>
		<div class='row'>
			<div class='col-md-3 col-sm-6 col-xs-6'>
				<h4 style='font-family:bebasneue'>Pekerjaan lain</h4>
			</div>
			<div class='col-md-3 col-sm-6 col-xs-6'>
				<button type='button' class='btn btn-success' id='add_item_button_other'>Tambah</button>
			</div>
		</div>
		<br>
		<table class='table table-bordered'>
			<tr>
				<th style='width:40%'>Pekerjaan</th>
				<th style='width:30%'>Kuantum</th>
				<th style='width:20%' colspan='2'>Satuan</th>
			</tr>
			<tbody id='Other_tasks'>
			</tbody>
		</table>
	</div>
	<button type='submit' class='btn btn-secondary'>Submit</button>
</form>
<hr>
<script>
	var Number_of_tr_inside = 0;
	var Number_of_tr_inside_main = 0;
	var Number_of_tr_inside_other = 0;
	$('#add_item_button').click(function(){
		Number_of_tr_inside = $("#Tasks tr").length;
		Number_of_tr_inside++;
		$('#Tasks').append('<tr id="preliminary_task_tr_' + Number_of_tr_inside + '"><td><input type="text" class="form_rectangular" name="preliminary_task[' + Number_of_tr_inside + ']" id="preliminary_task-' + Number_of_tr_inside + '"></td><td><input type="number" class="form_rectangular" name="preliminary_task_quantity[' + Number_of_tr_inside + ']"></td><td><select class="form_rectangular" name="preliminary_unit[' + Number_of_tr_inside + ']"><option value="Lot">Lot</option><option value="Pcs">Pcs</option><option value="Meter">Meter</option><option value="Meter persegi">Meter persegi</option><option value="Meter kubik">Meter kubik</option></select></td><td><button type="button" class="btn btn-danger" onclick="delete_preliminary_task(' + Number_of_tr_inside + ')">X</button></td></tr>');
	});
	
	function delete_preliminary_task(n){
		$('#preliminary_task_tr_' + n).hide();
		$('#preliminary_task-' +n).attr('name','');
	};
	
	$('#add_item_button_main').click(function(){
		Number_of_tr_inside_main = $("#Main_tasks tr").length;
		Number_of_tr_inside_main++;
		$('#Main_tasks').append('<tr id="main_task_tr_' + Number_of_tr_inside_main + '"><td><input type="text" class="form_rectangular" name="bored_pile_name[' + Number_of_tr_inside_main + ']" id="bored_pile_name-' + Number_of_tr_inside_main + '"></td><td><input type="number" class="form_rectangular" name="main_diameter[' + Number_of_tr_inside_main + ']"></td><td><input type="number" class="form_rectangular" name="main_coordinate_x[' + Number_of_tr_inside_main + ']"></td><td><input type="number" class="form_rectangular" name="main_coordinate_y[' + Number_of_tr_inside_main + ']"></td><td><input type="number" class="form_rectangular" name="main_depth[' + Number_of_tr_inside_main + ']"></td><td><button type="button" class="btn btn-danger" onclick="delete_main_task(' + Number_of_tr_inside_main + ')">X</button></td></tr>');
	});
	
	function delete_main_task(n){
		$('#main_task_tr_' + n).hide();
		$('#bored_pile_name-' +n).attr('name','');
	};
	
	var Number_of_tr_inside = 0;
	$('#add_item_button_other').click(function(){
		Number_of_tr_inside = $("#Other_tasks tr").length;
		Number_of_tr_inside++;
		$('#Other_tasks').append('<tr id="other_task_tr_' + Number_of_tr_inside_other + '"><td><input type="text" class="form_rectangular" name="other_task[' + Number_of_tr_inside_other + ']" id="other_task-' + Number_of_tr_inside_other + '"></td><td><input type="number" class="form_rectangular" name="other_task_quantity[' + Number_of_tr_inside_other + ']"></td><td><select class="form_rectangular" name="other_unit[' + Number_of_tr_inside_other + ']"><option value="Lot">Lot</option><option value="Pcs">Pcs</option><option value="Meter">Meter</option><option value="Meter persegi">Meter persegi</option><option value="Meter kubik">Meter kubik</option></select></td><td><button type="button" class="btn btn-danger" onclick="delete_other_task(' + Number_of_tr_inside_other + ')">X</button></td></tr>');
	});
	
	function delete_other_task(n){
		$('#other_task_tr_' + n).hide();
		$('#preliminary_task-' +n).attr('name','');
	};
	
	$(window).on('beforeunload', function(){
		return 'Are you sure you want to leave?';
	});
	
	$(document).submit(function(){
		$(window).off('beforeunload');
	});
</script>