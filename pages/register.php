<?php require '../config/app.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="text-muted text-center"><i class="fa fa-user-plus"></i> Registro de información</h1>
			<hr>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="number" class="form-control" name="cedula" placeholder="cedula de identidad" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required style="text-transform: uppercase;">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Correo Electrónico" required>
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="telefono" placeholder="Número Telefónico" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Guardar </button>
					<button type="reset" class="btn btn-danger"> <i class="fa fa-sync-alt"></i> Limpiar </button>
					<a class="btn btn-dark" href="../index.php"> <i class="fas fa-hand-point-left"></i> Volver a Login</a>
				</div>
			</form>
				<?php
					if ($_POST){
						$cedula = $_POST['cedula'];
						$nombre= $_POST['nombre'];
						$email    = $_POST['email'];;
						$telefono  = $_POST['telefono'];
 						if (registrarUsuario($con, $cedula, $nombre, $email, $telefono)) {
							$_SESSION['type'] = 'success';
							$_SESSION['message'] = 'Usuario Adicionadó con Éxito! El administrador del sistema comprobará que sea líder del partido y activará su usuario. Verifique muy pronto.';
						}else{
							$_SESSION['type'] = 'danger';
							$_SESSION['message'] = 'El Usuario no se Pudo Adicionar!';
						}
						echo "<script> window.location.replace('../index.php'); </script>";
					}
				?>
			</div>
		</div>
	</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>