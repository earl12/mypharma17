function showValidationErrors(name,error){
	var group = $("#form-group-" + name);
	group.addClass('has-error');
	group.find('.help-block').text(error);
}

function clearValidationError(name){
	var group = $("#form-group-" + name);
	group.removeClass('has-error');
	group.find('.help-block').text('');
}

function addDosage(url)
{
	var postData = new FormData($("#modal_form_id")[0]);

	console.log(url);

	$.ajax({
		type:'POST',
		url:url,
		processData : false,
		contentType : false,
		data:postData,
		success:callback,
		error:err
	});

	
}

function callback(data)
{
	// console.log('success');
	$('#createModal').modal('hide');
	$('#medicine-list').append('<tr><td>' +data.dosage_name +'<tr></td>');
}


function err(xhr, reason, ex)
{		
	console.log(+xhr.status);
	if (xhr.status == 422) {
		var data = xhr.responseJSON;
		for (let i in data)
		{
			console.log(i, data[i][0]);
			showValidationErrors(i,data[i][0]);
		}	
	}
}


function editDosage(url)
{

	var formData = new FormData($("#edit-form-data")[0]);
	console.log(formData);
	$.ajax({
		url: url,
		method: 'POST',
		processData : false,
		contentType : false,
		data: formData,	
		success:function(data){
			// console.log(data);
			$('.table-list').replaceWith('')
		},
		error: function(xhr,reason,ex){
			console.log(reason +"-" +xhr.status +"ie" +xhr.statusText);
		}
	})

}
















