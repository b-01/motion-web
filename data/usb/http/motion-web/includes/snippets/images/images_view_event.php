<div class="panel panel-default">
	<div class="panel-body">
		<h4>
			<a class="btn btn-default" role="button" href="images.php?year=<?php echo($_GET["year"]); ?>&month=<?php echo($_GET["month"]); ?>&day=<?php echo($_GET["day"]); ?>">
				<span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
			</a>
			&nbsp;&nbsp;Year: <?php echo($_GET["year"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Month: <?php echo($_GET["month"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Day: <?php echo($_GET["day"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Hour: <?php echo($_GET["hour"]); ?>:00
		</h4>
    	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Available events</h3>
		  	</div>
		  	<div class="panel-body">
<?php 
		$items = $clazz->get_events_list(MOTION_DIR, $_GET["year"], $_GET["month"], $_GET["day"], $_GET["hour"]);
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
				<div class="alert alert-info" role="alert">No Events available!</div>
<?php 
		}
?>
			</div>
		</div>
	</div>
</div>