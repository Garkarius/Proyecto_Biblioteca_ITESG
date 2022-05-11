<?php
	include "conexion.php";

	EliminarPermiso($_GET['no']);

	function EliminarPermiso($no)
	{
		$sentencia="DELETE FROM permiso WHERE idPermiso='".$no."' ";
		$resultado = mysqli_query(Conectarse(), $sentencia);
	}
?>

<script type="text/javascript">
	alert("Permiso eliminado exitosamente");
	window.location.href='Permisos.php';
</script>