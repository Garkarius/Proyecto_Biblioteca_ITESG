<?php
include "conexion.php";

EliminaColeccion($_GET['no']);

function EliminaColeccion($no)
{
	$sentencia="DELETE FROM colecciones WHERE idColeccion='".$no."' ";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	alert("Colección eliminada exitosamente");
	window.location.href='Colecciones.php';
</script>