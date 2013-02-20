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
                    $.fn.colorbox.close();//close color box.
                }else
                    $('#albumResult').html(result.msg).show();
            }
        });
        return false;	
    });
    
    //delete album
    $('#deleteAlbum').click(function(e){
        
        e.preventDefault();
        
        var id = getCurrentAlbumId();
        if(id == getFirstAlbumId())
            return alert("Sorry can't delete Default album.");

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
                    else
                        alert("Error! Please try again.");
                }
            });
        }
        return false;
    
    });        
        
}

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
