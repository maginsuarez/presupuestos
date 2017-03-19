<div class="tab-pane active" id="1a">
  </br>
  <div class="row">
    <div class="col-md-10">

      <form class="form-inline">
      <div class="form-group">
      <label>Nº Cliente:</label>  
		  &nbsp;    
      <input type="text" style="text-align: center;" class="form-control" value="<?php print $id_cliente;?>">           
      </div>      
	      &nbsp;
	      &nbsp;
	      &nbsp;
      <div class="form-group">
      <label>Nº Web:</label>     
          &nbsp; 
      <input type="text" style="text-align: center;" class="form-control" value="<?php print $id_web;?>">      
      </div>
      </form>	  	 
	  
	  </br>
      <label class="mr-sm-2 estilo_texto_panel_titulo" for="inlineFormCustomSelect"> Datos de cliente y Comentarios adicionales: </label>
      </br>
      
      <?php echo form_open('/presupuesto/guardar_cliente/'.$id_presupuesto, array('class' => "form-horizontal")) ;?>
      <input name="id_cliente" value="<?php print $id; ?>" hidden>
      <div class="form-group">
      <label for="nombre" class="col-sm-2 control-label estilo_texto_panel">Cliente</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="nombre" name="c_nombre" value="<?php print $nombre;?>">
      </div>
      </div>
      <div class="form-group">
      <label for="apellido" class="col-sm-2 control-label estilo_texto_panel">Apellido</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="apellido" name="c_apellido" value="<?php print $apellido;?>">
      </div>
      </div>
      <div class="form-group">
      <label for="dni" class="col-sm-2 control-label estilo_texto_panel">Dirección</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="dni" name="c_direccion" value="<?php print $direccion;?>">
      </div>
      </div>
      <div class="form-group">
      <label for="email" class="col-sm-2 control-label estilo_texto_panel">C.P.</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="email" name="c_postal" value="<?php print $postal;?>">
      </div>
      </div>
      <div class="form-group">
      <label for="email" class="col-sm-2 control-label estilo_texto_panel">Localidad</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="email" name="c_localidad" value="<?php print $localidad;?>">
      </div>
      </div>
      <div class="form-group">
      <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Teléfono</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="tel_fijos" name="c_telefono" value="<?php print $telefono;?>">
      </div>
      </div>
      <div class="form-group">
      <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Email</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="tel_fijos" name="c_email" value="<?php print $email;?>">
      </div>
      </div>
      <div class="form-group">
	  <label for="dir" class="col-sm-2 control-label estilo_texto_panel"></label>
	  <div class="col-sm-2">    	
	  <input class="btn btn-success" type="submit" value="Guardar"></input>
	  </div>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>