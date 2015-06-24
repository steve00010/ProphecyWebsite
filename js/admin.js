$('td[contenteditable=true]').keyup(function() {
	delay(function(){
		var text= $('td[contenteditable=true]').text();
		$.ajax({
			type:"post",
			url:"update.php",
			data:"text="+text,
			success:function(data){
				console.log('Updated!');
			}
		});
	}, 500 );
});
 
var delay = (function(){
	var timer = 0;
	return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	};
})();