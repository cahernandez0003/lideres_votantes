<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 text-center">
			<h1 class="text-muted"><i class="fa fa-edit"></i> Modificar Líder </h1>
			<hr>
			<nav arial-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><strong><a href="index.php" class="text-purple">Modulo Líderes</a></strong></li>
					<li class="breadcrumb-item active"> Modificar Líder </li>
				</ol>
			</nav>
			<?php $musu = mostrarUsuario($con, $_GET['id']); ?>
			<?php foreach ($musu as $urow): ?>
			<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-striped table-hover text-justify">
				<tr>
					<th> cedula: </th>
					<td><input type="number" name="cedula" class="form-control" value="<?php echo $urow['cedula'] ?>" readonly></td>
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
					<th> Correo Electrónico: </th>
					<td><input type="email" name="email" class="form-control" value="<?php echo $urow['email'] ?>" required></td>
				</tr>
				<tr>
					<th> Teléfono: </th>
					<td><input type="number" name="telefono" class="form-control" value="<?php echo $urow['telefono'] ?>" required></td>
				</tr>
				<tr>
					<th> Contraseña: </th>
					<td><input type="password" name="pass" class="form-control" value="<?php echo $urow['pass'] ?>" required></td>
				</tr>
				<tr>
					<th> Rol: </th>
					<td>
						<div class="form-group">
							<select name="rol" class="form-control">
								<option value="">Seleccione Rol:</option>
								<option value="Admin"<?php if($urow['rol']=="Admin") echo "selected";?>>Administrador</option>
								<option value="Lider"<?php if($urow['rol']=="Lider") echo "selected";?>>Líder</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<th> Estado:</th>
					<td>
						<div class="form-group">
							<select name="estado" class="form-control">
								<option value="">Seleccione estado:</option>
								<option value="Activo"<?php if($urow['estado']=="Activo") echo "selected";?>>Activo</option>
								<option value="Inactivo"<?php if($urow['estado']=="Inactivo") echo "selected";?>>Inactivo</option>
							</select>
						</div>
					</td>
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
					$pass = md5($_POST['pass']);
					$rol = $_POST['rol'];
					$estado = $_POST['estado'];
					if (modificarUsuario($con, $cedula, $nombre, $foto, $email, $telefono, $pass, $rol, $estado)) {
						$_SESSION['type']    = 'success';
						$_SESSION['message'] = 'El usuario se modificó con exito!';
						echo "<script> window.location.replace('index.php'); </script>";
					}else{
						$_SESSION['type']    = 'danger';
						$_SESSION['message'] = 'El usuario no se modificado!';
					}
				}
			?>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
