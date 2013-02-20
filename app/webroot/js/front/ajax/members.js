$(document).ready(function(){
    $('#memeberRegister').submit(function(){
        $.ajax({
            type: 'POST',
            data: $(this).serialize(),	
            url: siteUrl+'/profile/register',
            beforeSend: function(){
                $('#registerResult').hide();
                $('#registerLoading').show();
            },
            success:function(result){
                result = $.trim(result);
                $('#registerLoading').hide();
                if(result == 'Confirmation mail sent. Please check your inbox'){
                    $.colorbox({
                        html: "<p>"+result+"</p>",
                        width: '40%'
                    });
                }
                else{
                    $('#registerResult').html(result).show();
                    $.colorbox.resize();
                }
            }
        });
        return false;	
    });
	
    //set cart count;
    $('.cartCount:gt(0)').text(parseInt($('.cartCount:eq(0)').text()));
						
});

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
                alert('No album found');
            }
        }
    });
}

function createAlbumElm(id, title){
    return '<li class="albumLink" id="album'+id+'"><div class="album-name">'+title+'</div></li>';
}

/* Projects Functions */

function deleteProject(id, obj){
    if(confirm('Confirm Deleting Project')){
        $.ajax({
            type: 'POST',
            data: 'project_id='+id,
            url: siteUrl+'/profile/deleteProject',
            dataType: "json",
            beforeSend: function(){
                obj.show();
                obj.addClass('loading');
            },
            success:function(result){
                if(result){
                    obj.fadeOut('slow', function(){
                        obj.parent().parent().parent().remove(); 
                        $('.cartCount').text(result.cartCount);
                        $('.cartPrice').text(result.cartPrice);
                    });
                }else
                    obj.removeClass('loading');
            }
        });
    }
    return false;	
};

/*Cart functions*/

function updateCart(projectId){
    $.ajax({
        type: 'POST',
        url: siteUrl+'/profile/updateCart',
        data: {
            'project_id':projectId, 
            'quantity':$('#quantity_'+projectId).val()
        },	
        dataType: "json",
        beforeSend: function(){
            $('#cartResult_'+projectId).hide();
            $('#cartLoading_'+projectId).show();
        },
        success:function(result){
            $('#cartLoading_'+projectId).hide();
            $('#cartResult_'+projectId).html(result.msg).show();
            if(result.cartCount && result.cartPrice){
                $('#totalUnitPrice_'+projectId).text(parseInt($('#unitPrice_'+projectId).text())*parseInt($('#quantity_'+projectId).val()))
                $('.cartCount').text(result.cartCount);
                $('.cartPrice').text(result.cartPrice);
            }
        }
    });
    return false;	
};

function deleteCart(id, obj){
    if(confirm('Confirm Deleting From Cart')){
        $.ajax({
            type: 'POST',
            data: 'project_id='+id,
            url: siteUrl+'/profile/deleteCart',
            dataType: "json",
            beforeSend: function(){
                obj.show();
                obj.addClass('loading');
            },
            success:function(result){
                if(result){
                    obj.fadeOut('slow', function(){
                        obj.parent().parent().parent().remove(); 
                        $('.cartCount').text(result.cartCount);
                        $('.cartPrice').text(result.cartPrice);
                    });
                }else
                    obj.removeClass('loading');
            }
        });
    }
    return false;	
};


function updateCartPrice(value){
    $('.cartPrice').text(parseInt($('.cartPrice').text())+parseInt(value));
}