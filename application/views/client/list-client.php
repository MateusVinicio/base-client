<div class="row">
	<div class="col s12">
		<button data-target="new-client-modal" class="btn modal-trigger">Novo Cliente</button>
	</div>
</div>
<div class="row" style="margin-top: 1%">
	<div class="col s12">
		<table id="list-clients" class="centered striped highlight responsive-table" style="width:100%">
			<thead>
				<tr>
					<th>#Cliente</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th>CPF/CNPJ</th>
					<th>Tipo</th>
					<th>Responsável</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
		</table>
	</div>
</div>

<div id="new-client-modal" class="modal">
	<div class="modal-content">
		<h4>Cadastrar Cliente</h4>
		<div class="card" style="margin-top: 2%;">
			<div class="card-content">
				<div class="row">
					<form id="form-client" class="col s12">
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person_pin</i>
								<label for="name">Nome</label>
								<input type="text" id="client-name" name="client-name">
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">mail_outline</i>
								<label for="username">Email</label>
								<input type="text" id="client-email" name="client-email">
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m3">
								<i class="material-icons prefix">local_phone</i>
								<label for="name">Telefone</label>
								<input type="text" id="client-phone" name="client-phone">
							</div>
							<div class="input-field col s12 m4">
								<i class="material-icons prefix">supervisor_account</i>
								<select id="client-type" name="client-type">
									<option value="" disabled selected>Tipo</option>
									<option value="0">Física</option>
									<option value="1">Jurídica</option>
								</select>
								<label for="username">Tipo</label>
							</div>
                            <div class="input-field col s12 m5">
								<i class="material-icons prefix">subtitles</i>
								<label for="username">CPF/CNPJ</label>
								<input type="text" id="client-cpf_cnpj" name="client-cpf_cnpj">
							</div>
						</div>
						<div class="row">
							<div class="form-field" style="text-align:center;">
								<button type="submit" class="btn-small waves-effect waves-dark green" style="width:30%;">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a class="modal-close waves-effect waves-green btn-flat">Fechar</a>
	</div>
</div>

<div id="edit-client-modal" class="modal">
	<div class="modal-content">
		<h4>Editar Cliente</h4>
		<div class="card" style="margin-top: 2%;">
			<div class="card-content">
				<div class="row">
					<form id="form-client-edit" class="col s12">
						<div class="row">
							<div class="form-field col s12 m6">
								<i class="material-icons prefix">person_pin</i>
								<label for="name">Nome</label>
								<input type="text" id="client-name-edit" name="client-name">
							</div>
							<div class="form-field col s12 m6">
								<i class="material-icons prefix">mail_outline</i>
								<label for="username">Email</label>
								<input type="text" id="client-email-edit" name="client-email">
							</div>
						</div>
						<div class="row">
							<div class="form-field col s12 m3">
								<i class="material-icons prefix">local_phone</i>
								<label for="name">Telefone</label>
								<input type="text" id="client-phone-edit" name="client-phone">
							</div>
							<div class="form-field col s12 m4">
								<i class="material-icons prefix">supervisor_account</i>
                                <label for="type">Tipo</label>
								<select id="client-type-edit" name="client-type">
									<option value="" disabled selected>Selecionar</option>
									<option value="0">Física</option>
									<option value="1">Jurídica</option>
								</select>
							</div>
                            <div class="form-field col s12 m5">
								<i class="material-icons prefix">subtitles</i>
								<label for="username">CPF/CNPJ</label>
								<input type="text" id="client-cpf_cnpj-edit" name="client-cpf_cnpj">
							</div>
						</div>
						<div class="row">
							<div class="form-field" style="text-align:center;">
								<button type="submit" class="btn-small waves-effect waves-dark green" style="width:30%;">Editar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<a class="modal-close waves-effect waves-green btn-flat">Fechar</a>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/scripts/client/client.js"></script>
