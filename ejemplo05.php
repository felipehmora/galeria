<?php 
/*
Modificadores de Acceso:
Son simples propiedades, que podemos añadir a los
métodos y atributos de una clase. Sirven para limitar
el acceso y extracción de los valores asignados a
los atributos y las funcionalidades descritas en los
métodos.

Tipos de Modificadores de acceso:

1)public : Permite realizar cualquier operación con el atributo o método, sin ningún tipo de restricción.

2)private : El atributo o método, sólo puede ser llamado
desde otro método dentro de la misma clase. No se puede
llamar a métodos privados, desde donde se define el
objeto.

3)protected : El atributo o método, definido como protected
puede ser accedido por la clase, por todas las sub clases
pero, no por los objetos que se definen de dichas clases.

*/

/**
 * 
 */
class Perfil
{
	// atributos
	public $nombre;
	public $apellido;
	public $edad;
	private $clave;

	// métodos
	function __construct($arg_nom="",
	                     $arg_ape="",
	                     $arg_edad="",
	                     $arg_clave="")
	{
		if ($arg_nom=="" || 
			$arg_ape=="" || 
			$arg_edad==""||
			$arg_clave=="" ){
			echo "ERROR: Se requiere que la instancia de la clase contenga:<br>*nombre<br>*apellido<br>*edad<br>*clave<br>";
			return false;			
		}else{
			$this->nombre = $arg_nom;
			$this->apellido = $arg_ape;
			$this->edad = $arg_edad;
			$this->clave = $arg_clave;
		}
	}

	public function get_informacion(){
		echo "Nombre:".$this->nombre."<br>";
		echo "Apellido:".$this->apellido."<br>";
		echo "Edad:".$this->edad."<br>";
		echo "Clave:".$this->clave."<br>";
	}

	public function set_nuevaclave($arg_clave){
		$this->clave = $arg_clave;
		return true;
	}

	private function set_verificar($arg_texto){
		echo $arg_texto."<br>";
	}

	public function set_verificar_publico($arg_texto1){
		$this->set_verificar($arg_texto1);
	}

}

$estudiante = new Perfil("MARIA","SANCHEZ",20,'1234');

$estudiante->get_informacion();

# La siguiente instrucción generará un error
# echo $estudiante->clave."<br>";
echo "<hr>";
$estudiante->get_informacion();

# La siguientes instrucción generará un error
# $estudiante->clave = "ABCD";
echo "<hr>";
if ($estudiante->set_nuevaclave("ABCD")){
	echo "La clave fue cambiada con éxito<br>";
}else{
	echo "ERROR: La clave no pudo ser cambiada<br>";
}
echo "<hr>";
$estudiante->get_informacion();

echo "<hr>";
# El siguiente llamado generará un error, dado 
# que el método es private
# $estudiante->set_verificar("esto es una prueba");

$estudiante->set_verificar_publico("esto es una prueba");

?>

