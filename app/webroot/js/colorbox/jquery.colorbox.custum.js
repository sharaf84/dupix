$(document).ready(function(){
    //Examples of how to assign the ColorBox event to elements
    $(".group1").colorbox({
        rel:'group1'
    });
    $(".group2").colorbox({
        rel:'group2', 
        transition:"fade"
    });
    $(".group3").colorbox({
        rel:'group3', 
        transition:"none", 
        width:"75%", 
        height:"75%"
    });
    $(".group4").colorbox({
        rel:'group4', 
        slideshow:true
    });
    $(".ajax").colorbox();
    $(".youtube").colorbox({
        iframe:true, 
        innerWidth:425, 
        innerHeight:344
    });
    $(".iframe").colorbox({
        iframe:true, 
        width:"80%", 
        height:"95%"
    });
    $(".inline").colorbox({
        inline:true, 
        width:"50%"
    });
    $(".callbacks").colorbox({
        onOpen:function(){
            alert('onOpen: colorbox is about to open');
        },
        onLoad:function(){
            alert('onLoad: colorbox has started to load the targeted content');
        },
        onComplete:function(){
            alert('onComplete: colorbox has displayed the loaded content');
        },
        onCleanup:function(){
            alert('onCleanup: colorbox has begun the close process');
        },
        onClosed:function(){
            alert('onClosed: colorbox has completely closed');
        }
    });
    
    //Trigger colorbox
    //$.colorbox({html:"<h1>Welcome</h1>"});
    //$('.inlineJoin').colorbox({open:true});
        
    /////////////////////////////////////////////////////
    
    $(".inline").colorbox({
        onClosed:function(){ 
            //after close cropping iframe => show croped image && setNumberName
            if($("#cboxContent iframe[src^="+siteUrl+"/iframe/viewImg/]").length == 1){
                showCropedImg();
            }
        }
    });
    
    $(".inlineJoin").colorbox({
        inline:true, 
        width:"50%",
        onClosed:function(){ 
            $('#registerResult').hide();
        }
    });
    
    $(".inlineAddAlbum").colorbox({
        inline:true, 
        width:"50%",
        onClosed:function(){ 
            $('#albumResult').hide();
        }
    });
    

			
});