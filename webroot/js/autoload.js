
$(document).ready(function(){
	var auto_refresh = setInterval(function(){
		$('#mainContent').load();
	}, 2000);
});