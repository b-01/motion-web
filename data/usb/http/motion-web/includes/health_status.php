<?php
	require_once("config.php");
	
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Content-type: application/json");

	$temperature = shell_exec("/opt/vc/bin/vcgencmd measure_temp");
    if($temperature) {
        $temperature = trim($temperature);
        $temperature = substr($temperature, 5);
        $temperature = substr($temperature, 0, strlen($temperature) - 2);
        if(strlen($temperature) >= 30) {
            $temperature = substr($temperature, 0, 30);
        }
    } else {
        $temperature = "ERR";
    }
	
	$uptime = shell_exec("/usr/bin/uptime -p");
	if($uptime) {
		$uptime = trim($uptime);
		if(strlen($uptime) >= 30) {
			$uptime = substr($uptime, 0, 30);
		}
	} else {
		$uptime = "ERR";
	}
	
	$load = shell_exec("/usr/bin/cat /proc/loadavg");
	if($load) {
		$load = trim($load);
		if(strlen($load) >= 14) {
			$load = substr($load, 0, 14);
		}
	} else {
		$load = "ERR";
	}
	
	$storage = shell_exec("/usr/bin/du -sh " .MOTION_DIR);
	if($storage) {
		$storage = trim($storage);
		$storage = substr($storage, 0, strlen($storage) - strlen(MOTION_DIR));
	} else {
		$storage = "ERR";
	}
	
	$filecount = shell_exec("find " .MOTION_DIR ." -type f | wc -l");
	if($filecount) {
		$filecount = trim($filecount);
		if(strlen($filecount) >= 30) {
			$filecount = substr($filecount, 0, 30);
		}
	} else {
		$filecount = "ERR";
	}
	
	$tmp = array(
		"temperature" => $temperature,
		"uptime" => $uptime,
		"load" => $load,
		"storage" => $storage,
		"count" => $filecount
	);
	
	die(json_encode($tmp));
?>
