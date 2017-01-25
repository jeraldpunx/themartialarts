window.onload = function(){
	var x = $('main .sidebar').width();
	var z = $(window).height();

	$('#searchresult').css('height',z-320);
 	$('#add_stud').css('width', x+2);
 		
};

