<?php
include 'conexion.php';

ModificarEditorial($_POST['nombre'], $_POST['pais'], $_POST['desc'], $_POST['id']);

function ModificarEditorial($nom, $pais, $desc, $id)
{
	$sentencia="UPDATE editoriales SET nomEditorial= '".$nom."', paisEditorial='".$pais."', descEditorial='".$desc."' WHERE idEditorial='".$id."'";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Editorial Modificada exitosamente");*/
	window.location.href='Editoriales.php';
</script>