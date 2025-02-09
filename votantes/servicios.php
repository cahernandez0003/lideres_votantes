<?php
include "Conexion.php";
$db=connect();
$query=$db->query("select * from servicios where Cliente_Id=$_GET[Cliente_Id]");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option value=''>-- SELECCIONE --</option>";
foreach ($states as $s) {
	print "<option value='$s->Id'>$s->Nombre</option>";
	
}
}else{
 print "NO HAY DATOS";
}
?> 


