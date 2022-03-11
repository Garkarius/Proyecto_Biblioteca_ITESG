<?php
include 'conexion.php';

ModificarTitulo($_POST['nombre'], $_POST['desc'], $_POST['exis'], $_POST['id']);

	function ModificarTitulo($nom, $desc, $exis, $id)
	{
		$sentencia="UPDATE titulos SET nomTitulo= '".$nom."', descTitulo='".$desc."', existenciaT='".$exis."' WHERE idTitulo='".$id."'";
		$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Autor Modificado exitosamente");*/
	window.location.href='Titulos.php';
</script>