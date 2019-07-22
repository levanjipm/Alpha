<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	foreach($result_events as $event){
		echo $event->id;
		echo $event->description;
		echo '<br>';
	}
?>
	<a href="<?=site_url('Event/create_event')?>">
		<button type='button' class='btn btn-default'>Redirect</button>
	</a>
	</div>
</body>