animatedcollapse.addDiv('menu', 'fade=1')
animatedcollapse.addDiv('menu-stores', 'fade=1')
animatedcollapse.addDiv('menu-stores1', 'fade=1')
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

animatedcollapse.init() 
jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 2
    });
});

$(document).ready( function(){	
		// buttons for next and previous item						 
		var buttons = { previous:$('#jslidernews1 .button-previous') ,
						next:$('#jslidernews1 .button-next') };			
		 $('#jslidernews1').lofJSidernews( { interval : 4000,
											direction		: 'opacitys',	
											easing			: 'easeInOutExpo',
											duration		: 1200,
											auto		 	: true,
											maxItemDisplay  : 5,
											navPosition     : 'horizontal', // horizontal
											navigatorHeight : 106,
											navigatorWidth  : 133,
											mainWidth		: 720,
											buttons			: buttons } );	
	});
	$(document).ready( function(){	
		// buttons for next and previous item						 
		var buttons = { previous:$('#jslidernews2 .button-previous') ,
						next:$('#jslidernews2 .button-next') };			
		 $('#jslidernews2').lofJSidernews( { interval : 4000,
											direction		: 'opacitys',	
											easing			: 'easeInOutExpo',
											duration		: 1200,
											auto		 	: true,
											maxItemDisplay  : 5,
											navPosition     : 'horizontal', // horizontal
											navigatorHeight : 65,
											navigatorWidth  : 109,
											mainWidth		: 600,
											buttons			: buttons } );	
	});
	
	
$(document).ready(function(){
//		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});