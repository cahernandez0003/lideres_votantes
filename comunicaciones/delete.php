<?php require '../config/app.php'; ?>
<?php include '../config/security_marks.php'; ?>
<?php include '../config/bd.php'; ?>
<?php 
	if ($_GET) {
		$id  = $_GET['id'];
		if (eliminarComunicacion($con, $id)) {
			$_SESSION['type']    = 'success';
			$_SESSION['message'] = 'El Comunicado se eliminó con exito!';
		}else{
			$_SESSION['type']    = 'danger';
			$_SESSION['message'] = 'El Comunicado no se eliminó!';
		}
		echo "<script> window.location.replace('../pages/lider.php'); </script>";
	}
?>

<?php $con = null; ?>