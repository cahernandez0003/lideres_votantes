<?php
	session_start();

	unset($_SESSION['ucedula']);
	unset($_SESSION['unombres']);
	unset($_SESSION['ufoto']);
	unset($_SESSION['urol']);
	unset($_SESSION['type']);
	unset($_SESSION['message']);

	session_destroy();
	echo "<script> window.location.replace('../'); </script>";