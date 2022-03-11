<?php
include "conexion.php";

EliminarTitulo($_GET['no']);

function EliminarTitulo($no)
{
	$sentencia="DELETE FROM titulos WHERE idTitulo='".$no."' ";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	alert("Título eliminado exitosamente");
	window.location.href='Titulos.php';
</script>