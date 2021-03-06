<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('cadena_especial')){

	function cadena_especial($cadena){
		$inicio  ='<div class="alert alert-danger alert-dismissable fade in" ';
		$inicio .='style="position: fixed !important; z-index: 1050; display: block; top: 13%;">';
		$inicio .='<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
		$fin     = '</div>';	
		return $inicio.$cadena.$fin;
	}

}

if(!function_exists('parset_resultado_panel')){

	function parset_resultado_panel($datos, $mi_presupuesto, $tarjetas, $envio, $compras, $tarjeta){
		$data = [];		
		//Datos del cliente.
		if($datos != null or count($datos)!=0){
			$data['id']   			= $datos['id'];
		    $data['apellido']   	= $datos['p_apellidos'];
		    $data['nombre']     	= $datos['p_nombres'];	    
		    $data['direccion']  	= $datos['p_direccion'];	    
		    $data['postal']     	= $datos['p_cp'];	
		    $data['localidad']  	= $datos['p_localidad'];	
		    $data['telefono']  	 	= $datos['p_telefono'];	    
		    $data['email']      	= $datos['p_email'];	
		    $data['nacimiento'] 	= $datos['p_fecha_nacimiento'];	    
		    $data['dni']        	= $datos['p_dni'];	
		    $data['fijo']       	= $datos['p_telefono_fijo'];			    	
		}				
		
		if($mi_presupuesto != null or count($mi_presupuesto)!=0){
			//Datos de presupuestos.	    
			$data['id_presupuesto'] = $mi_presupuesto['id'];
		    $data['id_web']     	= $mi_presupuesto['id_web'];
		    $data['id_cliente'] 	= $mi_presupuesto['id_cliente'];	
		    $data['anticipo']   	= $mi_presupuesto['anticipo'];
		    $data['costo_envio']   	= $mi_presupuesto['costo_envio'];
		    $data['vencimiento']   	= $mi_presupuesto['vencimiento'];
		    $data['forma_pago']    	= $mi_presupuesto['forma_pago'];
		}

			
		if($tarjeta != null or count($tarjeta)!=0){
		    //Tarjeta seleccionada
			$data['mi_tarjeta']	    = $tarjeta;    
		}
		if($compras != null or count($compras)!=0){		
			//Datos de compras.
		    $data['compras']    	= $compras;
		}

	    if($envio != null or count($envio)!=0){
			//Datos de envio.
			$data['id_envio']   	= $envio['id'];
		    $data['sucursal']   	= $envio['p_sucursal'];
		    $data['localidad_envio']= $envio['p_localidad'];
		    $data['envio']    		= $envio['p_denvio'];		
			$data['calle']    		= $envio['p_calle'];
			$data['puerta']    		= $envio['p_puerta'];
			$data['piso']    		= $envio['p_piso'];
			$data['depto']    		= $envio['p_depto'];
			$data['cpostal']   		= $envio['p_cpostal'];
		}

		if($tarjetas != null or count($tarjetas)!=0){
			//Datos de tarjeta.
		    $data['tarjetas']      	= $tarjetas;
		}
		return $data;
	}
}

if(!function_exists('parset_resultado_panel_vacio')){

	function parset_resultado_panel_vacio($tarjetas, $presupuesto){			
		$data['id']   			= "";
	    $data['apellido']   	= "";
	    $data['nombre']     	= "";	    
	    $data['direccion']  	= "";	    
	    $data['postal']     	= "";	
	    $data['localidad']  	= "";	
	    $data['telefono']  	 	= "";	    
	    $data['email']      	= "";	
	    $data['nacimiento'] 	= "";	    
	    $data['dni']        	= "";	
	    $data['fijo']       	= "";	
	    $data['id_presupuesto'] = $presupuesto;					  
	    $data['id_web']     	= "";
	    $data['id_cliente'] 	= "";	
	    $data['anticipo']   	= "";
	    $data['costo_envio']   	= "";
	    $data['vencimiento']   	= "";
	    $data['forma_pago']    	= "";		   
		$data['mi_tarjeta']	    = [];    		
	    $data['compras']    	= [];			
		$data['id_envio']   	= "";
	    $data['sucursal']   	= "";
	    $data['localidad_envio']= "";
	    $data['envio']    		= "";		
		$data['calle']    		= "";
		$data['puerta']    		= "";
		$data['piso']    		= "";
		$data['depto']    		= "";
		$data['cpostal']   		= "";			
	    $data['tarjetas']      	= $tarjetas;
		return $data;
	}
}


if(!function_exists('validateDate')){

	function validateDate($date, $format = 'd/m/Y'){
	    $d = DateTime::createFromFormat($format, $date);
	    return $d && $d->format($format) == $date;
	}

}







				