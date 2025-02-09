<?php require '../config/app.php'; ?>
<?php include '../config/security_admin.php'; ?>
<?php include '../config/bd.php'; ?>
<?php 
	if ($_GET) {
		$cedula  = $_GET['id'];
		if (eliminarUsuario($con, $cedula)) {
			$_SESSION['type']    = 'success';
			$_SESSION['message'] = 'El Usiario se eliminó con exito!';
		}else{
			$_SESSION['type']    = 'danger';
			$_SESSION['message'] = 'El Usiario no se eliminó!';
		}
		echo "<script> window.location.replace('lider.php'); </script>";
	}
?>

<?php $con = null; ?>