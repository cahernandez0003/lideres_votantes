<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-muted text-center"><i class="fa fa-user"></i> Modulo Líderes </h1>
			<hr>
			<a href="add.php" class="btn btn-outline-success"><i class="fa fa-plus"></i> Nuevo Líder </a>
			<hr>
			<table class="table table-striped table-hover col-md-12" style="font-size: 14px;">
				<thead class="bg-purple">
					<tr>
						<th style="width: auto;"> Cédula Identidad </th>
						<th style="width: auto;"> Nombre Completo </th>
						<th style="width: auto;"> Foto </th>
						<th style="width: auto;"> Correo Electrónico </th>
						<th style="width: auto;"> Teléfono </th>
						<th style="width: auto;"> Estado </th>
						<th style="width: auto;"> Fecha Inscripción </th>
						<th style="width: auto;"> Acciones </th>
					</tr>
				</thead>
				<tbody>
					<?php $lstu = listaUsuarios($con); ?>
					<?php foreach ($lstu as $urow): ?>
						<tr>
							<td> <?php echo $urow['cedula']; ?> </td>
							<td> <?php echo $urow['nombre']; ?> </td>
							<td> <img src="../<?php echo $urow['foto']; ?>" width="50px"></td>
							<td> <?php echo $urow['email']; ?></td>
							<td> <?php echo $urow['telefono']; ?></td>
							<td> <?php echo $urow['estado']; ?></td>
							<td> <?php echo $urow['fechaRegistro']; ?></td>
							<td>
								<a href="show.php?id=<?php echo $urow['cedula']; ?>" class="btn btn-outline-success">
									<i class="fa fa-search"></i>
								</a>
								<a href="edit.php?id=<?php echo $urow['cedula']; ?>" class="btn btn-outline-success">
									<i class="fa fa-edit"></i>
								</a>
								<a href="javascript:;" class="btn btn-outline-danger btn-delete" data-id="<?php echo $urow['cedula'];?>">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>