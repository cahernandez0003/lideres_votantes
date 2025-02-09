<?php require '../config/app.php'; ?>
<?php include '../config/security_marks.php'; ?>
<?php include '../config/bd.php'; ?>
<?php 
	if ($_GET) {
		$cedula  = $_GET['id'];
		if (eliminarVotante($con, $cedula)) {
			$_SESSION['type']    = 'success';
			$_SESSION['message'] = 'El votante se eliminó con exito!';
		}else{
			$_SESSION['type']    = 'danger';
			$_SESSION['message'] = 'El votante no se eliminó!';
		}
		echo "<script> window.location.replace('index.php'); </script>";
	}
?>

<?php $con = null; ?>