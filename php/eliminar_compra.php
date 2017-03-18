<?php

$con = mysqli_connect("localhost","root","","presupuestos");

$i = $_POST['id'];
$p = $_POST['presupuesto'];

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($resultado = $con->query("DELETE FROM presupuestos_compra WHERE id =".$i." and id_presupuesto =".$p.";")) {    
	echo "success";        
}
else echo "error";

$con->close();

?>