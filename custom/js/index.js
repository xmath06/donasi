// global the manage memeber table 
var manageMemberTable;
var aprove;
$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});
	
	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var nama = $("#nama").val();
			var alamat = $("#alamat").val();
			var rekening = $("#rekening").val();
			var type = $("#type").val();
			var lat = $("#lat").val();
			var long = $("#long").val();
			var gambar = $("#gambar").val();
			

			if(nama == "") {
				$("#nama").closest('.form-group').addClass('has-error');
				$("#nama").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#nama").closest('.form-group').removeClass('has-error');
				$("#nama").closest('.form-group').addClass('has-success');				
			}

			if(alamat == "") {
				$("#alamat").closest('.form-group').addClass('has-error');
				$("#alamat").after('<p class="text-danger">The alamat field is required</p>');
			} else {
				$("#alamat").closest('.form-group').removeClass('has-error');
				$("#alamat").closest('.form-group').addClass('has-success');				
			}

			if(rekening == "") {
				$("#rekening").closest('.form-group').addClass('has-error');
				$("#rekening").after('<p class="text-danger">The rekening field is required</p>');
			} else {
				$("#rekening").closest('.form-group').removeClass('has-error');
				$("#rekening").closest('.form-group').addClass('has-success');				
			}

			

			if(nama && alamat && rekening) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#trNama").val(response.nama);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="trRekening" id="trRekening" value="'+response.rekening+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var nohp = $("#trNohp").val();
					var resi = $("#trResi").val();
					
					if(nohp == "") {
						$("#trNohp").closest('.form-group').addClass('has-error');
						$("#trNohp").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#trNohp").closest('.form-group').removeClass('has-error');
						$("#trNohp").closest('.form-group').addClass('has-success');				
					}

					if(resi == "") {
						$("#trResi").closest('.form-group').addClass('has-error');
						$("#trResi").after('<p class="text-danger">The Address field is required</p>');
					} else {
						$("#trResi").closest('.form-group').removeClass('has-error');
						$("#trResi").closest('.form-group').addClass('has-success');				
					}

					if(nohp && resi) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									// manageMemberTable.ajax.reload(null, false);
									$.ajax({
										url: 'php_action/update.php',
										type: 'post',
										dataType:'json',
										// order:"[]",
										success:function(coba){
											// var json=$.parseJSON(coba);
											jmldata=coba.length;
											hasil="";
											$.each(coba,function(i,n){
												hasil +='<h3>'+n.nohp+'</h3><p>'+n.nama+'</p>';
											});
											// for(a=0;a<jmldata;a++){
											// 	hasil +='<h3>'+coba.nohp+'</h3><p></p>';
											// }
											$(".sidebar_box").html('<h2>'+jmldata+'Infaq yang diaprove'+hasil+'</h2>')
											
										}	
										});
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}