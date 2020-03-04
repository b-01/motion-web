<?php 
	require_once("includes/config.php");
	require_once(INCLUDE_PATH ."/classes/ImageFileUtil.php");
	
	// default site
	$content = "/snippets/images/images_view_overview.php";

	if( isset($_GET["year"]) && isset($_GET["month"]) && isset($_GET["day"]) &&
		preg_match("/^\d+$/", $_GET["year"]) && 
		preg_match("/^\d+$/", $_GET["month"]) &&
		preg_match("/^\d+$/", $_GET["day"])) {

		if(isset($_GET["hour"]) && preg_match("/^\d+$/", $_GET["hour"])) {
			if(isset($_GET["evt"]) && preg_match("/^\d+$/", $_GET["evt"])) {
				$content = "/snippets/images/images_view_gallery.php";
			} else {
				$content = "/snippets/images/images_view_event.php";
			}
		} else {
			$content = "/snippets/images/images_view_day.php";
		}
	}
	
	$clazz = new ImageFileUtil();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="media/img/favicon.ico">

    <title>Motion-Control-Panel</title>

    <link href="media/css/bootstrap-3.2.0/bootstrap.min.css" rel="stylesheet">
    <link href="media/css/allsites.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<div class="container">
	    <div class="navbar navbar-default" role="navigation">
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="index.php" title="Motion-Control-Panel">
	          	<img src="media/img/logo-32.png" class="logo" width="32" height="32">
	          	Motion-Control-Panel
	          </a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="index.php">Home</a></li>
	            <li><a href="live-stream.php">Live-Stream</a></li>
	            <li class="active"><a href="images.php">Images</a></li>
	            <li><a href="control.php">Control-Panel</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>	   
 
<?php 
	include_once(INCLUDE_PATH .$content);
?>
 		
		<hr>

		<footer>
	   		<p class="text-muted"><small>U: Mario Neubauer (Sept. 2014)</small></p>
	  	</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="media/js/bootstrap-3.2.0/bootstrap.min.js"></script>
  </body>
</html>
