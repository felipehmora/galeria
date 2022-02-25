<?php 
/**
 * 
 */
class Conexion
{
	// Atributos
	public $servidor;
	public $usuario;
	public $clave;
	public $bd;
	public $enlace;
	
	// Métodos
	function __construct()
	{
		$this->servidor = "localhost";
		$this->usuario  = "root";
		$this->clave    = "";
		$this->bd       = "bdphp3_20210614";
		$this->enlace   = mysqli_connect($this->servidor,
		                                 $this->usuario,
		                                 $this->clave,
		                                 $this->bd);
	}

	public function ejecutar($arg_sql){
		$resultado = mysqli_query($this->enlace, $arg_sql);
		return $resultado;
	}

	public function guardar_usuario($arg_ced="",$arg_nomape="",$arg_cor="",$arg_clave=""){
		if ($arg_ced=="" || $arg_nomape=="" || $arg_cor=="" || $arg_clave=="") {
			echo "ERROR: Debe ingresar los siguientes datos:<br>*Cédula<br>*Nombre y Apellido<br>*Correo<br>*Clave<br>";
		}else{
			$sql = "INSERT tbl_usuario(cedula, nombre_apellido, correo, clave, tipo_usuario)
			        VALUES ('$arg_ced','$arg_nomape','$arg_cor',md5('$arg_clave'), 'VISITANTE')";
			$operacion = $this->ejecutar($sql);
			if ($operacion){
				echo "Usuario fue registrado con éxito.<br>";
			}else{
				echo "Error:".mysqli_error($this->enlace);
			}
		}
	}

	public function borrar_usuario($arg_correo=""){
		if ($arg_correo == "") {
			echo "ERROR: Debe indicar el correo electrónico del usuario, que desea borrar<br>";
		}else{
			$sql = "DELETE FROM tbl_usuario 
			               WHERE correo = '$arg_correo'";
			$operacion = $this->ejecutar($sql);
			if ($operacion){
				$cantidad = mysqli_affected_rows($this->enlace);
				if ($cantidad > 0){	
					echo "El usuario:".$arg_correo.", fue borrado<br>";
				}else{
					echo "No se encontró usuario con el correo=".$arg_correo.", para ser borrado.<br>";
				}
			}else{
				echo "Error:".mysqli_error($this->enlace);
			}
		}
	}

	public function actualizar_usuario($arg_correo="",$arg_nomape="",$arg_clave=""){
		if ($arg_correo == ""){
			echo "Error: Debe ingresar el correo electrónico para efectuar búsqueda del usuario a actualizar<br>";
		}else{
			if ($arg_nomape != "" && $arg_clave == ""){
				$sql = "UPDATE tbl_usuario set nombre_apellido = '$arg_nomape' 
				        WHERE correo = '$arg_correo'";
			}else if ($arg_nomape == "" && $arg_clave != "") {
				$sql = "UPDATE tbl_usuario set clave = md5('$arg_clave') 
				        WHERE correo = '$arg_correo'";
			}else if ($arg_nomape != "" && $arg_clave != ""){
				$sql = "UPDATE tbl_usuario set nombre_apellido = '$arg_nomape',
				                               clave = md5('$arg_clave')
				                               WHERE correo = '$arg_correo'";
			}else{
				echo "ERROR: Debe indicar Nombre , Apellido o Clave<br>";
				return false;
			}
			$operacion = $this->ejecutar($sql);
			if ($operacion){
				$cantidad = mysqli_affected_rows($this->enlace);
				echo $cantidad."<br>";
				if ($cantidad > 0){	
					echo "El usuario:".$arg_correo.", fue actualizado<br>";
				}else{
					echo "No hubo actualización.<br>";
				}			
			}else{
				echo "ERROR:".mysqli_error($this->enlace)."<br>";
			}
		}
	}

	public function consultar_usuario($arg_correo=""){
		if ($arg_correo==""){
			echo "Error: Debe ingresar el correo electrónico para efectuar búsqueda del usuario a consultar<br>";
		}else{
			$sql = "SELECT * FROM tbl_usuario WHERE correo = '$arg_correo'";
			$operacion = $this->ejecutar($sql);
			if ($operacion){
				$cantidad = mysqli_num_rows($operacion);
				if ($cantidad >0 ){
					$data = mysqli_fetch_array($operacion);
					echo "Cédula:".$data['cedula']."<br>";
					echo "Nombre y Apellido:". $data['nombre_apellido']."<br>";
					echo "Correo:".$data['correo']."<br>";
					echo "Fin de la consulta.<br>";
				}else{
					echo "El usuario:".$arg_correo.", no fue encotrado<br>";
				}
			}else{
				echo "ERROR:".mysqli_error($this->enlace)."<br>";
			}
		}
	}
}

// 1) SE CREA EL OBJETO DE LA CLASE
$carrito_de_compras = new Conexion();

// 2) INSTRUCCIÓN A EJECUTAR
$sql = "SELECT * FROM tbl_usuario";

// 3) SE INVOCA EL MÉTODO
$operacion = $carrito_de_compras->ejecutar($sql);

// 4) RECORRIDO DEL RESULTADO
while ($data = mysqli_fetch_array($operacion)){
	echo $data['cedula'].",".
	     $data['nombre_apellido'].",".
	     $data['correo']."<br>";
}


echo "<hr>";

$carrito_de_compras->guardar_usuario("V7676",
	                                 "REBECA GONZALEZ",
	                                 "RGONZALEZ@HOTMAIL.COM",
	                                 "V7676");


echo "<hr>";
//$carrito_de_compras->borrar_usuario("RGONZALEZ@HOTMAIL.COM");

echo "<hr>";
#$carrito_de_compras->actualizar_usuario();
#$carrito_de_compras->actualizar_usuario("RGONZALEZ@HOTMAIL.COM");
#$carrito_de_compras->actualizar_usuario("RGONZALEZ@HOTMAIL.COM","ROSALBA GONZALEZ","");
#$carrito_de_compras->actualizar_usuario("RGONZALEZ@HOTMAIL.COM","","V9999");

echo "<hr>";
$carrito_de_compras->consultar_usuario("RGONZALEZ@HOTMAIL.COM");

?>