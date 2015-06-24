$(document).ready(function() {
	var checkExist = setInterval(function() {
		if ($('#vcv-f').length) {
		$('#vcv-f').remove().delay(500);
		$('#ext-gen16').remove();
		clearInterval(checkExist);
   }
}, 100); 
	

});