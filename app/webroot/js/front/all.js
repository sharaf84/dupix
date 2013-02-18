animatedcollapse.addDiv('menu', 'fade=1')
animatedcollapse.addDiv('menu-stores', 'fade=1')
animatedcollapse.addDiv('menu-stores1', 'slide=1')
animatedcollapse.addDiv('menu-stores2', 'fade=1')
animatedcollapse.addDiv('menu-stores3', 'fade=1')
animatedcollapse.addDiv('menu-stores4', 'fade=1')
animatedcollapse.addDiv('menu-stores5', 'fade=1')
animatedcollapse.addDiv('menu-stores6', 'fade=1')
animatedcollapse.addDiv('menu-stores7', 'fade=1')
animatedcollapse.addDiv('menu-stores8', 'fade=1')
animatedcollapse.addDiv('menu-stores9', 'fade=1')
animatedcollapse.addDiv('menu-stores10', 'fade=1')

animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
	//$: Access to jQuery
	//divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
	//state: "block" or "none", depending on state
}

animatedcollapse.init();

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
	//Default Action
	$(".tab_content2").hide(); //Hide all content
	$("ul.tabs2 li:first").addClass("active").show(); //Activate first tab
	$(".tab_content2:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs2 li").click(function() {
		$("ul.tabs2 li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content2").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
});
 