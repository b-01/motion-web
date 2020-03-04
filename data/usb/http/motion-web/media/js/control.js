function refresh_info(e) {
	$.getJSON("includes/health_status.php", 
			function(data) {
				$("#span-info-cpu-temp").text(data["temperature"] +"°C");
				$("#span-info-uptime").text(data["uptime"]);
				$("#span-info-load-avg").text(data["load"]);
				$("#span-info-storage").text(data["storage"]);
				$("#span-info-count").text(data["count"]);
			}
	)
	.fail(
			function() {
				$("#span-info-cpu-temp").text("Error while requesting data!");
				$("#span-info-uptime").text("Error while requesting data!");
				$("#span-info-load-avg").text("Error while requesting data!");
				$("#span-info-storage").text("Error while requesting data!");
				$("#span-info-count").text("Error while requesting data!");
			}
	);
}

function get_motion_status(e) {
	$.ajax({
		url: "includes/motion_controller.php",
		data: {op: "status"},
		cache: false,
		dataType: "text"
	})
	.done(
			function(data) {
				$( "#motion-controller-output" ).text( data );
				$( "#motion-controller-output" ).removeClass("hidden");
				if(data.match(/PAUSE$/)) {
					$( "#button-start-motion" ).removeAttr("disabled");
					$( "#button-pause-motion" ).prop("disabled", "disabled");
				}
				if(data.match(/ACTIVE$/)) {
					$( "#button-pause-motion" ).removeAttr("disabled");
					$( "#button-start-motion" ).prop("disabled", "disabled");
				}
			}
	)
	.fail(
			function() {
				$( "#motion-controller-output" ).text( "Error while requesting data!" );
				$( "#motion-controller-output" ).removeClass("hidden");
				$( "#button-pause-motion" ).prop("disabled", "disabled");
				$( "#button-start-motion" ).prop("disabled", "disabled");
			}
	);
}

function pause_motion(e) {
	$.ajax({
		url: "includes/motion_controller.php?op=pause",
		cache: false,
		dataType: "text"
	})
	.done(
			function(data) {
				$( "#motion-controller-output" ).text( data );
				$( "#motion-controller-output" ).removeClass("hidden");
				$( "#button-start-motion" ).removeAttr("disabled");
				$( "#button-pause-motion" ).prop("disabled", "disabled");
			}
	)
	.fail(
			function() {
				$( "#motion-controller-output" ).text( "Error while requesting data!" );
				$( "#motion-controller-output" ).removeClass("hidden");
				$( "#button-pause-motion" ).prop("disabled", "disabled");
				$( "#button-start-motion" ).prop("disabled", "disabled");
			}
	);
}

function start_motion(e) {
	$.ajax({
		url: "includes/motion_controller.php?op=start",
		cache: false,
		dataType: "text"
	})
	.done(
			function(data) {
				$( "#motion-controller-output" ).text( data );
				$( "#motion-controller-output" ).removeClass("hidden");
				$( "#button-pause-motion" ).removeAttr("disabled");
				$( "#button-start-motion" ).prop("disabled", "disabled");
			}
	)
	.fail(
			function() {
				$( "#motion-controller-output" ).text( "Error while requesting data!" );
				$( "#motion-controller-output" ).removeClass("hidden");
				$( "#button-pause-motion" ).prop("disabled", "disabled");
				$( "#button-start-motion" ).prop("disabled", "disabled");
			}
	);
}

/**
 * Called when page is loaded. Adds the event handlers to the buttons
 */
$(function() {
	$("#button-refresh-info").on("click", refresh_info);
	$("#button-get-status").on("click", get_motion_status);
	$("#button-pause-motion").on("click", pause_motion);
	$("#button-start-motion").on("click", start_motion);
});