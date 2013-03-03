//menu and tabs
$(document).ready(function () {
	$('LI.drawer UL:not(:first)').hide(); // hide all ULs inside LI.drawer except the first one
	
	$('H2.any').click(function () {
		// hide all the drawer contents
		$('LI.drawer UL:visible').slideUp().prev().removeClass('open');
		// show the associated drawer content to 'this' (this is the current H2 element)
		// since the drawer content is the next element after the clicked H2, we find
		// it and show it using this:
		$(this).addClass('open').next().slideDown();
	});
		
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
	
	// setup ul.tabs to work as tabs for each div directly under div.panes
	//$("ul.tabs2").tabs("div.panes2 > div");
	  
});


/*$(document).ready(function () {
	$('td.actions a:eq(0)').html('<img src="../app/webroot/img/backend/view.jpg" border="0">');
});*/

