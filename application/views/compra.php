<div class="tab-pane" id="2a">
</br>
  <div>
    <div class="row">
         <div class="col-md-12">
         <button type="button" class="btn btn-success btn-sm estilo_texto_panel" data-toggle="modal" data-target="#agregar">Agregar Producto +</button>
         </div>
    </div>
    </br>
    <div class="row">
      <div class="col-md-12">
      <div class="table-responsive" style="height: 200px !important; overflow-y: scroll !important;">
      <table class="table table-hover header-fixed table_especial">
      <thead class="estilo_texto_panel_titulo">
        <tr>
        <th>#</th>
        <th>Código</th>
        <th>Descripción</th>
        <th>Cuotas</th>
        <th>[cant./valor]</th>
        <th>Dp</th>
        <th>Opciones</th>
        </tr>
      </thead>
      <tbody class="estilo_texto_panel">
      <?php
        for($i = 0; $i < count($compras); $i++){
          $arreglo = (array)$compras[$i];
          $a = $arreglo['id'];
          $b = $arreglo['codigo'];
          $c = $arreglo['descripcion'];
          $d = $arreglo['cuotas'];
          $e = $arreglo['precio'];
          $f = $arreglo['dp'];

          echo "<input id='id_".$i."' value='".$a."' hidden/>";
          echo "<input id='codigo_".$i."' value='".$b."' hidden/>";
          echo "<input id='descripcion_".$i."' value='".$c."' hidden/>";
          echo "<input id='cuotas_".$i."' value='".$d."' hidden/>";
          echo "<input id='precio_".$i."' value='".$e."' hidden/>";
          echo "<input id='dp_".$i."' value='".$f."' hidden/>";

          echo "<tr id='tr_".$a."'>";
          echo "<th scope='row'>".$a."</th>";
          echo "<td>".$b."</td>";
          echo "<td>".$c."</td>";
          echo "<td>".$d."</td>";
          echo "<td>".$e."</td>";
          echo "<td>".$f."</td>";                                                           
          echo "<td>";                                    
          echo '<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editar" onclick="editar_elemento('.$i.', '.$a.');">
          Editar</button> ';
          echo '<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar" onclick="guardar_temporal('.$a.', '.$id_presupuesto.')">
          Eliminar</button>';
          echo "</td>";                                   
          echo "</tr>";                                                                                        
        }
      ?>
      </tbody>
      </table>

      <div id="editar" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar una compra</h4>
            </div>
            <div class="modal-body">              
              <form>
              <input id="id_compra" name="edi_com" hidden/>              
              <div class="form-group">
                <label class="control-label">Código</label>                                        
                <input type="text" class="form-control" id="cod" name="edi_cod"/>
              </div>                                      
              <div class="form-group">
                <label  class="control-label">Descripción</label>                                          
                <input type="text" class="form-control" id="des" name="edi_des"/>
              </div>
              <div class="form-group">
                <label  class="control-label">Cuotas</label>                                          
                <input type="text" class="form-control" id="cuo" name="edi_cuo"/>
              </div>
              <div class="form-group">
                <label  class="control-label">Precio</label>
                <input type="text" class="form-control" id="pre" name="edi_pre"/>                                          
              </div>
              <div class="form-group">
                <label  class="control-label">Dp</label>                                          
                <input type="text" class="form-control" id="dp" name="edi_dps"/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a onclick="guardar_compra()" type="submit" class="btn btn-info">Guardar</a>
              </div>
              </form>
            </div>            
          </div>
        </div>
      </div>

      <div id="agregar" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar una compra</h4>
            </div>
            <div class="modal-body">
              <form>
              <div class="form-group">
                <label class="control-label">Código</label>                                        
                <input type="text" class="form-control"/>
              </div>                                      
              <div class="form-group">
                <label  class="control-label">Descripción</label>                                          
                <input type="text" class="form-control"/>
              </div>
              <div class="form-group">
                <label  class="control-label">Cuotas</label>                                          
                <input type="text" class="form-control"/>
              </div>
              <div class="form-group">
                <label  class="control-label">Precio</label>
                <input type="text" class="form-control"/>                                          
              </div>
              <div class="form-group">
                <label  class="control-label">Dp</label>                                          
                <input type="text" class="form-control"/>
              </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <div id="eliminar" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Eliminar</h4>
            </div>
            <div class="modal-body">
              <p>¿Está seguro de que desea eliminar permanentemente la compra?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button onclick="eliminar_dato()" type="button" class="btn btn-danger">Eliminar</button>
            </div>
          </div>
        </div>
      </div>

      </div>
      </div>
    </div>
    </br>
    <div class="row">
      <div class="col-md-4">
      <?php echo form_open('/presupuesto/guardar_compra/'.$id_presupuesto) ;?>
        <div class="input-group">
        <span class="input-group-addon input_group_addon_selectivo estilo_texto_panel">Anticipo</span>
        <input id="msg" type="text" 
        style="text-align: center;"
        class="form-control input-sm" name="anticipo" value="<?php echo $anticipo;?>">
        </div>
        <br>
        <div class="input-group">
          <span class="input-group-addon input_group_addon_selectivo estilo_texto_panel">Costo de Envío</span>
          <input id="msg" type="text" 
          class="form-control input-sm"
          style="text-align: center;" 
          name="costo" value="<?php echo $costo_envio;?>">
        </div>
        <br>
        <div class="input-group">
          <span class="input-group-addon input_group_addon_selectivo estilo_texto_panel">Vencimiento</span>
          <input id="msg" 
          style="text-align: center;" 
          type="text" class="form-control input-sm" name="vencimiento" value="<?php echo $vencimiento;?>">
        </div>
        <br>
        <div class="input-group">                  
          <input class="btn btn-success boton_panel" type="submit" value="Guardar"></input>          
        </div>
      <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>