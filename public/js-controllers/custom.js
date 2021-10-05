
let base_url = 'http://dev.easyschoolapp.com.ng/';
var add_staff_url = base_url+'admin/manage-staffs/add';

$(document).ready(function($) {



// Add staff function
    $('form#addstaff_form').on('submit', function(e){

        e.preventDefault();

        var formData = new FormData($( "#addstaff_form" )[0]);

        $.ajax({

          url:add_staff_url,
          type: 'POST',  
          data: formData, 
          dataType: 'JSON', 
          async: false,  
          cache: false,  
          contentType: false,  
          processData: false,

          beforeSend:function(){ 
            $('#savebtn').addClass('hidden');
            $('#loading').removeClass('hidden');

            $('#firstname_err').text('');
            $('#surname_err').text('');
            $('#email_err').text('');
            $('#role_err').text('');
            $('#phone1_err').text('');
            $('#gender_err').text('');
            $('#dob_err').text('');
            $('#doe_err').text('');
            $('#marital_status_err').text('');
            $('#img_err').text('');
          },  

          success:function(data)
          {
          	if (!data.status) {
          		// alert(data.role_err);
	          	$('#savebtn').removeClass('hidden');
	            $('#loading').addClass('hidden');

	            $('#firstname_err').text(data.firstname_err);
	            $('#surname_err').text(data.surname_err);
	            $('#email_err').text(data.email_err);
	            $('#role_err').text(data.role_err);
	            $('#phone1_err').text(data.phone1_err);
	            $('#gender_err').text(data.gender_err);
	            $('#dob_err').text(data.dob_err);
            	$('#doe_err').text(data.doe_err);
            	$('#marital_status_err').text(data.marital_status_err);
	            $('#img_err').text(data.img_err);
	            // $('#error_message').text(data.error_message);
        	}else{

        		$('#savebtn').removeClass('hidden');
	            $('#loading').addClass('hidden');

	            toastr.options = {
					"closeButton": true,
					"debug": true,
					"newestOnTop": true,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": true,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}

				toastr["success"](data.msg);

	          	setTimeout(function(){location.reload()}, 2000);

        	}

          }

        }); //ajax function


    });	//submit function
    


    $('#class_id').change(function(e){
      e.preventDefault();
      var class_id = $(this).val();
      var div_data = '<option value="">Select</option>';

        $.ajax({
          url:base_url+"admin/fetch-section-by-class",
          type: 'POST',  
          data: {'class_id': class_id}, 
          dataType: 'JSON',
          beforeSend:function(){
            $('#section_id').html("");
          },
          success:function(data)
          {
            $.each(data, function(i, obj) {
              div_data += "<option value=" + obj.section_id + ">" + obj.section + "</option>";
            });

            $('#section_id').append(div_data);
          }

        }); //ajax function


    }); //submit function
    


});

