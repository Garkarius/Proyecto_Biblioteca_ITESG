<?php 
include 'conexion.php';

NuevoUsuario($_POST['ncontrol'], $_POST['nombre'], $_POST['paterno'], $_POST['materno'], $_POST['tipo'], $_POST['correo'], $_POST['curp'], $_POST['tel'], $_POST['status'], $_POST['dir']);

function NuevoUsuario($control, $nom, $pater, $mater, $typo, $mail, $curp, $tel, $edo, $direc)
{
	$sentencia="INSERT INTO usuarios (noControl, nomUsuario, paternoUsuario, maternoUsuario, tipoUsuario, mailUsuario, curpUsuario, telUsuario, estatusUsuario, dirUsuario, idCarrera, idCentroi) VALUES ('".$control."', '".$nom."', '".$pater."', '".$mater."', '".$typo."', '".$mail."', '".$curp."', '".$tel."', '".$edo."', '".$direc."', '1', '1')";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Colección ingresada exitosamente");*/
	window.location.href='Usuarios.php';
</script>