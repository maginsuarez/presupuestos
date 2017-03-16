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

