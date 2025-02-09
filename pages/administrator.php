<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-center">
		
			<h1 class="text-muted"> Bienvenido Administrador </h1>
			<hr>
			<div class="btn-group-lg">
				<a href="../usuarios/" class="btn btn-outline-success btn-lg">
					<i class="fa fa-users"></i>
					Modulo Líderes</a>
				<a href="../votantes/" class="btn btn-outline-success btn-lg">
					<i class="fa fa-users"></i>
					Modulo Votantes</a>
			</div>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
