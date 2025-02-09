<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../pages/administrator.php" class="text-purple">VOLVER</a>
                    </li>
                    <li class="breadcrumb-item active">Módulo de Líderes
                    </li>
                    <li class="breadcrumb-item">
						<a href="add.php" class="btn btn-outline-success" style="height: 35px;"><i class="fa fa-plus"></i> Nuevo Líder </a>
                    </li>
                </ol>
            </nav>
			<hr>
			
			 <table id="tableId" class="table stripe table-hover tablas" style="font-size: 11px;">
				<thead>
					<tr>
						<th> Cédula Identidad </th>
						<th> Nombre Completo </th>
						<th> Foto </th>
						<th> Correo Electrónico </th>
						<th> Teléfono </th>
						<th> Estado </th>
						<th> Fecha Inscripción </th>
						<th> Acciones </th>
					</tr>
				</thead>
				<tbody>
					<?php $lstu = listaUsuarios($con); ?>
					<?php foreach ($lstu as $urow): ?>
					<tr>
						<td style="text-transform: uppercase;"> <?php echo $urow['cedula']; ?> </td>
						<td style="text-transform: uppercase;"> <?php echo $urow['nombre']; ?> </td>
						<td style="text-transform: uppercase;"> <img src="../<?php echo $urow['foto']; ?>" width="50px"></td>
						<td style="text-transform: uppercase;"> <?php echo $urow['email']; ?></td>
						<td style="text-transform: uppercase;"> <?php echo $urow['telefono']; ?></td>
						<td style="text-transform: uppercase;"> 
							<form method="post">
								<input type="number" name="cedula" class="form-control" value="<?php echo $urow['cedula'] ?>" readonly style="display: none;">
								<select name="estado" class="form-control" required style="padding: 0;font-size: 12px;">
									<option value="">Seleccione el Estado...</option>
									<option value="Activo"<?php if($urow['estado']=="Activo") echo "selected";?> style="padding: 0;font-size: 11px;">Activo</option>
									<option value="Inactivo"<?php if($urow['estado']=="Inactivo") echo "selected";?> style="padding: 0;font-size: 12px;">Inactivo</option>
								</select>
								<div class="form-group">
									<button type="submit" class="" style="border-radius: 50%; border-style: none;"><i class="fas fa-check"></i>
									</button>
								</div>
							</form>
						</td>
						<td style="text-transform: uppercase;"> <?php echo $urow['fechaRegistro']; ?></td>
						<td style="text-transform: uppercase;">
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
					<?php 
						if ($_POST) {
							$cedula= $_POST['cedula'];
							$estado = $_POST['estado'];
							if (modificarEstado($con, $cedula, $estado)) {
								$_SESSION['message'] = 'Cambió estado de usuario.';
							}else{
								$_SESSION['type']    = 'danger';
								$_SESSION['message'] = 'No Cambió estado de usuario!';
							}
							echo "<script> window.location.replace('index.php'); </script>";
						}
					?>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>