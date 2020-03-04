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
	          <a class="navbar-brand" href="#" title="Motion-Control-Panel">
	          	<img src="media/img/logo-32.png" class="logo" width="32" height="32">
	          	Motion-Control-Panel
	          </a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li class="active"><a href="#">Home</a></li>
	            <li><a href="live-stream.php">Live-Stream</a></li>
	            <li><a href="images.php">Images</a></li>
	            <li><a href="control.php">Control-Panel</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title">Welcome to the Raspberry-Pi Motion-Control-Panel</h3>
		  </div>
		  <div class="panel-body">
		  	This website gives you access to features of a raspberry pi with attached Pi-NoIR-Camera.
		  	The PI and the camera were put together to implement a small monitoring unit.
		  	This is done by using a modified motion detection software (motion-MMAL), this website and 
		  	some other scripts. The following features are available through this site:
		  </div>
		  <ul class="list-group">
		  	<li class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;Access a live stream of the monitored area.</li>
		  	<li class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;View/Download all pictures and videos which were recorded by the camera.</li>
		  	<li class="list-group-item"><span class="glyphicon glyphicon-star"></span>&nbsp;Control motion and some other features.</li>
		  </ul>
		  <div class="panel-body">
		  	<small class="pull-right text-muted">
		  		[1] <a href="https://github.com/dozencrows/motion/tree/mmal-test" title="motion-mmal">motion-mmal</a>
		  		&nbsp;&nbsp;
		  		[2] <a href="http://getbootstrap.com/" title="bootstrap">bootstrap</a>
		  	</small>
		  	<br />
		  	<small class="pull-right text-muted">
		  		[3] <a href="http://nginx.org/" title="nginx">nginx</a>
		  		&nbsp;&nbsp;
		  		[4] <a href="http://www.raspberrypi.org/" title="raspberry-pi">raspberry-pi</a>
		  	</small>
		  </div>
		</div>
		
		<hr>

		<footer>
	   		<p class="text-muted"><small>U: Mario Neubauer (Sept. 2014)</small></p>
	  	</footer>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="media/js/bootstrap-3.2.0/bootstrap.min.js"></script>
  </body>
</html>
