<?php require '../config/app.php'; ?>
<?php include '../config/security_lider.php'; ?>
<?php include '../config/bd.php'; ?>
<?php include '../includes/header.inc'; ?>
<?php include '../includes/navbar.inc'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-muted text-center"><i class="fa fa-user"></i> Modulo Mis Actividades</h1>
			<hr>
			<a href="add.php" class="btn btn-outline-success"><i class="fa fa-plus"></i> Gestionar Actividad </a>
			<hr>
			<table class="table table-striped table-hover col-md-12" style="font-size: 14px;">
				<thead class="bg-purple" style="color: white; font-style: bolder;">
					<tr>
						<th style="width: auto;"> Fecha de Gestión </th>
						<th style="width: auto;"> Tipo Actividad </th>
						<th style="width: auto;"> Persona o Grupo </th>
						<th style="width: auto;"> Descripción de Actividad</th>
						<th style="width: auto;"> Soporte </th>
						<th style="width: auto;"> Observaciones </th>
						<th style="width: auto;"> Pendientes </th>
						<th style="width: auto;"> Estado </th>
					</tr>
				</thead>
				<tbody>
					<!-- //aca va el foreach// -->
						<tr>
							<td> 21/03/2019 13:23:32</td>
							<td> Reunión  </td>
							<td> Usuarios o <br>usuario  </td>
							<td> Actividad realizada Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </td>

							<td> <img src="sdaa"></td>
							<td> Las personas del sector Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
							<td> Llamada para programar reunión</td>
							<td> <select>
									<option>Estado...</option>
									<option style="background-color: red;">Pendiente</option>
									<option style="background-color: green;">Resuelto</option>
								</select>
							</td>
						</tr>
					<!-- aca termina el foreach -->
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $con = null; ?>
<?php include '../includes/footer.inc'; ?>