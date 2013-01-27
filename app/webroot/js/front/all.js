animatedcollapse.addDiv('menu', 'fade=1')
animatedcollapse.addDiv('menu-stores', 'fade=1')
animatedcollapse.addDiv('michael', 'fade=1,height=120px')

animatedcollapse.addDiv('cat', 'fade=0,speed=400,group=pets')
animatedcollapse.addDiv('dog', 'fade=0,speed=400,group=pets,persist=1,hide=1')
animatedcollapse.addDiv('rabbit', 'fade=0,speed=400,group=pets,hide=1')

animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
	//$: Access to jQuery
	//divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
	//state: "block" or "none", depending on state
}

animatedcollapse.init()
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
$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});