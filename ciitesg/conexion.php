<?php
function Conectarse()
{
//Pon aquí las variables
$user = "root";
$pass = "";
$host = "localhost";
$bd = "ciitesg";
		
	$cnx = mysqli_connect($host,$user,$pass);
	mysqli_select_db($cnx,$bd) or die(mysqli_error()." Error: seleccionando la base de datos");
	
	if(!$cnx)
	{
	exit("Error: al conectar al servidor".$cnx);
	}
	else
	{
		$msj = "Conexion realizada";
	}
	return $cnx;
}
?>