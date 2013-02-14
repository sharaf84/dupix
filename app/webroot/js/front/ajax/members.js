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
                    var index = $('#mycarousel li').length + 1;
                    $('#mycarousel').jcarousel('add', index, createAlbumElm(result.id, result.title));
                    $.fn.colorbox.close();//close color box.
                }else
                    $('#albumResult').html(result.msg).show();
            }
        });
        return false;	
    });
	
    //set cart count;
    $('.cartCount:gt(0)').text(parseInt($('.cartCount:eq(0)').text()));
						
});

/* Album Functions */

function createAlbumElm(id, title){
    return '<li class="albumLink" id="album'+id+'">\
                <div class="album-name">'+title+'</div>\
            </li>';
}

function appendAlbum(id, title){
    $('.albumsLinks').append('<div class="albumLink" id="album'+id+'"><a href="#" onclick="getAlbumImgs('+id+'); return false;">'+title+'</a><input type="text" value="'+title+'"><div class="actionsIcons"><div class="editIcon" title="Edit" onclick="editAlbum('+id+', $(this));"></div><div class="deleteIcon" title="Delete" onclick="deleteAlbum('+id+', $(this));"></div></div></div>');
    $('#uploadImagesLink').show();
}

function appendAlbumImg(id, image){
    $('#galleryb .belt').append('<div class="panel"><div class="actionsIcons"><div class="deleteIcon" style="position: absolute;" title="Delete" onclick="deleteAlbumImg('+id+', $(this));"></div></div><img src="'+siteUrl+'/app/webroot/img/upload/thumb_'+image+'" name="'+image+'" height="60" onclick="showImg($(this))" /></div>');
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

function deleteAlbum(){
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
                    $('#album'+id).remove();
                //$('#mycarousel').jcarousel('delete', index);
                }
                else
                    alert("Error! Please try again.");
            }
        });
    }
    return false;	
}

function deleteAlbumImg(id, obj){
    if(confirm('Confirm Deleting Image')){
        $.ajax({
            type: 'POST',
            data: 'img_id='+id,
            url: siteUrl+'/profile/deleteAlbumImg',
            beforeSend: function(){
                //obj.show();
                obj.addClass('loading');
            },
            success:function(result){
                if(result == true)
                    obj.parent().parent().fadeOut('slow', function(){
                        obj.parent().parent().remove();
                    });
                else
                    obj.removeClass('loading');
            }
        });
    }
    return false;	
}

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