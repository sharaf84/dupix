$(document).ready(function(){
	$('#ProductTitle').click(function(){
		if($(this).val() == 'Enter keyword ex: Chair')
			$(this).val('').css("color","#666");
	});
});
//getOtherLists
function getOtherLists(obj){
	var resultDiv = obj.parent().next();
	var conditions = '';
	if($("select#ProductSectionId").val()!='')
		conditions += '/Product.section_id:'+$("select#ProductSectionId").val();
	if((obj.attr('id') != 'ProductSectionId') && ($('select#ProductStyleId').val()!=''))
		conditions += '/Product.style_id:'+$("select#ProductStyleId").val();
	if((obj.attr('id') == 'ProductLocationId') && ($('select#ProductLocationId').val()!=''))
		conditions += '/Product.location_id:'+$("select#ProductLocationId").val();		
	$.ajax({
		   //type: 'POST',
		   url: siteUrl+'/categories/getOtherLists/'+obj.attr("id")+conditions,
		   //data:{'section_id':$(this).val()},
		   beforeSend: function(){
		   		resultDiv.hide();
				$('#loader').show();
		   },
		   success: function(html){
			    $('#loader').hide();
			    resultDiv.html(html).show();
		   }
	});
}
//get location exhibitors (search form)
function getExhibitorsList(obj){
	var resultDiv = obj.parent().next();
	var locationId = null;
	if(obj.val()!='')
		locationId = obj.val();
	$.ajax({
		   //type: 'POST',
		   url: siteUrl+'/categories/getExhibitorsList/'+locationId,
		   //data:{'section_id':$(this).val()},
		   beforeSend: function(){
		   		resultDiv.hide();
				$('#loader').show();
		   },
		   success: function(html){
			    $('#loader').hide();
			    resultDiv.html(html).show();
		   }
	});
}