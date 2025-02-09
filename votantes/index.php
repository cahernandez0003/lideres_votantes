<?php require '../config/app.php'; ?>
<?php include '../config/security_marks.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<?php $form_path='../Docs form reg votantes/form_registro_votantes_files/formoid1/form.php'; require_once $form_path; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 pre-scrollable" style="margin-bottom: 20px">
			<h4 class="text-muted text-center"><i class="fa fa-user"></i> Modulo Potencial Electoral </h4>
			<hr>
			<table id="tableId" class="table stripe table-hover tablas" style="font-size: 11px;">
				<thead>
					<tr>
						<th> Cédula de ciudadanía </th>
						<th> Nombres y Apellidos</th>
						<th> Teléfono </th>
						<th> Correo Electrónico </th>
						<th> Género </th>
						<th> Municipio </th>
						<th> Zona </th>
						<th> Tipo de Zona </th>
						<th> Barrio </th>
						<th> Condición Especial </th>
						<th> Rango de edades </th>
						<th> Acciones </th>
					</tr>
				</thead>
				<tbody>
					<?php if ($_SESSION['urol'] == 'Admin'): ?>
						<?php $lvoto = listaVotantesAdmin($con); ?>
					<?php endif ?>
					<?php if ($_SESSION['urol'] == 'Lider'): ?>
						<?php $lvoto = listaVotantes($con); ?>
					<?php endif ?>
					<?php foreach ($lvoto as $urow): ?>
						<tr>
							<td> <?php echo $urow['cedula']; ?> </td>
							<td> <?php echo $urow['nombres']." ".$urow['apellidos']; ?> </td>
							<td> <?php echo $urow['telefono']." / ".$urow['celular']; ?></td>
							<td> <?php echo $urow['correo']; ?></td>
							<td> <?php echo $urow['genero']; ?></td>
							<td> <?php echo $urow['municipio']; ?></td>
							<td> <?php echo $urow['zona']; ?></td>
							<td> <?php echo $urow['tipoZona']; ?></td>
							<td> <?php echo $urow['barrio']; ?></td>
							<td> <?php echo $urow['condicionEspecial']; ?></td>
							<td> <?php echo $urow['rangoEdades']; ?></td>
							<td style="display: inline-grid;">
								<a href="show.php?id=<?php echo $urow['cedula']; ?>" class="btn btn-outline-success" style="transform: scale(0.6);">
									<i class="fa fa-search"></i>
								</a>
								<a href="edit.php?id=<?php echo $urow['cedula']; ?>" class="btn btn-outline-success" style="transform: scale(0.6);">
									<i class="fa fa-edit"></i>
								</a>
								<a href="javascript:;" class="btn btn-outline-danger btn-delete" data-id="<?php echo $urow['cedula'];?>" style="transform: scale(0.6);">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<hr>
		<form class="formoid-solid-blue" enctype="multipart/form-data" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color: black;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Registrar Votante</h2></div>
			<div style="display: none;"> Líder
				<input type="text" name="usuario_id" value="<?php echo $_SESSION['ucedula'] ?>">
			</div>

			<div class="element-input" title="Solo Puede ser la cédula"><label class="title">Cédula de ciudadanía<span class="required">*</span></label><div class="item-cont"><input class="large" type="number" name="cedula" required><span class="icon-place"></span></div></div>
		
			<div class="element-input"><label class="title">Nombres</label><div class="item-cont"><input class="large" type="text" name="nombres" required><span class="icon-place"></span></div></div>
		
			<div class="element-input"><label class="title">Apellidos</label><div class="item-cont"><input class="large" type="text" name="apellidos" required><span class="icon-place"></span></div></div>
		
			<div class="element-input"><label class="title">Dirección</label><div class="item-cont"><input class="large" type="text" name="direccion" required><span class="icon-place"></span></div></div>
			
			<div class="element-input"><label class="title">Teléfono</label><div class="item-cont"><input class="large" type="number" name="telefono" required><span class="icon-place"></span></div></div>

			<div class="element-input"><label class="title">Celular</label><div class="item-cont"><input class="large" type="number" name="celular" required><span class="icon-place"></span></div></div>			
			
			<div class="element-input"><label class="title">Correo Electrónico</label><div class="item-cont"><input class="large" type="text" name="correo" required><span class="icon-place"></span></div></div>

			<div class=""><label class="title">Género</label><div class="item-cont"><div class="large"><span>
				<select name="genero" required>
					<option value="">Seleccione el Genero...</option>
					<option value="Femenino">Femenino</option>
					<option value="Masculino">Masculino</option>
				</select>
			<i></i><span class="icon-place"></span></span></div></div></div>

			<div class=""><label class="title">Rango edades</label><div class="item-cont"><div class="large"><span>
				<select name="rangoEdades">
					<option value="">Seleccione rango de edad</option>
					<option value="18-25">Entre 18 y 25 años</option>
					<option value="26-35">Entre 26 y 35 años</option>
					<option value="36-45">Entre 36 y 45 años</option>
					<option value="46-55">Entre 46 y 55 años</option>
					<option value="56-100">Desde 56</option>
				</select>
				<i></i><span class="icon-place"></span></span></div></div></div>

			<div class=""><label class="title">Ocupación</label><div class="item-cont"><div class="large"><span><select name="ocupacion">
					<option value="">Seleccione ocupaciòn</option>
					<option value="empleado">Empleado</option>
					<option value="independiente">Independiente</option>
				</select>
			<i></i><span class="icon-place"></span></span></div></div></div>

			<div class=""><label class="title">Departamento</label><div class="item-cont"><div class="large"><span>
				<select name="departamento" required id="departamentosLista">
					<option value="">Seleccione el Departamento...</option>
					<?php $deps=listaDepartamentos($con); ?>
					<?php foreach ($deps as $dep): ?>
						<option value="<?php echo $dep['id_departamento'] ?>">
						<?php echo $dep['departamento'] ?></option>
					<?php endforeach ?>
				</select>
				<!-- <select name="departamento">
					<option value="">Seleccione Departamento</option>
					<option value="CALDAS">Caldas</option>
				</select>
			<i></i><span class="icon-place"></span></span></div></div></div>

			<div class=""><label class="title">Municipio</label><div class="item-cont"><div class="large"><span>
				<select name="municipio">
					<option value="">Seleccione Municipio...</option>
					<option value="Pensilvania">Pensilvania</option>
				</select>
			<i></i><span class="icon-place"></span></span></div></div></div> -->
			<select name="municipios">
			<div class="col-auto" style="flex: none; width: calc((100% - 30px)/3); height:50px; display: flex; padding: 10px;" id="municipios">
			</div>
		</select>

			<div class=""><label class="title">Zona</label><div class="item-cont"><div class="large"><span><select name="zona" required onchange="zonaChange(this);">
								<option value="">Seleccione Zona</option>
								<option value="Rural">Rural</option>
								<option value="Urbana">Urbana</option>
							</select>
							<i></i><span class="icon-place"></span></span></div></div></div>

			<div class=""><label class="title">Tipo de Zona</label><div class="item-cont"><div class="large"><span>
				<select name="tipoZona" id="tipoZona" required>
							</select>
						<i></i><span class="icon-place"></span></span></div></div></div>

			
			<div class="element-input"><label class="title">Barrio</label><div class="item-cont"><input class="large" type="text" name="barrio" required><span class="icon-place"></span></div></div>
		

			<div class=""><label class="title">Condición Especial</label><div class="item-cont"><div class="large"><span><select name="condicionEspecial" required>
								<option value="">Seleccione Condición</option>
								<option value="mamasoltera">Madre soltera</option>
								<option value="desplazado">Desplazado</option>
								<option value="victima">Víctima</option>
								<option value="resguardo">Resguardos</option>
								<option value="afro">Afrodescendiente</option>
								<option value="desmovilizado">Desmovilizado</option>
								<option value="reinsertado">Reinsertado</option>
								<option value="no">No</option>
							</select><i></i><span class="icon-place"></span></span></div></div></div>

			<div class=""><label class="title">Discapacidad</label><div class="item-cont"><div class="large"><span><select name="discapacidad" id="discapacidad" required>
								<option value="">Tiene discapacidad?</option>
								<option value="si">Si</option>
								<option value="no">No</option>
							</select><i></i><span class="icon-place"></span></span></div></div></div>

			<div class="col-auto" style="flex: none; width: calc((100% - 30px)/3); height:50px; display: flex; padding: 10px;" id="tipoDiscapacidad"> <span>Tipo Discapacidad <input type="text" name="tipoDiscapacidad"></div>

			<!-- <div class="element-input" id="tipoDiscapacidad"><label class="title">Tipo Discapacidad</label><div class="item-cont"><input class="large" type="text" name="tipoDiscapacidad" required><span class="icon-place"></span></div></div>
		 -->

			<div class="col-auto" style="padding: 10px;"> Agregar Votante <button type="submit" class="btn btn-success" style="height: 30px; width: 80px; font-size: 10px;"> <i class="fa fa-save" style="font-size: 10px;"></i> Guardar </button></div>
	</form>
	</div>
			<?php
				if ($_POST){
					$usuario_id = $_POST['usuario_id'];
					$cedula = $_POST['cedula'];
					$nombres= $_POST['nombres'];
					$apellidos= $_POST['apellidos'];
					$direccion= $_POST['direccion'];
					$telefono  = $_POST['telefono'];
					$celular= $_POST['celular'];
					$correo= $_POST['correo'];
					$genero= $_POST['genero'];
					$departamento= $_POST['departamento'];
					$municipio= $_POST['municipio'];
					$zona= $_POST['zona'];
					$tipoZona= $_POST['tipoZona'];
					$barrio    = $_POST['barrio'];
					$ocupacion     = ($_POST['ocupacion']);
					$condicionEspecial    = $_POST['condicionEspecial'];
					$discapacidad    = $_POST['discapacidad'];
					$tipoDiscapacidad    = $_POST['tipoDiscapacidad'];
					$rangoEdades    = $_POST['rangoEdades'];
					if (adicionarVotante($con, $usuario_id, $cedula, $nombres, $apellidos, $direccion, $telefono, $celular, $correo, $genero, $departamento, $municipio, $zona, $tipoZona, $barrio, $ocupacion, $condicionEspecial, $discapacidad, $tipoDiscapacidad, $rangoEdades)) {
						$_SESSION['type'] = 'success';
						$_SESSION['message'] = 'Usuario Adicionado con Éxito!';
					}else{
						$_SESSION['type'] = 'danger';
						$_SESSION['message'] = 'El Usuario no se Pudo Adicionar!';
					}
					echo "<script> window.location.replace('index.php'); </script>";
				}
			?>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
