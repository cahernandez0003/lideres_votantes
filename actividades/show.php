<?php require '../config/app.php'; ?>
<?php include '../config/security_lider.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-justify">
			<h1 class="text-muted text-center"><i class="fa fa-search"></i> Consultar Actividad </h1>
			<hr>
			<nav arial-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><strong><a href="index.php" class="text-purple">Modulo Mis Actividades</a></strong></li>
					<li class="breadcrumb-item active"> Consultar Actividad </li>
				</ol>
			</nav>
			<?php $musu = mostrarActividad($con, $_GET['id']); ?>
			<table class="table table-striped table-hover">
			<?php foreach ($musu as $urow): ?>
				<tr>
					<th> Actividad: </th>
					<td><!-- <?php echo $urow['cedula'] ?> --></td>
				</tr>
				<tr>
					<th> Descripción: </th>
					<td><!-- <?php echo $urow['nombre'] ?> --></td>
				</tr>
				<tr>
					<th> Soporte: </th>
					<td>
					<!-- <img src="../<?php echo $urow['foto']; ?>" width="80px" data-img="<?php echo $urow['foto']; ?>" style="cursor: zoom-in"> --></td>
				</tr>
				<tr>
					<th> Observaciones: </th>
					<td><!-- <?php echo $urow['rol'] ?> --></td>
				</tr>
			</table>	
			<?php endforeach ?>
			
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
