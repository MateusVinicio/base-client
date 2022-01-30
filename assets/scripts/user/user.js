$(document).ready(function(){

	$('#back-login').click(function(e){
		e.preventDefault();        
        window.location.href = base_url;
    });

	$('#form-user').submit(function(e){
		e.preventDefault();
		let fd = new FormData(this);

		$.ajax({
			type: "POST",
			url: base_url + "usuarios/salvar",
			data: fd,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function(response)
			{ 
				if(response.status){
					swal('Sucesso!', response.data , 'success').then(function(){
						window.location.href = base_url;
					});
					
				}else{
					swal('Erro', response.errors, 'error');
				}
			}
		});
	})
})