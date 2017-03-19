<div class="tab-pane active" id="1a">
  </br>
  <div class="row">
    <div class="col-md-10">
        	 	 
      <?php echo form_open('/presupuesto/guardar_cliente_nuevo/'.$id_presupuesto, 
            array('class' => "form-horizontal")) ;?>
      
      <label class="mr-sm-2" for="inlineFormCustomSelect"> Datos de Presupuesto: </label>
      </br>

      <div class="form-group">
      <label class="col-sm-2 control-label">Nº Presupuesto:</label>
      <div class="col-sm-4">
      <input type="text" 
                  style="text-align: center;" 
                  class="form-control"                   
                  value="<?php print $id_presupuesto;?>" disabled>
      </div>
      </div>

      <div class="form-group">
      <label class="col-sm-2 control-label">Nº Cliente:</label>
      <div class="col-sm-4">
      <input type="text" 
             style="text-align: center;" 
             class="form-control" 
             name="n_cliente" 
             value="<?php print $id_cliente;?>">
      </div>
      </div>

      <div class="form-group">
      <label class="col-sm-2 control-label">Nº Web:</label>
      <div class="col-sm-4">
      <input type="text" 
             style="text-align: center;" 
             class="form-control" 
             name="n_web" 
             value="<?php print $id_web;?>">
      </div>
      </div>
      
      <label class="mr-sm-2" for="inlineFormCustomSelect"> Datos de cliente: </label>
      </br>
      <input name="id_cliente" value="<?php print $id; ?>" hidden>

      <div class="form-group">
      <label for="nombre" class="col-sm-2 control-label estilo_texto_panel">Cliente</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="nombre" 
             name="c_nombre" 
             value="<?php print $nombre;?>" <?php if($nombre != "") print "";?> >
      </div>
      </div>

      <div class="form-group">
      <label for="apellido" class="col-sm-2 control-label estilo_texto_panel">Apellido</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="apellido" 
             name="c_apellido" 
             value="<?php print $apellido;?>" <?php if($apellido != "") print "";?>>
      </div>
      </div>

      <div class="form-group">
      <label for="dni" class="col-sm-2 control-label estilo_texto_panel">Dirección</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="dni" 
             name="c_direccion" 
             value="<?php print $direccion;?>" <?php if($direccion != "") print "";?>>
      </div>
      </div>

      <div class="form-group">
      <label for="email" class="col-sm-2 control-label estilo_texto_panel">C.P.</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="email" 
             name="c_postal" 
             value="<?php print $postal;?>" <?php if($postal != "") print "";?>>
      </div>
      </div>

      <div class="form-group">
      <label for="email" class="col-sm-2 control-label estilo_texto_panel">Localidad</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="email" 
             name="c_localidad" 
             value="<?php print $localidad;?>" <?php if($localidad != "") print "";?>>
      </div>
      </div>

      <div class="form-group">
      <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Teléfono</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="tel_fijos" 
             name="c_telefono" 
             value="<?php print $telefono;?>" <?php if($telefono != "") print "";?>>
      </div>
      </div>

      <div class="form-group">
      <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Email</label>
      <div class="col-sm-6">
      <input type="text" 
             class="form-control input-sm" 
             id="tel_fijos" 
             name="c_email" 
             value="<?php print $email;?>" <?php if($email != "") print "";?>>
      </div>
      </div>

      <div class="form-group">
	  <label for="dir" class="col-sm-2 control-label estilo_texto_panel"></label>
	  <div class="col-sm-2">    	
	  <input class="btn btn-success" 
               type="submit" 
               value="Guardar" <?php if($id != "") print "";?>></input>
	  </div>
      </div>

      <?php echo form_close();?>
    </div>
  </div>
</div>