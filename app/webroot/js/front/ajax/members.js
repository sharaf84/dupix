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
                    $('#registerResult').html(result).show('fast', function(){
                        $.colorbox.resize();
                    });
                }
            }
        });
        return false;	
    });
	
    //set cart count;
    $('.cartCount:gt(0)').text(parseInt($('.cartCount:eq(0)').text()));
						
});

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