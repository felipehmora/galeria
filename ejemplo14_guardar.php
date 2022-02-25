<?php 
			include 'ejemplo14_clase.php';

			$carrito = new Conexion();

			# GUARDAR foto
			$img_nombre_temporal = $_FILES['v_imagen']['tmp_name'];
			$img_nombre          = $_FILES['v_imagen']['name'];

			//echo var_dump($_FILES['v_imagen']);

			$img_data = getimagesize($img_nombre_temporal);

			//echo var_dump($img_data);

			$img_valida = false;

			if ($img_data[2] == '1'){
				$extension = ".gif";
				$img_valida = true;
			}else if ($img_data[2] == '2'){
				$extension = '.jpg';
				$img_valida = true;
			}else if ($img_data[2] == '3'){
				$extension = '.png';
				$img_valida = true;
			}else{
				$img_valida = false;
			}

			if ($img_valida){
				$directorio = "galeria/";

				$sql_nomb_imagen = "SELECT AUTO_INCREMENT FROM information_schema.TABLES
									WHERE TABLE_SCHEMA = 'bdphp4_20210621' 
									AND TABLE_NAME = 'tbl_galeria'";

				$r_nomb_imgen = $carrito->ejecutar($sql_nomb_imagen);

				$data_nomb_imagen = mysqli_fetch_array($r_nomb_imgen);

				$nombre_imagen =  $data_nomb_imagen[0];

				$nombre_archivo = $directorio.$nombre_imagen.$extension;

				//echo $nombre_archivo;

				date_default_timezone_set("America/Caracas");
				$fecha = date("Y-m-d");
				$hora  = date("H:i:s");

				$sql_galeria = "INSERT INTO tbl_galeria(nombre, 
				                                        comentario,
				                                        nombre_archivo,
				                                        fecha,
				                                        hora)
				                 VALUES ('$_REQUEST[v_nombre]',
				                         '$_REQUEST[v_comentario]',
				                         '$nombre_archivo',
				                         '$fecha',
				                         '$hora')";

				$resultado = $carrito->ejecutar($sql_galeria);

				if ($resultado){
					move_uploaded_file($img_nombre_temporal, $nombre_archivo);
					$texto = "<div class='mensaje completado'>La foto fué almacenada con éxito.</div>";
				}else{
					$texto = "<div class='mensaje error'>ERROR:".
					          mysqli_error($carrito->enlace)."</div>";
				}
			}else{
				$texto = "<div class='mensaje alerta'>ERROR: Sólo se permite el ingreso de imagenes de tipo GIF, JPG y PNG, en la carga de fotos.</div>";
			}
			header("location:ejemplo14.php?mensaje=".$texto);

 ?>