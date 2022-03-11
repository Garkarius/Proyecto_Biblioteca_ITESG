<?php 
include 'conexion.php';

NuevaEditorial($_POST['nombre'], $_POST['pais'], $_POST['desc']);

function NuevaEditorial($nom, $pais, $desc)
{
	$sentencia="INSERT INTO editoriales (nomEditorial, paisEditorial, descEditorial) VALUES ('".$nom."', '".$pais."', '".$desc."')";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Editorial Ingresada exitosamente");*/
	window.location.href='Editoriales.php';
</script>