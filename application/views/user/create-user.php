<div class="row">
	<div class="col s12 m8 l4 offset-m2 offset-l4">
		<div class="card" style="margin-top: 20%;">
			<div class="card-content">
				<form id="form-user">
					<div class="form-field">
						<i class="material-icons prefix">person_pin</i>
						<label for="name">Nome</label>
						<input type="text" id="user-name" name="user-name">
					</div><br>
					<div class="form-field">
						<i class="material-icons prefix">mail_outline</i>
						<label for="username">Email</label>
						<input type="text" id="user-email" name="user-email">
					</div><br>
					<div class="form-field">
						<i class="material-icons prefix">lock_outline</i>
						<label for="password">Senha</label>
						<input type="password" id="user-password" name="user-password">
					</div><br>
					<div class="form-field" style="text-align:center;">
						<button class="btn-small waves-effect waves-dark red" id="back-login"
							style="width:30%; margin-right: 10%">Voltar</button>
						<button type="submit" class="btn-small waves-effect waves-dark green"
							style="width:30%; margin-left: 10%">Cadastrar</button>
					</div><br>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/scripts/user/user.js"></script>
