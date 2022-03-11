<?php
include 'conexion.php';

ModificarAutor($_POST['nombre'], $_POST['pater'], $_POST['mater'], $_POST['nacion'], $_POST['id']);

	function ModificarAutor($nom, $paterno, $materno, $nacionalidad, $id)
	{
		$sentencia="UPDATE autores SET nomAutor= '".$nom."', primerApellidoA='".$paterno."', segundoApellidoA='".$materno."', nacionalidad='".$nacionalidad."' WHERE idAutor='".$id."'";
		$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Autor Modificado exitosamente");*/
	window.location.href='Autores.php';
</script>