<?php 	
/**
 * Un método constructor, es una función especial, que se declara en 
 * la clase a los efectos de inicializar la misma. Es un método 
 * especial, que se ejecuta de forma automática, cada vez que se 
 * instancia una clase.
 *
 * public function __construct(){
 *	
 * }
 *
 * Un método destruct, siempre se ejecuta al finalizar.
 *
 * public function __destruct(){
 *	
 * }
 *
 * Ejemplo: Se definirá una clase cuyos métodos permitan simular un
 * juego de lotería, dicho método recibirá 2 argumentos: el 1ro.
 * corresponde al número a jugar y el 2do. al número de intentos.
 * Al final del sorteo, se debe mostrar si hubo o no ganador y 
 * en caso de haber ganador, en cuántas oportunidades atinó al
 * número ganador.
 */
class Loteria
{
	// Atributos
	public $numero = 0;
	public $intentos = 0;
	public $ganador = false;
	public $cantidad = 0;

	// Métodos
	function __construct($arg_numero, $arg_intentos)
	{
		$this->numero = $arg_numero;
		$this->intentos = $arg_intentos;
	}

	public function jugar(){
		$minimo = $this->numero/2;
		$maximo = $this->numero*2;

		for ($i=0; $i < $this->intentos ; $i++) { 
			$numero_al_azar = rand($minimo,$maximo);
			$this->verificar($numero_al_azar);
		}

	}

	public function verificar($arg_nro_azar){
		if ($arg_nro_azar == $this->numero){
			$this->ganador = true;
			$this->cantidad++;
			echo $this->numero."==".($arg_nro_azar)."<br>";
		}else{
			echo $this->numero."!=".($arg_nro_azar)."<br>"; 
		}
	}

	public function __destruct(){
		if ($this->ganador){
			echo "<b>Felicitaciones hubo ganador, en: ".$this->cantidad." oportunidades</b><br>";
		}else{
			echo "<i>No hubo hubo ganador, siga jugando</i><br>";
		}
	}
}

$juego = new Loteria(7,13);
$juego->jugar();


?>