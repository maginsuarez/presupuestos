<?php

Class Model_Presupuesto extends CI_Model {

	public function __construct()	{
	  parent::__construct();
	  $this->load->database(); 
	}

	public function get_cliente($id) {	  
	  if($id != FALSE) {	  	
	    $query = $this->db->query('SELECT * FROM presupuestos_cliente WHERE p_id ='.$id.';');	
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
		$this -> db -> from('presupuestos_envio');	
		$this -> db -> where('id_presupuesto', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_mi_envio_2($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuestos_envio');	
		$this -> db -> where('id_presupuesto', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_mi_presupuesto($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuestos');	
		$this -> db -> where('id', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_tarjeta($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuestos_pago');	
		$this -> db -> where('id', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_idweb($id){
		$this -> db -> select('id_web');
		$this -> db -> from('presupuestos');	
		$this -> db -> where('id', $id);
		$consulta = $this -> db -> get();
		$resultado = $consulta -> row();
		return $resultado;
	}

	function get_tarjetas(){
		$this -> db -> select('*');
		$this -> db -> from('presupuestos_pago');			
		$consulta = $this -> db -> get();
		return $consulta->result();	
	}

	function get_compras($id){
		$this -> db -> select('*');
		$this -> db -> from('presupuestos_compra');	
		$this -> db -> where('id_presupuesto', $id);		
		$consulta = $this -> db -> get();
		return $consulta->result();	
	}


	function get_datos_tabla($pre, $ped, $cli, $fde, $fha){

		$this -> db -> select('*');
		$this -> db -> from('presupuestos');		
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
		$this->db->update('presupuestos_envio', $data);
	}
	
	function save_pago($id_cliente, $n, $apellido, $nacimiento, $dni, $email, $fijo, $direccion, $postal, $localidad, $p, $t, $id){
		$data = array(
           'p_nombres' => $n,
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
		$this->db->update('presupuestos_cliente', $data);
	
		$x = "";
		if($p == "T") $x = $t;
		$data2 = array('forma_pago' => $p, 'id_pago' => $x);
		$this->db->where('id', $id);
		$this->db->update('presupuestos', $data2);		
	}

	function save_compra($anticipo, $costo, $vencimiento, $id){
		$data = array(
           'anticipo' => $anticipo,
           'costo_envio' => $costo,
           'vencimiento' => $vencimiento
        );
        $this->db->where('id', $id);
		$this->db->update('presupuestos', $data);	
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
		$this->db->update('presupuestos_cliente', $data);
	}

	function new_compra($id, $a, $b, $c, $d, $e){
		$data = array(
           'codigo' => $a,
           'descripcion' => $b,           
           'cuotas' => $c,	
           'precio' => $d,		
           'dp' => $e,		   	              
           'id_presupuesto' => $id
		                              
        );	

		$query = $this->db->query('SELECT count(*) cant FROM presupuestos_compra WHERE codigo ="'.$a.'";');	
	    $resultado = $query->row_array();
	    if($resultado['cant'] == 0) $this->db->insert('presupuestos_compra', $data); 
	}

	function crear_nuevo_envio_model($id, $sucursal, $localidad, $envio, $calle, $puerta, $piso, $depto, $cod_postal){
		$data = array(
           'p_sucursal' => $sucursal,
           'p_localidad' => $localidad,           
           'p_denvio' => $envio,	
           'p_calle' => $calle,		
           'p_puerta' => $puerta,		   	              
           'p_piso' => $piso,
           'p_depto' => $depto,
           'p_cpostal' => $cod_postal,
		   'id_presupuesto' => $id,		                              
        );

        $query = $this->db->query('SELECT count(*) cant FROM presupuestos_envio WHERE id_presupuesto ="'.$id.'";');	
	    $resultado = $query->row_array();
	    if($resultado['cant'] == 0) $this->db->insert('presupuestos_envio', $data);
	}

	function crear_nuevo_presupuesto(){
		$fecha = date("Y/m/d");
		$data = array('creacion' => $fecha);
		$this->db->insert('presupuestos', $data); 
		$query = $this->db->query('SELECT id FROM presupuestos ORDER BY id DESC LIMIT 1;');	
	    return (array)$query->row_array();
	}

	function crear_nuevo_usuario($a, $b, $c, $d, $e, $f, $g, $pre){
		$data = array(
           'p_nombres' => $a,
           'p_apellidos' => $b,           
           'p_direccion' => $c,	
           'p_cp' => $d,		
           'p_localidad' => $e,		   	              
           'p_telefono' => $f,               		      		      		 
		   'p_email' => $g,		                             
		   'p_id' => $pre		                              
        );
		$query = $this->db->query('SELECT count(*) cant FROM presupuestos_cliente WHERE p_id = '.$pre.';');
		$re = (array)$query->row_array();
		$re = $re['cant'];

		if($re == 0) $this->db->insert('presupuestos_cliente', $data);
	}

	function update_presupuesto($n_c, $n_w, $id){
		$data = array(
           'id_cliente' => $n_c,
           'id_web' => $n_w		                                 
        );			
		
		$this->db->where('id', $id);
		$this->db->update('presupuestos', $data);
	}

	function update_presupuesto_2($ven,$cos,$ant,$presupuesto){
		$data = array(
           'anticipo' => $ant,
           'vencimiento' => $ven,
           'costo_envio' => $cos,		                                 
        );			
		
		$this->db->where('id', $presupuesto);
		$this->db->update('presupuestos', $data);
	}
}	

?>