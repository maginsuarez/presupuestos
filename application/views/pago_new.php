<div class="tab-pane" id="3a">
</br>
  <div class="container">
  <div class="row">

  <?php $long = "col-sm-6";?>
  
  <div class="col-md-8">    
    <?php echo form_open('/presupuesto/guardar_pago/'.$id_presupuesto, array('class' => "form-horizontal")) ;?>
    <div>
            <input name="id_presupuesto" value="<?php print $id_presupuesto; ?>" hidden>
            <input name="id_cliente" value="<?php print $id; ?>" hidden>
            <div class="form-group">
              <label class="col-sm-2 control-label estilo_texto_panel" for="inlineFormCustomSelect">Pago</label>
              <div class="col-sm-4">
              <select class="form-control input-sm" id="pago" name="pago" onchange="cambio_tarjeta()">
                <option value="MP" <?php if($forma_pago == "MP") print "selected";?> >Mercado Pago</option>
                <option value="T" <?php if($forma_pago == "T") print "selected"; ?> >Tarjeta</option>
                <option value="CPW" <?php if($forma_pago == "CPW") print "selected";?> >CPW</option>
                <option value="TD" <?php if($forma_pago == "TD") print "selected"; ?> >Transferencia / Depósito Bancario</option>
              </select>
              </div>
            </div>

            <div style="display: none;" id="opcion_tarjeta">
            <div class="form-group" >
                <label class="col-sm-2 control-label estilo_texto_panel" for="inlineFormCustomSelect">Tarjeta</label>
                <div class="col-sm-4">        
                <select class="form-control input-sm" id="tarjetas" name="tarjeta">
                <option value="0" selected>--</option> 
                <?php                             
                    for ($i = 0; $i < count($tarjetas); $i++){
                        $arreglo = (array)$tarjetas[$i];
                        $id_t = $arreglo['id'];
                        $tar = $arreglo['opcion'];
                        if($mi_tarjeta['id'] == $id_t) echo '<option value="'.($i+1).'" selected>'.$tar.'</option>';
                        else echo '<option value="'.($i+1).'">'.$tar.'</option>';
                    }                                    
                ?>                                                                                                       
                </select>
                </div>
            </div>

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
                <label for="f_nac" class="col-sm-2 control-label estilo_texto_panel">Fecha Nacimiento</label>
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
            </div>
            <div class="form-group">
            	<label for="dir" class="col-sm-2 control-label estilo_texto_panel"></label>
            	<div class="col-sm-2">    	
            	<input class="btn btn-success" type="submit" value="Guardar"></input>
            	</div>
            </div>            
    </div>
    <?php echo form_close();?>
  </div>
</div>
</div>
</div>

