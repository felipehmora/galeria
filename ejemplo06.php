<?php 
/*
Herencia: Significa que se pueden crear nuevas clases
partiendo de clases existentes, que tendrán todos los
atributos y métodos de su superclase o clase padre.
Además se le podran añadir otros atributos y métodos
propios.
Nota: En php, una clase sólo puede derivar de una
única clase, es decir no permite la herencia múltiple.
		
		            Super clase o clase padre
		            Vehiculo
					+------------+
                     atributos
                    --------------
                     métodos
                    +------------+
                          ^
                          | extends (extiende o hereda)
         +----------------+---------------+            
         |                |               |
    Autobus           Motocicleta     Particular
   +-----------+      +---------+     +-----------+
    atributos          atributos       atributos
    atributo 1         atributo 2      atributo 3
   -------------      -----------     -------------
    métodos            métodos         métodos
                       método 1
   +-----------+      +---------+     +-----------+

*/

/**
 * Clase Padre o super clase
 */
class Vehiculo
{
	// atributos
	public $motor = false;
	public $marca;
	public $color;

	// métodos
	public function estado(){
		if ($this->motor){
			echo "El motor está encendido<br>";
		}else{
			echo "El motor está apagado<br>";
		}
	}

	public function encender(){
		if ($this->motor){
			echo "Precaución: el motor ya se encontraba encendido<br>";
		}else{
			echo "Atención: el motor acaba de ser encendido<br>";
			$this->motor = true;
		}
	}
}

/**
 * Sub clase o clase hija
 */
class Motocicleta extends Vehiculo
{
	/* metodos */
	public function estadoMoto(){
		$this->estado();
	}
}

/**
 * Sub clase o clase hija
 */
class Autobus extends Vehiculo
{
	public function parada(){
		echo "El autobus hace la parada<br>";
	}
	
}

/**
 * Sub clase o clase hija
 */
class Particular extends Vehiculo
{
}

$corsa = new Vehiculo();
$corsa->estado();
$corsa->encender();
$corsa->estado();
echo "<hr>";

$motocros = new Motocicleta();
$motocros->estado();
$motocros->encender();
$motocros->estado();
$motocros->estadoMoto();
echo "<hr>";

$escolar = new Autobus();
$escolar->estado();
$escolar->encender();
$escolar->estado();
$escolar->parada();
echo "<hr>";

$paseo = new Particular();
$paseo->estado();
$paseo->encender();
$paseo->estado();
echo "<hr>";


?>
