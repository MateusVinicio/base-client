<!DOCTYPE html>
<html>

<head>
	<title>Sistema de Clientes</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css')?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/geral.css')?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
	<script src="<?= base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
	<script type="text/javascript" src="https:////cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets/js/materialize.min.js')?>"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
	<script>
		base_url = '<?php echo base_url(); ?>';

	</script>
</head>

<body>
	<?php if(isset($header)) $this->load->view($header);?>
	<div class=geral>
		<?php $this->load->view($view);?>
	</div>
</body>

</html>
