<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuesto extends CI_Controller {

	function __construct(){
		parent::__construct();	   
		$this->load->helper('funciones_helper');		
		$this->load->model('model_presupuesto');
	}
	
	public function index(){	
		$data['modal'] = "";
		$this->load->view('header');

		if($this->session->userdata('logueado')){
			$_POST['username'] = $this->session->userdata('username');				
			$this->load->view('buscar_nuevo',$data);			
		}				
		else $this->load->view('login',$data);					
		
		$this->load->view('footer');	
	}	

	public function principal(){
		if($this->session->userdata('logueado')){
			$data['modal'] = "";			
			$_POST['username'] = $this->session->userdata('username');
			$this->load->view('header');
			$this->load->view('buscar_nuevo',$data);
			$this->load->view('footer');
		}
		else{
			$this->index();
		}
	}

	public function editar(){
		if($this->session->userdata('logueado')){
			
		}
		else{
			$this->index();
		}
	}

	public function buscar_nuevo(){
		if ($this->input->post()) {
				$username = $this->input->post("username");
				$password = $this->input->post("password");						
		        $usuario  = $this->model_presupuesto->login($username,$password);

		        $this->load->view('header');	            

		        if($usuario){
		        	$data['modal'] = "";
		        	$use = array('username' => $usuario->username, 'password' => $usuario->password, 'logueado' => TRUE);		      
		            $this->session->set_userdata($use);		           		            	            
			        $this->load->view('buscar_nuevo',$data);			        			
		        }
		        else {		        			        	
		        	$data['modal'] = cadena_especial("Usuario o contraseña incorrecta");  		        	
					$this->load->view('login',$data);
					
		        }
		        $this->load->view('footer');					 		        
		}
		else $this->index();
      	
	}

	public function logout() {
		$usuario_data = array('logueado' => FALSE);
		$this->session->set_userdata($usuario_data);
		$this->index();
    }   

    
	
    public function nueva_compra($id){
    	if($this->session->userdata('logueado')){
    		if ($this->input->post()) {
    			$a = $this->input->post('a');
    			$b = $this->input->post('b');
    			$c = $this->input->post('c');
    			$d = $this->input->post('d');
    			$e = $this->input->post('e');    		
    			$this->model_presupuesto->new_compra($id, $a, $b, $c, $d, $e);
    			$this->panel($id);
    		}
    		else $this->index();
    	}
		else $this->index(); 
    }

	public function guardar_cliente($id){
		if($this->session->userdata('logueado')){
			if ($this->input->post()) {			
				$id_cliente 	= $this->input->post('id_cliente');					
				$c_nombre 		= $this->input->post('c_nombre');
				$c_apellido 	= $this->input->post('c_apellido');				
				$c_direccion	= $this->input->post('c_direccion');						
				$c_postal 		= $this->input->post('c_postal');			
				$c_localidad 	= $this->input->post('c_localidad');					
				$c_telefono   	= $this->input->post('c_telefono');						
				$c_email		= $this->input->post('c_email');													
				$usuario  		= $this->model_presupuesto->save_cliente($id_cliente, $c_nombre, $c_apellido, $c_direccion, $c_postal, $c_localidad, $c_telefono, $c_email);													   		
				$this->panel($id); 
			}
			else $this->index();
		}
		else $this->index();      	
	}

	public function guardar_cliente_nuevo($id){
		if($this->session->userdata('logueado')){
			if ($this->input->post()) {			
				$n_c = $this->input->post('n_cliente');					
				$n_w = $this->input->post('n_web');

				$this->model_presupuesto->update_presupuesto($n_c, $n_w, $id);

				$a 	= $this->input->post('c_nombre');
				$b 	= $this->input->post('c_apellido');				
				$c	= $this->input->post('c_direccion');						
				$d	= $this->input->post('c_postal');			
				$e 	= $this->input->post('c_localidad');					
				$f 	= $this->input->post('c_telefono');						
				$g	= $this->input->post('c_email');

				$this->model_presupuesto->crear_nuevo_usuario($a, $b, $c, $d, $e, $f, $g, $id);
				
				//Obtengo el presupuesto
   				$mi_presupuesto = (array)$this->model_presupuesto->get_mi_presupuesto($id);

				//Obtener mi datos de envio   				   				
   				$p_id = $mi_presupuesto['id'];
   				$nro_envio = $mi_presupuesto['nro_envio'];
   				$tipo_tarjeta = $mi_presupuesto['id_pago'];

   				$tarjeta = (array) $this->model_presupuesto->get_tarjeta($tipo_tarjeta);

   				$datos_envio = (array) $this->model_presupuesto->get_mi_envio_2($id);    	   				

   				//Busco los datos del cliente
		        $datos = $this->model_presupuesto->get_cliente($p_id);
		        $compras = $this->model_presupuesto->get_compras($p_id);		        
				$tarjetas = $this->model_presupuesto->get_tarjetas();		        

			    $datos = parset_resultado_panel($datos,$mi_presupuesto,$tarjetas,$datos_envio,$compras, $tarjeta);	

				$this->load->view('header');							
			    $this->load->view('panel_nuevo',$datos);
			    $this->load->view('footer'); 
			}
			else $this->index();
		}
		else $this->index();      	
	}

	public function guardar_compra($id){
		if($this->session->userdata('logueado')){
			if ($this->input->post()) {	
				$anticipo 		= $this->input->post('anticipo');
				$costo	 		= $this->input->post('costo');
				$vencimiento 	= $this->input->post('vencimiento');				
				$compra = $this->model_presupuesto->save_compra($anticipo, $costo, $vencimiento, $id);	

				$this->panel($id); 
			}
			else $this->index();
		}
		else $this->index();      	
	}
	
	public function guardar_pago($id){
		if($this->session->userdata('logueado')){
			if ($this->input->post()) {			
				$id_presupuesto = $this->input->post('id_presupuesto');
				$id_cliente = $this->input->post('id_cliente');	
				$nombre 	= $this->input->post('pago_nombre');
				$apellido 	= $this->input->post('pago_apellido');				
				$nacimiento	= $this->input->post('pago_nacimiento');			
				$dni 		= $this->input->post('pago_dni');			
				$email 		= $this->input->post('pago_email');
				$fijo    	= $this->input->post('pago_tel_fijo');			
				$direccion	= $this->input->post('pago_direccion');
				$postal		= $this->input->post('pago_postal');						
				$localidad  = $this->input->post('pago_localidad');

				$pago 		= $this->input->post('pago');
				$tarjeta	= $this->input->post('tarjeta');				

				$usuario    = $this->model_presupuesto->save_pago($id_cliente, 
																  $nombre, 
																  $apellido, 
																  $nacimiento, 
																  $dni, 
																  $email, 
																  $fijo, 
																  $direccion, 
																  $postal, 
																  $localidad,
																  $pago,
																  $tarjeta,
																  $id_presupuesto);												   		
				$this->panel($id); 
			}
			else $this->index();
		}
		else $this->index();      	
	}
	
	public function guardar_pago_new($id){
		if($this->session->userdata('logueado')){
			if ($this->input->post()) {			
				$id_presupuesto = $this->input->post('id_presupuesto');
				$id_cliente = $this->input->post('id_cliente');	
				$nombre 	= $this->input->post('pago_nombre');
				$apellido 	= $this->input->post('pago_apellido');				
				$nacimiento	= $this->input->post('pago_nacimiento');			
				$dni 		= $this->input->post('pago_dni');			
				$email 		= $this->input->post('pago_email');
				$fijo    	= $this->input->post('pago_tel_fijo');			
				$direccion	= $this->input->post('pago_direccion');
				$postal		= $this->input->post('pago_postal');						
				$localidad  = $this->input->post('pago_localidad');

				$pago 		= $this->input->post('pago');
				$tarjeta	= $this->input->post('tarjeta');				

				$usuario    = $this->model_presupuesto->save_pago($id_cliente, 
																  $nombre, 
																  $apellido, 
																  $nacimiento, 
																  $dni, 
																  $email, 
																  $fijo, 
																  $direccion, 
																  $postal, 
																  $localidad,
																  $pago,
																  $tarjeta,
																  $id_presupuesto);

				$mi_presupuesto = (array)$this->model_presupuesto->get_mi_presupuesto($id);

				//Obtener mi datos de envio   				   				
   				$p_id = $mi_presupuesto['id'];
   				$nro_envio = $mi_presupuesto['nro_envio'];
   				$tipo_tarjeta = $mi_presupuesto['id_pago'];

   				$tarjeta = (array) $this->model_presupuesto->get_tarjeta($tipo_tarjeta);

   				$datos_envio = (array) $this->model_presupuesto->get_mi_envio_2($id);   	   				

   				//Busco los datos del cliente
		        $datos = $this->model_presupuesto->get_cliente($p_id);
		        $compras = $this->model_presupuesto->get_compras($p_id);		        
				$tarjetas = $this->model_presupuesto->get_tarjetas();		        

			    $datos = parset_resultado_panel($datos,$mi_presupuesto,$tarjetas,$datos_envio,$compras, $tarjeta);

    	    	$this->load->view('header');							
			    $this->load->view('panel_nuevo', $datos);
			    $this->load->view('footer');																  											   						 
			}
			else $this->index();
		}
		else $this->index();      	
	}


	public function guardar_envio($id){
		if($this->session->userdata('logueado')){
			if ($this->input->post()) {				
				$id_envio 	= $this->input->post('id_envio');
				$sucursal 	= $this->input->post('sucursal');				
				$localidad 	= $this->input->post('localidad');			
				$envio 		= $this->input->post('envio');			
				$calle 		= $this->input->post('calle');
				$puerta 	= $this->input->post('puerta');			
				$piso 		= $this->input->post('piso');
				$depto 		= $this->input->post('depto');						
				$cod_postal	= $this->input->post('cod_postal');					
				$usuario  = $this->model_presupuesto->save_envio($id_envio, $sucursal, $localidad, $envio, $calle, $puerta, $piso, $depto, $cod_postal);												   		
				$this->panel($id); 
			}
			else $this->index();
		}
		else $this->index();      	
	}

   //Panel asociado al buscar, realiza la busqueda en amazon y lo guarda en esa base.
   public function panel($id){
   		if($this->session->userdata('logueado')){		      	   				   			
   				//Obtengo el presupuesto
   				$mi_presupuesto = (array)$this->model_presupuesto->get_mi_presupuesto($id);

				//Obtener mi datos de envio   				   				
   				$p_id = $mi_presupuesto['id'];
   				$nro_envio = $mi_presupuesto['nro_envio'];
   				$tipo_tarjeta = $mi_presupuesto['id_pago'];

   				$tarjeta = (array) $this->model_presupuesto->get_tarjeta($tipo_tarjeta);

   				$datos_envio = (array) $this->model_presupuesto->get_mi_envio($id);   	   				

   				//Busco los datos del cliente
		        $datos = $this->model_presupuesto->get_cliente($p_id);
		        $compras = $this->model_presupuesto->get_compras($p_id);		        
				$tarjetas = $this->model_presupuesto->get_tarjetas();		        

			    $datos = parset_resultado_panel($datos,$mi_presupuesto,$tarjetas,$datos_envio,$compras, $tarjeta);
				$this->load->view('header');							
			    $this->load->view('panel',$datos);
			    $this->load->view('footer');
		}
		else $this->index();      	
    }

    public function panel_nuevo(){
    	if($this->session->userdata('logueado')){	
    		$this->load->view('header');
    		$presupuesto = $this->model_presupuesto->crear_nuevo_presupuesto();    		
    		$tarjetas = $this->model_presupuesto->get_tarjetas();
    		$datos = parset_resultado_panel_vacio($tarjetas,$presupuesto['id']);    	
		    $this->load->view('panel_nuevo', $datos);
		    $this->load->view('footer');
    	}
		else $this->index();
    }

    public function resultado(){    
    	$this->load->view('header');

    	if($this->session->userdata('logueado')){ 

    		$_POST['username'] = $this->session->userdata('username');

			if ($this->input->post()) {
				
				$a_r = $this->input->post("presupuesto");
				$a_p = $this->input->post("pedido");	
				$a_c = $this->input->post("cliente");	
				$a_d = $this->input->post("fecha_desde");	
				$a_h = $this->input->post("fecha_hasta");

				if($a_r == "" and $a_p == "" and $a_c == "" and $a_d == "" and $a_h == ""){     						                 $data['modal'] = cadena_especial("Ingrese al menos un valor");  
		            $this->load->view('buscar_nuevo',$data);		            					
				}
				else{											
					if($a_r != ""){
						if(is_numeric($a_r)){
							$datos['tipo'] = 1;
							$datos['datos_resultados'] = $this->model_presupuesto->get_datos_tabla($a_r, $a_p, $a_c, $a_d, $a_h);	
							$this->load->view('resultado', $datos);				
						}
						else{							
							$data['modal'] = cadena_especial("Solo se aceptan números en el campo presupuesto");  
		            		$this->load->view('buscar_nuevo',$data);
						}
					}
					elseif($a_p != ""){
						if(is_numeric($a_p)){
							$datos['tipo'] = 2;
							$datos['datos_resultados'] = $this->model_presupuesto->get_datos_tabla($a_r, $a_p, $a_c, $a_d, $a_h);	
							$this->load->view('resultado', $datos);				
						}
						else{							
							$data['modal'] = cadena_especial("Solo se aceptan números en el campo pedido");  
		            		$this->load->view('buscar_nuevo',$data);
						}	
					}
					elseif($a_c != ""){
						if(is_numeric($a_c)){
							$datos['tipo'] = 3;
							$datos['datos_resultados'] = $this->model_presupuesto->get_datos_tabla($a_r, $a_p, $a_c, $a_d, $a_h);	
							$this->load->view('resultado', $datos);				
						}
						else{							
							$data['modal'] = cadena_especial("Solo se aceptan números en el campo cliente");  
		            		$this->load->view('buscar_nuevo',$data);
						}	
					}
					elseif($a_d != "" || $a_h != ""){

						if($a_d != "" && $a_h == ""){
							$data['modal'] = cadena_especial("La fecha hasta no puede ser nula");  
		            		$this->load->view('buscar_nuevo',$data);
						}
						elseif($a_d == "" && $a_h != ""){
							$data['modal'] = cadena_especial("La fecha desde no puede ser nula");  
		            		$this->load->view('buscar_nuevo',$data);
						}
						else{
							if(validateDate($a_d) && validateDate($a_h)){
								if(strtotime($a_d) < strtotime($a_h)){
									$datos['tipo'] = 4;
									$datos['datos_resultados'] = $this->model_presupuesto->get_datos_tabla($a_r, $a_p, $a_c, $a_d, $a_h);
									$this->load->view('resultado', $datos);					
								}
								else{
									$data['modal'] = cadena_especial("La fecha desde debe ser menor a la fecha hasta");  
		            				$this->load->view('buscar_nuevo',$data);			
								}
							}
							else{
								$data['modal'] = cadena_especial("El formato de la fecha debe ser 01/01/2017");  
		            			$this->load->view('buscar_nuevo',$data);		
							}
						}
					}					
					else{
						$data['modal'] = "";
		            	$this->load->view('buscar_nuevo',$data);
					}					
				}				
			}
			else{				
				$data['modal'] = "";
				$this->load->view('buscar_nuevo',$data);
			}
		   
		    
    	}
    	else{
    			$data['modal'] = "";				        		
				$this->load->view('login',$data);		        
      	}
		$this->load->view('footer');
    }  

    public function crear_nuevo_envio($id){
    	if($this->session->userdata('logueado')){
    		if ($this->input->post()) {

    			$sucursal 	= $this->input->post('sucursal');				
				$localidad 	= $this->input->post('localidad');			
				$envio 		= $this->input->post('envio');			
				$calle 		= $this->input->post('calle');
				$puerta 	= $this->input->post('puerta');			
				$piso 		= $this->input->post('piso');
				$depto 		= $this->input->post('depto');						
				$cod_postal	= $this->input->post('cod_postal');
				
    			$this->model_presupuesto->crear_nuevo_envio_model($id, $sucursal, $localidad, $envio, $calle, $puerta, $piso, $depto, $cod_postal);

    			//Obtengo el presupuesto
   				$mi_presupuesto = (array)$this->model_presupuesto->get_mi_presupuesto($id);

				//Obtener mi datos de envio   				   				
   				$p_id = $mi_presupuesto['id'];
   				$nro_envio = $mi_presupuesto['nro_envio'];
   				$tipo_tarjeta = $mi_presupuesto['id_pago'];

   				$tarjeta = (array) $this->model_presupuesto->get_tarjeta($tipo_tarjeta);

   				$datos_envio = (array) $this->model_presupuesto->get_mi_envio_2($id);   	   				

   				//Busco los datos del cliente
		        $datos = $this->model_presupuesto->get_cliente($p_id);
		        $compras = $this->model_presupuesto->get_compras($p_id);		        
				$tarjetas = $this->model_presupuesto->get_tarjetas();		        

			    $datos = parset_resultado_panel($datos,$mi_presupuesto,$tarjetas,$datos_envio,$compras, $tarjeta);

    	    	$this->load->view('header');							
			    $this->load->view('panel_nuevo', $datos);
			    $this->load->view('footer');
    		}
    		else $this->index();
    	}
		else $this->index();
    }

    public function update_presupuesto($id){
    	if($this->session->userdata('logueado')){
    		if ($this->input->post()) {
    			$a = $this->input->post('vencimiento');
    			$b = $this->input->post('costo');
    			$c = $this->input->post('anticipo');

    			$this->model_presupuesto->update_presupuesto_2($a,$b,$c,$id);

    			//Obtengo el presupuesto
   				$mi_presupuesto = (array)$this->model_presupuesto->get_mi_presupuesto($id);

				//Obtener mi datos de envio   				   				
   				$p_id = $mi_presupuesto['id'];
   				$nro_envio = $mi_presupuesto['nro_envio'];
   				$tipo_tarjeta = $mi_presupuesto['id_pago'];

   				$tarjeta = (array) $this->model_presupuesto->get_tarjeta($tipo_tarjeta);

   				$datos_envio = (array) $this->model_presupuesto->get_mi_envio_2($id);   	   				

   				//Busco los datos del cliente
		        $datos = $this->model_presupuesto->get_cliente($p_id);
		        $compras = $this->model_presupuesto->get_compras($p_id);		        
				$tarjetas = $this->model_presupuesto->get_tarjetas();		        

			    $datos = parset_resultado_panel($datos,$mi_presupuesto,$tarjetas,$datos_envio,$compras, $tarjeta);


    			$this->load->view('header');							
			    $this->load->view('panel_nuevo', $datos);
			    $this->load->view('footer');
    		}
    		else $this->index();
    	}
		else $this->index();
    } 
}
