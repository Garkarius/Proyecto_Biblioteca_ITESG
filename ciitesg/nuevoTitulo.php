<?php 
include 'conexion.php';

NuevoTitulo($_POST['nombre'], $_POST['desc'], $_POST['consecutivo']);

function NuevoTitulo($nom, $descripcion, $conse)
{
	$sentencia="INSERT INTO titulos (nomTitulo, descTitulo, existenciaT, consecutivoT) VALUES ('".$nom."', '".$descripcion."', '0', '".$conse."')";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Título Ingresado exitosamente");*/
	window.location.href='Titulos.php';
</script>