<?php
include 'conexion.php';

ModificarCarrera($_POST['nombre'], $_POST['desc'], $_POST['id']);

function ModificarCarrera($nom, $desc, $id)
{
	$sentencia="UPDATE carreras SET nomCarrera= '".$nom."', descCarrera='".$desc."' WHERE idCarrera='".$id."'";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Colección Modificada exitosamente");*/
	window.location.href='Carreras.php';
</script>