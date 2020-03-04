<div class="panel panel-default">
	<div class="panel-body">
		<h4>
			<a class="btn btn-default" role="button" href="images.php?year=<?php echo($_GET["year"]); ?>&month=<?php echo($_GET["month"]); ?>&day=<?php echo($_GET["day"]); ?>&hour=<?php echo($_GET["hour"]); ?>">
				<span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
			</a>
			&nbsp;&nbsp;Year: <?php echo($_GET["year"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Month: <?php echo($_GET["month"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Day: <?php echo($_GET["day"]); ?>
			<span class="glyphicon glyphicon-star"></span>
			Hour: <?php echo($_GET["hour"]); ?>:00
			<span class="glyphicon glyphicon-star"></span>
			Event: <?php echo($_GET["evt"]); ?>
		</h4>
    	<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Available Images</h3>
		  	</div>
		  	<div class="panel-body">
<?php
	$thumbnails = $clazz->get_thumbnails(MOTION_DIR, $_GET["year"], $_GET["month"], $_GET["day"], $_GET["hour"], $_GET["evt"], MOTION_PATH);
	if($thumbnails && count($thumbnails) > 0) {
?>
				<div class="row">
<?php
		foreach($thumbnails as $thumbnail) {
			echo("$thumbnail");
		}
?>
				</div>
<?php
	} else {
?>
				<div class="alert alert-info" role="alert">No Images available!</div>
<?php 
	}
?>
		  	</div>
		</div>
	</div>
</div>