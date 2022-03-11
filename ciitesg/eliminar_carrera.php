<?php
include "conexion.php";

EliminaCarrera($_GET['no']);

function EliminaCarrera($no)
{
	$sentencia="DELETE FROM carreras WHERE idCarrera='".$no."' ";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	alert("Carrera eliminada exitosamente");
	window.location.href='Carreras.php';
</script>