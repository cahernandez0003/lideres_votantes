<?php require '../config/app.php';?>
<?php include '../config/security_marks.php';?>
<?php include '../config/bd.php';?>
<?php include '../includes/header.inc';?>
<?php include '../includes/navbaroriginal.inc';?>
<style>
	.scrolldos{
	overflow-y: scroll;
	overflow-x: scroll;
	height: auto;
	width: 1000px;
}
</style>
<div class="container">
	<div class="col-md-12 scrolldos" style="width: 1000px;">
		<form action="" method="post" enctype="multipart/form-data">
			<table class="col-md-12" border="1px solid black" style="font-size: 12px;">
				<tr>
					<th colspan="14" class="text-center" style="background-color: #34495E; color: white; padding: 12px; border: 1px solid black;"><strong><i class="fas fa-info-circle"></i> INFORMACIÓN DE LA FICHA</strong>
					</th>
				</tr>
				<tr>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">ID</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">manual(input)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">NOMBRE DEL PROGRAMA</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;" colspan="7">llamado tabla programas(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">TOTAL DE TRIMESTRES</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">debe cargar info automaticamente del programa cargado</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">TRIMESTRE ACTUAL</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">manual(input)</td>
				</tr>
				<tr>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">TPO DE PROGRAMA</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">debe cargar info automaticamente del programa cargado</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">FECHA DE INICIO</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">manual(input)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">FECHA DE FIN</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">automático calcula con fecha inicio</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">HORAS PROGRAMADAS</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">manual(input) debe coincidir con suma de horas</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">GESTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;" colspan="3">llamado tabla instructores(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">MUNICIPIO DE DESARROLLO</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamado tabla municipios(select)</td>
				</tr>
				<tr>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">HORAS PROGRAMADAS</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">LUNES</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">MARTES</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">MIERCOLES</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">JUEVES</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">VIERNES</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;" colspan="2">SABADO</th>
				</tr>
				<tr>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INICIO</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">FINAL</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">COMPETENCIA</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">AMBIENTE</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">COMPETENCIA</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">AMBIENTE</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">COMPETENCIA</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">AMBIENTE</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">COMPETENCIA</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">AMBIENTE</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">COMPETENCIA</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">AMBIENTE</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">COMPETENCIA</th>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">AMBIENTE</th>
				</tr>
				<tr>
					<td style="border: 1px solid black; background-color: #AEB6BF;" rowspan="2" class="text-center"><input type="time" style="border-style: none; text-align: center;background-color: #AEB6BF;"></td>
					<td style="border: 1px solid black; background-color: #AEB6BF;" rowspan="2" class="text-center"><input type="time" style="border-style: none; text-align: center;background-color: #AEB6BF;"></td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla competencia(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla ambientes(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla competencia(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla ambientes(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla competencia(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla ambientes(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla competencia(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla ambientes(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla competencia(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla ambientes(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla competencia(select)</td>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla ambientes(select)</td>
				</tr>
				<tr>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INSTRUCTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla instructores(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INSTRUCTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla instructores(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INSTRUCTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla instructores(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INSTRUCTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla instructores(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INSTRUCTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla instructores(select)</td>
					<th class="text-center" style="background-color: #34495E; color: white; border: 1px solid black;">INSTRUCTOR</th>
					<td style="border: 1px solid black; background-color: #AEB6BF;">llamar tabla instructores(select)</td>
				</tr>
				<tr>
					<th colspan="14" class="text-center" style="background-color: #34495E; color: white; padding: 12px; border: 1px solid black;"><strong><i class="fas fa-info-circle"></i> php que imprima nombre Id, Nombre del programa seleccionado y gestor.</strong>
					</th>
				</tr>
				<tr>
					<th colspan="14"><button class="btn btn-secondary btn-lg btn-block" style="height: 30px; line-height: 50%; font-size: 18px;"> <i class="fa fa-save"></i> Enviar</button></th>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include '../includes/footer.inc';?>
<?php $con = null;?>
	<!-- <script>function crearElemento(elemento, identificador, clase, texto, ruta, valor) {
    item = document.createElement(elemento);
    if (identificador !=='__'){ item.id = identificador; }
    if (clase !=='__') { item.className = clase; }
    if (texto !=='__') { item.innerText = texto; }
    if (ruta !== '__') { item.dataset.cargarVista = ruta; }
    if (valor !== '__') { item.value = valor; }
    return item;
}
btn = crearElemento('button','num_parrafos','agrega tus clases','Numero parrafos','__','__');
body = document.body;
body.appendChild(btn);
</script> -->