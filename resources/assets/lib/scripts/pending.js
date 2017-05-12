$("#idClient").click(function () {
	$.ajax({
		type: 'GET',
		url: urlGetClient,
		data:{
			id:clientId
		}
	})
	.done(function(result){
		console.log(result);
	})
});