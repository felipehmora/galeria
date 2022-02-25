<?php 
	include 'ejemplo14_clase.php';
	
	include 'encabezado.php';
?>
	<h1>Galería</h1>
	<form method="POST"
	      action="ejemplo14_guardar.php"
	      enctype="multipart/form-data">
	      <table align="center">
			<tr>
				<td>Fotografía:</td>
				<td>
					<input type="file"
					       name="v_imagen"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Nombre:</td>
				<td>
					<input type="text"
					       name="v_nombre"
					       required="">
				</td>
			</tr>
			<tr>
				<td>Comentarios:</td>
				<td>
					<textarea cols="24" 
					          rows="5"
					          name="v_comentario"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="" value="GUARDAR">
				</td>
			</tr>      	
	      </table>
	</form>
	<hr>
<?php
	$sql = "SELECT * FROM tbl_galeria ORDER BY fecha DESC, hora DESC";

	$galeria = new Conexion();

	$operacion = $galeria->ejecutar($sql);
	
	$cantidad = mysqli_num_rows($operacion);

	if ($cantidad > 0){
		$a = 1;
		$b = 1;
		while ($data = mysqli_fetch_array($operacion)){
			$id[$a][$b] = $data['id'];
			$nombre_archivo[$a][$b] = $data['nombre_archivo'];
			$nombre[$a][$b] = $data['nombre'];
			$comentario[$a][$b] = $data['comentario'];
			$fecha[$a][$b] = $data['fecha'];
			$hora[$a][$b] = $data['hora'];
			$b++;
			if ($b == 4){
				$a++;
				$b = 1;
			}
		}
		if ($cantidad >= 3){
			$condicion = 3;
		}else{
			$condicion = $cantidad;
		}
?>
		<table align="center" class="galeria">
			<?php for ($c=1; $c<=$a; $c++) { ?>
				<tr>
					<?php for ($d=1; $d<=$condicion; $d++) { ?>

						<?php if (!empty($id[$c][$d])) { ?>

							<td>
								<img src="<?php echo $nombre_archivo[$c][$d];?>">
								<br>
								<b>Nombre:</b><?php echo $nombre[$c][$d];?><br>
								<b>Comentario:</b><?php echo $comentario[$c][$d];?><br>
								<b>Fecha:</b><?php echo $fecha[$c][$d];?><br>
								<b>Hora:</b><?php echo $hora[$c][$d];?><br>
							</td>

						<?php } ?>	

					<?php } ?>
				</tr>
			<?php } ?>
		</table>
<?php
	}else{
		$texto = "<div class='mensaje alerta'>No hay fotos en la galería</div>";
		$_GET['mensaje'] = $texto;
	}
?>
<?php 
	include 'pie.php';
?>