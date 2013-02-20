jQuery(document).ready(function($) {
    // We only want these styles applied when javascript is enabled
    $('div.navigation').css({
        'width' : '338px', 
        'float' : 'left'
    });
    $('div.content').css('display', 'block');

    // Initially set opacity on thumbs and add
    // additional styling for hover effect on thumbs
    var onMouseOutOpacity = 1.0;
    $('#thumbs ul.thumbs li').opacityrollover({
        mouseOutOpacity:   onMouseOutOpacity,
        mouseOverOpacity:  1.0,
        fadeSpeed:         'fast',
        exemptionSelector: '.selected'
    });

    // Enable toggling of the caption
    var captionOpacity = 0.0;
    $('#captionToggle a').click(function(e) {
        var link = $(this);
					
        var isOff = link.hasClass('off');
        var removeClass = isOff ? 'off' : 'on';
        var addClass = isOff ? 'on' : 'off';
        var linkText = isOff ? 'Hide Caption' : 'Show Caption';
        captionOpacity = isOff ? 0.7 : 0.0;

        link.removeClass(removeClass).addClass(addClass).text(linkText).attr('title', linkText);
        $('#caption span.image-caption').fadeTo(1000, captionOpacity);
					
        e.preventDefault();
    });
				
    // Initialize Advanced Galleriffic Gallery
    var gallery = $('#thumbs').galleriffic({
        delay:                     2500,
        numThumbs:                 12,
        preloadAhead:              10,
        enableTopPager:            true,
        enableBottomPager:         true,
        maxPagesToShow:            7,
        imageContainerSel:         '#slideshow',
        controlsContainerSel:      '#controls',
        captionContainerSel:       '#caption',
        loadingContainerSel:       '#loading',
        renderSSControls:          true,
        renderNavControls:         true,
        playLinkText:              'Play Slideshow',
        pauseLinkText:             'Pause Slideshow',
        prevLinkText:              '&lsaquo; Previous Photo',
        nextLinkText:              'Next Photo &rsaquo;',
        nextPageLinkText:          'Next &rsaquo;',
        prevPageLinkText:          '&lsaquo; Prev',
        enableHistory:             true,
        autoStart:                 false,
        syncTransitions:           true,
        defaultTransitionDuration: 900,
        onSlideChange:             function(prevIndex, nextIndex) {
            // 'this' refers to the gallery, which is an extension of $('#thumbs')
            this.find('ul.thumbs').children()
            .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
            .eq(nextIndex).fadeTo('fast', 1.0);
        }
    });

    /**** Functions to support integration of galleriffic with the jquery.history plugin ****/

    // PageLoad function
    // This function is called when:
    // 1. after calling $.historyInit();
    // 2. after calling $.historyLoad();
    // 3. after pushing "Go Back" button of a browser
    function pageload(hash) {
        // alert("pageload: " + hash);
        // hash doesn't contain the first # character.
        if(hash) {
            $.galleriffic.gotoImage(hash);
        } else {
            gallery.gotoIndex(0);
        }
    }

    // Initialize history plugin.
    // The callback is called at once by present location.hash. 
    $.historyInit(pageload, "advanced.html");

    // set onlick event for buttons using the jQuery 1.3 live method
    $("a[rel='history']").live('click', function(e) {
        if (e.button != 0) return true;

        var hash = this.href;
        hash = hash.replace(/^.*#/, '');

        // moves to a new page. 
        // pageload is called at once. 
        // hash don't contain "#", "?"
        $.historyLoad(hash);

        return false;
    });

    /****************************************************************************************/

    /********************** Attach click event to the Add Image Link ************************/

    $('#addImageLink').click(function(e) {
        gallery.insertImage('<li>																							\
                                    <a class="thumb" href="http://farm1.static.flickr.com/79/263120676_2518b40e5b.jpg" title="Dynamically Added Image">\
                                            <img src="http://farm1.static.flickr.com/79/263120676_2518b40e5b_s.jpg" alt="Dynamically Added Image" />\
                                    </a>																										\
                                    <div class="caption">																						\
                                            <div class="image-title">Dynamically Added Image</div>													\
                                    </div>																										\
                            </li>', 5);
					
        e.preventDefault();
    });
				
    /****************************************************************************************/
				
    /***************** Attach click event to the Remove Image By Index Link *****************/
				
    $('#removeImageByIndexLink').click(function(e) {
        if (!gallery.removeImageByIndex(5))
            alert('There is no longer an image at position 5 to remove!');

        e.preventDefault();
    });
				
    /****************************************************************************************/

    /***************** Attach click event to the Remove Image By Hash Link ******************/
				
    $('#removeImageByHashLink').click(function(e) {
        if (!gallery.removeImageByHash('lizard'))
            alert('The lizard image has already been removed!');

        e.preventDefault();
    });
				
    /****************************************************************************************/

    // html5_upload initiail and custom
    
    var perc = 0;
    $("#multiUpload").html5_upload({
        url: function(number) {
            return siteUrl+"/profile/ajaxImgUpload/"+getCurrentAlbumId();
        },
        sendBoundary: window.FormData || $.browser.mozilla,
        onStart: function(event, total) {
            return true;
            return confirm("You are trying to upload " + total + " files. Are you sure?");
        },
        onProgress: function(event, progress, name, number, total) {
            //console.log(progress, number);
        },
        setName: function(text) {
        //  $("#progress_report_name").text(text);
        },
        setStatus: function(text) {
        //$("#progress_report_status").text(text);
        },
        setProgress: function(val) {
            perc = Math.ceil(val*100)+"%";
            $("#progress_report_bar").css('width', perc).text(perc);
        },
        onFinishOne: function(event, response, name, number, total) {
            //console.log(response);
            perc = 0;
            $("#progress_report_bar").css('width', perc).text();
            gallery.insertImage(createGalElm('id', response), 0);
            gallery.gotoIndex(0);
            if($('#placeHolder').length == 1)
                gallery.removeImageByHash($('#placeHolder').attr('href').substr(1));
            
        },
        onError: function(event, name, error) {
            alert('error while uploading file ' + name);
        }
    });
    
    
    /*************************************************************************/
    
    // Album functions 
    
    $('#myAlbums').on('click', '.albumLink', function(e){
        
        var albumId = $(this).attr('id').substr(5);
        $('.albumLink').removeClass('current');
        $(this).addClass('current');
        var title = $.trim($(this).text());
        $('.album-title').hide();
        $('#albumTitle').text(title).show();
        //$('#albumInput').val(title);
        
        $.ajax({
            type: "POST",
            data: 'album_id='+albumId,
            url: siteUrl+'/profile/getAlbumImgs',
            dataType: "json",
            beforeSend: function(){
                //any code.
            },
            success:function(result){
                var count = 0;
                gallery.insertImage(placeHolderElm(), 0);//Add placeholder element.
                var oldImgsNo = $('#thumbs .thumb').length;
                //delete all old elements except placeholder (index 0) 3shan el gallery matedrabsh fe weshak.
                for(var index = oldImgsNo-1; index > 0; index--){
                    gallery.removeImageByIndex(index); 
                }
                if(result){
                    //insert new album imgs
                    count = 0;
                    $.each(result, function(imgId, imgName){
                        gallery.insertImage(createGalElm(imgId, imgName, false), 0);//insert new element
                        count++;
                    });
                    gallery.removeImageByIndex(count);//delete the placeholder element
                }
                gallery.gotoIndex(0);
            }
        });
        e.preventDefault();
    });
    
    
    $('#deleteImg').click(function (e){
        e.preventDefault();
        var $thumb = $('#thumbs li.selected a.thumb');
        var id = $thumb.attr('id');
        if(id == 'placeHolder')
            return alert("Sorry! Can't delete this img");
        var imgId = id.substr(3);
        var hash = $thumb.attr('href').substr(1);
        if(confirm('Confirm Deleting Image')){
            $.ajax({
                type: 'POST',
                data: 'img_id='+imgId,
                url: siteUrl+'/profile/deleteAlbumImg',
                beforeSend: function(){
                    //any code.
                },
                success:function(result){
                    if(result == true){
                        if($('#thumbs li').length == 1)
                            gallery.insertImage(placeHolderElm(), 0);//Add placeholder element before delete last image.
                        gallery.removeImageByHash(hash);
                        gallery.gotoIndex(0);
                    }else
                        alert("Error! Please try again.");
                }
            });
        }
        return false;	
    });
    
    
});

function createGalElm(imgId, imgName, caption){
    var elm = '<a class="thumb" id="img'+imgId+'" href="'+siteUrl+'/img/upload/'+imgName+'" >\
                    <img src="'+siteUrl+'/img/upload/thumb_'+imgName+'" />\
               </a>';
    if(caption){
       elm += '<div class="caption">\
                    <div class="image-title">'+caption+'</div>\
                </div>'; 
    }
    return '<li>'+elm+'</li>';
}

function placeHolderElm(){
    return '<li>\
                <a class="thumb" id="placeHolder" href="'+siteUrl+'/img/front/placeholder.jpg" >\
                    <img src="'+siteUrl+'/img/front/thumb_placeholder.jpg" />\
               </a>\
            </li>';
}