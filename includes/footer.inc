
	<footer class="container-fluid" style="background-color: #CC0000">
		<div class="row">
			<div class="col">
				<p class="text-center" style="letter-spacing: 0.25em; word-spacing: 0.25em;">
					<small>
						<b>&copy; Todos los derechos reservados <?php echo date('Y'); ?></b>
					</small>
				</p>
			</div>
		</div>
	</footer>

	<script src="<?php echo $url_js; ?>jquery-3.3.1.min.js"></script>
	<script src="<?php echo $url_js; ?>bootstrap.min.js"></script>
	<script src="<?php echo $url_js; ?>sweetalert2.js"></script>
	<script src="<?php echo $url_js; ?>jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../Docs form reg votantes/form_registro_votantes_files/formoid1/jquery.min.js"></script>
	<script type="text/javascript" src="../Docs form reg votantes/form_registro_votantes_files/formoid1/formoid-solid-blue.js"></script>

	<script>
		$(document).ready(function() {
			<?php if (isset($_SESSION['type'])): ?>
				<?php if ($_SESSION['type'] == 'success'): ?>
					swal('Felicitaciones!', '<?php echo $_SESSION['message']; ?>', 'success');
				<?php else: ?>
					swal('Lo Sentimos!', '<?php echo $_SESSION['message']; ?>', 'error');
				<?php endif ?>
			<?php endif ?>
			$('table').on('click', '.btn-delete', function(event) {
			 	event.preventDefault();
			 	$id = $(this).attr('data-id');
			 	swal({
			 		title: 'Eliminar',
			 		text: "¿Realmente desea eliminar este registro?",
			 		type: 'warning',
			 		showCancelButton: true,
			 		cancelButtonColor: 'red'
			 	}).then((result) => {
			 		if (result.value) {
		 				window.location.replace('delete.php?id='+$id);
			 		}
		 		});
	 		});
	 		
			<?php
				unset($_SESSION['type']);
				unset($_SESSION['message']);
			?>
		});
	</script>
	<script>
	$(document).ready(function() {
		$('#tableId').DataTable();
	});
	</script>
	<script>
	$(document).ready(function() {
		$('input[type=file]').hide();
		$('form').on('click', '.btn-foto', function(event) {
			event.preventDefault();
			$('input[type=file]').click();
		})
	});
	</script>
	<script>
		$(document).ready(function() {
			$('table').on('click','img',function(event){
				event.preventDefault();
				$ui=$(this).attr('data-img');
				swal({
					imageUrl: '../'+$ui
				});
			});
		});
	</script>
	<script>
		$('select[name=materia_id]').hide();
		$('form').on('change', '.slt-usuario', function(event) {
			event.preventDefault();
			$uid=$(this).val();
			//alert($uid);
			$.post('loadSubjects.php', {uid: $uid}, function(data) {
				$('select[name=materia_id]').html(data).show();
			});
		});
	</script>
	<!-- Codigo de departamentos y municios dinamico -->
	<script>
	$(document).ready(function() {
		// $('#departamentosLista').val();
		enviarDatos();

		$('#departamentosLista').change(function() {
			enviarDatos();
		});

		function enviarDatos(){
			$.ajax({
				type:"POST",
				url:"../config/datoDepartamento.php",
				data: {departamento: $('#departamentosLista').val(), tipo: "prueba" },
				success:function(resultado){
					$("#municipios").html(resultado);

				}
			});
		}
	});
	</script>
	<!-- Codigo de discapacidad -->
	<script>
	$(document).ready(function() {
		$("#discapacidad").change(function () {
			$("#tipoDiscapacidad").show();
			$estado = $("#discapacidad").val();
			if($estado == 'no') {
				$("#tipoDiscapacidad").hide();
			}
		});
	});
	</script>
	<!-- Codigo de SELECT zona rural o urbana -->
	<script>
		 var countryLists = new Array(4)
		 countryLists[""] = ["Selecione una zona"];
		 countryLists["Rural"] = ["Vereda", "Corregimiento", "Finca"];
		 countryLists["Urbana"] = ["No"];
		 function zonaChange(selectObj) {
		 var idx = selectObj.selectedIndex;
		 var which = selectObj.options[idx].value;
		 cList = countryLists[which];
		 var cSelect = document.getElementById("tipoZona");
		 var len=cSelect.options.length;
		 while (cSelect.options.length > 0) {
		 cSelect.remove(0);
		 }
		 var newOption;
		 for (var i=0; i<cList.length; i++) {
		 newOption = document.createElement("option");
		 newOption.value = cList[i];
		 newOption.text=cList[i];
		 try {
		 cSelect.add(newOption);
		 }
		 catch (e) {
		 cSelect.appendChild(newOption);
		 }
		 }
		 }
	</script>
</body>
</html>
