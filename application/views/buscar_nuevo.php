<?PHP $_SESSION['usuario'] = $_POST['username']; ?>

<div class="container">
	<div class="jumbotron">
		<a href="<?php echo base_url(); ?>index.php/presupuesto/logout" class="cerrar_sesion mover_logout">	
		<div class="estilo_texto">Cerrar sesión</div>
		</a>
	    <h2><strong>Presupuestos E-Commerce  </strong></h2>
	    </br>
	    
	    <?php echo $modal; ?>

	    <div class="container">
		    <div class="row">
		      <div class="col-md-8">
		      <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/presupuesto/resultado" method="post">      
		        <div class="form-group">
		          <label for="nombre" class="col-sm-2 control-label estilo_texto">Presupuesto</label>
		          <div class="col-sm-6">
		            <input id="buscar_nuevo_input_1" type="text" class="form-control input-sm" name="presupuesto" 
		            placeholder=""
		            onclick="reiniciar_input(1)">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="nombre" class="col-sm-2 control-label estilo_texto">Pedido</label>
		          <div class="col-sm-6">
		            <input id="buscar_nuevo_input_2" type="text" class="form-control input-sm" name="pedido" 
		            placeholder="" 
		            onclick="reiniciar_input(2)">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="nombre" class="col-sm-2 control-label estilo_texto">Cliente</label>
		          <div class="col-sm-6">
		            <input id="buscar_nuevo_input_3" type="text" class="form-control input-sm" name="cliente" 
		            placeholder=""
		            onclick="reiniciar_input(3)">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="nombre" class="col-sm-2 control-label estilo_texto">Desde</label>
		          <div class="col-sm-6">
		            <input id="buscar_nuevo_input_4" type="text" class="form-control input-sm" name="fecha_desde" 
		            placeholder=""
		            onclick="reiniciar_input(4)">		            
		          </div>		          
		        </div>
		        <div class="form-group">
		          <label for="nombre" class="col-sm-2 control-label estilo_texto">Hasta</label>
		          <div class="col-sm-6">
		            <input id="buscar_nuevo_input_5" type="text" class="form-control input-sm" name="fecha_hasta" 
		            placeholder=""
		            onclick="reiniciar_input(5)">		            
		          </div>		          
		        </div>       
		        <div class="form-group">
		          <div class="col-sm-6">
		            <input class="btn btn-success" role="button" type="submit" value="Buscar" 
		            style="width:40%;">
		          </div>		          
		        </div>
		        <div class="form-group">
				<div class="col-sm-6">

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="width:40%;">
				  Nuevo
				</button>

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Nuevo Presupuesto</h4>
				      </div>
				      <div class="modal-body">
				        ¿Desea crear un nuevo presupuesto?
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        <a  class="btn btn-primary" 
				        	href="<?php echo base_url(); ?>index.php/presupuesto/panel_nuevo" 
				        	role="button">Ok</a>
				      </div>
				    </div>
				  </div>
				</div>
						
				</div>      
		        </div>      
		      </form>		      
		      </div>
		    </div>
		</div>		
		<div id="prueba"></div>
	</div>
</div>

