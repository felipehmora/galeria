<?php
require('fpdf183/fpdf.php');
require('ejemplo13_clase.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'REPORTE',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF("L");
// Creación del objeto para acceder a la base de datos bdphp3_20210614
$carrito = new Conexion();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$sql = "SELECT * from tbl_producto";
$operacion = $carrito->ejecutar($sql);

if ($operacion){
    while ($data=mysqli_fetch_array($operacion)){
        $texto = $data['id_producto'].",".
                 $data['nombre_producto'].",".
                 $data['descripcion'].",".
                 $data['precio'].",".
                 $data['existencia']; 
        $pdf->Cell(0,10,$texto,0,1);    
    }
}else{
        $texto = "ERROR:".mysqli_error($carrito->enlace);
        $pdf->Cell(0,10,$texto,0,1);
}

/*
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
*/

$pdf->Output();
?>