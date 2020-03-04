$(function() {
	$("#player-alert").hide();
	
	$("#player").bind("error", function(event) {
		$("#player").hide();
		$("#player-alert").show();
	});
	
});