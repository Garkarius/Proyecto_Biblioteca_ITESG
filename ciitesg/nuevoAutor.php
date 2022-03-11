<?php 
include 'conexion.php';

NuevoAutor($_POST['nombre'], $_POST['pater'], $_POST['mater'], $_POST['nacion']);

function NuevoAutor($nom, $paterno, $materno, $nacionalidad)
{
	$sentencia="INSERT INTO autores (nomAutor, primerApellidoA, segundoApellidoA, nacionalidad) VALUES ('".$nom."', '".$paterno."', '".$materno."', '".$nacionalidad."')";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Autor Ingresado exitosamente");*/
	window.location.href='Autores.php';
</script>