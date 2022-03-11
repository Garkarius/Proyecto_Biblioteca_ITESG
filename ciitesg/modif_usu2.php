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

ModificarUsuario($_POST['nombre'], $_POST['user'], $_POST['pw'], $_POST['tipo'], $_FILES['archivo']['name'], $_POST['id']);

	function ModificarUsuario($nom, $user, $pw, $tipo, $foto, $id)
	{
		$sentencia="UPDATE permisos SET nombre= '".$nom."', usuario='".$user."', pw='".$pw."', tipo='".$tipo."', foto='".'fotos/'.$foto."' WHERE idPermiso='".$id."'";
		$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Usuario Modificado exitosamente");*/
	window.location.href='Usuarios.php';
</script>