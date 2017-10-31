$(".view").on('click', function() {
	var form = [];
	$('.form-group input, .form-group textarea').each(function(){
		form.push($(this).val());
	});	

	 $.ajax({
	    url: 'preview',
	    type: 'POST',
	    data: {
	    	'data':form,
	    }
	}).done(function(data){	
		var preview = document.querySelector('img');
		var file    = document.querySelector('input[type=file]').files[0];
  		var reader  = new FileReader();
		  reader.addEventListener("load", function () {
		    preview.src = reader.result;
		  }, false);

		  if (file) {
		    reader.readAsDataURL(file);
		  }

		$('.preview').show();
	   	$(".preview-content").html(data);
	});
});

