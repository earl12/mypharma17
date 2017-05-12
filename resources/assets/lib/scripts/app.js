function checkAvailability(url,email){
	console.log(email);
	$.ajax({
		url: url,
		method:GET,
		data:{
			email : email
		},
		success:function(data){
			console.log(data)
			if (data > 0){
				console.log('theres a match');
			}
			else{
				console.log('no match');
			}
		},
		error: function(res){
			
		}
	});
}



