$(document).ready(function(){

	$('#back-login').click(function(e){
		e.preventDefault();        
        window.location.href = base_url;
    });

	$('#form-login').submit(function(e){
		e.preventDefault();
		let fd = new FormData(this);

		$.ajax({
			type: "POST",
			url: base_url + "login/signin",
			data: fd,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function(response)
			{ 
				if(response.status){
					window.location.href = base_url + "clientes";
				}else{
					swal('Erro', response.errors, 'error');
				}
			}
		});
	})
})