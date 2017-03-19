<?php

$con = mysqli_connect("localhost","root","root","presupuestos");

$cod  = $_POST['cod'];
$des  = $_POST['des'];
$cuo  = $_POST['cuo'];
$pre  = $_POST['pre'];
$dp   = $_POST['dp'];
$pres = $_POST['pres'];

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($resultado = $con->query("INSERT INTO presupuestos_compra (codigo, descripcion, cuotas, precio, dp, id_presupuesto) VALUES ('".$cod."', '".$des."', ".$cuo.", ".$pre.", ".$dp.", ".$pres.";)") {    
	echo "success";        
}
else echo "error";

$con->close();

?>