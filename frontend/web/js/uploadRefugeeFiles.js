$(function(){

  $('body').on("beforeSubmit", ".caseFileUpload", function (e) {
  	e.preventDefault();
    // send data to actionSave by ajax request.
    console.log("submit button clicked");
    let form = $(this)[0];
    //console.log(form)
    //return false; // Cancel form submitting.
	// if (form.find('.has-error').length) 
	// {
	// 	console.log("There is an error");
	//     return false;
	// }


    let formJS = document.querySelector('IDForm');
    formData = new FormData(form);
	console.log($(form).find('#uploadform-imagefile'))
	console.log($(form).find('#uploadform-multipleFiles'))

	if($(form).find('#uploadform-imagefile').files){
		formData.append('imageFile', $(form).find('#uploadform-imagefile')[0].files[0])
	}else if($(form).find('#uploadform-multipleFiles').files){
		formData.append('multipleFiles', $(form).find('#uploadform-multipleFiles').files)
	}

    //console.log(formData)
    //console.log(form.find('#uploadform-imagefile')[0].files[0])
    //console.log(formData.get('id'))

    $.ajax({
	    url    : '/refugee/upload',
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
});
