<?php

Class Model_Presupuesto extends CI_Model {

	public function __construct()	{
	  parent::__construct();
	  $this->load->database(); 
	}

	public function get_cliente($id) {	  
	  if($id != FALSE) {	  	
	    $query = $this->db->query('SELECT * FROM presupuesto_cliente WHERE p_id ='.$id.';');	
	    return $query->row_array();
	  }
	  else {
	    return FALSE;
	  }
	}

	function login($username, $password){
	   $this -> db -> select('id, username, password');
	   $this -> db -> from('presupuestos_users');
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', $password);
	   $this -> db -> limit(1);	 
	   $consulta = $this -> db -> get();
	   $resultado = $consulta->row();
	   return $resultado;	 
	}

	/**
	 * Obtengo datos del envio.
	 */
	function get_mi_envio($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuesto_envio');	
		$this -> db -> where('id', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_mi_presupuesto($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuesto');	
		$this -> db -> where('id', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_idweb($id){
		$this -> db -> select('id_web');
		$this -> db -> from('presupuesto');	
		$this -> db -> where('id', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_tarjetas(){
		$this -> db -> select('*');
		$this -> db -> from('pago');			
		$consulta = $this -> db -> get();
		return $consulta->result();	
	}

	function get_compras($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuesto_compra');	
		$this -> db -> where('id_presupuesto', $id);		
		$consulta = $this -> db -> get();
		return $consulta->result();	
	}


	function get_datos_tabla($pre, $ped, $cli, $fde, $fha){

		$this -> db -> select('*');
		$this -> db -> from('presupuesto');		
		if($pre != "") {
			$this -> db -> where('id', $pre);
			$consulta = $this -> db -> get();
			$resultado = $consulta -> row();
			return $resultado;
		}
		else if($ped != "") {
			$this -> db -> where('pedido', $ped);
			$consulta = $this -> db -> get();
			$consulta -> row();
			return $consulta;
		}		
		else if($cli != ""){
			$this -> db -> where('id_cliente', $cli);
			$consulta = $this -> db -> get();
			$consulta -> row();
			return $consulta;
		}			
		else if($fde != "" && $fha != ""){
			$array1 = explode("/", $fde);
			$array2 = explode("/", $fha);			
			$fde = $array1[2]."-".$array1[1]."-".$array1[0];			
			$fha = $array2[2]."-".$array2[1]."-".$array2[0];			
			$this -> db -> where('fecha >=', $fde);
			$this -> db -> where('fecha <=', $fha);
			$consulta = $this -> db -> get();
			$consulta -> row();
			return $consulta;
		}
	}
	
	function save_envio($id_envio, $sucursal, $localidad, $envio, $calle, $puerta, $piso, $depto, $cod_postal){
		$data = array(
           'p_sucursal' => $sucursal,
           'p_localidad' => $localidad,
           'p_denvio' => $envio,
           'p_calle' => $calle,
           'p_puerta' => $puerta,
           'p_piso' => $piso,               
		   'p_depto' => $depto,
		   'p_cpostal' => $cod_postal                              
        );
		$this->db->where('id', $id_envio);
		$this->db->update('presupuesto_envio', $data);
	}
	
	function save_pago($id_cliente, $nombre, $apellido, $nacimiento, $dni, $email, $fijo, $direccion, $postal, $localidad){
		$data = array(
           'p_nombres' => $nombre,
           'p_apellidos' => $apellido,
           'p_fecha_nacimiento' => $nacimiento,
           'p_dni' => $dni,           
           'p_email' => $email,           
           'p_telefono_fijo' => $fijo,               
		   'p_direccion' => $direccion,		   
		   'p_cp' => $postal,		   
		   'p_localidad' => $localidad		                                 
        );
		$this->db->where('id', $id_cliente);
		$this->db->update('presupuesto_cliente', $data);
	}
	
	function save_cliente($id_cliente, $c_nombre, $c_apellido, $c_direccion, $c_postal, $c_localidad, $c_telefono, $c_email){
		$data = array(
           'p_nombres' => $c_nombre,
           'p_apellidos' => $c_apellido,           
           'p_direccion' => $c_direccion,	
           'p_cp' => $c_postal,		
           'p_localidad' => $c_localidad,		   	              
           'p_telefono' => $c_telefono,               		      		      		 
		   'p_email' => $c_email		                                 
        );			
		
		$this->db->where('id', $id_cliente);
		$this->db->update('presupuesto_cliente', $data);
	}
}	

?>