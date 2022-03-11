<?php
include 'conexion.php';

ModificarColeccion($_POST['nombre'], $_POST['desc'], $_POST['id']);

function ModificarColeccion($nom, $desc, $id)
{
	$sentencia="UPDATE colecciones SET nomColeccion= '".$nom."', descColeccion='".$desc."' WHERE idColeccion='".$id."'";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Colección Modificada exitosamente");*/
	window.location.href='Colecciones.php';
</script>