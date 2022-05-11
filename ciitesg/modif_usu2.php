<?php
include 'conexion.php';

ModificarUsuario($_POST['ncontrol'], $_POST['nombre'], $_POST['paterno'], $_POST['materno'], $_POST['tipo'], $_POST['correo'], $_POST['curp'], $_POST['tel'], $_POST['status'], $_POST['dir'], $_POST['carrera'], $_POST['id']);

function ModificarUsuario($control, $nom, $pater, $mater, $typo, $mail, $curp, $tel, $edo, $direc, $carr, $id)
{
	$sentencia="UPDATE usuarios SET noControl= '".$control."', nomUsuario='".$nom."', paternoUsuario='".$pater."', maternoUsuario='".$mater."', tipoUsuario='".$typo."', mailUsuario='".$mail."', curpUsuario='".$curp."', telUsuario='".$tel."', estatusUsuario='".$edo."', dirUsuario='".$direc."', idCarrera='".$carr."' WHERE idUsuario='".$id."'";
	$resultado = mysqli_query(Conectarse(), $sentencia);
}
?>

<script type="text/javascript">
	/*alert("Usuario Modificado exitosamente");*/
	window.location.href='Usuarios.php';
</script>