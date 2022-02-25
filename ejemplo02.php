<?php 
/*
POO : Programación Orientada a Objetos.

https://es.wikipedia.org/wiki/Programaci%C3%B3n_orientada_a_objetos


Clase: Es una entidad de programación, que permite la organización 
de los elementos que se emplearán en una aplicación. El concepto de
clase es tomado de la naturaleza, dado que es la forma adecuada como
se establecen diferencia entre los elementos, que conforman nuestro
entorno.
Ya en el campo de la Informática, una clase gráficamente tiene este
aspecto.

Nombre_de_clase
+-----------------------+
 atributo 1                         
 atributo 2               DATOS
 ...                      Declaración de variable
 atributo n
+-----------------------+
 método1()
 método2()                FUNCIONES 
 ...
 métodon()
+-----------------------+

Una clase, representa un molde, a partir del cual se crearán
objetos. Esto es lo que se conoce como el proceso de "instancia".
Cuando se habla, de instanciar una clase, se refiere a que se
está creando, un objeto.

Un objeto, se crea a partir de una clase.

Por ejemplo:

$alumno1 = new Alumno();
$alumno2 = new Alumno();
$alumno3 = new Alumno();
$alumno4 = new Alumno();


*/
/**
 * 
 */
class Alumno
{
	/* Atributos */
	public $nombre="";
	public $apellido="";
	public $edad=0;
	public $sexo="M";
	public $fecha_nacimiento="";

	/* Métodos */
	/*
		Acceso a los atributos de la clase dentro 
		dentro de ella misma.
		$this->nombre_atributo

	*/

	
	public function asistir_a_clase(){
		echo $this->nombre.
		     " ".
		     $this->apellido.
		     " asitió a clase<br>";
	}

	public function presentar_examen(){
		echo $this->nombre.
			 " ".
		     $this->apellido.
		     " presentó examen<br>";
	}

	public function intervenir_en_clase(){
		echo $this->nombre.
		     " ".
		     $this->apellido.
		     " intervino en clase<br>";
	}

}

// Creación de objetos (instancia de la clase), a partir 
// de la clase Alumno.
$alumno1 = new Alumno();

/*
ACCEDER A LOS ATRIBUTOS DE LA CLASE, MEDIANTE EL OBJETO.

$objeto->atributo = "VALOR";

*/

$alumno1->nombre = "Miguel";
$alumno1->apellido = "Modugno";
$alumno1->edad = 18;
$alumno1->sexo = "M";
$alumno1->fecha_nacimiento = "2002-01-15";


echo "<h3>ACCESO A MÉTODOS DE LA CLASE</h3>";
/*
$objeto->nombre_del_método()
*/
$alumno1->asistir_a_clase();
$alumno1->presentar_examen();
$alumno1->intervenir_en_clase();

?>