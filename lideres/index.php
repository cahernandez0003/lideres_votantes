<?php require '../config/app.php'; ?>
<?php include '../config/security_marks.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-center">
			<h1 class="text-muted"><i class="fa fa-edit"></i> Mis Datos </h1>
			<hr>
			<?php $musu = mostrarUsuario($con, $_SESSION['ucedula']); ?>
			<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-striped table-hover text-justify">
			<?php foreach ($musu as $urow): ?>
				<tr>
					<th> cedula: </th>
					<td><input type="number" readonly name="cedula" class="form-control" value="<?php echo $urow['cedula'] ?>"></td>
				</tr>
				<tr>
					<th> Nombres y Apellidos: </th>
					<td><input type="text" name="nombre" class="form-control" value="<?php echo $urow['nombre'] ?>" required></td>
				</tr>
				<tr style="padding: 0;">
					<th> Foto Perfil: </th>
					<td>
						<img src="../<?php echo $urow['foto']; ?>" width="100px" data-img="<?php echo $urow['foto']; ?>" style="cursor: zoom-in">
					</td>
				</tr>
				<tr>
					<th> Foto: </th>
					<td>
						<input type="file" class="form-control" name="foto" accept="image/*">
						<button class="btn btn-default btn-foto"><i class="fa fa-user"></i>Seleccione Foto de Perfil</button>
						<input type="hidden" name="url_foto" value="<?php echo $urow['foto'] ?>">
					</td>
				</tr>
				<tr>
					<th> email Electrónico: </th>
					<td><input type="email" name="email" class="form-control" value="<?php echo $urow['email'] ?>" required></td>
				</tr>
				<tr>
					<th> Teléfono: </th>
					<td><input type="number" name="telefono" class="form-control" value="<?php echo $urow['telefono'] ?>" required></td>
				</tr>
			</table>
			<div class="form-group">
				<button type="submit" class="btn btn-outline-success">
					<i class="fa fa-save"></i> Modificar
				</button>
			</div>
			</form>
			<?php endforeach ?>
			<?php 
				if ($_POST) {
					$cedula = $_POST['cedula'];
					$nombre = $_POST['nombre'];
					if ($_FILES['foto']['tmp_name']) {
						$url= 'public/imgs/fotos/';
						$foto= $url.$_FILES['foto']['name'];
						if($_POST['url_foto']!='public/imgs/fotos/nofoto.png'){
							unlink('../'.$_POST['url_foto']);
						}
						move_uploaded_file($_FILES['foto']['tmp_name'], '../'.$url.$_FILES['foto']['name']);
					}else{
						$foto=null;
					}
					$email = $_POST['email'];
					$telefono = $_POST['telefono'];
					if (modificarDatosLider($con, $cedula, $nombre, $foto, $email, $telefono)) {
						$_SESSION['type']    = 'success';
						$_SESSION['message'] = 'Tus datos se modificaron con exito!';
					}else{
						$_SESSION['type']    = 'danger';
						$_SESSION['message'] = 'Tus datos no se modificaron!';
					}
				}
			?>

		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
