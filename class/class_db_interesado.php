<?php
   require_once ('class_conexion.php');
   class DBInteresado extends Conexion{
      private $mysqli;

      function __construct(){
         $this->mysqli = parent::conectar();
      }

      //------------------------------------------------------------------------------------------------------------
		public function agregar($data){
			$status=0;
			$correo= $data['correo'];  
            $nombre= $data['nombre'];
            $telefono_local= $data['telefono_local'];
            $telefono_movil= $data['telefono_movil'];
            $enteraste= $data['entero'];
            $region= $data['region'];
            $sexo= $data['sexo'];
            $fecha_hora = date("Y-m-d H:i:s", strtotime('-1 hours'));
            
			if (!($sentencia = $this->mysqli->prepare('INSERT INTO interesados(id,correo,nombre,telefono_local,telefono_movil,sexo,enteraste,region,status,fecha, hora) VALUES (NULL,?,?,?,?,?,?,?,?,?,?)'))){
				 //echo "Falló la preparación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
				 return "2";
			}
			/* Sentencia preparada, etapa 2: vinculación y ejecución */
			if (!$sentencia->bind_param("sssssiiiss",$correo,$nombre,$telefono_local,$telefono_movil,$sexo,$enteraste,$region,$status,$fecha_hora,$fecha_hora)){
				echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
				return "3";
			}

			if (!$sentencia->execute()){
				//echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
				return "4";
			}else{
				$vMensaje =array("codigo"=>$sentencia->insert_id, "mensaje"=>"agregado");
				/*if($sentencia->affected_rows > 0){                
					$vMensaje =array("codigo"=>$sentencia->insert_id, "mensaje"=>"agregado");
				}else{
					$vMensaje =array("codigo"=>"0", "mensaje"=>"problema");
				}*/
				$sentencia->close();
				return $vMensaje;
			}
		}

		public function agregar2($data){
			$status=0;
			$correo= $data['correo'];  
            $nombre= $data['nombre'];
            $telefono_local= $data['telefono_local'];
            $telefono_movil= $data['telefono_movil'];
            $codigo= $data['codigo'];
            $region= $data['region'];
            $sexo= $data['sexo'];
            $fecha_hora = date("Y-m-d H:i:s", strtotime('-1 hours'));
            
			if (!($sentencia = $this->mysqli->prepare('INSERT INTO interesados(id,correo,nombre,telefono_local,telefono_movil,sexo,codigo,region,status,fecha, hora,enteraste) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,7)'))){
				 //echo "Falló la preparación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
				 return "2";
			}
			/* Sentencia preparada, etapa 2: vinculación y ejecución */
			if (!$sentencia->bind_param("ssssssiiss",$correo,$nombre,$telefono_local,$telefono_movil,$sexo,$codigo,$region,$status,$fecha_hora,$fecha_hora)){
				echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
				return "3";
			}

			if (!$sentencia->execute()){
				//echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
				return "4";
			}else{
				$vMensaje =array("codigo"=>$sentencia->insert_id, "mensaje"=>"agregado");
				/*if($sentencia->affected_rows > 0){                
					$vMensaje =array("codigo"=>$sentencia->insert_id, "mensaje"=>"agregado");
				}else{
					$vMensaje =array("codigo"=>"0", "mensaje"=>"problema");
				}*/
				$sentencia->close();
				return $vMensaje;
			}
		}

		public function agregarAliado($data){
			$status=0;
			$correo= $data['correo'];  
            $nombre= $data['nombre'];
            $apellido= $data['apellido'];
            $pais= $data['pais'];
            $fecha_hora = date("Y-m-d H:i:s", strtotime('-1 hours'));
            
			if (!($sentencia = $this->mysqli->prepare('INSERT INTO aliados(id,correo,nombre,apellido,pais,fecha, hora) VALUES (NULL,?,?,?,?,?,?)'))){
				 //echo "Falló la preparación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
				 return "2";
			}
			/* Sentencia preparada, etapa 2: vinculación y ejecución */
			if (!$sentencia->bind_param("ssssss",$correo,$nombre,$apellido,$pais,$fecha_hora,$fecha_hora)){
				echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
				return "3";
			}

			if (!$sentencia->execute()){
				//echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
				return "4";
			}else{
				$vMensaje =array("codigo"=>$sentencia->insert_id, "mensaje"=>"agregado");
				/*if($sentencia->affected_rows > 0){                
					$vMensaje =array("codigo"=>$sentencia->insert_id, "mensaje"=>"agregado");
				}else{
					$vMensaje =array("codigo"=>"0", "mensaje"=>"problema");
				}*/
				$sentencia->close();
				return $vMensaje;
			}
		}


		public function getPais($id){
			if( !($sentencia = $this->mysqli->prepare("SELECT nombre FROM paises WHERE id=?" )) ){
				echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
			}else{
				if( !$sentencia->bind_param('i', $id)){
					echo "Falló la vinculación de parámetros: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
				}else{
					if( !$sentencia->execute() ){
						echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
					}else{
						if (!($resultado = $sentencia->bind_result($nombre))){
							echo "Falló la obtención del conjunto de resultados: (" . $sentencia->errno . ") " . $sentencia->error;
						}else{
						    $data=array();
							while($sentencia->fetch()){
			 					$pais = $nombre;
							}
							return $pais;
						}
					}
				}
			}
		}
		//-----------------------------------------------------------------------------------------------------------

	public function getAllPaises(){
			$data=array();
			$resultado = $this->mysqli->query("SELECT id, nombre from paises Order By nombre asc");
         	$resultado->data_seek(0);
            while( $fila = $resultado->fetch_assoc() ){
            	$data[] = $fila;
         	}
			return $data;
	}

	public function getByIdPais($vID){
			if( !($sentencia = $this->mysqli->prepare("SELECT id, nombre FROM estados WHERE pais_id=?" )) ){
				echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
			}else{
				if( !$sentencia->bind_param('i', $vID)){
					echo "Falló la vinculación de parámetros: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
				}else{
					if( !$sentencia->execute() ){
						echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
					}else{
						if (!($resultado = $sentencia->bind_result($id_estado, $nombre))){
							echo "Falló la obtención del conjunto de resultados: (" . $sentencia->errno . ") " . $sentencia->error;
						}else{
						    $data=array();
							while($sentencia->fetch()){
			 						$data[]=array('id'=>$id_estado, 'nombre'=>$nombre);
							}
							return $data;
						}
					}
				}
			}
		}

		//-----------------------------------------------------------------------------------------------------------
	  public function verificar_correo($vCorreo){
			if( !($sentencia = $this->mysqli->prepare("SELECT id FROM interesados WHERE correo=?") ) ){
				echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
			}else{
				if( !$sentencia->bind_param('s', $vCorreo) ){
					echo "Falló la vinculación de parámetros: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
				}else{
					if( !$sentencia->execute() ){
						echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
					}else{
						if (!($resultado = $sentencia->bind_result($vId))){
							echo "Falló la obtención del conjunto de resultados: (" . $sentencia->errno . ") " . $sentencia->error;
						}else{
						    $data=array();
							while($sentencia->fetch()){
			 						$data[]=array('id'=>$vId);
							}
							return $data;
						}
					}
				}
			}
		}

		public function verificar_correo_aliado($vCorreo){
			if( !($sentencia = $this->mysqli->prepare("SELECT id FROM aliados WHERE correo=?") ) ){
				echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
			}else{
				if( !$sentencia->bind_param('s', $vCorreo) ){
					echo "Falló la vinculación de parámetros: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
				}else{
					if( !$sentencia->execute() ){
						echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
					}else{
						if (!($resultado = $sentencia->bind_result($vId))){
							echo "Falló la obtención del conjunto de resultados: (" . $sentencia->errno . ") " . $sentencia->error;
						}else{
						    $data=array();
							while($sentencia->fetch()){
			 						$data[]=array('id'=>$vId);
							}
							return $data;
						}
					}
				}
			}
		}
		
		
		public function activar_cuenta($correo){
			$status=1;
			if( !($sentencia = $this->mysqli->prepare("UPDATE interesados SET status=? WHERE correo = ?") ) ){
				//echo "Falló la preparación: (" . $this->mysqli->errno . ")" . $this->mysqli->error;
				return 2;
			}elseif (!$sentencia->bind_param('is', $status,$correo)){
				//echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
				return 3;
			}elseif (!$sentencia->execute()){
				//echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
				return 4;
			}else{
				return 1;//header('Location:index.php');
			}
		}


         

}
		//-----------------------------------------------------------------------------------------------------------
?>