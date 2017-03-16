<div class="tab-pane" id="3a">
</br>
  <div class="container">
  <div class="row">
  <div class="col-md-4">
    <form class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-2 control-label estilo_texto_panel" for="inlineFormCustomSelect">Pago</label>
      <div class="col-sm-8">
      <select class="form-control input-sm" id="pago" onchange="cambio_tarjeta()">
        <option value="1" <?php if($forma_pago == "MP") print "selected";?> >Mercado Pago</option>
        <option value="2" <?php if($forma_pago == "T") print "selected"; ?> >Tarjeta</option>
        <option value="3" <?php if($forma_pago == "CPW") print "selected";?> >CPW</option>
        <option value="4" <?php if($forma_pago == "TD") print "selected"; ?> >Transferencia / Depósito Bancario</option>
      </select>
      </div>
    </div>
    <div style="display: none;" id="opcion_tarjeta">

      <div class="form-group" >
        <label class="col-sm-2 control-label estilo_texto_panel" for="inlineFormCustomSelect">Tarjeta</label>
        <div class="col-sm-8">
        <select class="form-control input-sm" id="tarjetas" disabled="">
        <option value="0" selected>--</option> 
        <?php                                     
            for ($i = 0; $i < count($tarjetas); $i++){
                $arreglo = (array)$tarjetas[$i];
                $id_t = $arreglo['id'];
                $tar = $arreglo['opcion'];
                echo '<option value="'.$id_t.'">'.$tar.'</option>';
            }                                    
        ?>                                                                                                       
        </select>
        </div>
      </div>                             

    </div>
    </form>
  </div>

  <?php $long = "col-sm-8";?>
  
  <div class="col-md-6">    
    <?php echo form_open('/presupuesto/guardar_pago/'.$id_presupuesto, array('class' => "form-horizontal")) ;?>
    <input name="id_cliente" value="<?php print $id; ?>" hidden>
    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label estilo_texto_panel">Nombre</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="nombre" name="pago_nombre" value="<?php print $nombre;?>">
        </div>
    </div>
    <div class="form-group">
        <label for="apellido" class="col-sm-2 control-label estilo_texto_panel">Apellido</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="apellido" name="pago_apellido" value="<?php print $apellido;?>">
        </div>
    </div>
    <div class="form-group">
        <label for="f_nac" class="col-sm-2 control-label estilo_texto_panel">F.Nac</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="f_nac" name="pago_nacimiento" value="<?php print $nacimiento; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="dni" class="col-sm-2 control-label estilo_texto_panel">DNI</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="dni" name="pago_dni" value="<?php print $dni; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label estilo_texto_panel">Email</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="email" name="pago_email" value="<?php print $email; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="tel_fijos" class="col-sm-2 control-label estilo_texto_panel">Tel.Fijo</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="tel_fijos" name="pago_tel_fijo" value="<?php print $fijo; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="dir" class="col-sm-2 control-label estilo_texto_panel">Dirección</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="dir" name="pago_direccion" value="<?php print $direccion; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="cp" class="col-sm-2 control-label estilo_texto_panel">C.P.</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="cp" name="pago_postal" value="<?php print $postal; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="loc" class="col-sm-2 control-label estilo_texto_panel">Locación</label>
        <div class="<?php echo $long; ?>">
        <input type="text" class="form-control input-sm" id="loc" name="pago_localidad" value="<?php print $localidad; ?>">
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
</div>
