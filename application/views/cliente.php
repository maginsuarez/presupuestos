<div class="tab-pane active" id="1a">
  </br>
  <div class="row">
    <div class="col-md-10">

      <form class="form-inline">
      <div class="form-group">
      <label>Nº Cliente:</label>  
		  &nbsp;    
      <input type="text" style="text-align: center;" class="form-control" value="<?php if(isset($id_cliente)) print $id_cliente; else echo "";?>" disabled>           
      </div>      
	      &nbsp;
	      &nbsp;
	      &nbsp;
      <div class="form-group">
      <label>Nº Web:</label>     
          &nbsp; 
      <input type="text" style="text-align: center;" class="form-control" value="<?php if(isset($id_web)) print $id_web; else echo "";?>" disabled>      
      </div>
      </form>	  	 
	  
	  </br>
      <label class="mr-sm-2 estilo_texto_panel_titulo" for="inlineFormCustomSelect"> Datos de cliente y Comentarios adicionales: </label>
      </br>
      
      <?php echo form_open('/presupuesto/guardar_cliente/'.$id_presupuesto, array('class' => "form-horizontal")) ;?>
      <input name="id_cliente" value="<?php if(isset($id)) print $id; else echo ""; ?>" hidden>
      <div class="form-group">
      <label for="nombre" class="col-sm-2 control-label estilo_texto_panel">Cliente</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="nombre" name="c_nombre" value="<?php if(isset($nombre)) print $nombre; else echo "";?>">
      </div>
      </div>
      <div class="form-group">
      <label for="apellido" class="col-sm-2 control-label estilo_texto_panel">Apellido</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="apellido" name="c_apellido" value="<?php if(isset($apellido)) print $apellido; else echo "";?>">
      </div>
      </div>
      <div class="form-group">
      <label for="dni" class="col-sm-2 control-label estilo_texto_panel">Dirección</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="dni" name="c_direccion" value="<?php if(isset($direccion)) print $direccion; else echo "";?>">
      </div>
      </div>
      <div class="form-group">
      <label for="email" class="col-sm-2 control-label estilo_texto_panel">C.P.</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="email" name="c_postal" value="<?php if(isset($postal)) print $postal; else echo "";?>">
      </div>
      </div>
      <div class="form-group">
      <label for="email" class="col-sm-2 control-label estilo_texto_panel">Localidad</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="email" name="c_localidad" value="<?php if(isset($localidad)) print $localidad; else echo "";?>">
      </div>
      </div>
      <div class="form-group">
      <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Teléfono</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="tel_fijos" name="c_telefono" value="<?php if(isset($telefono)) print $telefono; else echo "";?>">
      </div>
      </div>
      <div class="form-group">
      <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Email</label>
      <div class="col-sm-6">
      <input type="text" class="form-control input-sm" id="tel_fijos" name="c_email" value="<?php if(isset($email)) print $email; else echo "";?>">
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