<?php
include "conexion.php";

EliminaEditorial($_GET['no']);

function EliminaEditorial($no)
{
	$sentencia="DELETE FROM editoriales WHERE idEditorial='".$no."' ";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	alert("Editorial eliminada exitosamente");
	window.location.href='Editoriales.php';
</script>