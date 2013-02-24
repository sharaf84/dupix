$(document).ready(function() {
    
    $('#mycarousel').jcarousel({
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
    
    $('#mycarousel2').jcarousel({
        wrap: 'last',
        initCallback: mycarousel2_initCallback
    });
    
});

function mycarousel2_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
}

function mycarousel_initCallback(carousel, state){
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(
        function() {
            carousel.stopAuto();
        }, 
        function() {
            carousel.startAuto();
        }
    );
        
    /*Album functions*/
    
    if (state != 'init')
        return;
    
    //add album
    $('#addAlbumForm').submit(function(){
        $.ajax({
            type: "POST",
            data: $(this).serialize(),	
            url: siteUrl+'/profile/addAlbum',
            dataType: "json",
            beforeSend: function(){
                $('#albumResult').hide();
                $('#albumLoading').show();
            },
            success:function(result){
                $('#albumLoading').hide();
                if(result.id && result.title){
                    getAlbums(carousel, 'last');
                    $.colorbox.close();//close color box.
                }else{
                    $('#albumResult').html(result.msg).show('fast', function(){
                        $.colorbox.resize();
                    });
                }
                   
            }
        });
        return false;	
    });
    
    //delete album
    $('#deleteAlbum').click(function(e){
        e.preventDefault();
        var id = getCurrentAlbumId();
        if(id == getFirstAlbumId()){
            return $.colorbox({
                html: "<p>Sorry can't delete Default album.</p>"
            });
        }
        if(confirm('Confirm Deleting Album')){
            $.ajax({
                type: 'POST',
                data: 'album_id='+id,
                url: siteUrl+'/profile/deleteAlbum',
                beforeSend: function(){
                //obj.addClass('loading');
                },
                success:function(result){
                    if(result == true){
                        getAlbums(carousel, 'first');
                    }
                    else{
                        return $.colorbox({
                            html: "<p>Error! Please try again.</p>"
                        });
                    }
                }
            });
        }
        return false;
    
    });        
        
}


/* Album Functions */

function getCurrentAlbumId(){
    var obj = $('#myAlbums .current');
    if(obj.length == 1)
        return obj.attr('id').substr(5);
    return false;
}

function getFirstAlbumId(){
    var obj = $('#myAlbums .albumLink:first');
    if(obj.length == 1)
        return obj.attr('id').substr(5);
    return false;
}


function toggleRename(){
    var title = $.trim($('#albumTitle').text());
    $('#albumInput').val(title);
    $('.album-title').toggle();
    return false;
}

function renameAlbum(){
    var id = getCurrentAlbumId();
    $.ajax({
        type: 'POST',
        data: {
            album_id:id, 
            album_title:$('#albumInput').val()
        },
        url: siteUrl+'/profile/renameAlbum',
        beforeSend: function(){
        //obj.addClass('loading');
        },
        success:function(result){
            if(result != false){
                $('#albumTitle').text(result);
                $('#album'+id+' > div.album-name').text(result);
            }
            $('.album-title').toggle();	
        }
    });
    return false;
	
}

function getAlbums(carousel, position){
    $.ajax({
        url: siteUrl+'/profile/getAlbums',
        dataType: 'json',
        beforeSend: function(){
            //any code.
        },
        success:function(result){
            if(result){
                carousel.reset();//Remove all carousel elements
                var count = 0;
                $.each(result, function(id, title){
                    carousel.add(++count, createAlbumElm(id, title));//Add element to carousel.
                });
                carousel.size(count);//Resize carousel 
                if(position == 'first'){
                    carousel.scroll(1, true);//Scroll carousel to element index. 
                    $('#myAlbums .albumLink:first').trigger('click');
                }
                else if(position == 'last'){
                    carousel.scroll(count, true);
                    $('#myAlbums .albumLink:last').trigger('click');
                }else{
                    carousel.scroll(position, true);
                    $('#myAlbums .albumLink:eq('+position+')').trigger('click');
                }
            }else{
                $.colorbox({
                    html: "<p>No album found.</p>",
                    width: '40%'
                });
            }
        }
    });
}

function createAlbumElm(id, title){
    return '<li class="albumLink" id="album'+id+'"><div class="album-name">'+title+'</div></li>';
}
