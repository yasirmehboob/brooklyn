// JavaScript Document
//save shortcut alt+S
$(document).ready(function(){
$(document).keyup(function(event) {
    if(event.altKey && event.keyCode == 83){
		$("#navigationMenu").fadeIn(500);
			//setTimeout(function() {$("#navigationMenu").fadeOut(2000)}, 9000);
		$(".close").click(function(){
			$("#navigationMenu").fadeOut(500);})
		};
});
	
});
	
//save shortcut alt+S end