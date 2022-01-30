<div class="row">
	<div class="col s12 m8 l4 offset-m2 offset-l4">
		<div class="card" style="margin-top: 8%;">
			<div class="card-action white-text theme">
				<h3 style="text-align:center">Acesse sua conta</h3>
			</div>
			<div class="card-content">
				<form id="form-login">
					<div class="form-field">
						<i class="material-icons prefix">mail_outline</i>
						<label for="email">Email</label>
						<input type="text" id="login-email" name="login-email">
					</div><br>
					<div class="form-field">
						<i class="material-icons prefix">lock_outline</i>
						<label for="password">Senha</label>
						<input type="password" id="login-password" name="login-password">
					</div><br>
					<div class="form-field">
						<button class="btn-large waves-effect waves-dark theme" style="width:100%;">Login</button>
					</div><br>
					<div class="form-field">
						<p style="text-align: center;">
							<a href="<?= base_url('/usuarios/cadastrar')?>">Não tem um usuário? Cadastrar-se aqui!</a>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/scripts/login/login.js"></script>
