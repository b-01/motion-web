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
	            <li><a href="images.php">Images</a></li>
	            <li class="active"><a href="#">Control-Panel</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	    
	    <div class="row">
	    	<div class="col-xs-12 col-md-6">
		    	<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Motion-Controller</h3>
					</div>
					<div class="panel-body">
						<pre id="motion-controller-output" class="bg-info hidden"></pre>
						<hr>
						<div class="btn-group" role="toolbar">
							<button id="button-get-status" type="button" class="btn btn-default pull-left">
								<span class="glyphicon glyphicon-refresh"></span>
								Get detection status...
							</button>
							<button id="button-pause-motion" type="button" class="btn btn-default pull-left" disabled="disabled">
								<span class="glyphicon glyphicon-pause"></span>
								Pause detection
							</button>
							<button id="button-start-motion" type="button" class="btn btn-default pull-left" disabled="disabled">
								<span class="glyphicon glyphicon-play"></span>
								Start detection
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Raspberry-Pi-Info</h3>
					</div>
					<div class="panel-body">
						<ul class="list-group">
					    	<li class="list-group-item">CPU temperature:&nbsp;<strong><span id="span-info-cpu-temp" class="text-primary"></span><span class="text-primary"></span></strong></li>
					    	<li class="list-group-item">Uptime:&nbsp;<strong><span id="span-info-uptime" class="text-primary"></span></strong></li>
					    	<li class="list-group-item">Load avg:&nbsp;<strong><span id="span-info-load-avg" class="text-primary"></span></strong></li>
					    	<li class="list-group-item">Storage:&nbsp;<strong><span id="span-info-storage" class="text-primary"></span></strong></li>
					    	<li class="list-group-item">Images:&nbsp;<strong><span id="span-info-count" class="text-primary"></span></strong></li>
					  	</ul>
						<button id="button-refresh-info" type="button" class="btn btn-default pull-right">
							<span class="glyphicon glyphicon-refresh"></span>
							Refresh info...
						</button>
					</div>
				</div>
			</div>
	    </div>
	    		
		<hr>

		<footer>
	   		<p class="text-muted"><small>U: Mario Neubauer (Sept. 2014)</small></p>
	  	</footer>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="media/js/bootstrap-3.2.0/bootstrap.min.js"></script>
    <script src="media/js/control.js"></script>
  </body>
</html>