var currentClient = null;

$(document).ready(function () {

    $('#new-client-modal').modal({
        onCloseEnd: function() {
            $("#form-client")[0].reset();  
        } 
    });

    $('#edit-client-modal').modal({
        onCloseEnd: function() {
            $("#form-client-edit")[0].reset();  
        } 
    });
    
    $('#client-type').formSelect();
    $('#client-type-edit').formSelect();

    maskFieldsAdd();
	maskFieldsEdit();
    
    $('#client-type').on('change', function() {
        maskCpf_cnpjAdd();
    });

	$('#client-type-edit').on('change', function() {
        maskCpf_cnpjEdit();
    });

	listClients = $('#list-clients').DataTable({
		"targets": 'no-sort',
        "bSort": false,
        "order": [],
		"serverSide": true,
		dom: "tip",
		"pagingType": "full_numbers",
		"pageLength": 10,
		"ajax": {

			"url": base_url + 'clientes/listar',
			"type": "POST",
		},
		"oLanguage": {
			"sProcessing": "Processando...",
			"sLengthMenu": "Mostrando _MENU_ resultados por página",
			"sZeroRecords": "Nenhum resultado encontrado",
			"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
			"sInfoEmpty": "Mostrando 0 de 0 de 0 resultados",
			"oPaginate": {
				"sNext": "Próxima",
				"sFirst": "Primeira",
				"sLast": "Ultima",
				"sPrevious": "Anterior"
			},
		},
		"columnDefs": [{
				"render": function (data, type, row) {
					return row.id;
				},
				"targets": 0,
			},
			{
				"render": function (data, type, row) {
					return row.name;
				},
				"targets": 1,
			},
			{
				"render": function (data, type, row) {
					return row.email;
				},
				"targets": 2,
			},
			{
				"render": function (data, type, row) {
					return row.phone;
				},
				"targets": 3,
			},
			{
				"render": function (data, type, row) {
					return row.cpf_cnpj;
				},
				"targets": 4,
			},
			{
				"render": function (data, type, row) {
					return row.type;
				},
				"targets": 5,
			},
			{
				"render": function (data, type, row) {
					return row.name_user;
				},
				"targets": 6,
			},
			{
				"render": function (data, type, row) {
					return `<button class="btn-floating btn-small blue" title="Editar" onclick="editClient('${row.id}')"><i class="large material-icons">mode_edit</i></button>
                        <button class="btn-floating btn-small waves-effect waves-light red" title="Apagar" onclick="deleteClient('${row.id}')"><i class="material-icons">delete_forever</i></button>`;
				},
				"targets": 7,
			},
		]
	});

    $('#form-client').submit(function(e){
		e.preventDefault();
        $('#form-client input').unmask();
		let fd = new FormData(this);

		$.ajax({
			type: "POST",
			url: base_url + "clientes/salvar",
			data: fd,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function(response)
			{ 
				if(response.status){
					swal('Sucesso!', response.data , 'success').then(function(){
                        $("#form-client")[0].reset();
                        $('#new-client-modal').modal('close');
						listClients.draw();
					});
					
				}else{
					swal('Erro', response.errors, 'error');
				}

                maskFieldsAdd();
			}
		});
	})

	$('#form-client-edit').submit(function(e){
		e.preventDefault();
        $('#form-client-edit input').unmask();
		let fd = new FormData(this);
		fd.append('client', currentClient);

		$.ajax({
			type: "POST",
			url: base_url + "clientes/editar",
			data: fd,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function(response)
			{ 
				if(response.status){
					swal('Sucesso!', response.data , 'success').then(function(){
                        $("#form-client-edit")[0].reset();
                        $('#edit-client-modal').modal('close');
						listClients.draw();
					});
					
				}else{
					swal('Erro', response.errors, 'error');
				}

                maskFieldsEdit();
			}
		});
	})
});

function maskFieldsAdd(){
        $('#client-phone').mask('(99) 9999-99999');
        maskCpf_cnpjAdd();
}

function maskCpf_cnpjAdd(){
    let type = $('#client-type').val();
        
    if(type == "" || type == 0 || type == null)
        $('#client-cpf_cnpj').mask('999.999.999-99');
    else
        $('#client-cpf_cnpj').mask('99.999.999/9999-99');
}

function maskFieldsEdit(){
	let phone = $('#client-phone-edit').unmask().val();
	$('#client-phone-edit').val(phone);

	$('#client-phone-edit').mask('(99) 9999-99999');
	maskCpf_cnpjEdit();
}

function maskCpf_cnpjEdit(){
	let cpf_cnpj = $('#client-cpf_cnpj-edit').unmask().val();
	$('#client-cpf_cnpj-edit').val(cpf_cnpj);

    let type = $('#client-type-edit').val();
        
    if(type == "" || type == 0 || type == null)
        $('#client-cpf_cnpj-edit').mask('999.999.999-99');
    else
        $('#client-cpf_cnpj-edit').mask('99.999.999/9999-99');

	
}


function editClient(id){
    $.ajax({
        type: "GET",
        url: base_url + "clientes/listar/" + id,
        dataType: "json",
        success: function(response)
        { 
            if(response.status){
                $("#form-client-edit")[0].reset();
                $('#client-cpf_cnpj-edit').val(response.data.cpf_cnpj);
                $('#client-name-edit').val(response.data.name);
                $('#client-email-edit').val(response.data.email);
                $('#client-phone-edit').val(response.data.phone);
                let $select = document.querySelector('#client-type-edit');
  				$select.value = response.data.type;
				currentClient = response.data.id;

                maskFieldsEdit();
                $('#edit-client-modal').modal('open');
            }
            else{
                swal('Erro', response.errors, 'error');
            }
           
        }
    });
}


function deleteClient(id){
    swal({
        title: "Atenção!",
        text: "Você tem certeza que deseja excluir o cliente?",
        icon: "warning",
        buttons: {
            cancel: {
                text: 'Não',
                value: false,
                visible: true,
                className: 'swal-button swal-button--cancel',
                
            },
            confirm: {
                text: 'Sim',
                value: true,
                visible: true,
                className: 'swal-button swal-button--confirm',

            }
        },
    }).then(result => {
        if(result){
            $.ajax({
                type:'POST',
                data: {cliente: id},
                url: base_url + 'clientes/deletar',
                dataType: "json",
                success:function(response){
                    if(response.status){
                        swal("Sucesso", "O cliente foi excluido com sucesso! ", "success");
                        listClients.draw();
                    }
                    else{
                        swal("Erro", "Não foi possível excluir o cliente", "error");
                    }
                }
            });
        }
        else{

        }
    })
}
