<?php
	require '../config/app.php';//Se traen todas las rutas y datos para la conexión a la base datos
	include '../config/bd.php';//Se traen todas las funciones y conexión a la base da datos
	if (isset($_POST["selected"])) //Verifica si el valor traido no es null
	{
		$id = join("','", $_POST["selected"]);//Guarda en la variable los datos traidos en el primer select y los une mediante el metodo join, separandolos por coma
		$query = "SELECT * FROM servicios WHERE Cliente_Id in('" . $id . "')";//Se selecciona de la tabla servicios todos aquellos que su campo Cliente_Id sea el mismo que el guardado en la variable id
		$statement = $con->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();//Devuelve un array con los resultados de la consulta
		$output = '';
		foreach ($result as $row)//se recorre el array 
		{
			//Se guarda en una variable un option lleno con los resultados de la consulta
			$output .= '<option value="' . $row["Id"] . '">' . $row["Nombre"] . '</option>';
		}
		echo $output;
	
	}
?>