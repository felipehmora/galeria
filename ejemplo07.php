<?php 
/*
Métodos y atributos estáticos

Un método estático, pertence a la clase, pero no puede
acceder a los atributos de una instancia. 
La característica fundamental, es que un método estático
se puede llamar sin tener que crear un objeto de dicha
clase.
Una propiedad (atributo) declarada como "static" no
puede ser accedida con un objeto de clase (instancia),
aunque un método estático, si lo puede hacer.

Puntos de atención:

1) Un método estático, no puede acceder a los atributos
de la clase.

2) Se debe indicar primero el nombre de la clase, luego
el operdor "::" y por último indicamos el nombre del 
métod estático a llamar..

3) Las propiedades (atributos) estáticas no pueden ser
accedidas a través del objeto utilizando el operador
de flecha ->

4) Un método estático, es lo más parecido a una función
de un lenguaje estructurado. Sólo que se encapsula dentro
de la clase.

*/

/**
 * 
 */
class Dominio
{
	# atributos
	public $nombre = "UNEWEB";
	public static $url = "https://www.uneweb.edu.ve";

	# métodos
	public function bienvenida(){
		echo "Bienvenido a:".
		      $this->nombre.
		      " nuestro sitio web es:".
		      self::$url."<br>";
	}

	public static function bienvenida2(){
		echo "Bienvenido a nuestro sitio web:".
			self::$url."<br>";
	}
}

Dominio::bienvenida2();

echo "<hr>";

echo Dominio::$url."<br>";

echo "<hr>";

# Prueba instancia de la clase

$instituto = new Dominio();
$instituto->bienvenida();

echo "<hr>";
# Esta instrucción generará error dado que estático el atributo
#echo $instituto->url;

$instituto->bienvenida2();

?>