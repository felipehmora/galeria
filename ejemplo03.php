<?php 	
	/**
	 * 	
	 */
	class Persona
	{
		// atributos
		public $nombre = array();
		public $apellido = array();

		// métodos

		public function guardar($arg_nom, $arg_ape){
			$this->nombre[] = $arg_nom;
			$this->apellido[] = $arg_ape;
		}

		public function mostrar(){
			for ($i=0; $i<count($this->nombre) ; $i++) { 

				// 1ra. forma de acceder a método dentro de la clase
				// $this->detalle($this->nombre[$i], $this->apellido[$i]);

				// 2da. forma de acceder a método dentro de la clase
				// self::detalle($this->nombre[$i], $this->apellido[$i]); 

				// 3ra. forma de acceder a método dentro de la clase
				Persona::detalle($this->nombre[$i], $this->apellido[$i]); 
			}
		}

		public function detalle($arg_nombre, $arg_apellido){
			echo "NOMBRE:".$arg_nombre."<br>";
			echo "APELLIDO:".$arg_apellido."<br>";
			echo "<hr>";
		}

	}

$curso = new Persona();
$curso->guardar("Angel","Gonzalez");
$curso->guardar("Miguel","Modugno");
$curso->guardar("Yilber","Teran");
$curso->guardar("Alejandro","Grande");
$curso->guardar("Felipe","Hernandez");

//echo var_dump($curso);

$curso->mostrar();

?>