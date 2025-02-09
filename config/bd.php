<?php
	/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
	// Conectar Base de Datos
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	try {
		$con = new PDO("mysql:host=$host;dbname=$nmdb",$user,$pass);
		$con->exec('set names utf8');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Se ha conectado a la base de datos";
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
	/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
	// Login
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	function login($con, $email, $pass) {
		try {
			$sql = "SELECT * FROM usuarios WHERE email = :email AND pass = :pass LIMIT 1";
			$stm = $con->prepare($sql);
			$stm->bindparam(':email', $email);
			$stm->bindparam(':pass', $pass);
			$stm->execute();
			if($stm->rowCount() > 0) {
				$urow = $stm->fetch(PDO::FETCH_ASSOC);
				$_SESSION['ucedula'] = $urow['cedula'];
				$_SESSION['unombres']   = $urow['nombre'];
				$_SESSION['ufoto']      = $urow['foto'];
				$_SESSION['uestado']      = $urow['estado'];
				$_SESSION['urol']       = $urow['rol'];
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function listaDepartamentos($con){
		try {
			$sql = "SELECT * FROM departamentos";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	function listaMunicipios($con, $departamento){
		try {
			$sql = "SELECT * FROM municipios WHERE departamento_id = $departamento";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function listaUsuarios($con){
		try {
			$sql = "SELECT * FROM usuarios";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	function adicionarUsuario($con, $cedula, $nombre, $foto, $email, $telefono, $pass, $rol, $estado){
		try {
			$sql = "INSERT INTO usuarios(cedula, nombre, foto, email, telefono, pass, rol, estado) VALUES (:cedula, :nombre, :foto, :email, :telefono, :pass, :rol, :estado)";
			$stm = $con->prepare($sql);
			$stm->bindparam(":cedula", $cedula);
			$stm->bindparam(":nombre", $nombre);
			$stm->bindparam(":foto", $foto);
			$stm->bindparam(":email", $email);
			$stm->bindparam(":telefono", $telefono);
			$stm->bindparam(":pass", $pass);
			$stm->bindparam(":rol", $rol);
			$stm->bindparam(":estado", $estado);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function registrarUsuario($con, $cedula, $nombre, $email, $telefono){
		try {
			$sql = "INSERT INTO usuarios(cedula, nombre, email, telefono) VALUES (:cedula, :nombre, :email, :telefono)";
			$stm = $con->prepare($sql);
			$stm->bindparam(":cedula", $cedula);
			$stm->bindparam(":nombre", $nombre);
			$stm->bindparam(":email", $email);
			$stm->bindparam(":telefono", $telefono);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function eliminarUsuario($con, $cedula){
		try {
			$sql = "DELETE FROM usuarios WHERE cedula = :cedula";
			$stm = $con->prepare($sql);
			$stm->bindparam(":cedula", $cedula);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		}catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function mostrarUsuario($con, $cedula){
		try {
			$sql = "SELECT * FROM usuarios WHERE cedula = :cedula";
			$stm = $con->prepare($sql);
			$stm->bindparam(":cedula", $cedula);
			$stm->execute();

			return $stm->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function modificarUsuario($con, $cedula, $nombre, $foto, $email, $telefono, $pass, $rol, $estado){
		try {

			if($foto==null){
				$sql = "UPDATE usuarios SET  nombre = :nombre, email = :email, telefono = :telefono, pass = :pass, rol= :rol, estado= :estado WHERE cedula = :cedula";
				$stm = $con->prepare($sql);
				$stm->bindparam(":cedula", $cedula);
				$stm->bindparam(":nombre", $nombre);
				$stm->bindparam(":email", $email);
				$stm->bindparam(":telefono", $telefono);
				$stm->bindparam(":pass", $pass);
				$stm->bindparam(":rol", $rol);
				$stm->bindparam(":estado", $estado);
			}else{
				$sql = "UPDATE usuarios SET nombre = :nombre, foto = :foto, email = :email, telefono = :telefono, pass = :pass, rol= :rol, estado= :estado WHERE cedula = :cedula";
				$stm = $con->prepare($sql);
				$stm->bindparam(":cedula", $cedula);
				$stm->bindparam(":nombre", $nombre);
				$stm->bindparam(":foto", $foto);
				$stm->bindparam(":email", $email);
				$stm->bindparam(":telefono", $telefono);
				$stm->bindparam(":pass", $pass);
				$stm->bindparam(":rol", $rol);
				$stm->bindparam(":estado", $estado);
			}
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	function modificarEstado($con, $cedula, $estado){
		try {
			$sql = "UPDATE usuarios SET estado = :estado WHERE cedula = :cedula";
			$stm = $con->prepare($sql);
			$stm->bindparam(":cedula", $cedula);
			$stm->bindparam(":estado", $estado);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}



	function modificarDatosLider($con, $cedula, $nombre, $foto, $email, $telefono){
		try {

			if($foto==null){
				$sql = "UPDATE usuarios SET  nombre = :nombre, email = :email, telefono = :telefono WHERE cedula = :cedula";
				$stm = $con->prepare($sql);
				$stm->bindparam(":cedula", $cedula);
				$stm->bindparam(":nombre", $nombre);
				$stm->bindparam(":email", $email);
				$stm->bindparam(":telefono", $telefono);
			}else{
				$sql = "UPDATE usuarios SET nombre = :nombre, foto = :foto, email = :email, telefono = :telefono WHERE cedula = :cedula";
				$stm = $con->prepare($sql);
				$stm->bindparam(":cedula", $cedula);
				$stm->bindparam(":nombre", $nombre);
				$stm->bindparam(":foto", $foto);
				$stm->bindparam(":email", $email);
				$stm->bindparam(":telefono", $telefono);
			}

			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
 //*votantes*//
	// esta función está establecida unicamente para lideres [[[me sirve como ejemplo para mirar lo de cada usuario logueado]]]

	function listaVotantes($con){
		try {
			$cedulaLogueado = $_SESSION['ucedula'];
			$sql = "SELECT * FROM votantes WHERE usuario_id= $cedulaLogueado;";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
		// esta función está establecida para admin

	function listaVotantesAdmin($con){
		try {
			$sql = "SELECT * FROM votantes";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function adicionarVotante($con, $usuario_id, $cedula, $nombres, $apellidos, $direccion, $telefono, $celular, $correo, $genero, $departamento, $municipio, $zona, $tipoZona, $barrio, $ocupacion, $condicionEspecial, $discapacidad, $tipoDiscapacidad, $rangoEdades){
		try {
			$sql = "INSERT INTO votantes(usuario_id, cedula, nombres, apellidos, direccion, telefono, celular, correo, genero, departamento, municipio, zona, tipoZona, barrio, ocupacion, condicionEspecial, discapacidad, tipoDiscapacidad, rangoEdades) VALUES (:usuario_id, :cedula, :nombres, :apellidos, :direccion, :telefono, :celular, :correo, :genero, :departamento, :municipio, :zona, :tipoZona, :barrio, :ocupacion, :condicionEspecial, :discapacidad, :tipoDiscapacidad, :rangoEdades)";
			$stm = $con->prepare($sql);
			$stm->bindparam(":usuario_id", $usuario_id);
			$stm->bindparam(":cedula", $cedula);
			$stm->bindparam(":nombres", $nombres);
			$stm->bindparam(":apellidos", $apellidos);
			$stm->bindparam(":direccion", $direccion);
			$stm->bindparam(":telefono", $telefono);
			$stm->bindparam(":celular", $celular);
			$stm->bindparam(":correo", $correo);
			$stm->bindparam(":genero", $genero);
			$stm->bindparam(":departamento", $departamento);
			$stm->bindparam(":municipio", $municipio);
			$stm->bindparam(":zona", $zona);
			$stm->bindparam(":tipoZona", $tipoZona);
			$stm->bindparam(":barrio", $barrio);
			$stm->bindparam(":ocupacion", $ocupacion);
			$stm->bindparam(":condicionEspecial", $condicionEspecial);
			$stm->bindparam(":discapacidad", $discapacidad);
			$stm->bindparam(":tipoDiscapacidad", $tipoDiscapacidad);
			$stm->bindparam(":rangoEdades", $rangoEdades);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	function eliminarVotante($con, $cedula){
		try {
			$sql = "DELETE FROM votantes WHERE cedula = :cedula";
			$stm = $con->prepare($sql);
			$stm->bindparam(":cedula", $cedula);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		}catch (Exception $e) {
			echo $e->getMessage();
		}
	}


//*comunicados*//
	function listaComunicados($con){
		try {
			$sql = "SELECT * FROM comunicaciones";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	function adicionarComunicacion($con, $tipo, $usuario_id, $mensaje){
		try {
			$sql = "INSERT INTO comunicaciones(tipo, usuario_id, mensaje) VALUES (:tipo, :usuario_id, :mensaje)";
			$stm = $con->prepare($sql);
			$stm->bindparam(":tipo", $tipo);
			$stm->bindparam(":usuario_id", $usuario_id);
			$stm->bindparam(":mensaje", $mensaje);
			// $stm->bindparam(":fechaCreacion", $fechaCreacion);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	function eliminarComunicacion($con, $id){
		try {
			$sql = "DELETE FROM comunicaciones WHERE id = :id";
			$stm = $con->prepare($sql);
			$stm->bindparam(":id", $id);
			if($stm->execute()){
				return true;
			}else{
				return false;
			}
		}catch (Exception $e) {
			echo $e->getMessage();
		}
	}
 //* actividades

	function listaActividades($con){
		try {
			$sql = "SELECT * FROM actividades_lideres";
			$stn = $con->prepare($sql);
			$stn->execute();

			return $stn->fetchAll();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
?>
