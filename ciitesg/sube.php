<?php 
//Guarda foto
$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];

if(!file_exists('fotos')){
	mkdir('fotos',0777,true);
	if(file_exists('fotos')){
		if(move_uploaded_file($guardado, 'fotos/'.$nombre)){
			//echo "Archivo guardado con exito";
		}else{
			//echo "Archivo no se pudo guardar";
		}
	}
}else{
	if(move_uploaded_file($guardado, 'fotos/'.$nombre)){
		//echo "Archivo guardado con exito";
	}else{
		//echo "Archivo no se pudo guardar";
	}
}

	include 'conexion.php';

	NuevoUsuario($_POST['nombre'], $_POST['user'], $_POST['pw'], $_POST['tipo'], $_FILES['archivo']['name']);

	function NuevoUsuario($nom, $user, $pw, $tipo, $nombre)
	{
		$sentencia="INSERT INTO permisos (nombre, usuario, pw, tipo, foto) VALUES ('".$nom."', '".$user."', MD5('".$pw."'), '".$tipo."', '".'fotos/'.$nombre."')";
		$resultado = mysqli_query(Conectarse(), $sentencia);
	}
?>

<script type="text/javascript">
	/*alert("Usuario Ingresado exitosamente");*/
	window.location.href='Usuarios.php';
</script>