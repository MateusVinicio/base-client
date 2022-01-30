<div class="header">
	<nav>
		<div class="nav-wrapper dark-theme">
			<a class="brand-logo" style="font-size: min(5vw, 36px)">Sistema de Clientes</a>
			<a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<?php if ($this->session->userdata('name')) : ?>
				<li><a><?="Usuário: " . $this->session->userdata('name')?></a></li>
				<?php endif ?>
				<li><a href="<?= base_url('/login/logout')?>" id="logout">Sair</a></li>
			</ul>
		</div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<?php if ($this->session->userdata('name')) : ?>
		<li><a><?="Usuário: " . $this->session->userdata('name')?></a></li>
		<?php endif ?>
		<li><a href="<?= base_url('/login/logout')?>" id="logout">Sair</a></li>
	</ul>
</div>

<script>
	$(".dropdown-trigger").dropdown();

	$(document).ready(function () {
		$('.sidenav').sidenav();
	});

</script>
