<?php
	if (isset($_SESSION['urol'])) {
		if($_SESSION['uestado'] == 'Inactivo'){
			echo "<script> alert('Aún estas inactivo') </script>";
		}else{
			if($_SESSION['urol'] == 'Lider') {
			echo "<script> window.location.replace('pages/lider.php'); </script>";
			} else if($_SESSION['urol'] == 'Admin') {
			echo "<script> window.location.replace('pages/administrator.php'); </script>";
			}
		}
	}