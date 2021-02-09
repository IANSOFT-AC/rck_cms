$(function(){

	$('body').on("beforeSubmit", ".caseFileUpload", function(e){
        e.preventDefault();

        console.log("submit button clicked");

	    let form = $(this)[0];
	    console.log(form)

		let fileExists = false;
	    let formJS = document.querySelector('IDForm');
	    formData = new FormData(form);

	    if($.trim($(form).find('.uploadform-imagefile').val())){
			formData.append('imageFile', $(form).find('.uploadform-imagefile')[0].files[0])
			fileExists = true
		}else if($.trim($(form).find('.uploadform-multipleFiles').val())){
			formData.append('multipleFiles', $(form).find('.uploadform-multipleFiles').files)
			fileExists = true
		}
	
		if(fileExists == false){
			swal("Sorry!", "You have not loaded any file for upload", "error");
			return false;
		}

	    $.ajax({
		    url    : '/intervention/upload',
		    type   : 'POST',
		    data   : formData,
		    contentType : false,
		    processData : false,
		    success: function (response) 
		    {
		        //var getupdatedata = $(response).find('#filter_id_test');
		        // $.pjax.reload('#note_update_id'); for pjax update
		        //$('#yiiikap').html(getupdatedata);
		        console.log("success console")
				console.log(response)
		        
			    // Animation complete.
			    swal({
			    	title: "Great!", 
			    	text:"File Uploaded successfully!", 
			    	icon:"success",
			    	timer: 1300
			    }).then((value) => {
				  	$( form ).fadeOut( "slow", function() {});
				});
				
		    },
		    error  : function (xhr, status, error) 
		    {
		        console.log("Error: " + error);
	            console.log("Error: " + xhr.responseText);
		        console.log(status);
		    }
	    });
	    return false;

    });

  $('body').on("beforeSubmit", ".interventionFileUpload", function (e) {
  	e.preventDefault();
    // send data to actionSave by ajax request.
    
  });
});
