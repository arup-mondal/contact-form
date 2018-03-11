$(document).ready(function(){{
	
	//custom validation
		jQuery.validator.addMethod("lettersonly", function(value, element) {
		  return this.optional(element) || /^[a-z\s]+$/i.test(value);
		}, "Letters only please"); 
	//custom validation
	
	$('#contactForm').validate({
		rules:{
			name:{
				required:true,
				lettersonly:true
			},
			email:{
				required:true,
				email:true
			},
			msg:{
				required:true
			}
		},
		messages:{
			name:{
				required:"Please enter your name",
				lettersonly:"Please enter a valid name"
			},
			email:{
				required:"Please enter your email",
				email:"Please enter a valid email"
			},
			msg:{
				required:"Please enter your message"
			}
		},
		submitHandler:function(form){
			$('.buttonload').show();
			$('#form-submit').hide();
			var method 	= $(form).attr('method');
			var action 	= $(form).attr('action');
			var data	= new FormData(form);
			//console.log(method,action,data);
			$.ajax({
			    url: action,
			    data: data,
			    type: method,
			    contentType: false, 
			    processData: false, 
			    dataType:'json',
			    success:function(response){
			    	$('.buttonload').hide();
			    	$('#form-submit').show();
			    	//success callback
			    	if(response.status){
			    		$('#contact-msg').addClass('alert-success').text(response.message);
			    		$('#contactForm')[0].reset();
			    		setTimeout(function(){
			    			$('#contact-msg').removeClass('alert-success').text('');
			    		},5000)
			    	}else{
						$('#contact-msg').addClass('alert-danger').text(response.message);
			    		setTimeout(function(){
			    			$('#contact-msg').removeClass('alert-danger').text('');
			    		},5000)
			    	}
			    },
			    error:function(xhr){
			    	//error callback
			    	console.log(xhr.responseText);
			    	$('.buttonload').hide();
			    	$('#form-submit').show();
			    	$('#contact-msg').addClass('alert-danger').text("Some error occured, please try again later");
		    		setTimeout(function(){
		    			$('#contact-msg').removeClass('alert-danger').text('');
		    		},5000)

			    }
			});
		}
	})
}})