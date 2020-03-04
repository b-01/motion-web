<div class="panel panel-default">
	<div class="panel-body">
		<h4>
			<a class="btn btn-default" role="button" href="images.php">
				<span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
			</a>
			&nbsp;&nbsp;Year: <?php echo($_GET["year"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Month: <?php echo($_GET["month"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Day: <?php echo($_GET["day"]); ?>
			
		</h4>
    	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Hours with recorded motion</h3>
		  	</div>
		  	<div class="panel-body">
<?php 
		$items = $clazz->get_hours_list(MOTION_DIR, $_GET["year"], $_GET["month"], $_GET["day"]);
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
				<div class="alert alert-info" role="alert">No Hours available!</div>
<?php 
		}
?>
			</div>
		</div>
	</div>
</div>