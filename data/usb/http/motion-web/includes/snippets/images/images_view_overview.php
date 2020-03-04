<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Select a day!</h3>
	</div>
	<div class="panel-body">
<?php
	$items = $clazz->get_days_list(MOTION_DIR);
	if($items && count($items) > 0) {
?>
		<div class="list-group">
<?php
		foreach($items as $item) {
			echo("$item");
		}
?>
		</div>
<?php
	} else {
?>
		<div class="alert alert-info" role="alert">No Days available!</div>
<?php 
	}
?>
	</div>
</div>