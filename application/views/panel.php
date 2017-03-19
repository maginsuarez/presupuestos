
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">

                <div class="col-md-6">
                      <form class="form-inline">
                      <div class="form-group">
                      <label for="numero" class="estilo_texto_panel center_menu">Nº <?php if(isset($id)) print $id; else echo ""; ?></label>
                      </div>
                      &nbsp; &nbsp;
                      <div class="form-group">
                      <label for="fecha_sol" class="estilo_texto_panel center_menu">
                      Fecha/Hora: <?php date_default_timezone_set("America/Argentina/Buenos_Aires"); echo date("d/m/Y - H:i"); ?>
                      </label>
                      </div>
                      &nbsp; &nbsp;
                      <div class="form-group">
                      <label for="op_fecha" class="estilo_texto_panel center_menu"> Usuario: <?php echo $_SESSION['usuario']; ?></label>
                      </div>
                      </form>
                </div>



                <div class="col-md-6">
                      <form class="form-inline">
                      <div class="form-group">
                      <label class="estilo_texto_panel">Factura</label>
                      <select class="form-control input-sm long_select">
                        <option value="1" selected>00000000001</option>                        
                      </select>
                      </div>
                      &nbsp;
                      <div class="form-group">
                      <label class="estilo_texto_panel">Estado</label>
                      <select class="form-control input-sm long_select">
                        <option value="1" selected>Alta</option>                      
                      </select>
                      </div>
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      &nbsp;
                      <div class="form-group">
                      <a href="<?php echo base_url() ?>index.php/presupuesto/logout" class="cerrar_sesion_2">Cerrar sesión</a>
                      </div>
                      </form>
                </div>

          </div>
        </div>
        <div class="panel-body">
          <div class="row">
          <div class="col-md-12">

            <ul class="nav nav-tabs">
              <li class="active" onclick="cambiar_panel(1);" id="id_1">
              <a href="#1a" data-toggle="tab">
              <strong class="estilo_texto_panel_titulo">Nº Cliente</strong>
              </a>
              </li>
              <li onclick="cambiar_panel(2);" id="id_2">
              <a href="#2a" data-toggle="tab">
              <strong class="estilo_texto_panel_titulo">Detalle de Compra</strong>
              </a>
              </li>
              <li onclick="cambiar_panel(3);" id="id_3">
              <a href="#3a" data-toggle="tab">
              <strong class="estilo_texto_panel_titulo">Forma de Pago</strong>
              </a>
              </li>
              <li onclick="cambiar_panel(4);" id="id_4">
              <a href="#4a" data-toggle="tab">
              <strong class="estilo_texto_panel_titulo">Datos del Envío</strong>
              </a>
              </li>
            </ul>			
            <div class="tab-content clearfix">
                    <!--Pestaña 1 ===========================================================================-->
                    <?php require('application/views/cliente.php'); ?>
                    <!--Pestaña 2 ===========================================================================-->
                    <?php require('application/views/compra.php'); ?>
                    <!--Pestaña 3 ===========================================================================-->
            				<?php require('application/views/pago.php'); ?>
                    <!--Pestaña 4 ===========================================================================-->
                    <?php require('application/views/envio.php'); ?>
                    <!--Fin pestaña==========================================================================-->
            </div>
          </div>
          </div>
        </div>

        <div class="panel-footer">
          <div class="row">
          <div class="col-md-12">
          <div class="btn-toolbar" role="toolbar" aria-label="...">              
              <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-sm btn-default" disabled>
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-sm btn-default" disabled>
                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-sm btn-default" disabled>
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
              </div>
              <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-sm btn-default" disabled>
                <strong>Depositos</strong>
                </button>
                <button type="button" class="btn btn-sm btn-default" disabled>
                <strong>Ver Todos</strong>
                </button>
              </div>
              <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-sm btn-default" disabled>
                <strong>Transportes</strong>
                </button>
              </div>              
              <div class="btn-group" role="group" aria-label="...">
                <a class="btn btn-sm btn-primary" href="/presupuestos/index.php/presupuesto/principal" role="button">Volver</a>
              </div>
          </div>
          </div>
          </div>
        </div>
    </div>
</div>


<script>

$( document ).ready(function() {

    var solapa = localStorage.getItem("sollp");
    if(solapa == null || solapa == ""){
      localStorage.setItem("sollp", "1");     
    }  
    else{      
      $("#id_"+solapa).tab('show');
      $("#1a").removeClass('active');
      $("#2a").removeClass('active');
      $("#3a").removeClass('active');
      $("#4a").removeClass('active');      
      $("#"+solapa+"a").addClass('active');  

      var select = document.getElementById("pago");
      var valor  = select.options[select.selectedIndex].value;
      if(valor == 'T') habilitar_opcion_tarjeta();
    }    
});

function cambiar_panel(id){
  localStorage.setItem("sollp", id); 
}

function habilitar_opcion_tarjeta(){
  document.getElementById("opcion_tarjeta").style.display = "";  
}

function deshabilitar_opcion_tarjeta(){
  document.getElementById("opcion_tarjeta").style.display = "none";  
}

function guardar_elemento(){
  var elem_1 = document.getElementById("id_compra").value;
  var elem_2 = document.getElementById("cod").value;
  var elem_3 = document.getElementById("descripcion_"+a).value;
  var elem_4 = document.getElementById("cuotas_"+a).value;
  var elem_5 = document.getElementById("precio_"+a).value;
  var elem_6 = document.getElementById("dp_"+a).value;
}

function editar_elemento(a, id){          
  var elem_1 = document.getElementById("id_"+a).value;    
  localStorage.setItem("compra_temporal_id", id);
  var elem_2 = document.getElementById("codigo_"+a).value;
  var elem_3 = document.getElementById("descripcion_"+a).value;
  var elem_4 = document.getElementById("cuotas_"+a).value;
  var elem_5 = document.getElementById("precio_"+a).value;
  var elem_6 = document.getElementById("dp_"+a).value;
  document.getElementById("id_compra").value = elem_1;
  document.getElementById("cod").value = elem_2;
  document.getElementById("des").value = elem_3;
  document.getElementById("cuo").value = elem_4;
  document.getElementById("pre").value = elem_5;
  document.getElementById("dp").value = elem_6;                                                  
}

function cambio_tarjeta(){

  var select = document.getElementById("pago");
  var valor  = select.options[select.selectedIndex].value;

  if(valor == 'T') habilitar_opcion_tarjeta();
  else deshabilitar_opcion_tarjeta();  
}

</script>