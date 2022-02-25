<?php 
	include "encabezado.php";
?>
<h1>Encuesta</h1>
<h2>
	Por favor indique: ¿cuál de los siguientes lenguajes<br>de programación, es el de su preferencia?
</h2>
<br><br> 
<form method="POST">
<div align="center">
	<input type="radio" 
	       name="opcion"
	       value="JAVASCRIPT">JAVASCRIPT	
	<input type="radio"
	       name="opcion"
	       value="PYTHON">PYTHON
	<input type="radio"
	       name="opcion"
	       value="PHP">PHP
	<input type="radio"
	       name="opcion"
	       value="JAVA">JAVA
	<input type="radio"
	       name="opcion"
	       value="NO SABE">NO SABE
</div>
<br><br>
<div align="center">
	<input type="submit" 
	       name=""
	       value="ENVIAR">
	<button onclick="window.open('ejemplo09_JPGRAPH.php')">Gráfico de barras</button>
	<button onclick="window.open('ejemplo11_JPGRAPH.php')">Gráfico de torta</button>
</div>
<br>
</form>
<?php
	date_default_timezone_set("America/Caracas");
	$fecha = date("Y-m-d");
	$hora  = date("H:i:s");
	if (isset($_POST['opcion'])){
		$opc = $_POST['opcion'];
		$registro = $fecha.";".$hora.";".$opc.";\n";
		$id = fopen("encuesta.txt","a+");
		fwrite($id,$registro);
		fclose($id);
		$_GET['msj']="<div class='atencion'>Usted elegió la opción ".$_POST['opcion']."</div>";
		unset($_POST['opcion']);
	}else{
		$_GET['msj']="<div class='bien'>Debe elegir una de la opciones sugeridas</div>";
	}
?>
<h2>Resultados</h2>
<?php 
$resumen = [["JAVASCRIPT",0],
            ["PYTHON",0],
            ["PHP",0],
            ["JAVA",0],
            ["NO SABE",0]];

$data = file("encuesta.txt");
for ($i=0; $i<count($data); $i++) { 
	//echo $data[$i]."<br>";
	$detalle = explode(";", $data[$i]);
	/*
	echo "DETALLE:".var_dump($detalle)."<br>";
	echo $detalle[2]."<br>";
	echo var_dump($resumen)."<br>";
	*/
	switch ($detalle[2]) {
		case 'JAVASCRIPT':
			$resumen[0][1] = $resumen[0][1] + 1;
			break;
		case 'PYTHON':
			$resumen[1][1] = $resumen[1][1] + 1;
			break;
		case 'PHP':
			$resumen[2][1] = $resumen[2][1] + 1;
			break;
		case 'JAVA':
			$resumen[3][1] = $resumen[3][1] + 1;
			break;
		default:
			$resumen[4][1] = $resumen[3][1] + 1;
			break;
	}
}
?>
<table align="center" border="1">	
	<tr>	
		<th>Lenguaje</th>
		<th>Gráfico</th>
		<th>Cantidad</th>
		<th>%</th>
	</tr>
<?php for ($i=0; $i<count($resumen) ; $i++) { ?>
	<tr>
		<td><?php echo $resumen[$i][0];?></td>
		<td>
			<meter min="0"
			       max="100"
			       low="33"
			       high="66"
			       optimum="80"
			       value="<?php echo $resumen[$i][1]/count($data)*100 ?>"></meter>
		</td>
		<td align="right"><?php echo $resumen[$i][1];?></td>
		<td><?php echo number_format($resumen[$i][1]/count($data)*100,2,",",".") ?></td>
	</tr>
<?php } ?>	
	<tr>	
		<td colspan="2" align="right">Total:</td>
		<td align="right"><?php echo count($data);?></td>
		<td>100</td>
	</tr>
</table>
<br>
<?php 
	include "pie.php";
?>