<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
</head>
<body>
	<form action="<?=site_url('Event/create_event')?>" class="form-horizontal" method="post" enctype="multipart/form-data" id='event_form'>
		<input type='text' name='event_name' />
		<input type='date' name='event_date' />
		<textarea name='event_description' rows="6" style="resize:none"></textarea>
		<button type='submit'>Create</button>
	</form>
</body>