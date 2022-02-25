<!--
https://jpgraph.net/download/
-->
<?php 

require_once ('jpgraph-4.3.4/src/jpgraph.php');
require_once ('jpgraph-4.3.4/src/jpgraph_bar.php');
 
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

#$datay=array(12,8,19,3,10,5);

$datay=array($resumen[0][1],
	         $resumen[1][1],
	         $resumen[2][1],
	         $resumen[3][1],
	         $resumen[4][1]);

#$datax=array("JS","PY","PHP","JAVA","NO SABE");
$datax=array($resumen[0][0],
	         $resumen[1][0],
	         $resumen[2][0],
	         $resumen[3][0],
	         $resumen[4][0]); 

// Create the graph. These two calls are always required
$graph = new Graph(700,500);
$graph->SetScale('intlin');
 
// Add a drop shadow
$graph->SetShadow();
 
// Adjust the margin a bit to make more room for titles
$graph->SetMargin(40,30,20,40);
 
// Create a bar pot
$bplot = new BarPlot($datay);
 
// Adjust fill color
$bplot->SetFillColor('orange');
$graph->Add($bplot);
 
// Setup the titles
$graph->title->Set('Resultado de la encuesta');
$graph->xaxis->title->Set('Opcion');
$graph->yaxis->title->Set('Cantidad');

$graph->xaxis->SetTickLabels($datax);
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
// Display the graph
$graph->Stroke();
?>