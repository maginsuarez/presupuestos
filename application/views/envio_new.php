<div class="tab-pane" id="4a">
<?php $long = 6; ?>
</br>
  <div class="row">
  <div class="col-md-8">
    
    <?php echo form_open('/presupuesto/guardar_envio/'.$id_presupuesto, array('class' => "form-horizontal")) ;?>
    
    <input name="id_envio" value="<?php print $id_envio; ?>" hidden>
    
    <div class="form-group">
      <label class="col-sm-2 control-label estilo_texto_panel">Sucursal</label>
      <div class="col-sm-<?php print($long); ?>">
      <input type="text" class="form-control input-sm" id="sucursal" name="sucursal" value="<?php print $sucursal; ?>">
      </div>
    </div> 
    <div class="form-group">
      <label class="col-sm-2 control-label estilo_texto_panel">Localidad</label>
      <div class="col-sm-<?php print($long); ?>">
      <input type="text" class="form-control input-sm" id="nombre" name="localidad" value="<?php print $localidad_envio; ?>">
      </div>
    </div>                                                                                          
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Nº Envío</label>
        <div class="col-sm-<?php print($long); ?>">
        <input type="text" class="form-control input-sm" id="dir" name="envio" value="<?php print $envio; ?>">
        </div>
    </div>        
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Calle</label>
        <div class="col-sm-<?php print($long); ?>">
        <input type="text" class="form-control input-sm" id="calle" name="calle" value="<?php print $calle; ?>">
        </div>
    </div>                      
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Puerta</label>
        <div class="col-sm-<?php print($long); ?>">
        <input type="text" class="form-control input-sm" id="puerta" name="puerta" value="<?php print $puerta; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Piso</label>
        <div class="col-sm-<?php print($long); ?>">
        <input type="text" class="form-control input-sm" id="piso" name="piso" value="<?php print $piso; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Depto</label>
        <div class="col-sm-<?php print($long); ?>">
        <input type="text" class="form-control input-sm" id="depto" name="depto" value="<?php print $depto; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Código Postal</label>
        <div class="col-sm-<?php print($long); ?>">
        <input type="text" class="form-control input-sm" id="cod_postal" name="cod_postal" value="<?php print $cpostal; ?>">
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