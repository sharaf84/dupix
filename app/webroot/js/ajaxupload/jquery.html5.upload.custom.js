$(function() {
	$("#upload_field").html5_upload({
	    url: function(number) {
		return prompt(number + " url", siteUrl+"/profile/ajaxImgUpload/3");
	    },
	    sendBoundary: window.FormData || $.browser.mozilla,
	    onStart: function(event, total) {
		return true;
		return confirm("You are trying to upload " + total + " files. Are you sure?");
	    },
	    onProgress: function(event, progress, name, number, total) {
		console.log(progress, number);
	    },
	    setName: function(text) {
		$("#progress_report_name").text(text);
	    },
	    setStatus: function(text) {
		$("#progress_report_status").text(text);
	    },
	    setProgress: function(val) {
		$("#progress_report_bar").css('width', Math.ceil(val*100)+"%");
	    },
	    onFinishOne: function(event, response, name, number, total) {
                console.log(response);
	    },
	    onError: function(event, name, error) {
		alert('error while uploading file ' + name);
	    }
	});
});
