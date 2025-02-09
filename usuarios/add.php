<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-muted text-center"><i class="fa fa-user-plus"></i> Adicionar Líder</h1>
			<hr>
			<nav arial-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><strong><a href="index.php" class="text-purple"> Modulo Líderes </a></strong></li>
					<li class="breadcrumb-item active">Adicionar Líder</li>
				</ol>
			</nav>
			<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="number" class="form-control" name="cedula" placeholder="cedula de ciudadanía" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
					</div>
					<div class="form-group">
						<input type="file" class="form-control" name="foto" accept="image/*">
						<button class="btn btn-default btn-foto"><i class="fa fa-user"></i>Seleccione Foto de Perfil</button>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Correo Electrónico" required>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="telefono" placeholder="Número Telefónico" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
					</div>
					<div class="form-group">
						<select name="rol" class="form-control" required>
							<option value="">Seleccione el Rol...</option>
							<option value="Admin">Administrador</option>
							<option value="Lider">Líder</option>
						</select>
					</div>
					<div class="form-group">
						<select name="estado" class="form-control" required>
							<option value="">Seleccione el Estado...</option>
							<option value="Activo">Activo</option>
							<option value="Inactivo">Inactivo</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Guardar </button>
						<button type="reset" class="btn btn-danger"> <i class="fa fa-sync-alt"></i> Limpiar </button>
					</div>
				</form>
				<?php
					if ($_POST){
						$cedula = $_POST['cedula'];
						$nombre= $_POST['nombre'];
						$url= 'public/imgs/fotos/';
						$foto= $url.$_FILES['foto']['name'];
						move_uploaded_file($_FILES['foto']['tmp_name'], '../'.$url.$_FILES['foto']['name']);
						$rol    = $_POST['rol'];
						$email    = $_POST['email'];
						$telefono  = $_POST['telefono'];
						$pass     = md5($_POST['pass']);
						$rol    = $_POST['rol'];
						$estado    = $_POST['estado'];
 						if (adicionarUsuario($con, $cedula, $nombre, $foto, $email, $telefono, $pass, $rol, $estado)) {
							$_SESSION['type'] = 'success';
							$_SESSION['message'] = 'Usuario Adicionado con Éxito!';
						}else{
							$_SESSION['type'] = 'danger';
							$_SESSION['message'] = 'El Usuario no se Pudo Adicionar!';
						}
						//echo "<script> window.location.replace('index.php') </script>";
					}
				?>
			</div>
		</div>
	</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>