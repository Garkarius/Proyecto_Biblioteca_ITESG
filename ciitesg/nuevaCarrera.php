<?php 
include 'conexion.php';

NuevaColeccion($_POST['nombre'], $_POST['desc']);

function NuevaColeccion($nom, $desc)
{
	$sentencia="INSERT INTO carreras (nomCarrera, descCarrera) VALUES ('".$nom."', '".$desc."')";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Colección ingresada exitosamente");*/
	window.location.href='Carreras.php';
</script>