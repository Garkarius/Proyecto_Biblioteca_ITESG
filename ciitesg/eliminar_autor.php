<?php
include "conexion.php";

EliminarUsuario($_GET['no']);

function EliminarUsuario($no)
{
	$sentencia="DELETE FROM autores WHERE idAutor='".$no."' ";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	alert("Autor eliminado exitosamente");
	window.location.href='Autores.php';
</script>