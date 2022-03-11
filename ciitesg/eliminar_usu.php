<?php
	include "conexion.php";

	EliminarUsuario($_GET['no']);

	function EliminarUsuario($no)
	{
		$sentencia="DELETE FROM usuario WHERE idUsuario='".$no."' ";
		$resultado = mysqli_query(Conectarse(), $sentencia);
	}
?>

<script type="text/javascript">
	alert("Usuario eliminado exitosamente");
	window.location.href='Usuarios.php';
</script>