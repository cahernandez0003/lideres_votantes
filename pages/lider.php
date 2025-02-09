<?php require '../config/app.php'; ?>
<?php include '../config/security_lider.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<input style="display: none;" type="text" value="<?php echo $_SESSION['ucedula'] ?>">
<div class="container">
	<div class="row" style="margin-top: -45px;">
		<div class="col-md-12 text-center">
			<h2 class="text-muted"><i class="fas fa-male"></i> Bienvenido Apreciado Líder </h2>
			<h4 class="text-muted">Su gestión es el principal aporte para nosotros. <br>Gracias por hacer parte de esta causa.</h4>
			<br>
			<p class="lead">
				El usuario lider puede gestionar las siguientes tablas:
			</p>
			<div class="container col-md-10" style="display: flex; align-items: center;justify-content: center; margin-top: -80px;">
				<style>
					.card:hover{
						transform: scale(1.3);
						transition: 0.3s; 
					}
				</style>
				<div class="card border-gray" style="width: 135px; padding: 0; height: 200px; box-shadow: 8px 8px 8px gray;">
				  <div class="card-header border-dark" style="background-color: #C10000; height: 50px; font-size: 16px; padding: 0; color: white;"><strong>MIS DATOS</strong></div>
				  <a href="../lideres/" class="card-body text-success border-dark" style="width: 100px; height: 190px; background: url(../public/imgs/misdatos.png); background-repeat: no-repeat;background-size: 100%; margin-left: 10px;margin-left: auto; margin-right: auto">
				  </a>
				  <a href="../lideres/" class="card-footer bg-transparent border-dark">Ir...</a>
				</div>
				<div class="card border-gray" style="width: 135px; padding: 0; margin: 50px; height: 200px; box-shadow: 8px 8px 8px gray;">
				  <div class="card-header border-dark" style="background-color: #C10000; height: 50px; font-size: 16px; padding: 0; color: white;"><strong>ACTIVIDADES</strong></div>
				  <a href="#" class="card-body text-success border-dark" style="width: 100px; height: 190px; background: url(../public/images/actividades.jpg); background-repeat: no-repeat;background-size: 100%; margin-left: auto; margin-right: auto">
				  </a>
				  <a href="#/" class="card-footer bg-transparent border-dark">Ir...</a>
				</div>
				<div class="card border-gray" style="width: 135px; padding: 0; height: 200px; box-shadow: 8px 8px 8px gray;">
				  <div class="card-header border-dark" style="background-color: #C10000; height: 50px; font-size: 16px; padding: 0; color: white;"><strong>VOTANTES</strong></div>
				  <a href="../votantes/" class="card-body text-success border-dark" style="width: 133px; height: 190px; background: url(../public/imgs/votantes.png); background-repeat: no-repeat; background-size: 100% 110%; margin-left: auto; margin-right: auto">
				  </a>
				  <a href="../votantes/" class="card-footer bg-transparent border-dark">Ir...</a>
				</div>
				<div class="card border-gray" style="width: 135px; padding: 0; margin: 50px;height: 200px; box-shadow: 8px 8px 8px gray;">
				  <div class="card-header border-dark" style="background-color: #C10000; height: 50px; font-size: 16px; padding: 0; color: white;"><strong>COMUNICADO</strong></div>
				  <a href="../#/" class="card-body text-success border-dark" style="width: 133px; height: 190px; background: url(../public/imgs/video.png); background-repeat: no-repeat; background-size: 100% 110%; margin-left: auto; margin-right: auto">
				  </a>
				  <a href="../#/" class="card-footer bg-transparent border-dark">Ir...</a>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="col-md-12 text-center">
		<h4 class="text-center text-muted">Comunicacate con el candidato (diseño a consideración del cliente)</h4>
		<table id="tableId" class="table stripe table-hover tablas" style="font-size: 11px;">
			<thead>
				<tr>
					<th> Tipo Comunicación </th>
					<th> Comunicación de </th>
					<th> Contenido </th>
					<th> Fecha </th>
					<th> Eliminar </th>
				</tr>
			</thead>
			<tbody>
				<?php $lscom = listaComunicados($con); ?>
				<?php foreach ($lscom as $comu): ?>
				<tr>
					<td> <?php echo $comu['tipo']; ?> </td>
					<td> <input type="text" name="usuario_id" value="<?php echo $_SESSION['ucedula'] ?>" readonly></td>
					<td> <?php echo $comu['mensaje']; ?></td>
					<td> <?php echo $comu['fechaCreacion']; ?></td>
					<td style="display: inline-grid;">
						<a href="javascript:;" class="btn btn-outline-danger btn-delete" data-id="<?php echo $comu['id'];?>">
							<i class="fa fa-trash"></i>
						</a>
					</td>
				</tr>
				<?php endforeach ?>
				<hr>
				<tr>
					<form action="" method="post" enctype="multipart/form-data">
						<td style="display: none;">
							<input type="text" name="usuario_id" value="<?php echo $_SESSION['ucedula'] ?>" readonly>
						</td>
						<td> 
							<select name="tipo" required>
								<option value="">Seleccione el Tipo...</option>
								<option value="Felicitacion">Felicitación</option>
								<option value="Comentario">Comentario</option>
								<option value="Queja">Queja</option>
								<option value="Recomendacion">Recomendación</option>
							</select>
						</td>
						<td> 
							<textarea name="mensaje" id=""></textarea>
						</td>
						<td>
							<button type="submit" class="btn btn-success" style="height: 30px; width: 30px; padding: 0;"> <i class="fa fa-save" style="font-size: 25px;"></i> </button>
							<a href="javascript:;" class="btn btn-outline-danger btn-delete" data-id="<?php echo $comu['id'];?>">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</form>
					<?php
						if ($_POST){
							$tipo = $_POST['tipo'];
							$usuario_id = $_POST['usuario_id'];
							$mensaje= $_POST['mensaje'];
							// $fechaCreacion= $_POST['fechaCreacion'];
							if (adicionarComunicacion($con, $tipo, $usuario_id, $mensaje)) {
								$_SESSION['type'] = 'success';
								$_SESSION['message'] = 'Adicionó Comentario!';
							}else{
								$_SESSION['type'] = 'danger';
								$_SESSION['message'] = 'Comentario no agregado!';
							}
							echo "<script> window.location.replace('lider.php'); </script>";
						}
					?>
				</tr>

			</tbody>
		</table>
	</div>

</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>
