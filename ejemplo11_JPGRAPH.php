<?php // content="text/plain; charset=utf-8"

/*
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
*/

require_once ('jpgraph-4.3.4/src/jpgraph.php');
require_once ('jpgraph-4.3.4/src/jpgraph_pie.php');

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

$data=array($resumen[0][1],
	         $resumen[1][1],
	         $resumen[2][1],
	         $resumen[3][1],
	         $resumen[4][1]);

$leyenda=array($resumen[0][0],
	           $resumen[1][0],
	           $resumen[2][0],
	           $resumen[3][0],
	           $resumen[4][0]); 


#$data = array(40,60,21,33);
 
$graph = new PieGraph(700,500);
$graph->SetShadow();
 
$graph->title->Set("Resultados % de la Encuesta");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$p1 = new PiePlot($data);
#$p1->SetLegends($gDateLocale->GetShortMonth());

$p1->SetLegends($leyenda);

$p1->SetCenter(0.4);
 
$graph->Add($p1);
$graph->Stroke();
 
?>