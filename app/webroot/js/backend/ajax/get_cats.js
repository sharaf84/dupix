function getCats(obj, modelName, empty){
	var resultDiv = obj.parent().next();
	var sectionId = 0;
	if(obj.val()!='')
		sectionId = obj.val();
	$.ajax({
		   //type: 'POST',
		   url: siteUrl+'/cats/getSectionCats/'+sectionId+'/'+modelName+'/'+empty,
		   //data:{'section_id':$(this).val()},
		   beforeSend: function(){
		   		resultDiv.hide();
				$('#loader').show();
		   },
		   success:function(html){
			    $('#loader').hide();
			    resultDiv.html(html);
			    //$('#'+modelName+'CatId').unwrap();
			    resultDiv.show();
		   }
	});
}
