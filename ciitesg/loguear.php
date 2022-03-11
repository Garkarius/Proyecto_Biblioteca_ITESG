<?php
require 'conexion.php';
session_start();

$usuario =$_POST['usuario'];
$clave = $_POST['clave'];

$q = "SELECT COUNT(*) as contar from permisos where usuario = '$usuario' and pw = '$clave'";
$consulta = mysqli_query(Conectarse(),$q);
$array = mysqli_fetch_array($consulta);

$sentencia="SELECT tipo FROM permisos WHERE usuario = '$usuario'";
$registros = mysqli_query(Conectarse(), $sentencia);
$registro = mysqli_fetch_array($registros);		

if($array['contar']<>0){
//	$_SESSION['username'] = $usuario;
//	header("location: Inicio.php");
switch ($registro['tipo']) {
    case 'Administrador':
        //echo "Es Administrador";
		$_SESSION['username'] = $usuario;
		header("location: Inicio.php");
        break;
    case 'Apoyo':
        //echo "Es de atención";
		$_SESSION['username'] = $usuario;
		header("location: CallCenter.php");
        break;
}
}else{
	echo "<h1>Datos incorrectos!</h1>";
}
?>