$(document).ready(function() {

});

function reiniciar_input(num){	
	for(i = 1; i <= 5; i++){
		if(num == 4 || num == 5){
			if(i != 4 && i != 5) document.getElementById("buscar_nuevo_input_"+i).value = "";				
		}
		else if(i != num) document.getElementById("buscar_nuevo_input_"+i).value = "";
	}
}

function guardar_temporal(i, presupuesto){	
	localStorage.setItem("compra_temporal_1", i);  
	localStorage.setItem("compra_temporal_2", presupuesto);
}

function eliminar_dato(){

	var id = localStorage.getItem("compra_temporal_1");
	var presupuesto = localStorage.getItem("compra_temporal_2");   
	var parametros={"id": id, "presupuesto": presupuesto};

	$.ajax({
	  data: parametros,
	  url:'/presupuestos/php/eliminar_compra.php',
	  type: 'post',	  
	  async: false,
	  success: function (data) {
	  	console.log(data);	  	
		$('#tr_'+localStorage.getItem("compra_temporal_1")).remove();
		localStorage.setItem("compra_temporal_1", "");  
		localStorage.setItem("compra_temporal_2", "");
		$('#eliminar').modal('toggle');	
	  }
	});
}

