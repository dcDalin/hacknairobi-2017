// JavaScript Validation For Registration Page

$('document').ready(function()
{

		 // name validation
		 var nameregex = /^[a-zA-Z_]+$/;

		 $.validator.addMethod("validname", function( value, element ) {
		     return this.optional( element ) || nameregex.test( value );
		 });

		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });

		 $("#answer-question-form").validate({

		  rules:
		  {
				choice: {
					required: true
				},
				userEmail : {
				required : true,
				validemail: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 15
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
		   },
		   messages:
		   {
				choice: {
					required: "Select a Multiple Choice Option"
				},
				userEmail : {
				required : "How about your email?",
				validemail : "Your email looks off, mind fixing it?",
				remote : "Sorry, email exists... try another one"
				},
				password:{
					required: "Type in your password, we don't want anyone logging in",
					minlength: "Password at least have 6 characters"
					},
				cpassword:{
					required: "Retype your password",
					equalTo: "Sorry, passwords don't match"
					}
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
		   },
				submitHandler: submitForm
		   });


		   function submitForm(){

			   $.ajax({
			   		url: 'ajax-answer-question.php',
			   		type: 'POST',
			   		data: $('#answer-question-form').serialize(),
			   		dataType: 'json'
			   })
			   .done(function(data){

			   		$('#btn-answer-question').html('<img src="ajax-loader.gif" /> &nbsp; Processing...').prop('disabled', true);
			   		$('input[type=text],input[type=email],input[type=password]').prop('disabled', true);

			   		setTimeout(function(){

						if ( data.status==='success' ) {

							$("#btn-answer-question").html('<img src="ajax-loader.gif" /> &nbsp; Correct!');
							setTimeout(' window.location.href = "index.php"; ',2000);

					  } else {

						    $('#errorDiv').slideDown('fast', function(){
						      	$('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
							  	$("#answer-question-form").trigger('reset');
							  	$('input[type=text],input[type=email],input[type=password]').prop('disabled', false);
							  	$('#btn-answer-question').html('Try Again').prop('disabled', false);
							}).delay(3000).slideUp('fast');
						}

					},3000);

			   })
			   .fail(function(){
			   		$("#answer-question-form").trigger('reset');
			   		alert('An unknown error occoured, Please try again Later...');
			   });
		   }
});
