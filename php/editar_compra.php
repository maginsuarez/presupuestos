<?php

$con = mysqli_connect("localhost","root","","presupuestos");

$id  = $_POST['id'];
$cod = $_POST['cod'];
$des = $_POST['des'];
$cuo = $_POST['cuo'];
$pre = $_POST['pre'];
$dp  = $_POST['dp'];

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($resultado = $con->query("UPDATE presupuestos_compra 
							  SET codigo = '".$cod."',
							  descripcion = '".$des."',
							  cuotas = ".$cuo.",
							  precio = ".$pre.",
							  dp = ".$dp." 
							  WHERE id =".$id.";")) {    
	echo "success";        
}
else echo "error";

$con->close();

?>