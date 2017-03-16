<?php 
$arreglo = (array)($datos_resultados);

$cant = count($arreglo);



if($cant != 0) $keys = array_keys($arreglo);
?>

<?php if($tipo == 1 && $cant != 0) { ?>

<div class="container">

<div>
      <h3>Presupuesto:</h3>
      <div class="table-responsive" style="height: 400px !important; ">          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Columnas</th>
            <th>Datos</th>        
          </tr>
        </thead>
        <tbody>
    		<?php for ($i = 0; $i < count($keys); $i++) { ?>
    		<tr>
    		<td><?php echo $keys[$i]; ?></td>
    		<td><?php echo $arreglo[$keys[$i]]; ?></td>
    		</tr>
    		<?php } ?>     
        </tbody>
      </table>
      </div>           
      </br> 
      <a class="btn btn-sm btn-primary" href="/presupuestos/index.php/presupuesto/principal" role="button">Volver</a>
      <a class="btn btn-sm btn-info" href="<?php echo base_url(); ?>index.php/presupuesto/panel/<?php echo $arreglo[$keys[0]]; ?>" type="submit" role="button">Ver Información</a>      
      </br>  
  </div>

</div>


<?php } elseif (($tipo == 2 or $tipo == 3 or $tipo == 4) && $cant != 0) { 
        $pedidos = (array) $arreglo['result_object']; 
        $cantidad_p = count($pedidos);

        $cant = $cantidad_p;

        if($cantidad_p != 0){                 
?>

<div class="container">	
  </br>
	<div class="table-responsive">  
	<table class="table table-striped">
    	  <thead>    
        <tr>
        <th>Id</th>
        <th>Id Web</th>
        <th>Id Cliente</th>
        <th>Pedido</th>
        <th>Número Envio</th>
        <th>Fecha</th>
        <th>Forma de Pago</th>
        <th></th>
        </tr>
    	  </thead>

        <tbody>    
          <?php for ($i = 0; $i < count($pedidos); $i++) { ?>
          <tr>      
          <?php 
                $elem = (array) $pedidos[$i]; 
                
                echo '<td>'.$elem["id"].'</td>';
                echo '<td>'.$elem["id_web"].'</td>';
                echo '<td>'.$elem["id_cliente"].'</td>';
                echo '<td>'.$elem["pedido"].'</td>';            
                echo '<td>'.$elem["nro_envio"].'</td>';
                echo '<td>'.$elem["fecha"].'</td>';
                echo '<td>'.$elem["forma_pago"].'</td>';
                $referencia = base_url()."index.php/presupuesto/panel/".$elem["id"];                
                echo '<td> <a class="btn btn-info btn-sm" name="64219" href="'.$referencia.'">Ver Información</a> </td>';
          ?>      
          </tr>  
          <?php } ?>    
        </tbody>
	 </table>   
	</div>
  </br>
	<a class="btn btn-sm btn-primary" href="/presupuestos/index.php/presupuesto/principal" role="button">Volver</a>

	</br>
	</br>
</div>

<?php }} ?>

<?php if($cant == 0) { ?>

<div class="container">
  </br>
  <h3>No hay elementos para la búsqueda realizada.</h3>
  </br>
  <a class="btn btn-sm btn-primary" href="/presupuestos/index.php/presupuesto/principal" role="button">Volver</a>  
  </br>
  </br>
</div>  

<?php } ?>
