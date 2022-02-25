<?php 
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
		$this->bd       = "bdphp4_20210621";
		$this->enlace   = mysqli_connect($this->servidor,
		                                 $this->usuario,
		                                 $this->clave,
		                                 $this->bd);
	}

	public function ejecutar($arg_sql){
		$resultado = mysqli_query($this->enlace, $arg_sql);
		return $resultado;
	}
}
?>