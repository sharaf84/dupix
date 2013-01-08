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
				$('#registerResult').html(result).show();
				if(result == 'Confirmation mail sent. Please check your inbox'){
					$('#memeberRegister').hide();
					$('#registerResult').css('margin-top', '25px');
					$('#cboxLoadedContent').css('height', '100px');
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
					appendAlbum(result.id, result.title);
					getAlbumImgs(result.id);
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

function getAlbumImgs(id){
	$('.albumLink a').removeClass('current');
	$('#album'+id+' a').addClass('current');
	$.ajax({
		type: "POST",
		data: 'album_id='+id,
		url: siteUrl+'/profile/getAlbumImgs',
		dataType: "json",
		beforeSend: function(){
			$('#galleryb .panel').remove();
			$('#galLoading').show();
			$('#galResult').hide();
		},
		success:function(result){
			$('#galLoading').hide();
			$('#flashHolder param[name="flashvars"]').val('path='+siteUrl+'/profile/multipleImgUpload/'+id);//set path to multiple upload flash object.
			if(result){
				var count = 0;
				//append album imgs
				$.each(result, function(imgId, imgName){
					appendAlbumImg(imgId, imgName);
					count++;
				});
				//$('#galleryb .belt').css('width', count*100);//set belt width (imgs count * img width)
			}else
				$('#galResult').show();
			//show fisrt img if #inAlbums exist (in albums view).
			if($('#inAlbums').length == 1)
				showImg($('.panel:first img'));
		}
	});
	return false;
}

function appendAlbum(id, title){
	$('.albumsLinks').append('<div class="albumLink" id="album'+id+'"><a href="#" onclick="getAlbumImgs('+id+'); return false;">'+title+'</a><input type="text" value="'+title+'"><div class="actionsIcons"><div class="editIcon" title="Edit" onclick="editAlbum('+id+', $(this));"></div><div class="deleteIcon" title="Delete" onclick="deleteAlbum('+id+', $(this));"></div></div></div>');
	$('#uploadImagesLink').show();
}

function appendAlbumImg(id, image){
	$('#galleryb .belt').append('<div class="panel"><div class="actionsIcons"><div class="deleteIcon" style="position: absolute;" title="Delete" onclick="deleteAlbumImg('+id+', $(this));"></div></div><img src="'+siteUrl+'/app/webroot/img/upload/thumb_'+image+'" name="'+image+'" height="60" onclick="showImg($(this))" /></div>');
}

function editAlbum(id, obj){
	$('#album'+id+' a').toggle();
	$('#album'+id+' input').toggle().focus();
	$('#album'+id+' input').keypress(function(key) {
		// 13 = Enter 
  		if(key.which == 13){
  			$.ajax({
				type: 'POST',
				data: { album_id:id, album_title:$(this).val()},
				url: siteUrl+'/profile/editAlbum',
				beforeSend: function(){
					obj.addClass('loading');
				},
				success:function(result){
					if(result != false){
						$('#album'+id+' a').text(result);
					}
					obj.removeClass('loading');
					$('#album'+id+' input').hide();
					$('#album'+id+' a').show();	
				}
			});
  		}
  		else if(key.which == 0){
  			$('#album'+id+' input').hide();
			$('#album'+id+' a').show();
		}
	});
	
};

function deleteAlbum(id, obj){
	if(confirm('Confirm Deleting Album')){
		$.ajax({
			type: 'POST',
			data: 'album_id='+id,
			url: siteUrl+'/profile/deleteAlbum',
			beforeSend: function(){
				obj.addClass('loading');
			},
			success:function(result){
				if(result == true){
					$('#album'+id).fadeOut('slow', function(){ 
						//if deleting current album => getAlbumImgs of first album;
						if(getCurrentAlbumId() == id){
							if(getFirstAlbumId() == id){
								$(this).remove();
								getAlbumImgs(getFirstAlbumId());
							}else{
								getAlbumImgs(getFirstAlbumId());
								$(this).remove();
							}
						}else
							$(this).remove();
						//if last albumLink deleted hide uploadImagesLink
						if($(".albumLink").length == 0)
							$('#uploadImagesLink').hide();
					});
				}
				else
					obj.removeClass('loading');
			}
		});
	}
	return false;	
};

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
					obj.parent().parent().fadeOut('slow', function(){ obj.parent().parent().remove(); });
				else
					obj.removeClass('loading');
			}
		});
	}
	return false;	
};

function getCurrentAlbumId(){
	var obj = $('.albumLink a.current');
	if(obj.length == 1)
		return obj.parent().attr('id').substr(5);
	return false;
}

function getFirstAlbumId(){
	var obj = $('.albumLink:first');
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
		data: {'project_id':projectId, 'quantity':$('#quantity_'+projectId).val()},	
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