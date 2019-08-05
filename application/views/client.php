<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<h2 style='font-family:bebasneue'>Client</h2>
	<hr>
	<a href='<?= site_url('Client/create_client') ?>' class='btn btn-default'>Add client</a>
	<hr>
	<table class='table table-hover'>
		<tr>
			<td>Nama</td>
			<td>Alamat</td>
			<td></td>
			<td></td>
		</tr>
<?php
	foreach($result_client as $client){
?>
		<tr>
			<td><?= $client->name ?></td>
			<td><?= $client->address ?></td>
			<td><button type='submit' class='btn btn-default'><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
			<td><button type='submit' class='btn btn-secondary'><i class="fa fa-trash" aria-hidden="true"></i></button></td>
		</tr>
<?php
	}
?>
	</div>
</body>