<?php
$con = mysqli_connect("localhost", "root", "", "historicos");
if (isset($_POST["first_level"])) {
	$array = $_POST["first_level"];
	$cont = count($array);
	$output = '<div style="position: absolute; right: 100px; width: 800px; background-color: #f9f9f9;"><h3 class="text-center"><strong>Fechas de Cargues Históricos</strong></h3><table class="table table-striped">
				<thead>
					<tr>
						<th>Fecha Registro</th>
						<th>Cliente</th>
						<th>CTI</th>
						<th>Servicio</th>
						<th>Subservicio</th>
						<th>Skill</th>
						<th>Fecha Inicio</th>
						<th>Fecha Final</th>
					</tr>
				</thead>
					<tr>';
	// <th>Cargue</th>
	echo $output;
	$output = "";
	for ($i = 0; $i < $cont; $i++) {
		$query = "SELECT * FROM registrocargue INNER JOIN clientes WHERE registrocargue.cliente = clientes.Nombre AND clientes.Id='" . $array[$i] . "'";
		$qq = $con->query($query);
		while ($ff = $qq->fetch_object()) {

			?>

                <td><?php echo $ff->fecha_registro; ?></td>
				<!-- <td># <?php echo $i + 1; ?></td> -->
                <td><?php echo $ff->cliente; ?></td>
                <td><?php echo $ff->cti; ?></td>
                <td><?php echo $ff->servicio; ?></td>
                <td><?php echo $ff->subservicio; ?></td>
                <td><?php echo $ff->skill; ?></td>
                <td><?php echo $ff->fecha_inicio; ?></td>
                <td><?php echo $ff->fecha_fin; ?></td>
			</tr>
			<?php

		}
	}
	$output .= '
		</table></div>	';
	echo $output;
	$output = "";
}
?>